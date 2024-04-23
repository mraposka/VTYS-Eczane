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

        $db = db_connect(); // Öncelikle veritabanı bağlantısını oluşturun.
        $model = new EczaneModel($db);
        $data['categorys'] = $model->getCategorys(); // Veritabanından verileri alın.

        // İlk view'i döndürmeden önce gerekli verileri ayarlayın.
        return view("homePage", $data); // 'homePage' ve kategori verilerini döndürün.


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
        $db = db_connect();
        $model = new EczaneModel($db);
        $data['employees'] = $model->getEmployees(); // Veritabanından verileri alın
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

    // GİRİŞ İŞLEMLERİ
    public function Login()
    {
        try {
            $session = session();
        } catch (\Throwable $th) {
            // Hata durumunu ele al
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
    public function EmployeeAdd()
    {
        $db = db_connect();
        $model = new EczaneModel($db);

        // POST verilerini al
        $name = $_POST['Ad'];
        $surname = $_POST['Soyad'];
        $gender = $_POST['Cinsiyet'];

        // Çalışan ekleme işlemini model aracılığıyla gerçekleştir
        if ($model->addEmployee($name, $surname, $gender)) {
            // Başarılı bir şekilde eklendiğini belirten bir mesaj
            echo "Employee successfully added.";
            return redirect()->to("/Home");
        } else {
            // Hata durumunda bir mesaj
            echo "Error: Failed to add employee.";
            return redirect()->to("/Home");
        }
    }
    
    // ADMİN PANELİ KATEGORİ EKLEME
    public function CategoryAdd()
    {
        $db = db_connect();
        $model = new EczaneModel($db);

        // POST verilerini al
        $category = $_POST['Kategori'];

        // Kategori ekleme işlemini model aracılığıyla gerçekleştir
        if ($model->addCategory($category)) {
            // Başarılı bir şekilde eklendiğini belirten bir mesaj
            echo "Category successfully added.";
            return redirect()->to("/Home");
        } else {
            // Hata durumunda bir mesaj
            echo "Error: Failed to add category.";
            return redirect()->to("/Home");
        }
    }
}
