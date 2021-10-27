<?php
require_once '../config/parameters.php';
require_once '../model/alimentos.php';
require_once '../config/db.php';
$_alimentos = new alimentos();
if(isset($_POST['accion'])){
    if($_POST['accion'] == 'crear'){
        $alimentos = $_alimentos->readAlimento($_POST['alimento_id']);
        if($alimentos){
            $alimento = $alimentos->fetch_object();
            $categorias = $_alimentos->readOne($alimento->categoria_id);
            if($categorias){
                $categoria = $categorias->fetch_object();
                $resultado = round($alimento->cantidad * $_POST['equivalente']);
                $kcal = round($categoria->kcal * $resultado);
                $carbo = round($categoria->carbohidratos * $resultado);
                $proteinas = round($categoria->proteinas * $resultado);
                $lipidos = round($categoria->lipidos * $resultado);
                $cambiar = isset($_POST['cambiar']) ? $_POST['cambiar'] : 0;
                $response = $_alimentos->crearIngrediente($_POST['platillo_id'], $alimento->id, $_POST['equivalente'], $cambiar, $kcal, $carbo, $proteinas, $lipidos);
                if($response){
                    die(json_encode(array(
                        'resultado' => true,
                        'id' => $alimento->id,
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

}
?>