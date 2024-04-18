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
        return view("homePage");
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
    public function Logout()
    {
        try {
            $session = session();
            $session->destroy();
            return redirect()->to("Giris");
        } catch (\Throwable $th) {
        }
    }
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
    public function employeeAdd()
    {

        $db = db_connect();
        $model = new EczaneModel($db);
    
        // POST verilerini al
        $name = $_POST['Ad'];
        $surname = $_POST['Soyad'];
        $gender = $_POST['Cinsiyet'];
    
        // SQL sorgusunu oluştur
        $sql = "INSERT INTO employee (name, surname, gender) VALUES ('$name', '$surname', '$gender')";
    
        // SQL sorgusunu veritabanına gönder ve sonucu kontrol et
        if ($db->query($sql) === TRUE) {
            // Başarılı bir şekilde eklendiğini belirten bir mesaj
            echo "Employee successfully added.";
        } else {
            // Hata durumunda bir mesaj
            echo "Error: Failed to add employee.";
        }
    }
}
