<?php
require_once '../config/parameters.php';
require_once '../model/platillos.php';
require_once '../config/db.php';
$_platillos = new platillos();
if(isset($_POST)){
    if(isset($_POST['accion'])){
        if($_POST['accion'] == 'crear-platillo'){
            $file = $_FILES['img'];
            $filename = $file['name'];
            $mimetype = $file['type'];

            if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "img/png"){
                if(!is_dir('../uploads/platillos')){
                    mkdir('../uploads/platillos', 0777, true);
                }

                move_uploaded_file($file['tmp_name'], '../uploads/platillos/'.$filename);
                $url_img = 'uploads/platillos/'.$filename;
            }
            $id = $_platillos->create($_POST['nombre'], $_POST['procedimiento'], $_POST['elaboracion'], $_POST['energia'], $url_img);
            if($id != false){
                $save = $_platillos->create_aporte($id, $_POST['energianutri'], $_POST['proteina'], $_POST['carbohidratos'], $_POST['grasas'], $_POST['sodio'], $_POST['potasio'], $_POST['calcio'], $_POST['hierro'], $_POST['vitamina_a'], $_POST['vitamina_e'], $_POST['vitamina_d'], $_POST['vitamina_c'], $_POST['acido_folico']);
                if($save){
                    echo "<script>";
                    echo "alert('Platillo creado correctamente, agrega los ingredientes y habras terminado');";
                    echo "window.location.replace('../ingredientes.php?id=$id');";
                    echo "</script>";
                }
                else{
                    echo 'Fallo';
                }
            }
            else{
                echo $id;
            }
        }

        if($_POST['accion'] == 'insertar-ingrediente'){
            $ingrediente = $_platillos->create_ingre($_POST['id'], $_POST['palabra']);
            if($ingrediente != false){
                $response = array(
                    'respuesta' => 'exito',
                    'id' => $ingrediente
                );
                die(json_encode($response));
            }
            else{
                $response = array(
                    'respuesta' => 'error'
                );
                die(json_encode($response));
            }
        }

        if($_POST['accion'] == 'editar-platillo'){
            if(isset($_FILES['img'])){
                $file = $_FILES['img'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "img/png"){
                    if(!is_dir('../uploads/platillos')){
                        mkdir('../uploads/platillos', 0777, true);
                    }

                    move_uploaded_file($file['tmp_name'], '../uploads/platillos/'.$filename);
                    $url_img = 'uploads/platillos/'.$filename;
                }
                $edit = $_platillos->editPlatillo($_POST['id'], $_POST['nombre'], $_POST['procedimiento'], $_POST['elaboracion'], $_POST['energia'], $url_img);
            }
            else{
                $edit = $_platillos->editPlatillo($_POST['id'], $_POST['nombre'], $_POST['procedimiento'], $_POST['elaboracion'], $_POST['energia'], '');
            }
            
            if($edit){
                $aporte = $_platillos->editarAporte($_POST['id'], $_POST['energianutri'], $_POST['proteina'], $_POST['carbohidratos'], $_POST['grasas'], $_POST['sodio'], $_POST['potasio'], $_POST['calcio'], $_POST['hierro'], $_POST['vitamina_a'], $_POST['vitamina_e'], $_POST['vitamina_c'], $_POST['vitamina_d'], $_POST['acido_folico']);
                if($aporte){
                    echo "<script>";
                    echo "alert('Platillo editado correctamente');";
                    echo "window.location.replace('../platillos.php');";
                    echo "</script>";
                }
            }
            else{
                echo 'algo fallo, intente de nuevo';
            }
        }
    }
}

if(isset($_GET)){
    if(isset($_GET['accion'])){
        if($_GET['accion'] == 'borrar-platillo'){
            $delete = $_platillos->delete_platillo($_GET['id']);
            if($delete){
                $response = array(
                    'respuesta' => 'exito'
                );
                die(json_encode($response));
            }
            else{
                $response = array(
                    'respuesta' => 'error'
                );
                die(json_encode($response));
            }
        }

        if($_GET['accion'] == 'borrar-platillos'){
            $delete = $_platillos->deletePlatillo($_GET['id']);
            if($delete){
                echo "<script>";
                echo "alert('Platillo eliminado correctamente');";
                echo "window.location.replace('../platillos.php');";
                echo "</script>";
            }
        }
    }
}

?>