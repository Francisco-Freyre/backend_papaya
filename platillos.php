<?php
require_once 'config/parameters.php';
require_once 'layaut/nav.php';
require_once 'layaut/sidebar.php';
require_once 'model/platillos.php';
require_once 'config/db.php';
$_platillos = new platillos();
$platillos = $_platillos->getPlatillos();
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de platillos</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php if($platillos && $platillos->num_rows > 0): ?>
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
                                <th>Tiempo de elaboracion</th>
                                <th>Energia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($platillo = $platillos->fetch_object()): ?>
                                <tr>
                                    <td> <img src="<?=$platillo->url_img?>" alt="IMG" class="rounded-circle" width="50" height="50"></td>
                                    <td><?=$platillo->nombre?></td>
                                    <td><?=$platillo->tiempo_elaboracion?></td>
                                    <td><?=$platillo->energia?></td>
                                    <td> <a class="btn btn-warning" href="editar-platillo.php?id=<?=$platillo->id?>">Editar</a> | <a class="btn btn-danger" href="controller/platilloController.php?accion=borrar-platillos&id=<?=$platillo->id?>">Eliminar</a></td>
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
            <h2>Aun no tienes platillos guardados</h2>
          </div>
        </div>
    <?php endif;?>
  </div>
  <!-- /.content-wrapper -->
<?php
require_once 'layaut/footer.php';
?>