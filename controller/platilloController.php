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
            $id = $_platillos->create($_POST['nombre'], $_POST['procedimiento'], $_POST['elaboracion'], $_POST['energianutri'], $_POST['proteina'], $_POST['carbohidratos'], $_POST['grasas'], $url_img);
            if($id != false){
                echo "<script>";
                echo "alert('Platillo creado correctamente, agrega los ingredientes y habras terminado');";
                echo "window.location.replace('../ingredientes.php?id=$id');";
                echo "</script>";
            }
            else{
                echo 'Fallo';
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
                $edit = $_platillos->editPlatillo($_POST['id'], $_POST['nombre'], $_POST['procedimiento'], $_POST['elaboracion'], $_POST['energianutri'], $_POST['proteina'], $_POST['carbohidratos'], $_POST['grasas'], $url_img);
            }
            else{
                $edit = $_platillos->editPlatillo($_POST['id'], $_POST['nombre'], $_POST['procedimiento'], $_POST['elaboracion'], $_POST['energianutri'], $_POST['proteina'], $_POST['carbohidratos'], $_POST['grasas'], '');
            }
            
            if($edit){
                echo "<script>";
                echo "alert('Platillo editado correctamente');";
                echo "window.location.replace('../platillos.php');";
                echo "</script>";
            }
            else{
                echo 'Algo fallo, intente de nuevo';
            }
        }
    }
}

if(isset($_GET)){
    if(isset($_GET['accion'])){
        //Funcion mal nombrada, usada para borrar ingredientes, no platillos
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

        //Borramos platillos
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