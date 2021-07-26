<?php
require_once 'config/parameters.php';
require_once 'layaut/nav.php';
require_once 'layaut/sidebar.php';
require_once 'model/ejercicios.php';
require_once 'config/db.php';
$_ejercicios = new ejercicios();
$ejercicios = $_ejercicios->readOne($_GET['id']);
if($ejercicios && $ejercicios->num_rows == 1){
    $ejer = $ejercicios->fetch_object();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar ejercicio</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edita el ejercicio</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="controller/ejercicioController.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?=$ejer->nombre?>" required>
                  </div>
                  <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" cols="30" rows="5" class="form-control" required><?=$ejer->descripcion?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Imagen del platillo</label>
                    <br>
                    <img src="<?=$ejer->url_img?>" alt="" height="100" width="100">
                    <label><?=str_replace("uploads/ejercicios/", "",$ejer->url_img)?></label>
                  </div>
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="img">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="text" value="editar-ejercicio" name="accion" style="display: none;">
                  <input type="text" value="<?=$_GET['id']?>" name="id" style="display: none;">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php
}
require_once 'layaut/footer.php';
?>