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
        $db = db_connect();
        $query = $db->query("SELECT * FROM medicines"); // Sorgunun doğru olduğundan emin olun
        return $query->getResult();
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
    public function delMedicines($id)
    {
        $db = db_connect();
        $query = $this->db->table('medicines')->where('medicine_id', $id)->delete();
        if ($this->db->affectedRows() > 0)
            return true;
        else
            return false;
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

    // HASTA GÜNCELLEME
    public function updatePatient($patient_id, $tckno, $p_name, $p_surname, $gender, $dob, $address)
    {
        $db = db_connect();
        $sql = "UPDATE patient 
                SET tckno = ?, 
                    p_name = ?, 
                    p_surname = ?, 
                    gender = ?, 
                    dob = ?, 
                    address = ? 
                WHERE patient_id = ?";

        $query = $db->query($sql, [
            $tckno,
            $p_name,
            $p_surname,
            $gender,
            $dob,
            $address,
            $patient_id
        ]);
        return $query;
    }
    public function updatePrescriptionDetails($pres_id, $pres_date, $usage_date, $pres_color)
    {
        // Veritabanı bağlantısı
        $db = db_connect();

        // SQL sorgusu
        $sql = "UPDATE prescription 
                SET pres_date = ?, 
                    usage_date = ?, 
                    pres_color = ? 
                WHERE pres_id = ?";
        $query = $db->query($sql, [
            $pres_date,
            $usage_date,
            $pres_color,
            $pres_id
        ]);

        return $query;
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

    public function editEmployees($data, $id)
    {
        $db = db_connect();
        $query = $this->db->table('employee')->where('emp_id', $id)->update($data);
        if ($this->db->affectedRows() > 0)
            return true;
        else
            return false;
    }
}