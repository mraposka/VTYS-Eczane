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

    // İLAÇ TABLOSUNU GÖSTERMEK İÇİN
    public function getMedicines()
    {
        $query = $this->db->table("medicines")->get();
        $result = $query->getResult();
        return $result;
    }

    // HASTA TABLOSUNU GÖSTERMEK İÇİN
    public function getPatients()
    {
        $db = db_connect();
        $query = $db->query("SELECT * FROM patient"); // Sorgunun doğru olduğundan emin olun
        return $query->getResult();
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
    //REÇETE EKLEME
    public function addPress(
        $pres_id,
        $pres_date,
        $usage_time,
        $pres_color,
        $med_total,
        $medicine_id,
        $hasta_id
    ) {
        $db = db_connect();
        $sql = "INSERT INTO pres (pres_id,pres_date,usage_time,pres_color,medicine_id,med_total,patient_id) VALUES ('$pres_id', '$pres_date', '$usage_time',  '$pres_color', '$medicine_id','$med_total','$hasta_id')";
        return $this->db->query($sql);
    }
    public function SaveCart(
        $pat_id,
        $pres_id,
        $total_price,
    ) {
        $db = db_connect();
        $model = new EczaneModel($db);
        $cart_id = $model->getLastCartID();
        $cart_id++;
        $sql = "INSERT INTO cart (pres_id,pat_id,total_price) VALUES ('$pres_id','$pat_id','$total_price')";
        return $this->db->query($sql);
    }
    // İLAÇ EKLEME
    public function addMedicines($name, $price, $company, $pres_color, $cat_id)
    {
        $db = db_connect();
        $sql = "INSERT INTO medicines (name, price, company , pres_color,category_id) VALUES ('$name', '$price', '$company', '$pres_color','$cat_id')";
        return $this->db->query($sql);
    }
    public function editMedicines($data, $id)
    {
        $db = db_connect();
        $query = $this->db->table('medicines')->where('medicine_id', $id)->update($data);
        if ($this->db->affectedRows() > 0)
            return true;
        else
            return false;
    }
    public function editEmployees($data, $id)
    {
        $db = db_connect();
        $query = $this->db->table('employee')->where('emp_id', $id)->update($data);
        if ($this->db->affectedRows() > 0)
            return true;
        else
            return false;
    }
    public function delMedicines($id)
    {
        $db = db_connect();
        $query = $this->db->table('medicines')->where('medicine_id', $id)->delete();
        if ($this->db->affectedRows() > 0)
            return true;
        else
            return false;
    }
    public function delPres($id)
    {
        $db = db_connect();
        $query = $this->db->table('pres')->where('pres_id', $id)->delete();
        if ($this->db->affectedRows() > 0)
            return true;
        else
            return false;
    }
    public function getLastPresID()
    {
        $query = $this->db->table("pres")
            ->select('pres_id')
            ->orderBy('pres_id', 'DESC')
            ->get();
        $result = $query->getFirstRow();
        try {
            return $result->pres_id;
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public function GetBill()
    {
        $query = $this->db->query("
        SELECT DISTINCT bill.bill_id, patient.tckno, CONCAT(patient.p_name, ' ', patient.p_surname) AS patient_name, pres.pres_id, bill.date, cart.total_price
        FROM bill
        JOIN cart ON bill.cart_id = cart.cart_id
        JOIN pres ON cart.pres_id = pres.pres_id
        JOIN patient ON pres.patient_id = patient.patient_id
        ORDER BY bill.date DESC
    ");

        $result = $query->getResult();

        return $result;
    }

    public function getLastCartID()
    {
        $query = $this->db->table("cart")
            ->select('cart_id')
            ->orderBy('cart_id', 'DESC')
            ->get();
        $result = $query->getFirstRow();
        try {
            return $result->cart_id;
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public function delStock($id)
    {
        $db = db_connect();
        $query = $this->db->table('stock')->where('stock_id', $id)->delete();
        if ($this->db->affectedRows() > 0)
            return true;
        else
            return false;
    }

    //STOK EKLEME
    public function addStock($med_id, $piece, $cat_id)
    {
        $sql = "INSERT INTO stock (medicine_id,piece,category_id) VALUES ('$med_id','$piece','$cat_id')";
        return $this->db->query($sql);
    }
    public function getCategoryByMedicineId($med_id)
    {
        // Örnek bir sorgu, gerçek veritabanı şemanı ve tablo adlarına göre düzenlenmelidir 
        $query = $this->db->table("medicines")
            ->select('category_id')
            ->where(['medicine_id' => $med_id])
            ->get();
        $result = $query->getFirstRow();
        return $result->category_id;
    }
    public function getPatientByID($pat_id)
    {
        // Örnek bir sorgu, gerçek veritabanı şemanı ve tablo adlarına göre düzenlenmelidir 
        $query = $this->db->table("patient")
            ->select('p_name,p_surname')
            ->where(['patient_id' => $pat_id])
            ->get();
        $result = $query->getFirstRow();
        return $result->p_name . " " . $result->p_surname;
    }
    // kategori görüntüleme
    public function getCategories()
    {
        $query = $this->db->table("category")->get();
        $result = $query->getResult();
        return $result;
    }
    public function getStock()
    {
        $query = $this->db->table("stock")->get();
        $result = $query->getResult();
        return $result;
    }
    public function getPres()
    {
        $query = $this->db->table("pres")->get();
        $result = $query->getResult();
        return $result;
    }
    public function delEmployees($id)
    {
        $db = db_connect();
        $query = $this->db->table('employee')->where('emp_id', $id)->delete();
        if ($this->db->affectedRows() > 0)
            return true;
        else
            return false;
    }
    public function delPatient($id)
    {
        $db = db_connect();
        $query = $this->db->table('patient')->where('patient_id', $id)->delete();
        if ($this->db->affectedRows() > 0)
            return true;
        else
            return false;
    }
    public function editPatients($data, $id)
    {
        $db = db_connect();
        $query = $this->db->table('patient')->where('patient_id', $id)->update($data);
        if ($this->db->affectedRows() > 0)
            return true;
        else
            return false;
    }
    public function editStock($data, $id)
    {
        $db = db_connect();
        $query = $this->db->table('stock')->where('stock_id', $id)->update($data);
        if ($this->db->affectedRows() > 0)
            return true;
        else
            return false;
    }
}