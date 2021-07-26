<?php
require_once 'config/parameters.php';
require_once 'layaut/nav.php';
require_once 'layaut/sidebar.php';
require_once 'model/ejercicios.php';
require_once 'config/db.php';
$_ejercicios = new ejercicios();
$ejercicios = $_ejercicios->read();
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de ejercicios</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php if($ejercicios && $ejercicios->num_rows > 0): ?>
        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Img</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($ejercicio = $ejercicios->fetch_object()): ?>
                                <tr>
                                    <td> <img src="<?=$ejercicio->url_img?>" alt="IMG" class="rounded-circle" width="50" height="50"></td>
                                    <td><?=$ejercicio->nombre?></td>
                                    <td><?=$ejercicio->descripcion?></td>
                                    <td> <a class="btn btn-warning" href="editar-ejercicio.php?id=<?=$ejercicio->id?>">Editar</a> | <a class="btn btn-danger" href="controller/ejercicioController.php?accion=borrar-ejercicio&id=<?=$ejercicio->id?>">Eliminar</a></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    <?php else: ?>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Aun no tienes ejercicios guardados</h2>
          </div>
        </div>
    <?php endif;?>
  </div>
  <!-- /.content-wrapper -->
<?php
require_once 'layaut/footer.php';
?>