<?php
require_once '../model/formularios.php';
require_once '../model/pesos.php';
require_once '../config/db.php';
$_formularios = new formularios();
$_pesos = new pesos();
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if(isset($_GET['imc'])){
            $formulario = $_formularios->getFormulario($_GET['id']);
            if($formulario){
                $response = array(
                    'resultado' => true,
                    'altura' => $formulario->altura,
                    'peso' => $formulario->peso,
                    'meta' => $formulario->meta
                );
                die(json_encode($response));
            }
        }

        if(isset($_GET['pesos'])){
            $avances = $_pesos->avancesPesos($_GET['id']);
            if($avances){
                $response = [];
                while($avance = $avances->fetch_object()){
                    $OAvance = array(
                        'id' => $avance->id_cliente,
                        'peso' => $avance->peso,
                        'fecha' => $avance->fecha
                    );
                    array_push($response, $OAvance);
                }
                die(json_encode($response));
            }
            else{
                $response = array(
                    'resultado' => false
                );
                die(json_encode($response));
            }
        }
        break;
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        if(isset($_POST['peso'])){
            $peso = $_pesos->insertPesoContinuo($_POST['peso'], $_POST['id']);
            if($peso){
                $response = array(
                    'resultado' => true
                );
                die(json_encode($response));
            }else{
                $response = array(
                    'resultado' => false
                );
                die(json_encode($response));
            }
        }
        break;
}
?>