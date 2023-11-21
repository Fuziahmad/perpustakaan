<?php

namespace App\Controllers;

use \App\Models\Maker_Model;

class Maker extends BaseController
{

    private $model;
    public function __construct()
    {
        $this->model = new Maker_Model;
    }
    public function index()
    {
        $data['title'] = 'Maker';
        $data['getData'] = $this->model->getMaker();
        echo view('header_view', $data);
        echo view('maker/maker_view', $data);
        echo view('footer_view', $data);
    }

}
