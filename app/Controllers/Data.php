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
        $data1 = $dataModel->getQuery();

        return view('data', ["data1" => $data1, "title" => "Pendataan"]);
    }

    public function detail()
    {
        $data = [
            "title" => "Detail"
        ];

        $dataModel = new DataModel();
        $data1 = $dataModel->getQuery();

        return view('data', ["data1" => $data1, "title" => "Pendataan"]);
    }
}