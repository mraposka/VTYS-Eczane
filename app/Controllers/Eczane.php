<?php

namespace App\Controllers;

class Eczane extends BaseController
{
    public function index()
    {
        return view("login");
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
    public function Faturalar()
    { 
        return view("invoice"); 
    }
    public function Sepet()
    { 
        return view("myCart"); 
    }

    // Controller dosyanızda


}
