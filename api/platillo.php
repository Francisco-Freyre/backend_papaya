<?php
require_once '../model/platillos.php';
require_once '../config/db.php';
$_platillos = new platillos();
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if(isset($_GET['platillos'])){
            $platillos = $_platillos->getPlatillos();
            if($platillos){
                $response = [];
                while($platillo = $platillos->fetch_object()){
                    $OPlatillo = array(
                        'id' => $platillo->id,
                        'nombre' => $platillo->nombre,
                        'energia' => $platillo->energia,
                        'img' => 'https://www.bithives.com/PapayaApp/'.$platillo->url_img
                    );
                    array_push($response, $OPlatillo);
                }
                die(json_encode($response));
            }
        }

        if(isset($_GET['idPlatillo'])){
            $platillo = $_platillos->getPlatillo($_GET['idPlatillo']);
            $ingredientes = $_platillos->getIngredientes($_GET['idPlatillo']);
            if($platillo && $ingredientes){
                $AIngredientes = [];
                while($ingrediente = $ingredientes->fetch_object()){
                    array_push($AIngredientes, $ingrediente->nombre);
                }
                $plati = $platillo->fetch_object();
                $response = array(
                    'resultado' => true,
                    'nombre' => $plati->nombre,
                    'procedimiento' => $plati->procedimiento,
                    'tiempo' => $plati->tiempo_elaboracion,
                    'energia' => $plati->energia,
                    'proteina' => $plati->proteina,
                    'carbohidratos' => $plati->carbohidratos,
                    'grasas' => $plati->grasas,
                    'img' => $plati->url_img,
                    'ingredientes' => $AIngredientes
                );
                die(json_encode($response));
            }
        }
        break;
    case 'POST':
        break;
}
?>