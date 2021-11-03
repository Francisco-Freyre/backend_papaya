<?php
require_once 'config/parameters.php';
require_once 'layaut/nav.php';
require_once 'layaut/sidebar.php';
$_alimentos = new alimentos();
$_categorias = new categorias_alimentos();
$categorias = $_categorias->readOne($_GET['id']);
$alimentos = $_alimentos->readCategoria($_GET['id']);
$categoria = $categorias->fetch_object();
?>
  <script type="text/javascript">
    function ConfirmDelete(){
      let respuesta = confirm('¿Estas seguro que deseas eliminar este alimento?');
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
            <h1><?=$categoria->nombre?></h1>
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
                <h3 class="card-title">Crea un nuevo alimento</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form method="POST" action="controller/categoriasController.php">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-file-signature"></i>
                                <label for="nombre"> Nombre</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Alimento" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-sort-numeric-up-alt"></i>
                                <label for="unidad"> Unidad</label>
                                <select class="custom-select" name="unidad" required>
                                    <option value="Sin opcion">Selecciona una unidad</option>
                                    <option value="gr">Gr</option>
                                    <option value="taza">Taza</option>
                                    <option value="cdita">Cdita</option>
                                    <option value="cda">Cda</option>
                                    <option value="ml">Ml</option>
                                    <option value="vaso">Vaso</option>
                                    <option value="disparos">Disparos</option>
                                    <option value="pieza">Pieza</option>
                                    <option value="lata">Lata</option>
                                    <option value="hojas">Hojas</option>
                                    <option value="rebanadas">Rebanadas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-sort-numeric-up-alt"></i>
                                <label for="cantidad"> Cantidad</label>
                                <input type="number" class="form-control" name="cantidad" step="0.01" placeholder="Cantidad" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group d-none">
                                <label for="id_categoria">id_categoria</label>
                                <input type="number" class="form-control" name="id_categoria" value="<?=$categoria->id?>" autocomplete="off">
                                <label for="accion">accion</label>
                                <input type="text" class="form-control" name="accion" value="crear" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
                <br>
                <hr size="2px" color="black">
                <div class="row">
                    <div class="col-md-12">
                        <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Unidad</th>
                                            <th>Cantidad</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($alimento = $alimentos->fetch_object()): ?>
                                            <tr>
                                                <td><?=$alimento->nombre?></td>
                                                <td><?=$alimento->unidad?></td>
                                                <td><?=$alimento->cantidad?></td>
                                                <td> <a class="btn btn-danger" href="controller/alimentosController.php?accion=borrar&cat=<?=$_GET['id']?>&id=<?=$alimento->id?>" onclick="return ConfirmDelete()">Eliminar</a></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
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
require_once 'layaut/footer.php';
?>