<?php
require_once '../model/formularios.php';
require_once '../model/form_result.php';
require_once '../model/clientes.php';
require_once '../config/db.php';

$_formularios = new formularios();
$_clientes = new clientes();
$_form_result = new form_result();

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
                $cliente = $_formularios->edadSexo($_POST['idCliente'], $_POST['edad'], $_POST['sexo']);
                if($meta && $inicial && $cliente){
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

        if(isset($_POST['apetito'])){
            $formulario = $_formularios->getFormulario($_POST['idCliente']);
            if(is_object($formulario)){
                $apetito = $_formularios->updateApetito($_POST['id'], $_POST['apetito']);
                if($apetito){
                    die(json_encode(array(
                        'resultado' => true
                    )));
                }
                else{
                    die(json_encode(array(
                        'resultado' => false
                    )));
                }
            }
            else{
                $apetito = $_formularios->insertApetito($_POST['id'], $_POST['apetito']);
                if($apetito){
                    die(json_encode(array(
                        'resultado' => true
                    )));
                }
                else{
                    die(json_encode(array(
                        'resultado' => false
                    )));
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
        //Actualizar solo las kcal de form_result
        if(isset($_POST['kcal'])){
            $result = $_form_result->read($_POST['idCliente']);
            if($result->num_rows == 1){
                $update = $_form_result->update($_POST['kcal'], $_POST['idCliente']);
                if($update){
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
                $create = $_form_result->create($_POST['idCliente'], $_POST['kcal'], 0);
                if($create){
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
        //Actualizar solo la dieta de form_result
        if(isset($_POST['dieta'])){
            $update = $_form_result->updateDieta($_POST['dieta'], $_POST['idCliente']);
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
        break;

    case 'GET':
        //Funciona
        if(isset($_GET['meta'])){
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
        }

        if(isset($_GET['calorias'])){
            $formulario = $_formularios->getFormulario($_GET['idCliente']);
            $pesoMeta = $_formularios->getPesoIdeal($_GET['idCliente']);
            $cliente = $_clientes->readOne($_GET['idCliente']);
            $meta = $pesoMeta->fetch_object();
            $client = $cliente->fetch_object();
            if(is_object($formulario) && is_object($meta) && is_object($client)){
                $response = array(
                    'resultado' => true,
                    'peso' => $formulario->peso,
                    'altura' => $formulario->altura,
                    'actividad' => $formulario->actividad_fisica,
                    'alcohol' => $formulario->alcohol,
                    'meta' => $formulario->meta,
                    'pesoMeta' => $meta->peso,
                    'edad' => $client->edad,
                    'sexo' => $client->sexo,
                    'apetito' => $formulario->apetito
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

        if(isset($_GET['kcal'])){
            $datos = $_form_result->read($_GET['idCliente']);
            if($datos->num_rows == 1){
                $dato = $datos->fetch_object();
                $dietas = $_form_result->dieta($dato->dieta_id);
                if($dietas){
                    $dieta = $dietas->fetch_object();
                    $response = array(
                        'resultado' => true,
                        'id' => $dieta->id,
                        'd_lunes' => $dieta->d_lunes,
                        'd_martes' => $dieta->d_martes,
                        'd_miercoles' => $dieta->d_miercoles,
                        'd_jueves' => $dieta->d_jueves,
                        'd_viernes' => $dieta->d_viernes,
                        'd_sabado' => $dieta->d_sabado,
                        'c_lunes' => $dieta->c_lunes,
                        'c_martes' => $dieta->c_martes,
                        'c_miercoles' => $dieta->c_miercoles,
                        'c_jueves' => $dieta->c_jueves,
                        'c_viernes' => $dieta->c_viernes,
                        'c_sabado' => $dieta->c_sabado,
                        'co_lunes' => $dieta->co_lunes,
                        'co_martes' => $dieta->co_martes,
                        'co_miercoles' => $dieta->co_miercoles,
                        'co_jueves' => $dieta->co_jueves,
                        'co_viernes' => $dieta->co_viernes,
                        'co_sabado' => $dieta->co_sabado,
                        'c2_lunes' => $dieta->c2_lunes,
                        'c2_martes' => $dieta->c2_martes,
                        'c2_miercoles' => $dieta->c2_miercoles,
                        'c2_jueves' => $dieta->c2_jueves,
                        'c2_viernes' => $dieta->c2_viernes,
                        'c2_sabado' => $dieta->c2_sabado,
                        'ce_lunes' => $dieta->ce_lunes,
                        'ce_martes' => $dieta->ce_martes,
                        'ce_miercoles' => $dieta->ce_miercoles,
                        'ce_jueves' => $dieta->ce_jueves,
                        'ce_viernes' => $dieta->ce_viernes,
                        'ce_sabado' => $dieta->ce_sabado,
                        'kcal' => $dieta->kcal,
                        'descripcion' => $dieta->descripcion,
                        'tiem_alimen' => $dieta->tiem_alimen,
                        'periodo' => $dieta->periodo,
                        'categoria' => $dieta->categoria,
                        'c3_lunes' => $dieta->c3_lunes,
                        'c3_martes' => $dieta->c3_martes,
                        'c3_miercoles' => $dieta->c3_miercoles,
                        'c3_jueves' => $dieta->c3_jueves,
                        'c3_viernes' => $dieta->c3_viernes,
                        'c3_sabado' => $dieta->c3_sabado,
                        'd_domingo' => $dieta->d_domingo,
                        'c_domingo' => $dieta->c_domingo,
                        'c3_domingo' => $dieta->c3_domingo,
                        'co_domingo' => $dieta->co_domingo,
                        'c2_domingo' => $dieta->c2_domingo,
                        'ce_domingo' => $dieta->ce_domingo,
                        'c4_lunes' => $dieta->c4_lunes,
                        'c4_martes' => $dieta->c4_martes,
                        'c4_miercoles' => $dieta->c4_miercoles,
                        'c4_jueves' => $dieta->c4_jueves,
                        'c4_viernes	' => $dieta->c4_viernes,
                        'c4_sabado' => $dieta->c4_sabado,
                        'c4_domingo' => $dieta->c4_domingo
                    );
                    die(json_encode($response));
                }else{
                    $response = array(
                        'resultado' => false
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
        //Obtener lista de dietas
        if(isset($_GET['dietas'])){
            $_dietas = $_form_result->dietasNueva($_GET['dietas']);
            if($_dietas->num_rows >= 1){
                $lista = [];
                while ($ids = $_dietas->fetch_object()) {
                    array_push($lista, array(
                        'id' => $ids->id,
                        'kcal' => $ids->kcal
                    ));
                }
                die(json_encode(array(
                    'resultado' => true,
                    'dietas' => $lista
                )));
            }
            else{
                die(json_encode(array(
                    'resultado' => false
                )));
            }
        }
        //Obtener solo la dieta seleccionada 
        if(isset($_GET['diet'])){
            $_dieta = $_form_result->dieta($_GET['diet']);
            if($_dieta){
                $dieta = $_dieta->fetch_object();
                die(json_encode(array(
                    'resultado' => true,
                    'dieta' => $dieta
                )));
            }
            else{
                die(json_encode(array(
                    'resultado' => false
                )));
            }
        }
        break;
}
?>