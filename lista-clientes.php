<?php
require_once 'config/parameters.php';
require_once 'layaut/nav.php';
require_once 'layaut/sidebar.php';
require_once 'model/clientes.php';
require_once 'config/db.php';
$clientes = new clientes();
$clients = $clientes->readAll();
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de clientes</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php if($clients && $clients->num_rows > 0): ?>
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
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($cliente = $clients->fetch_object()): ?>
                            <tr>
                                <td><?=$cliente->nombre.' '.$cliente->apellido?></td>
                                <td><?=$cliente->edad?></td>
                                <td><?=$cliente->sexo?></td>
                                <td><?=$cliente->email?></td>
                                <td> <a href="stats.php?id=<?=$cliente->id?>" class="btn btn-info">Stats</a> | <a class="btn btn-warning" href="editar-cliente.php?id=<?=$cliente->id?>">Editar</a> | <a class="btn btn-danger" href="controller/clientesController.php?accion=borrar&id=<?=$cliente->id?>">Eliminar</a></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <!--<tfoot>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                    </tfoot> -->
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
            <h2>Aun no tienes clientes registrados</h2>
          </div>
        </div>
    <?php endif;?>
  </div>
  <!-- /.content-wrapper -->
<?php
require_once 'layaut/footer.php';
?>