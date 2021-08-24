<?php
require_once '../config/parameters.php';
require_once '../model/dietas.php';
require_once '../config/db.php';
$_dietas = new dietas();
if(isset($_POST)){
    if(isset($_POST['accion'])){

        if($_POST['accion'] == 'editar-dieta'){
            $edit = $_dietas->update($_POST['id'], $_POST['d_lunes'], $_POST['d_martes'], $_POST['d_miercoles'], $_POST['d_jueves'], $_POST['d_viernes'], $_POST['d_sabado'], $_POST['d_domingo'], $_POST['c_lunes'], $_POST['c_martes'], $_POST['c_miercoles'], $_POST['c_jueves'], $_POST['c_viernes'], $_POST['c_sabado'], $_POST['c_domingo'], $_POST['c2_lunes'], $_POST['c2_martes'], $_POST['c2_miercoles'], $_POST['c2_jueves'], $_POST['c2_viernes'], $_POST['c2_sabado'], $_POST['c2_domingo'], $_POST['co_lunes'], $_POST['co_martes'], $_POST['co_miercoles'], $_POST['co_jueves'], $_POST['co_viernes'], $_POST['co_sabado'], $_POST['co_domingo'], $_POST['c3_lunes'], $_POST['c3_martes'], $_POST['c3_miercoles'], $_POST['c3_jueves'], $_POST['c3_viernes'], $_POST['c3_sabado'], $_POST['c3_domingo'], $_POST['c4_lunes'], $_POST['c4_martes'], $_POST['c4_miercoles'], $_POST['c4_jueves'], $_POST['c4_viernes'], $_POST['c4_sabado'], $_POST['c4_domingo'], $_POST['ce_lunes'], $_POST['ce_martes'], $_POST['ce_miercoles'], $_POST['ce_jueves'], $_POST['ce_viernes'], $_POST['ce_sabado'], $_POST['ce_domingo'], $_POST['temp_alim'], $_POST['periodo'], $_POST['gr_car'], $_POST['gr_pro'], $_POST['gr_gra'], $_POST['por_car'], $_POST['por_pro'], $_POST['por_gra'], $_POST['categoria'], $_POST['fibra'], $_POST['kcal'], $_POST['descripcion']);
            
            if($edit){
                echo "<script>";
                echo "alert('Platillo editado correctamente');";
                echo "window.location.replace('../dietas.php');";
                echo "</script>";
            }
            else{
                echo 'Algo fallo, intente de nuevo';
            }
        }
    }
}

?>