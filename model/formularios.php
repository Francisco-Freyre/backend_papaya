<?php
class formularios{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    //Leer el formulario de un cliente
    public function getFormulario($id_cliente){
        $sql = "SELECT * FROM formularios WHERE id_cliente = $id_cliente";
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
}
?>