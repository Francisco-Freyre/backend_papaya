<?php
class platillos {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($nombre, $procedimiento, $elaboracion, $energia, $url_img){
        $sql = "INSERT INTO platillos VALUES(NULL, '$nombre', '$procedimiento', '$elaboracion', '$energia', '$url_img');";
        $save = $this->db->query($sql);
        if($save){
            return $this->db->insert_id;
        }else{
            return $save;
        }
    }

    public function create_aporte($id, $energia, $proteinas, $carbo, $grasas, $sodio, $potasio, $calcio, $hierro, $va, $ve, $vd, $vc, $acido){
        $sql = "INSERT INTO aporte_nutricional VALUES(NULL, $id, '$energia', '$proteinas', '$carbo', '$grasas', '$sodio', '$potasio', '$calcio', '$hierro', '$va', '$ve', '$vd', '$vc', '$acido');";
        $save = $this->db->query($sql);
        if($save){
            return $save;
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

    public function delete_platillo($id){
        $sql = "DELETE FROM ingredientes WHERE id = $id";
        $response = $this->db->query($sql);
        return $response;
    }

    public function getPlatillos(){
        $sql = "SELECT * FROM platillos";
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

    public function getAporte($id){
        $sql = "SELECT * FROM aporte_nutricional WHERE platillo_id = $id";
        $response = $this->db->query($sql);

        if($response){
            return $response;
        }
        else{
            return $response;
        }
    }

    public function getIngredientes($id){
        $sql = "SELECT * FROM ingredientes WHERE platillo_id = $id";
        $response = $this->db->query($sql);

        if($response){
            return $response;
        }
        else{
            return $response;
        }
    }

    public function deletePlatillo($id){
        $sql = "DELETE FROM platillos WHERE id = $id";
        $response = $this->db->query($sql);
        return $response;
    }

    public function editPlatillo($id, $nombre, $proce, $elabo, $energia, $img){
        if($img != ""){
            $sql = "UPDATE platillos SET nombre = '$nombre', procedimiento = '$proce', tiempo_elaboracion = '$elabo', energia = '$energia', url_img = '$img' WHERE id = $id";
        }
        else{
            $sql = "UPDATE platillos SET nombre = '$nombre', procedimiento = '$proce', tiempo_elaboracion = '$elabo', energia = '$energia' WHERE id = $id";
        }

        $response = $this->db->query($sql);
        return $response; 
    }

    public function editarAporte($id, $ener, $prote, $carbo, $grasa, $sodio, $pota, $cal, $hie, $va, $ve, $vc, $vd, $af){
        $sql = "UPDATE aporte_nutricional SET energia = '$ener', proteinas = '$prote', carbohidratos = '$carbo', grasas = '$grasa', sodio = '$sodio', potasio = '$pota', calcio = '$cal', hierro = '$hie', vitamina_a = '$va', vitamina_e = '$ve', vitamina_c = '$vc', vitamina_d = '$vd', acido_folico = '$af' WHERE platillo_id = $id";
        $response = $this->db->query($sql);
        return $response;
    }
}
?>