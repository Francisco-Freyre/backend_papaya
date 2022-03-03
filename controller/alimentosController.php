<?php
require_once '../config/parameters.php';
require_once '../model/alimentos.php';
require_once '../config/db.php';
$_alimentos = new alimentos();
if(isset($_POST['accion'])){
    if($_POST['accion'] == 'crear'){
        $resultado = $clientes->create($_POST['nombre'], $_POST['apellidos'], $_POST['edad'], $_POST['sexo'], $_POST['email'], $_POST['password']);
        if($resultado){
            echo "<script>";
            echo "alert('Cliente creado satisfactoriamente!!');";
            echo "window.location.replace('../lista-clientes.php');";
            echo "</script>";
        }else{
            echo "<script>";
            echo "alert('Hubo un error, intente de nuevo');";
            echo "window.location.replace('../index.php');";
            echo "</script>";
        }
    }

    if($_POST['accion'] == 'editar'){
        $update = $_alimentos->update($_POST['id'], $_POST['nombre'], $_POST['cantidad'], $_POST['unidad']);
        if($update){
            echo "<script>";
            echo "alert('Alimento editado satisfactoriamente!!');";
            echo "window.location.replace('../alimentos.php?id=".$_POST['id_categoria']."');";
            echo "</script>";
        }else{
            echo "<script>";
            echo "alert('Hubo un error, intente de nuevo');";
            echo "</script>";
        }
    }
}
if(isset($_GET['accion'])){
    if($_GET['accion'] == 'grupo'){
        $alimentos = $_alimentos->readCategoria($_GET['id']);
        if($alimentos){
            $datos = [];
            while ($alimento = $alimentos->fetch_object()) {
                array_push($datos, $alimento);
            }
            die(json_encode($datos));
        }
    }

    if($_GET['accion'] == 'borrar'){
        $resultado = $_alimentos->deletealimento($_GET['id']);
        if($resultado){
            echo "<script>";
            echo "alert('Alimento eliminado!!');";
            echo "window.location.replace('../alimentos.php?id=".$_GET['cat']."');";
            echo "</script>";
        }else{
            echo "<script>";
            echo "alert('No fue posible eilimar, intente de nuevo');";
            echo "window.location.replace('../alimentos.php?id=".$_GET['cat']."');";
            echo "</script>";
        }
    }
}
?>