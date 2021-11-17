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
                    $nombres = explode(' - ', $platillo->nombre);
                    $OPlatillo = array(
                        'id' => $platillo->id,
                        'nombre' => $nombres[0],
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
            $ingredientes = $_platillos->getIngredientesDos($_GET['idPlatillo']);
            if($platillo && $ingredientes){
                $AIngredientes = [];
                while($ingrediente = $ingredientes->fetch_object()){
                    $ingredient = $ingrediente->cantidad.' '.$ingrediente->unidad.' de '.$ingrediente->nombre;
                    array_push($AIngredientes, $ingredient);
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
        $_POST = json_decode(file_get_contents('php://input'), true);
        if(isset($_POST['desayuno'])){
            $desayuno = $_platillos->getPlaNombre($_POST['desayuno']);
            $colacion = $_platillos->getPlaNombre($_POST['colacion']);
            $colacion2 = $_platillos->getPlaNombre($_POST['colacion2']);
            $comida = $_platillos->getPlaNombre($_POST['comida']);
            $cena = $_platillos->getPlaNombre($_POST['cena']);
            if($desayuno && $colacion && $colacion2 && $comida && $cena){
                $desa = $desayuno->fetch_object();
                $col = $colacion->fetch_object();
                $col2 = $colacion2->fetch_object();
                $com = $comida->fetch_object();
                $cen = $cena->fetch_object();
                $response = array(
                    'resultado' => true,
                    'id_des' => $desa->id,
                    'img_des' => $desa->url_img,
                    'kcal_des' => $desa->energia,
                    'id_col' => $col->id,
                    'img_col' => $col->url_img,
                    'kcal_col' => $col->energia,
                    'id_col2' => $col2->id,
                    'img_col2' => $col2->url_img,
                    'kcal_col2' => $col2->energia,
                    'id_com' => $com->id,
                    'img_com' => $com->url_img,
                    'kcal_com' => $com->energia,
                    'id_cen' => $cen->id,
                    'img_cen' => $cen->url_img,
                    'kcal_cen' => $cen->energia
                );
                die(json_encode($response));
            }else{
                $response = array(
                    'resultado' => false,
                );
                die(json_encode($response));
            }
        }
        break;
}
?>