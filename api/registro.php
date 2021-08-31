<?php
    require_once '../model/clientes.php';
    require_once '../config/db.php';

    $_clientes = new clientes();

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'), true);
            if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['estado']) && isset($_POST['email']) && isset($_POST['password'])){
                $cliente = $_clientes->create($_POST['nombre'], $_POST['apellido'], $_POST['estado'], $_POST['email'], $_POST['password']);
                if($cliente){
                    $response = array(
                        'resultado' => 'exito',
                        'msg' => 'El cliente fue creado de manera exitosa'
                    );
                    die(json_encode($response));
                }else{
                    $response = array(
                        'resultado' => 'fallo',
                        'msg' => 'El cliente no pudo ser creado, intente de nuevo'
                    );
                    die(json_encode($response));
                }
            }else{
                $response = array(
                    'resultado' => 'fallo',
                    'msg' => 'Falta algun valor'
                );
                die(json_encode($response));
            }
            break;
    }
?>