<?php
class platillos {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($nombre, $procedimiento, $elaboracion, $energia, $proteinas, $carbo, $grasas, $url_img){
        $sql = "INSERT INTO platillos VALUES(NULL, '$nombre', '$procedimiento', '$elaboracion', '$energia', '$proteinas', '$carbo', '$grasas', '$url_img');";
        $save = $this->db->query($sql);
        if($save){
            return $this->db->insert_id;
        }else{
            return $save;
        }
    }

    public function create_ingre($platilloid, $nombre){
        $sql = "INSERT INTO ingredientes VALUES(NULL, $platilloid, '$nombre');";
        $save = $this->db->query($sql);
        if($save){
            return $this->db->insert_id;
        }else{
            return $save;
        }
    }
    //Funcion mal nombrada, borra ingredientes, no platillos
    public function delete_platillo($id){
        $sql = "DELETE FROM ingredientes WHERE id = $id";
        $response = $this->db->query($sql);
        return $response;
    }

    public function getPlatillos(){
        $sql = "SELECT * FROM platillos ORDER BY nombre";
        $response = $this->db->query($sql);

        if($response){
            return $response;
        }
        else{
            return $response;
        }
    }

    public function getPlatillo($id){
        $sql = "SELECT * FROM platillos WHERE id = $id";
        $response = $this->db->query($sql);

        if($response){
            return $response;
        }
        else{
            return $response;
        }
    }

    public function getPlatilloNombre($nombre){
        $sql = "SELECT * FROM platillos WHERE nombre = '$nombre'";
        $response = $this->db->query($sql);

        if($response->num_rows == 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function getPlaNombre($nombre){
        $sql = "SELECT * FROM platillos WHERE nombre = '$nombre'";
        $response = $this->db->query($sql);
        if($response->num_rows == 1){
            return $response;
        }
        else{
            return $this->db->error;
        }
    }

    public function getIngredientes($id){
        $sql = "SELECT * FROM ingredientes2 WHERE platillo_id = $id";
        $response = $this->db->query($sql);

        if($response){
            return $response;
        }
        else{
            return $response;
        }
    }

    public function getIngredientesDos($id){
        $sql = "SELECT DISTINCT ingredientes2.id, alimentos.nombre, alimentos.unidad, alimentos.cantidad FROM ingredientes2, alimentos WHERE ingredientes2.platillo_id = $id AND ingredientes2.alimento_id = alimentos.id";
        $response = $this->db->query($sql);

        if($response){
            return $response;
        }
        else{
            return $response;
        }
    }

    //Funcion para borrar platillos
    public function deletePlatillo($id){
        $sql = "DELETE FROM platillos WHERE id = $id";
        $response = $this->db->query($sql);
        return $response;
    }

    public function editPlatillo($id, $nombre, $proce, $elabo, $img){
        if($img != ""){
            $sql = "UPDATE platillos SET nombre = '$nombre', procedimiento = '$proce', tiempo_elaboracion = '$elabo', url_img = '$img' WHERE id = $id";
        }
        else{
            $sql = "UPDATE platillos SET nombre = '$nombre', procedimiento = '$proce', tiempo_elaboracion = '$elabo' WHERE id = $id";
        }

        $response = $this->db->query($sql);
        return $response; 
    }

    public function editPlatilloNombre($id, $nombre){
        $sql = "UPDATE platillos SET nombre = '$nombre' WHERE id = $id";
        $response = $this->db->query($sql);
        return $response; 
    }

    public function editarAporte($id, $ener, $prote, $carbo, $grasa){
        $sql = "UPDATE platillos SET energia = '$ener', proteina = '$prote', carbohidratos = '$carbo', grasas = '$grasa' WHERE id = $id";
        $response = $this->db->query($sql);
        return $response;
    }
}
?>