<?php

namespace App\Controllers;

use App\Models\DataModel;
use PHPUnit\Framework\OutputError;

class Data extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Pendataan"
        ];

        $dataModel = new DataModel();
        $data1 = $dataModel->findAll();

        return view('data', ["data1" => $data1, "title" => "Pendataan"]);
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
            "title" => 'Tambah Data Pegawai',
        ];

        if (
            $this->validate([
                'id_employee' => 'is_unique[employee.id_employee]|required|alpha_numeric_punct',
                'name' => 'is_unique[employee.name]|alpha_numeric_punct',
                'email' => 'valid_email',
                'date_accept' => 'valid_date'
            ])
        ) {
            $dbSimpan = new DataModel;
            $id = '';
            if (!empty($this->request->getVar('name'))) {
                $id = ('emp' . url_title($this->request->getVar('name'), '-', true));
            }

            $dbSimpan->save([
                'id_employee' => $id,
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'date_accept' => $this->request->getVar('date_accept')
            ]);
        } else {
            $data2 = ["validation" => \Config\Services::validation()];
            $data = array_merge($data, $data2);
        }
        return view('tambahPegawai', $data);
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

        return view('detail', ["data1" => $data1, "title" => "Pendataan"]);
    }
}