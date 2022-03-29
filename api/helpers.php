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
        if(isset($_GET['pesosGet'])){
            if($_GET['pesosGet'] == 1){
                $get = $_pesos->GetPesos($_GET['cliente_id']);
                if($get->num_rows >= 1){
                    $APesos = [];
                    while ($pesos = $get->fetch_object()) {
                        array_push($APesos, $pesos);
                    }
                    $response = array(
                        'resultado' => true,
                        'pesos' => $APesos
                    );
                    die(json_encode($response));
                }
            }
        }
        break;
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        if(isset($_POST['pesosInsertInicial'])){
            if($_POST['pesosInsertInicial'] == true){
                $insert = $_formularios->InsertPesoInicial($_POST['cliente_id'], 'inicial', $_POST['peso']);
                if($insert){
                    $response = array(
                        'resultado' => true
                    );
                    die(json_encode($response));
                }
            }
        }

        if(isset($_POST['pesosInsertContinuo'])){
            if($_POST['pesosInsertContinuo'] == true){
                $insert = $_pesos->insertPesoContinuo2($_POST['peso'], $_POST['cliente_id'], date($_POST['fecha']));
                if($insert){
                    $response = array(
                        'resultado' => true
                    );
                    die(json_encode($response));
                }
            }
        }

        if(isset($_POST['pesosDelete'])){
            if($_POST['pesosDelete'] == true){
                $delete = $_pesos->DeletePeso($_POST['id']);
                if($delete){
                    $response = array(
                        'resultado' => true
                    );
                    die(json_encode($response));
                }
            }
        }
        break;
}
?>