<?php
    require_once '../model/clientes.php';
    require_once '../config/db.php';
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'), true);
            $_clientes = new clientes();
            $cliente = $_clientes->login($_POST['correo']);
            if($cliente && is_object($cliente)){
                if(password_verify($_POST['password'], $cliente->password)){
                    echo "Cliente logueado con exito, proximamente recibira un token";
                }
                else{
                    echo "Usuario o contraseña incorrectos";
                }
            }else{
                echo "El cliente no existe";
            }
            break;
    }
?>