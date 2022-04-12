<?php
require_once '../model/check_dia.php';
require_once '../model/dias.php';
require_once '../model/dos_semanas.php';
require_once '../model/formularios.php';
require_once '../model/pesos.php';
require_once '../config/db.php';
$_check_dia = new check_dia();
$_dias = new dias();
$_dos_semanas = new dos_semanas();
$_pesos = new pesos();
$_formularios = new formularios();
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if(isset($_GET['checks'])){
            // Funcion para obtener los checks de un dia total 
            if($_GET['checks'] == 1){
                $datos = $_check_dia->get($_GET['cliente_id']);
                if($datos->num_rows > 0){
                    $dato = $datos->fetch_object();
                    $getsemanas = $_dos_semanas->Get($_GET['cliente_id']);
                    $getsemana = $getsemanas->fetch_object();
                    $resultado = $getsemana->dia_final <= date('Y-m-d') ? true : false ;
                    if($dato->fecha == date('Y-m-d')){
                        $response = array(
                            'resultado' => true,
                            'checks' => array(
                                'fecha' => $dato->fecha,
                                'check1' => $dato->check1,
                                'check2' => $dato->check2,
                                'check3' => $dato->check3,
                                'check4' => $dato->check4,
                                'check5' => $dato->check5,
                                'fechamayor' => $resultado
                            )
                        );
                        die(json_encode($response));
                    }
                    else{
                        $update = $_check_dia->Update($_GET['cliente_id']);
                        if($update){
                            $datos = $_check_dia->get($_GET['cliente_id']);
                            $dato = $datos->fetch_object();
                            $response = array(
                                'resultado' => true,
                                'checks' => array(
                                    'fecha' => $dato->fecha,
                                    'check1' => $dato->check1,
                                    'check2' => $dato->check2,
                                    'check3' => $dato->check3,
                                    'check4' => $dato->check4,
                                    'check5' => $dato->check5,
                                    'fechamayor' => $resultado
                                )
                            );
                            die(json_encode($response));
                        }
                    }
                }
                else{
                    $response = array(
                        'resultado' => false
                    );
                    die(json_encode($response));
                }
            }
        }

        if(isset($_GET['DosSemanas'])){
            if($_GET['DosSemanas'] == 1){
                $getSemanas = $_dos_semanas->Get($_GET['id_cliente']);
                $getPesos = $_pesos->GetPesosSinMeta($_GET['id_cliente']);
                if($getSemanas && $getPesos){
                    $loop = 1;
                    $resultados = $getPesos->num_rows;
                    $APesos = [];
                    while ($peso = $getPesos->fetch_object()) {
                        array_push($APesos, $peso);
                        if($loop == 1){
                            $pesoBajo = $peso->peso;
                        }
                        if($loop == $resultados){
                            $pesoAlto = $peso->peso;
                        }
                        $loop++;
                    }
                    $response = array(
                        'resultado' => true,
                        'pesoBajo' => $pesoBajo,
                        'pesoAlto' => $pesoAlto,
                        'semanas' => $getSemanas->fetch_object(),
                        'pesos' => $APesos
                    );
                    die(json_encode($response));
                }
            }
        }
        break;
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        if($_POST['check']){
            // Funcion para guardar las comidas que has consumido en un dia
            if($_POST['check'] == true){
                $update = $_check_dia->UpdateCheck($_POST['id_cliente'], $_POST['numCheck'], $_POST['valor']);
                if($update){
                    $get = $_dias->GetByFecha($_POST['id_cliente'], date('Y-m-d'));
                    if($get->num_rows == 1){
                        $getfecha = $get->fetch_object();
                        $diacheck = $_check_dia->get($_POST['id_cliente']);
                        $dia = $diacheck->fetch_object();
                        $suma = $dia->check1 + $dia->check2 + $dia->check3 + $dia->check4 + $dia->check5;
                        $updatesemana = $_dos_semanas->UpdateDia($_POST['id_cliente'], $getfecha->dia, $suma);
                        if($updatesemana){
                            $response = array(
                                'resultado' => true
                            );
                            die(json_encode($response));
                        }
                    }else{
                        $response = array(
                            'resultado' => false,
                            'msg' => 'No se que paso'
                        );
                        die(json_encode($response));
                    }
                }
                else{
                    $response = array(
                        'resultado' => false
                    );
                    die(json_encode($response));
                }
            }
        }

        if(isset($_POST['newCheck'])){
            // Funcion para crear o actualizar las tablas de 'dias', 'dos_semanas', 'check_dia'
            if($_POST['newCheck'] == true){
                $getsemanas = $_dos_semanas->Get($_POST['cliente_id']);
                if($getsemanas->num_rows == 1){
                    $semanas = $_dos_semanas->Update($_POST['cliente_id']);
                }
                else if($getsemanas->num_rows == 0){
                    $semanas = $_dos_semanas->insert($_POST['cliente_id']);
                }
                $datos = $_check_dia->get($_POST['cliente_id']);
                if($datos->num_rows > 0){
                    $update = $_check_dia->Update($_POST['cliente_id']);
                    if(!$update){
                        $response = array(
                            'resultado' => false
                        );
                        die(json_encode($response));
                    }
                }
                else{
                    $insert = $_check_dia->insert($_POST['cliente_id']);
                    if(!$insert){
                        $response = array(
                            'resultado' => false
                        );
                        die(json_encode($response));
                    }
                }
                $get = $_dias->Get($_POST['cliente_id']);
                if($get->num_rows >= 1){
                    $fecha = date('Y-m-d');
                    $nombrefecha = date('l');
                    while ($dia = $get->fetch_object()) {
                        if($nombrefecha == 'Sunday'){
                            $nombrefecha = date('l', strtotime($fecha."+ 1 days"));
                            $fecha = date('Y-m-d', strtotime($fecha."+ 1 days"));
                            $update = $_dias->Update($dia->id, $fecha);
                            $updatefecha = $_dos_semanas->UpdateFecha($_POST['cliente_id'], $fecha);
                            if($update && $updatefecha){
                                $nombrefecha = date('l', strtotime($fecha."+ 1 days"));
                                $fecha = date('Y-m-d', strtotime($fecha."+ 1 days"));
                            }
                            else{
                                $response = array(
                                    'resultado' => false,
                                    'msg' => 'entro aqui'
                                );
                                die(json_encode($response));
                            }
                        }
                        else{
                            $update = $_dias->Update($dia->id, $fecha);
                            $updatefecha = $_dos_semanas->UpdateFecha($_POST['cliente_id'], $fecha);
                            if($update && $updatefecha){
                                $nombrefecha = date('l', strtotime($fecha."+ 1 days"));
                                $fecha = date('Y-m-d', strtotime($fecha."+ 1 days"));
                            }
                            else{
                                $response = array(
                                    'resultado' => false,
                                    'msg' => 'entro aca'
                                );
                                die(json_encode($response));
                            }
                        }
                    }
                }
                else if($get->num_rows <= 0){
                    //Algoritmo para sacar dias de dieta
                    $dias = 1;
                    $fecha = date('Y-m-d');
                    $nombrefecha = date('l');
                    while ($dias < 13) {
                        if($nombrefecha == 'Sunday'){
                            $nombrefecha = date('l', strtotime($fecha."+ 1 days"));
                            $fecha = date('Y-m-d', strtotime($fecha."+ 1 days"));
                        }
                        else{
                            $insert2 = $_dias->insert($_POST['cliente_id'], $fecha, 'd'.$dias);
                            $updatefecha = $_dos_semanas->UpdateFecha($_POST['cliente_id'], $fecha);
                            if($insert2 && $updatefecha){
                                $nombrefecha = date('l', strtotime($fecha."+ 1 days"));
                                $fecha = date('Y-m-d', strtotime($fecha."+ 1 days"));
                                $dias ++;
                            }
                            else{
                                $response = array(
                                    'resultado' => false,
                                    'msg' => 'mas abajo'
                                );
                                die(json_encode($response));
                            }
                        }
                    }
                }
                $response = array(
                    'resultado' => true
                );
                die(json_encode($response));
            }
        }

        if(isset($_POST['avance'])){
            if($_POST['avance'] == true){
                $ultimoPeso = $_formularios->getPeso($_POST['cliente_id']);
                $insertPeso = $_pesos->insertPesoContinuo($_POST['peso'], $_POST['cliente_id']);
                $updateFormulario = $_formularios->UpdatePeso($_POST['cliente_id'], $_POST['peso']);
                if($insertPeso && $updateFormulario){
                    $pesos = $ultimoPeso->fetch_object();
                    $getFormulario = $_formularios->getFormulario($_POST['cliente_id']);
                    $response = array(
                        'resultado' => true,
                        'ultimoPeso' => $pesos->peso,
                        'formulario' => $getFormulario
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