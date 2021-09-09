<?php
class form_result{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($id_cliente, $kcal, $dieta_id){
        $sql = "INSERT INTO form_result VALUES(NULL, $id_cliente, $kcal, $dieta_id);";
        $response = $this->db->query($sql);
        return $response;
    }

    public function read($id_cliente){
        $sql = "SELECT * FROM form_result WHERE cliente_id = $id_cliente";
        return $response = $this->db->query($sql);
    }

    public function update($kcal, $id_cliente, $id_dieta){
        $sql = "UPDATE form_result SET kcal = $kcal, dieta_id = $id_dieta WHERE cliente_id = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }

    public function dietas($kcal){
        $sql = "SELECT * FROM dietas WHERE kcal >= $kcal - 50 AND kcal <= $kcal + 50";
        return $response = $this->db->query($sql);
    }

    public function dieta($id){
        $sql = "SELECT * FROM dietas WHERE id = $id";
        return $response = $this->db->query($sql);
    }
}
?>