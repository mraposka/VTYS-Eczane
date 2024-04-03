<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;

class EczaneModel{
    protected $db;
    public function __construct(ConnectionInterface &$db){
        $this->db=& $db;
    }
    
    function test(){
        $builder=$this->db->table('vtys');
        $res=$builder->get()->getResult();
        return $res;
    }
}  
?>