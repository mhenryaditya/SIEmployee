<?php

namespace App\Controllers;

use App\Models\DataModel;

class Data extends BaseController
{
    public function index()
    {
        $dataModel = new DataModel();

        $countofRow = 6;

        $data = [
            'title' => "Pendataan",
            'countofRow' => $countofRow,
            'dataList' => $dataModel->paginate($countofRow, 'employee'),
            'pager' => $dataModel->pager,
            'validation' => null,
            'pageNumber' => (($this->request->getVar('page_employee')) ? $this->request->getVar('page_employee') : 1)
        ];

        return view('data', $data);
    }

    public function tambahPegawai()
    {
        $data = [
            "title" => 'Tambah Data Pegawai'
        ];
        return view('tambahPegawai', $data);
    }

    public function tambahPegawaiSimpan()
    {
        $dataModel = new DataModel;
        $countofRow = 6;

        $data = [
            'title' => "Pendataan",
            'countofRow' => $countofRow,
            'dataList' => $dataModel->paginate($countofRow, 'employee'),
            'pager' => $dataModel->pager,
            'validation' => null,
            'pageNumber' => (($this->request->getVar('page_employee')) ? $this->request->getVar('page_employee') : 1)
        ];

        if (
            $this->validate([
                'id_employee' => 'is_unique[employee.id_employee]',
                'name' => 'is_unique[employee.name]|alpha_numeric_punct|required',
                'email' => 'valid_email|required',
                'date_accept' => 'valid_date|required',
                'picture' => 'is_image[picture]|mime_in[picture,image/png,image/jpg,image/jpeg]|max_size[picture,1536]'
            ])
        ) {
            $id = '';
            if (!empty($this->request->getVar('name'))) {
                $id = ('emp' . url_title($this->request->getVar('name'), '-', true));
            }

            $fileFoto = $this->request->getFile('picture');
            $nameFoto = ($fileFoto->getError() != 4) ? $fileFoto->getRandomName() : 'profile.png';

            if ($fileFoto->getError() != 4) {
                $fileFoto->move('img/', $nameFoto);
            }

            $dataModel->save([
                'id_employee' => $id,
                'name' => htmlspecialchars($this->request->getVar('name')),
                'email' => htmlspecialchars($this->request->getVar('email')),
                'date_accept' => htmlspecialchars($this->request->getVar('date_accept')),
                'picture' => htmlspecialchars($nameFoto)
            ]);

            return view('data', array_merge($data, ["tambah" => 'Success!', "message" => 'Berhasil menambahkan data']));
        } else {
            $data = ["title" => 'Tambah Data Pegawai', "validation" => \Config\Services::validation(), "tambah" => 'Failed!', "message" => 'Gagal menambahkan data', "data1" => $dataModel->findAll()];
            return view('tambahPegawai', $data);
        }
    }

    public function detail($id)
    {
        $dataModel = new DataModel();
        $data1 = $dataModel->find($id);

        $data = [
            "data1" => $data1,
            "title" => "Detail Data Pegawai"
        ];

        if ($data1 == null) {
            throw new \CodeIgniter\Exceptions\AlertError('Maaf! Data pegawai tidak tersedia.', 404);
        }

        return view('detail', $data);
    }

    public function hapusPegawai()
    {
        $id = $this->request->getVar('id_employee');
        $dataModel = new DataModel;

        $countofRow = 6;
        $data = [
            'title' => "Pendataan",
            'countofRow' => $countofRow,
            'dataList' => $dataModel->paginate($countofRow, 'employee'),
            'pager' => $dataModel->pager,
            'validation' => null,
            'pageNumber' => (($this->request->getVar('page_employee')) ? $this->request->getVar('page_employee') : 1)
        ];

        $data1 = $dataModel->find($id);

        if ($data1['picture'] !== 'profile.png') {
            unlink('img/' . $data1['picture']);
        }

        $dataModel->delete($id);

        return view('data', array_merge($data, ["tambah" => 'Success!', "message" => 'Data berhasil dihapus']));
    }

    public function update()
    {

        $dataModel = new DataModel;

        $countofRow = 6;

        $data = [
            'title' => "Pendataan",
            'countofRow' => $countofRow,
            'dataList' => $dataModel->paginate($countofRow, 'employee'),
            'pager' => $dataModel->pager,
            'validation' => null,
            'pageNumber' => (($this->request->getVar('page_employee')) ? $this->request->getVar('page_employee') : 1)
        ];

        $id = $this->request->getVar('id_employee');
        $dataLast = $dataModel->find($id);

        $nameRuleFirst = ($dataLast['name'] === $this->request->getVar('name')) ? "" : "is_unique[employee.name]|";

        if (
            $this->validate([
                'name' => $nameRuleFirst . "alpha_numeric_punct",
                'email' => 'valid_email',
                'date_accept' => 'valid_date',
                'picture' => 'is_image[picture]|mime_in[picture,image/png,image/jpg,image/jpeg]|max_size[picture,1536]'
            ])
        ) {
            $fileFoto = $this->request->getFile('picture');
            $nameFoto = ($fileFoto->getError() != 4) ? $fileFoto->getRandomName() : $dataLast['picture'];

            if ($fileFoto->getError() != 4) {
                $fileFoto->move('img/', $nameFoto);
                if ($dataLast['picture'] !== 'profile.png') {
                    unlink('img/' . $dataLast['picture']);
                }
            }

            $dataModel->update($id, [
                "name" => htmlspecialchars($this->request->getVar('name')),
                "email" => htmlspecialchars($this->request->getVar('email')),
                "date_accept" => htmlspecialchars($this->request->getVar('date_accept')),
                'picture' => htmlspecialchars($nameFoto)
            ]);

            return view('data', array_merge($data, ["tambah" => 'Success!', "message" => "Data pegawai $id berhasil diedit"]));
        } else {
            $data = ["title" => "Detail Data Pegawai $id", "error" => \Config\Services::validation()->getErrors(), "tambah" => 'Failed!', "message" => "Gagal mengedit data.", "data1" => $dataModel->find($id)];
            return view('detail', $data);
        }
    }
}