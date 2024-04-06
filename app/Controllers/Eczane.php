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
    public function Giris()
    { 
        return view("login");
    }
    public function Ilaclar()
    { 
        return view("medicines"); 
    }
    public function Hastalar()
    { 
        return view("sick"); 
    }
    public function Receteler()
    { 
        return view("prescriptions"); 
    }
    public function Stok()
    { 
        return view("stock"); 
    }
    public function Personel()
    { 
        return view("employee"); 
    }
    public function Sepet()
    { 
        return view("myCart"); 
    }
}
