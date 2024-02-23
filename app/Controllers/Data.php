<?php

namespace App\Controllers;

use App\Models\DataModel;

class Data extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Pendataan"
        ];

        $dataModel = new DataModel();
        $data1 = $dataModel->findAll();

        return view('data', ["data1" => $data1, "title" => "Pendataan", "validation" => null]);
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
        $data = [
            "title" => 'Pendataan',
        ];

        // dd($fileFoto);

        $dbSimpan = new DataModel;
        if (
            $this->validate([
                'id_employee' => 'is_unique[employee.id_employee]',
                'name' => 'is_unique[employee.name]|alpha_numeric_punct',
                'email' => 'valid_email',
                'date_accept' => 'valid_date',
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
                $fileFoto->move('/img/', $nameFoto);
            }

            $dbSimpan->save([
                'id_employee' => $id,
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'date_accept' => $this->request->getVar('date_accept'),
                'picture' => $nameFoto
            ]);

            $data = array_merge($data, ["validation" => null, "tambah" => 'Success!', "message" => 'Berhasil menambahkan data', "data1" => $dbSimpan->findAll()]);
            return view('data', $data);
        } else {
            $data = ["title" => 'Tambah Data Pegawai', "validation" => \Config\Services::validation(), "tambah" => 'Failed!', "message" => 'Gagal menambahkan data', "data1" => $dbSimpan->findAll()];
            return view('tambahPegawai', $data);
        }
    }

    public function detail($id)
    {
        $data = [
            "title" => "Detail Data Pegawai"
        ];

        $dataModel = new DataModel();
        $data1 = $dataModel->find($id);

        if ($data1 == null) {
            throw new \CodeIgniter\Exceptions\AlertError('Maaf! Data pegawai tidak tersedia.', 404);
        }

        return view('detail', ["data1" => $data1, "title" => "Detail Data Pegawai $id"]);
    }

    public function hapusPegawai()
    {
        $id = $this->request->getVar('id_employee');
        $dataModel = new DataModel;
        $data1 = $dataModel->find($id);

        if ($data1['picture'] !== 'profile.png') {
            unlink('/img/' . $data1['picture']);
        }

        $dataModel->delete($id);

        return view('data', ["data1" => $dataModel->findAll(), "tambah" => 'Success!', "title" => "Pendataan", "message" => 'Data berhasil dihapus']);
    }

    public function update()
    {
        // d($this->request->getVar());
        $dataModel = new DataModel;
        $id = $this->request->getVar('id_employee');

        $nameRuleFirst = ($this->request->getVar('old_name') === $this->request->getVar('name')) ? "" : "is_unique[employee.name]|";

        if (
            $this->validate([
                'name' => $nameRuleFirst . "alpha_numeric_punct",
                'email' => 'valid_email',
                'date_accept' => 'valid_date'
            ])
        ) {
            $dataModel->update($id, [
                "name" => $this->request->getVar('name'),
                "email" => $this->request->getVar('email'),
                "date_accept" => $this->request->getVar('date_accept'),
            ]);
            return view('data', ["data1" => $dataModel->findAll(), "tambah" => 'Success!', "title" => "Pendataan", "message" => "Data pegawai $id berhasil diedit"]);
        } else {
            $data = ["title" => "Detail Data Pegawai $id", "error" => \Config\Services::validation()->getErrors(), "tambah" => 'Failed!', "message" => "Gagal mengedit data.", "data1" => $dataModel->find($id)];
            return view('detail', $data);
        }
    }
}