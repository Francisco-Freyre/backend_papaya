<?php
require_once 'config/parameters.php';
require_once 'layaut/nav.php';
require_once 'layaut/sidebar.php';
require_once 'model/dietas.php';
require_once 'config/db.php';
$_dietas = new dietas();
$dietas = $_dietas->read();
?>
  <script type="text/javascript">
    function ConfirmDelete(){
      let respuesta = confirm('¿Estas seguro que deseas eliminar esta dieta?');
      if(respuesta){
        return true;
      }else{
        return false;
      }
    }
  </script>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de dietas</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php if($dietas && $dietas->num_rows > 0): ?>
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
                                <th>Kcal</th>
                                <th>Tiempos</th>
                                <th>Grs. Nutrientes</th>
                                <th>% Nutrientes</th>
                                <th>Categoria</th>
                                <th>Descripcion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($dieta = $dietas->fetch_object()): ?>
                                <tr>
                                    <td><?=$dieta->kcal?></td>
                                    <td><?=$dieta->tiem_alimen?></td>
                                    <td><?=$dieta->gr_car.",".$dieta->gr_pro.",".$dieta->gr_gra?></td>
                                    <td><?=$dieta->por_car.",".$dieta->por_pro.",".$dieta->por_gra?></td>
                                    <td><?=$dieta->categoria?></td>
                                    <td><?=$dieta->descripcion?></td>
                                    <td class="d-line"> 
                                      <a class="btn btn-warning" href="editar-dieta.php?id=<?=$dieta->id?>">Editar</a>
                                      <a class="btn btn-danger" href="controller/dietaController.php?accion=eliminar&id=<?=$dieta->id?>" onclick="return ConfirmDelete()" >Eliminar</a>
                                    </td>
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
            <h2>Aun no tienes menus guardados</h2>
          </div>
        </div>
    <?php endif;?>
  </div>
  <!-- /.content-wrapper -->
<?php
require_once 'layaut/footer.php';
?>