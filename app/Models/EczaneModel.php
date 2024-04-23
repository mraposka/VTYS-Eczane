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
}
