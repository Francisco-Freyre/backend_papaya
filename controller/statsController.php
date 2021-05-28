<?php
require_once '../config/parameters.php';
require_once '../model/pesos.php';
require_once '../model/formularios.php';
require_once '../config/db.php';

$pesos = new pesos();
$formularios = new formularios();

if(isset($_GET)){
    if(isset($_GET['accion'])){
        if($_GET['accion'] == 'imc'){
            $peso = $pesos->pesoContinuo($_GET['id']);
            if(is_object($peso)){
                $formulario = $formularios->getFormulario($peso->id_cliente);
                if(is_object($formulario)){
                    $imc = array(
                        'respuesta' => 'exito',
                        'altura' => $formulario->altura,
                        'peso' => $peso->peso
                    );

                    die(json_encode($imc));
                }else{
                    $imc = array(
                        'respuesta' => 'no hay formulario',
                        'dato' => $peso->id_cliente
                    );

                    die(json_encode($imc));
                }
            }else{
                $imc = array(
                    'respuesta' => 'el peso no es un objeto'
                );

                die(json_encode($imc));
            }
        }

        if($_GET['accion'] == 'avance'){
            $datos = [];
            $peso = $pesos->avancesPesos($_GET['id']);
            if($peso){
                while($pes = $peso->fetch_object()){
                    $dato = array(
                        'peso' => $pes->peso,
                        'fecha' => $pes->fecha
                    );
                    array_push($datos, $dato);
                }

                die(json_encode($datos));
            }else{
                $dato = array(
                    'respuesta' => 'error',
                    'error' => 'Conexion fallida'
                );
                die(json_encode($dato));
            }
        }
    }
}
?>