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

        return view('data', ["data1" => $data1, "title" => "Pendataan"]);
    }

    public function tambahPegawai()
    {
        $data = [
            "title" => 'Tambah Data Pegawai',
            "data"
        ];
    }

    public function detail()
    {
        $data = [
            "title" => "Detail"
        ];

        $dataModel = new DataModel();
        $data1 = $dataModel->findAll();

        return view('data', ["data1" => $data1, "title" => "Pendataan"]);
    }
}