<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EczaneModel;
use CodeIgniter\Database\Query;

$session = \Config\Services::session();
class Eczane extends BaseController
{
    public $admin = "8fqJY6B2lmkhzbg55W66VZ3iaOAY4cchsTMMFMWAi2XMOJ2HVoHvDk4MrBUkGhHP4PpUkHaKEq87SWRpOZi5k2cIdX0w9Tou9hwzUrIdtq701EO399LbGSYJUspPsyOq0U5lXvkYP8GBpUZC1M8c0ICaCGxQwYZkgm7LrSg04tMpt7Ck3KjwQsKoAwrsoKDvAwXjiWzIvaP3P0rlUHfBDQHhMjPKfAAmsVgZEjdVlVSdUV4xJQWktLwJtFR9mI";
    public function index()
    {
        return view("homePage");
    }
    public function Home()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $data['categorys'] = $model->getCategorys();
        $data['medicines'] = $model->getMedicines();
        return view("homePage", $data);
    }
    public function Giris()
    {
        try {
            $session = session();
            $session->destroy();
        } catch (\Throwable $th) {
        }
        return view("login");
    }
    public function Ilaclar()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $data['medicines'] = $model->getMedicines();
        $data['categories'] = $model->getCategories();
        return view("medicines", $data);
    }
    public function Hastalar()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $data['patient'] = $model->getPatients();
        return view("sick", $data);
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
        $db = db_connect();
        $model = new EczaneModel($db);
        $data['employees'] = $model->getEmployees();
        return view('employee', $data);
    }
    public function Faturalar()
    {
        return view("invoice");
    }
    public function Sepet()
    {
        return view("myCart");
    }
    public function Logout()
    {
        try {
            $session = session();
            $session->destroy();
            return redirect()->to("Giris");
        } catch (\Throwable $th) {
        }
    }

    // GİRİŞ İŞLEMLERİ+
    public function Login()
    {
        try {
            $session = session();
        } catch (\Throwable $th) {
        }
        $db = db_connect();
        $model = new EczaneModel($db);
        $query = $model->login($_POST["user"], md5($_POST["pass"]));

        if ($query !== null && $query->user_id == $this->admin) {
            $sessionData = ['user_id' => $this->admin];
            $session->set($sessionData);
            return redirect()->to("Home");
        } else {
            return redirect()->to("Giris");
        }
    }

    // ADMİN PANELİ ÇALIŞAN EKLEME 
    public function PatientAdd()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $name = $_POST['Ad'];
        $surname = $_POST['Soyad'];
        $gender = $_POST['Cinsiyet'];
        $dob = $_POST['DogumTarihi'];
        $address = $_POST['Adres'];
        $tckno = $_POST['TC'];
        if ($model->addPatient($name, $surname, $gender, $dob, $address, $tckno))
            echo json_encode(200);
        else
            echo json_encode(400);
    }
    public function EmployeeAdd()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $name = $_POST['Ad'];
        $surname = $_POST['Soyad'];
        $gender = $_POST['Cinsiyet'];
        if ($model->addEmployee($name, $surname, $gender))
            echo json_encode(200);
        else
            echo json_encode(400);
    }
    // ADMİN PANELİ KATEGORİ EKLEME+
    public function CategoryAdd()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $category = $_POST['Kategori'];
        if ($model->addCategory($category))
            echo json_encode(200);
        else
            echo json_encode(400);
    }

    // ADMİN PANELİ İLAÇ EKLEME+
    public function MedicineAdd()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $name = $_POST['IlaçAdı'];
        $price = $_POST['Fiyatı'];
        $company = $_POST['Firması'];
        $pres_color = $_POST['receteRengi'];
        $cat_id = $_POST['kategori'];
        if ($model->addMedicines($name, $price, $company, $pres_color, $cat_id))
            echo json_encode(200);
        else
            echo json_encode(400);
    }
    public function MedicineEdit()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $data = array(
            'name' => $_POST['IlaçAdı'],
            'price' => $_POST['Fiyatı'],
            'company' => $_POST['Firması'],
            'pres_color' => $_POST['receteRengi'],
            'category_id' => $_POST['kategori']
        );
       
        if ($model->editMedicines($data,$_POST['med_id']))
            echo json_encode(200);
        else
            echo json_encode(400); 
    }
    public function MedicineDel()
    {
        $db = db_connect();
        $model = new EczaneModel($db);  
        if ($model->delMedicines($_POST['id']))
            echo json_encode(200);
        else
            echo json_encode(400); 
    }

    // ADMİN PANELİ STOK EKLEME+
    public function StockAdd()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $piece = $_POST['Stok'];
        $med_id = $_POST['ilac'];
        $cat_id = $model->getCategoryByMedicineId($med_id);
        if ($model->addStock($med_id, $piece, $cat_id)) {
            echo json_encode(200);
        } else {
            echo json_encode(400);
        }
    }
}
