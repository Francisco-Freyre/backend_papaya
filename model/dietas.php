<?php
class dietas {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($d_lunes, $d_martes, $d_miercoles, $d_jueves, $d_viernes, $d_sabado, $d_domingo, $c_lunes, $c_martes, $c_miercoles, $c_jueves, $c_viernes, $c_sabado, $c_domingo, $c2_lunes, $c2_martes, $c2_miercoles, $c2_jueves, $c2_viernes, $c2_sabado, $c2_domingo, $co_lunes, $co_martes, $co_miercoles, $co_jueves, $co_viernes, $co_sabado, $co_domingo, $c3_lunes, $c3_martes, $c3_miercoles, $c3_jueves, $c3_viernes, $c3_sabado, $c3_domingo, $c4_lunes, $c4_martes, $c4_miercoles, $c4_jueves, $c4_viernes, $c4_sabado, $c4_domingo, $ce_lunes, $ce_martes, $ce_miercoles, $ce_jueves, $ce_viernes, $ce_sabado, $ce_domingo, $tiem_alimen, $periodo, $gr_car, $gr_pro, $gr_gra, $por_car, $por_pro,  $por_gra, $categoria, $fibra, $kcal, $descripcion){
        $sql = "INSERT INTO dietas VALUES(NULL, '$d_lunes', '$d_martes', '$d_miercoles', '$d_jueves', '$d_viernes', '$d_sabado', '$c_lunes', '$c_martes', '$c_miercoles', '$c_jueves', '$c_viernes', '$c_sabado', '$co_lunes', '$co_martes', '$co_miercoles', '$co_jueves', '$co_viernes', '$co_sabado', '$c2_lunes', '$c2_martes', '$c2_miercoles', '$c2_jueves', '$c2_viernes', '$c2_sabado', '$ce_lunes', '$ce_martes', '$ce_miercoles', '$ce_jueves', '$ce_viernes', '$ce_sabado', 0, $kcal, '$descripcion', $tiem_alimen, '$periodo', '$categoria', '$c3_lunes', '$c3_martes', '$c3_miercoles', '$c3_jueves', '$c3_viernes', '$c3_sabado', $gr_car, $gr_pro, $gr_gra, $por_car, $por_pro, $por_gra, '$d_domingo', '$c_domingo', '$c3_domingo', '$co_domingo', '$c2_domingo', '$ce_domingo', '$c4_lunes', '$c4_martes', '$c4_miercoles', '$c4_jueves', '$c4_viernes', '$c4_sabado', '$c4_domingo', $fibra);";
        $save = $this->db->query($sql);
        if($save){
            return $this->db->insert_id;
        }else{
            return $save;
        }
    }

    public function read(){
        $sql = "SELECT * FROM dietas";
        $response = $this->db->query($sql);

        if($response){
            return $response;
        }
        else{
            return $response;
        }
    }

    public function readDieta($id){
        $sql = "SELECT * FROM dietas WHERE id = $id";
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

    public function update($id, $d_lunes, $d_martes, $d_miercoles, $d_jueves, $d_viernes, $d_sabado, $d_domingo, $c_lunes, $c_martes, $c_miercoles, $c_jueves, $c_viernes, $c_sabado, $c_domingo, $c2_lunes, $c2_martes, $c2_miercoles, $c2_jueves, $c2_viernes, $c2_sabado, $c2_domingo, $co_lunes, $co_martes, $co_miercoles, $co_jueves, $co_viernes, $co_sabado, $co_domingo, $c3_lunes, $c3_martes, $c3_miercoles, $c3_jueves, $c3_viernes, $c3_sabado, $c3_domingo, $c4_lunes, $c4_martes, $c4_miercoles, $c4_jueves, $c4_viernes, $c4_sabado, $c4_domingo, $ce_lunes, $ce_martes, $ce_miercoles, $ce_jueves, $ce_viernes, $ce_sabado, $ce_domingo, $tiem_alimen, $periodo, $gr_car, $gr_pro, $gr_gra, $por_car, $por_pro,  $por_gra, $categoria, $fibra, $kcal, $descripcion){
        $sql = "UPDATE dietas SET d_lunes = '$d_lunes', d_martes = '$d_martes', d_miercoles = '$d_miercoles', d_jueves = '$d_jueves', d_viernes = '$d_viernes', d_sabado = '$d_sabado', c_lunes = '$c_lunes', c_martes = '$c_martes', c_miercoles = '$c_miercoles', c_jueves = '$c_jueves', c_viernes = '$c_viernes', c_sabado = '$c_sabado', co_lunes = '$co_lunes', co_martes = '$co_martes', co_miercoles = '$co_miercoles', co_jueves = '$co_jueves', co_viernes = '$co_viernes', co_sabado = '$co_sabado', c2_lunes = '$c2_lunes', c2_martes = '$c2_martes', c2_miercoles = '$c2_miercoles', c2_jueves = '$c2_jueves', c2_viernes = '$c2_viernes', c2_sabado = '$c2_sabado', ce_lunes = '$ce_lunes', ce_martes = '$ce_martes', ce_miercoles = '$ce_miercoles', ce_jueves = '$ce_jueves', ce_viernes = '$ce_viernes', ce_sabado = '$ce_sabado', kcal = $kcal, descripcion = '$descripcion', tiem_alimen = $tiem_alimen, periodo = '$periodo', categoria = '$categoria', c3_lunes = '$c3_lunes', c3_martes = '$c3_martes', c3_miercoles = '$c3_miercoles', c3_jueves = '$c3_jueves', c3_viernes = '$c3_viernes', c3_sabado = '$c3_sabado', gr_car = $gr_car, gr_pro = $gr_pro, gr_gra = $gr_gra, por_car = $por_car, por_pro = $por_pro, por_gra = $por_gra, d_domingo = '$d_domingo', c_domingo = '$c_domingo', c3_domingo = '$c3_domingo', co_domingo = '$co_domingo', c2_domingo = '$c2_domingo', ce_domingo = '$ce_domingo', c4_lunes = '$c4_lunes', c4_martes = '$c4_martes', c4_miercoles = '$c4_miercoles', c4_jueves = '$c4_jueves', c4_viernes = '$c4_viernes', c4_sabado = '$c4_sabado', c4_domingo = '$c4_domingo', fibra = $fibra WHERE id = $id";

        $response = $this->db->query($sql);
        return $response; 
    }

    public function deleteDieta($id){
        $sql = "DELETE FROM dietas WHERE id = $id";
        $response = $this->db->query($sql);
        return $response; 
    }
}
?>