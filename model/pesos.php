<?php
class pesos{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    //Funcion para obtener el ultimo peso actualizado
    public function pesoContinuo($id_cliente){
        $sql = "SELECT * FROM pesos WHERE tipo = 'continuo' AND id_cliente = $id_cliente ORDER BY fecha DESC LIMIT 1";
        $response = $this->db->query($sql);

        if($response){
            if($response->num_rows > 0){
                return $response->fetch_object();
            }
            else{
                return false;
            }
        }
        else{
            return $response;
        }
    }

    public function avancesPesos($id_cliente){
        $sql = "SELECT * FROM pesos WHERE tipo = 'continuo' AND id_cliente = $id_cliente";
        $response = $this->db->query($sql);

        if($response){
            if($response->num_rows > 0){
                return $response;
            }
            else{
                return false;
            }
        }
        else{
            return $response;
        }
    }

    public function pesoMeta($id_cliente){
        $sql = "SELECT * FROM pesos WHERE tipo = 'meta' AND id_cliente = $id_cliente";
        $response = $this->db->query($sql);

        if($response){
            if($response->num_rows > 0){
                return $response;
            }
            else{
                return false;
            }
        }
        else{
            return $response;
        }
    }

    public function ultimosPesos($id_cliente){
        $sql = "SELECT * FROM pesos WHERE tipo = 'continuo' AND id_cliente = $id_cliente ORDER BY fecha DESC LIMIT 2";
        $response = $this->db->query($sql);

        if($response){
            if($response->num_rows > 0){
                return $response;
            }
            else{
                return false;
            }
        }
        else{
            return $response;
        }
    }

    public function insertPesoContinuo($peso, $id_cliente){
        $sql = "INSERT INTO pesos VALUES(NULL, $id_cliente, '$peso', 'continuo', CURDATE());";
        $response = $this->db->query($sql);
        return $response;
    }
}
?>