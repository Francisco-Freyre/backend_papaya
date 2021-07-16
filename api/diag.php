<?php
require_once '../model/formularios.php';
require_once '../config/db.php';

$_formularios = new formularios();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        // Funciona
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

        //Funciona
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

        //Funciona
        if(isset($_POST['alimentos'])){
            $exc = $_formularios->getExcluidos($_POST['idCliente']);
            if($exc == false){
                foreach($_POST['alimentos'] as $alimento){
                    $excluido = $_formularios->insertExcluidos($_POST['idCliente'], $alimento);
                    if($excluido == false){
                        $response = array(
                            'resultado' => false,
                            'alimentos' => count($_POST['alimentos'])
                        );
                        die(json_encode($response));
                        break;
                    }
                }
    
                $response = array(
                    'resultado' => true,
                    'alimentos' => count($_POST['alimentos'])
                );
                die(json_encode($response));
            }else{
                $delete = $_formularios->deleteExcluidos($_POST['idCliente']);
                if($delete){
                    foreach($_POST['alimentos'] as $alimento){
                        $excluido = $_formularios->insertExcluidos($_POST['idCliente'], $alimento);
                        if($excluido == false){
                            $response = array(
                                'resultado' => false,
                                'alimentos' => count($_POST['alimentos'])
                            );
                            die(json_encode($response));
                            break;
                        }
                    }
        
                    $response = array(
                        'resultado' => true,
                        'alimentos' => count($_POST['alimentos'])
                    );
                    die(json_encode($response));
                }
            }
            
        }

        //Funciona
        if(isset($_POST['peso']) && isset($_POST['estatura'])){
            $formulario = $_formularios->getFormulario($_POST['idCliente']);
            if(is_object($formulario)){
                $meta = $_formularios->UpdateFechaEstatura($_POST['idCliente'], $_POST['estatura'], $_POST['peso']);
                $inicial = $_formularios->InsertPesoInicial($_POST['idCliente'], 'inicial', $_POST['peso']);
                if($meta && $inicial){
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
                $inicial = $_formularios->InsertPesoInicial($_POST['idCliente'], 'inicial', $_POST['peso']);
                if($meta && $inicial){
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

        //Funciona
        if(isset($_POST['alcohol'])){
            $formulario = $_formularios->getFormulario($_POST['idCliente']);
            if(is_object($formulario)){
                $alcohol = $_formularios->UpdateAlcohol($_POST['idCliente'], $_POST['alcohol']);
                if($alcohol){
                    $response = array(
                        'resultado' => true
                    );
                    die(json_encode($response));
                }
                else{
                    $response = array(
                        'resultado' => false
                    );
                    die(json_encode($response));
                }
            }
            else{
                $alcohol = $_formularios->InsertAlchohol($_POST['idCliente'], $_POST['alcohol']);
                if($alcohol){
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

        //Funciona
        if(isset($_POST['pesoMeta'])){
            $dato = $_formularios->getPesoMeta($_POST['idCliente']);
            if($dato == false){
                $meta = $_formularios->InsertPesoMeta($_POST['idCliente'], $_POST['pesoMeta']);
                if($meta){
                    $response = array(
                        'resultado' => true
                    );
                    die(json_encode($response));
                }
                else{
                    $response = array(
                        'resultado' => false
                    );
                    die(json_encode($response));
                }
            }else{
                $meta = $_formularios->UpdatePesoMeta($_POST['idCliente'], $_POST['pesoMeta']);
                if($meta){
                    $response = array(
                        'resultado' => true
                    );
                    die(json_encode($response));
                }
                else{
                    $response = array(
                        'resultado' => false
                    );
                    die(json_encode($response));
                }
            }
        }
        break;

    case 'GET':
        //Funciona
        $formulario = $_formularios->getFormulario($_GET['idCliente']);
        if(is_object($formulario)){
            $response = array(
                'resultado' => true,
                'peso' => $formulario->peso,
                'altura' => $formulario->altura
            );
            die(json_encode($response));
        }
        else{
            $response = array(
                'resultado' => false
            );
            die(json_encode($response));
        }
        break;
}
?>