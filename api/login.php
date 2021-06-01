<?php
    require_once '../model/clientes.php';
    require_once '../config/db.php';

    $_clientes = new clientes();

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'), true);
            $cliente = $_clientes->login($_POST['correo']);
            if($cliente && is_object($cliente)){
                if(password_verify($_POST['password'], $cliente->password)){
                    $val = true;
                    $token = bin2hex(openssl_random_pseudo_bytes(16, $val));
                    $result = $_clientes->insertToken($cliente->id, $token);
                    if($result){
                        $response = array(
                            'resultado' => 'exito',
                            'token' => $token,
                            'nombre' => $cliente->nombre,
                            'userid' => $cliente->id
                        );
                        die(json_encode($response));
                    }else{
                        $response = array(
                            'resultado' => 'fallo',
                            'msg' => 'Fallo en el servidor'
                        );
                        die(json_encode($response));
                    }
                }
                else{
                    $response = array(
                        'resultado' => 'fallo',
                        'msg' => 'Usuario o contraseña incorrectos'
                    );
                    die(json_encode($response));
                }
            }else{
                $response = array(
                    'resultado' => 'fallo',
                    'msg' => 'Usuario inexistente'
                );
                die(json_encode($response));
            }
            break;
    }
?>