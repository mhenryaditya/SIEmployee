<?php

namespace App\Controllers;

class Project extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Project"
        ];
        return view('project', $data);
    }
}
