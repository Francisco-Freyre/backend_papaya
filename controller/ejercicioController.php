<?php
require_once '../config/parameters.php';
require_once '../model/ejercicios.php';
require_once '../config/db.php';
$_ejercicios = new ejercicios();
if(isset($_POST)){
    if(isset($_POST['accion'])){
        if($_POST['accion'] == 'crear-ejercicio'){
            $file = $_FILES['img'];
            $filename = $file['name'];
            $mimetype = $file['type'];

            if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png"){
                if(!is_dir('../uploads/ejercicios')){
                    mkdir('../uploads/ejercicios', 0777, true);
                }

                move_uploaded_file($file['tmp_name'], '../uploads/ejercicios/'.$filename);
                $url_img = 'uploads/ejercicios/'.$filename;
            }
            $id = $_ejercicios->create($_POST['nombre'], $_POST['descripcion'], $url_img);
            if($id != false){
                echo "<script>";
                echo "alert('Ejercicio creado correctamente');";
                echo "window.location.replace('../ejercicios.php');";
                echo "</script>";
            }
            else{
                echo 'Fallo';
            }
        }

        if($_POST['accion'] == 'editar-ejercicio'){
            if(isset($_FILES['img'])){
                $file = $_FILES['img'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png"){
                    if(!is_dir('../uploads/ejercicios')){
                        mkdir('../uploads/ejercicios', 0777, true);
                    }

                    move_uploaded_file($file['tmp_name'], '../uploads/ejercicios/'.$filename);
                    $url_img = 'uploads/ejercicios/'.$filename;
                }
                $edit = $_ejercicios->update($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $url_img);
            }
            else{
                $edit = $_ejercicios->update($_POST['id'], $_POST['nombre'], $_POST['descripcion'], '');
            }
            
            if($edit){
                echo "<script>";
                echo "alert('Ejercicio editado correctamente');";
                echo "window.location.replace('../ejercicios.php');";
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
        //Borramos platillos
        if($_GET['accion'] == 'borrar-ejercicio'){
            $delete = $_ejercicios->delete($_GET['id']);
            if($delete){
                echo "<script>";
                echo "alert('Ejercicio eliminado correctamente');";
                echo "window.location.replace('../ejercicios.php');";
                echo "</script>";
            }
        }
    }
}

?>