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
        $dbSimpan = new DataModel;
        $dbSimpan->save([
            'id_employee' => ('emp' . url_title($this->request->getVar('name'), '-', true)),
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'date_accept' => $this->request->getVar('date_accept')
        ]);
        return redirect()->to('/data');
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