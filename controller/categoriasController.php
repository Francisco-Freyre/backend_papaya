<?php
require_once '../config/parameters.php';
require_once '../model/alimentos.php';
require_once '../config/db.php';
$_alimentos = new alimentos();
if(isset($_POST['accion'])){
    if($_POST['accion'] == 'crear'){
        $resultado = $_alimentos->create($_POST['nombre'], $_POST['unidad'], $_POST['cantidad'], $_POST['id_categoria']);
        if($resultado){
            echo "<script>";
            echo "alert('Alimento creado satisfactoriamente!!');";
            echo "window.location.replace('../alimentos.php?id=".$_POST['id_categoria']."');";
            echo "</script>";
        }else{
            echo "<script>";
            echo "alert('Hubo un error, intente de nuevo');";
            echo "window.location.replace('../alimentos.php?id=".$_POST['id_categoria']."');";
            echo "</script>";
        }
    }

    if($_POST['accion'] == 'editar'){
        if($_POST['password'] != ""){
            $resultado = $clientes->update($_POST['id'], $_POST['nombre'], $_POST['apellidos'], $_POST['edad'], $_POST['sexo'], $_POST['email'], $_POST['password']);
            if($resultado){
                echo "<script>";
                echo "alert('Cliente editado satisfactoriamente!!');";
                echo "window.location.replace('../lista-clientes.php');";
                echo "</script>";
            }else{
                echo "<script>";
                echo "alert('Hubo un error, intente de nuevo');";
                echo "window.location.replace('../lista-clientes.php');";
                echo "</script>";
            }
        }
        else{
            $resultado = $clientes->update($_POST['id'], $_POST['nombre'], $_POST['apellidos'], $_POST['edad'], $_POST['sexo'], $_POST['email'], '');
            if($resultado){
                echo "<script>";
                echo "alert('Cliente editado satisfactoriamente!!');";
                echo "window.location.replace('../lista-clientes.php');";
                echo "</script>";
            }else{
                echo "<script>";
                echo "alert('Hubo un error, intente de nuevo');";
                echo "window.location.replace('../lista-clientes.php');";
                echo "</script>";
            }
        }
    }
}
if(isset($_GET['accion'])){
    if($_GET['accion'] == 'borrar'){
        $resultado = $clientes->delete($_GET['id']);
        if($resultado){
            echo "<script>";
            echo "alert('Cliente eliminado!!');";
            echo "window.location.replace('../lista-clientes.php');";
            echo "</script>";
        }else{
            echo "<script>";
            echo "alert('No fue posible eilimar, intente de nuevo');";
            echo "window.location.replace('../lista-clientes.php');";
            echo "</script>";
        }
    }
}
?>