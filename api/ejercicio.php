<?php
require_once '../model/ejercicios.php';
require_once '../config/db.php';
$_ejercicios = new ejercicios();
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if(isset($_GET['ejercicios'])){
            $ejercicios = $_ejercicios->read();
            if($ejercicios){
                $response = [];
                while($ejercicio = $ejercicios->fetch_object()){
                    $OEjercicio = array(
                        'id' => $ejercicio->id,
                        'nombre' => $ejercicio->nombre,
                        'descripcion' => $ejercicio->descripcion,
                        'img' => 'https://www.bithives.com/PapayaApp/'.$ejercicio->url_img
                    );
                    array_push($response, $OEjercicio);
                }
                die(json_encode($response));
            }
        }
        break;
    case 'POST':
        break;
}
?>