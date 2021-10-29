<?php
require_once '../config/parameters.php';
require_once '../model/alimentos.php';
require_once '../model/platillos.php';
require_once '../config/db.php';
$_alimentos = new alimentos();
$_platillos = new platillos();
if(isset($_POST['accion'])){
    if($_POST['accion'] == 'crear'){
        $platillos = $_platillos->getPlatillo($_POST['platillo_id']);
        $platillo = $platillos->fetch_object();
        $alimentos = $_alimentos->readAlimento($_POST['alimento_id']);
        if($alimentos){
            $alimento = $alimentos->fetch_object();
            $categorias = $_alimentos->readOne($alimento->categoria_id);
            if($categorias){
                $categoria = $categorias->fetch_object();
                $resultado = round($alimento->cantidad * $_POST['equivalente']);
                $kcal = round($categoria->kcal * $_POST['equivalente']);
                $carbo = round($categoria->carbohidratos * $_POST['equivalente']);
                $proteinas = round($categoria->proteinas * $_POST['equivalente']);
                $lipidos = round($categoria->lipidos * $_POST['equivalente']);
                $cambiar = isset($_POST['cambiar']) ? $_POST['cambiar'] : 0;
                $resp = $_platillos->editarAporte($_POST['platillo_id'], $platillo->energia + $kcal, $platillo->proteina + $proteinas, $platillo->carbohidratos + $carbo, $platillo->grasas + $lipidos);
                $response = $_alimentos->crearIngrediente($_POST['platillo_id'], $alimento->id, $resultado, $cambiar, $kcal, $carbo, $proteinas, $lipidos);
                if($response != false){
                    die(json_encode(array(
                        'resultado' => true,
                        'opcion' => true,
                        'id' => $response,
                        'cambiar' => $cambiar,
                        'equivalente' => $_POST['equivalente'],
                        'nombre' => $alimento->nombre,
                        'result' => $resultado,
                        'kcal' => $kcal,
                        'carbohidratos' => $carbo,
                        'proteinas' => $proteinas,
                        'lipidos' => $lipidos,
                    )));
                }
                else{
                    die(json_encode(array(
                        'resultado' => false
                    )));
                }
            }else{
                die(json_encode(array(
                    'resultado' => false
                )));
            }
        }else{
            die(json_encode(array(
                'resultado' => false
            )));
        }
    }

}
if(isset($_GET['accion'])){
    if($_GET['accion'] == 'borrar'){
        $ingrediente = $_alimentos->readIngrediente($_GET['id']);
        $ingredi = $ingrediente->fetch_object();
        $platillo = $_platillos->getPlatillo($ingredi->platillo_id);
        $pla = $platillo->fetch_object();
        $updated = $_platillos->editarAporte($ingredi->platillo_id, $pla->energia - $ingredi->energia, $pla->proteina - $ingredi->proteina, $pla->carbohidratos - $ingredi->carbohidratos, $pla->grasas - $ingredi->lipidos);
        $deleted = $_alimentos->delete($_GET['id']);
        if($deleted && $updated){
            die(json_encode(array(
                'resultado' => true
            )));
        }else{
            die(json_encode(array(
                'resultado' => false
            )));
        }
    }else{
        die(json_encode(array(
            'resultado' => false
        )));
    }
}
?>