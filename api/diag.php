<?php
require_once '../model/formularios.php';
require_once '../config/db.php';

$_formularios = new formularios();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        if(isset($_POST['meta'])){
            $formulario = $_formularios->getFormulario($_POST['idCliente']);
            if(is_object($formulario)){
                $meta = $_formularios->UpdateMeta($_POST['idCliente'], $_POST['meta']);
                if($meta){
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
            }else{
                $meta = $_formularios->insertMeta($_POST['idCliente'], $_POST['meta']);
                if($meta){
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
        }

        if(isset($_POST['actividad'])){
            $formulario = $_formularios->getFormulario($_POST['idCliente']);
            if(is_object($formulario)){
                $meta = $_formularios->UpdateActividadFisica($_POST['idCliente'], $_POST['actividad']);
                if($meta){
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
            }else{
                $meta = $_formularios->insertActividadFisica($_POST['idCliente'], $_POST['actividad']);
                if($meta){
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
        }

        if(isset($_POST['excluido'])){

        }

        if(isset($_POST['peso']) && isset($_POST['estatura'])){
            $formulario = $_formularios->getFormulario($_POST['idCliente']);
            if(is_object($formulario)){
                $meta = $_formularios->UpdateFechaEstatura($_POST['idCliente'], $_POST['estatura'], $_POST['peso']);
                if($meta){
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
            }else{
                $meta = $_formularios->InsertFechaEstatura($_POST['idCliente'], $_POST['estatura'], $_POST['peso']);
                if($meta){
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
        }
        break;
}
?>