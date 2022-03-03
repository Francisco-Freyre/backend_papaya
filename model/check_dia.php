<?php
class check_dia{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function get($id_cliente){
        $sql = "SELECT * FROM check_dia WHERE cliente_id = $id_cliente";
        return $response = $this->db->query($sql);
    }

    public function insert($id_cliente){
        $sql = "INSERT INTO check_dia VALUES(NULL, $id_cliente, CURDATE(), 0, 0, 0, 0, 0);";
        $response = $this->db->query($sql);
        return $response;
    }

    public function Update($id_cliente){
        $sql = "UPDATE check_dia SET fecha = CURDATE(), check1 = 0, check2 = 0, check3 = 0, check4 = 0, check5 = 0 WHERE cliente_id = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }

    public function UpdateCheck($id_cliente, $check, $valor){
        $sql = "UPDATE check_dia SET $check = $valor WHERE cliente_id = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }
}
?>