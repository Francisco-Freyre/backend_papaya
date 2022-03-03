<?php
require_once '../model/check_dia.php';
require_once '../config/db.php';
$_check_dia = new check_dia();
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if(isset($_GET['checks'])){
            if($_GET['checks'] == 1){
                $datos = $_check_dia->get($_GET['cliente_id']);
                if($datos->num_rows > 0){
                    $dato = $datos->fetch_object();
                    if($dato->fecha == date('Y-m-d')){
                        $response = array(
                            'resultado' => true,
                            'checks' => array(
                                'fecha' => $dato->fecha,
                                'check1' => $dato->check1,
                                'check2' => $dato->check2,
                                'check3' => $dato->check3,
                                'check4' => $dato->check4,
                                'check5' => $dato->check5
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
                                    'check5' => $dato->check5
                                )
                            );
                            die(json_encode($response));
                        }
                    }
                }
            }
        }
        break;
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        if($_POST['check']){
            if($_POST['check'] == true){
                $update = $_check_dia->UpdateCheck($_POST['id_cliente'], $_POST['numCheck'], $_POST['valor']);
                if($update){
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

        if(isset($_POST['newCheck'])){
            if($_POST['newCheck'] == true){
                $datos = $_check_dia->get($_POST['cliente_id']);
                if($datos->num_rows > 0){
                    $update = $_check_dia->Update($_POST['cliente_id']);
                    if($update){
                        $response = array(
                            'resultado' => true
                        );
                        die(json_encode($response));
                    }
                }
                else{
                    $insert = $_check_dia->insert($_POST['cliente_id']);
                    if($insert){
                        $response = array(
                            'resultado' => true
                        );
                        die(json_encode($response));
                    }
                }
            }
        }
        break;
}
?>