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
                        'img' => $platillo->url_img
                    );
                    array_push($response, $OPlatillo);
                }
                die(json_encode($response));
            }
        }
        break;
    case 'POST':
        break;
}
?>