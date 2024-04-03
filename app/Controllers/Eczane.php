<?php

namespace App\Controllers;
use App\Models\EczaneModel;

class Eczane extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $data['users']=$model->test();
        return view("login",$data);
    }
    public function home()
    { 
        return view("homePage");
    }
    public function Test()
    { 
        return view("test");
    }
}
