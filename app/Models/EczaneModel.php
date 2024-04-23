<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Database\Query;

class EczaneModel
{
    protected $db;
    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
    }
    function login($user, $pass)
    {
        $data = ['user_name' => $user, 'user_pass' => $pass];
        $user = $this->db->table("users")
            ->select('user_id')
            ->where($data)
            ->limit(1)
            ->get();
        if ($user) {
            return $user->getFirstRow();
        }
        return false;
    }

    // PERSONEL TABLOSUNU GÖSTERMEK İÇİN
    public function getEmployees()
    {
        $db = db_connect();
        $query = $db->query("SELECT * FROM employee"); // Tüm çalışanları seç
        return $query->getResult(); // Sonuçları döndür
    }

     // KATEGORİ TABLOSUNU GÖSTERMEK İÇİN
     public function getCategorys()
     {
         $db = db_connect();
         $query = $db->query("SELECT * FROM category"); // Tüm kategorileri seç
         return $query->getResult(); // Sonuçları döndür
     }

     // KATEGORİ TABLOSUNU GÖSTERMEK İÇİN
     public function getMedicines()
     {
         $db = db_connect();
         $query = $db->query("SELECT * FROM medicines"); // Tüm ilaçları seç
         return $query->getResult(); // Sonuçları döndür
     }

     // KATEGORİ EKLEME
     public function addCategory($category)
    {
        $sql = "INSERT INTO category (c_type) VALUES ('$category')";
        
        return $this->db->query($sql);
    }
    // PERSONEL EKLEME
    public function addEmployee($name, $surname, $gender)
    {
        $sql = "INSERT INTO employee (name, surname, gender) VALUES ('$name', '$surname', '$gender')";
        
        return $this->db->query($sql);
    }
    
    //HASTA EKLEME
    public function addPatient($name, $surname, $gender, $dob, $address, $tckno)
    {
        $db = db_connect();
        $sql = "INSERT INTO patient (p_name, p_surname, gender, dob, address, tckno) VALUES ('$name', '$surname', '$gender',  '$dob', '$address', '$tckno')";
        
        return $this->db->query($sql);
    }
    // İLAÇ EKLEME
    public function addMedicines($name, $price, $company, $pres_color){
        $sql = "INSERT INTO medicines (name, price, company , pres_color) VALUES ('$name', '$price', '$company', '$pres_color')";
        return $this->db->query($sql);
    }
}
