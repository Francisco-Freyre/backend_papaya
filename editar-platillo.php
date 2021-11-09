<?php
require_once 'config/parameters.php';
require_once 'layaut/nav.php';
require_once 'layaut/sidebar.php';
require_once 'model/platillos.php';
require_once 'model/alimentos.php';
require_once 'model/categorias_alimentos.php';
require_once 'config/db.php';
$_platillos = new platillos();
$_alimentos = new alimentos();
$_categorias_alimentos = new categorias_alimentos();
$categorias = $_categorias_alimentos->readAll();
$platillos = $_platillos->getPlatillo($_GET['id']);
if($platillos && $platillos->num_rows == 1){
    $platillo = $platillos->fetch_object();
    $ingredientes = $_platillos->getIngredientes($platillo->id);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar platillo</h1>
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
                <h3 class="card-title">Edita el platillo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="controller/platilloController.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <i class="fas fa-file-signature"></i>
                    <label for="nombre"> Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?=$platillo->nombre?>" required>
                  </div>
                  <div class="form-group">
                    <i class="fas fa-list-ul"></i>
                    <label for="apellidos"> Procedimiento</label>
                    <textarea name="procedimiento" cols="30" rows="10" class="form-control" required><?=$platillo->procedimiento?></textarea>
                  </div>
                  <div class="form-group">
                    <i class="fas fa-history"></i>
                    <label for="elaboracion"> Tiempo de Elaboracion (Minutos)</label>
                    <input type="number" class="form-control" name="elaboracion" value="<?=$platillo->tiempo_elaboracion?>" placeholder="elaboracion" required>
                  </div>
                  <div class="form-group">
                    <label for=""><i class="far fa-images"></i> Imagen del platillo</label>
                    <br>
                    <img src="<?=$platillo->url_img?>" alt="" height="100" width="100">
                    <label><?=str_replace("uploads/platillos/", "",$platillo->url_img)?></label>
                  </div>
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="img">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <div class="form-group">
                      <br>
                      <br>
                    <label><i class="fab fa-nutritionix"></i> APORTE NUTRICIONAL</label>
                      <br>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="energianutri">Energia (Kcal)</label>
                        <input type="number" class="form-control" id="energia" value="<?=$platillo->energia?>" placeholder="Energia" readonly>
                      </div>
                      <div class="form-group">
                        <label for="carbohidratos">Carbohidratos (Gr)</label>
                        <input type="number" class="form-control" id="carbos" value="<?=$platillo->carbohidratos?>" placeholder="Carbohidratos" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="proteina">Proteina (Gr)</label>
                        <input type="number" class="form-control" id="protes" value="<?=$platillo->proteina?>" placeholder="Proteina" readonly>
                      </div>
                      <div class="form-group">
                        <label for="grasas">Grasas (Gr)</label>
                        <input type="number" class="form-control" id="grasas" value="<?=$platillo->grasas?>" placeholder="Grasas" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="text" value="editar-platillo" name="accion" style="display: none;">
                  <input type="text" value="<?=$_GET['id']?>" name="id" style="display: none;">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>

            <div class="card card-primary">
              <div class="card-header">
                  <i class="fas fa-list-ul"></i>
                  <label for="nombre">Ingredientes</label>
              </div>
              <div class="card-body">
                  <div class="form-group">
                    <form id="enviar">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-sort-numeric-up-alt"></i>
                                <label for="unidad"> Categoria de alimentos</label>
                                <select class="custom-select" name="categoria" id="categoria" required>
                                    <option value="0" selected>Selecciona una categoria</option>
                                    <?php while($categoria = $categorias->fetch_object()): ?>
                                      <option value="<?=$categoria->id?>"><?=$categoria->nombre?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-sort-numeric-up-alt"></i>
                                <label for="alimento_id"> Alimentos</label>
                                <select class="custom-select" name="alimento_id" id="alimento_id" required>
                                    <option value="0" selected>Selecciona un alimento</option>
                                </select>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-1">
                          <div class="form-group clearfix">
                            <label for="">Cambiar</label>
                            <br>
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" name="cambiar" id="cambiar" value="1" checked>
                              <label for="cambiar">
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombre">Unidad</label>
                                <input type="text" class="form-control" name="unidad" id="unidad" placeholder="Unidad" autocomplete="off" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombre">Cantidad</label>
                                <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad" autocomplete="off" disabled>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="nombre">Equivalente</label>
                                <input type="text" class="form-control" name="equivalente" id="equivalente" placeholder="Equivalente" autocomplete="off" required>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group mt-4">
                            <input class="d-none" type="text" name="platillo_id" id="platillo_id" value="<?=$_GET['id']?>">
                            <input class="d-none" type="text" name="accion" id="accion" value="crear">
                            <button type="submit" class="btn btn-info">Agregar</button>
                          </div>
                        </div>
                      </div>
                    </form>
                    <div class="row">
                      <table class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>Cambiar</th>
                                  <th>Nombre</th>
                                  <th>Cantidad</th>
                                  <th>Kcal</th>
                                  <th>Carbohidratos</th>
                                  <th>Proteinas</th>
                                  <th>Lipidos</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody id="tabla">
                            <?php while($ingrediente = $ingredientes->fetch_object()): ?>
                            <?php  
                              $alimento = $_alimentos->readAlimento($ingrediente->alimento_id);
                              $ali = $alimento->fetch_object();
                            ?>
                              <tr>
                                  <td><?=$ingrediente->cambiar == 0 ? 'No' : 'Si'?></td>
                                  <td><?=$ali->nombre?></td>
                                  <td><?=$ingrediente->equivalente?></td>
                                  <td class="kcal"><?=$ingrediente->energia?></td>
                                  <td class="carbo"><?=$ingrediente->carbohidratos?></td>
                                  <td class="prote"><?=$ingrediente->proteina?></td>
                                  <td class="grasa"><?=$ingrediente->lipidos?></td>
                                  <td> <a class="btn btn-danger cerrar" data-id="<?=$ingrediente->id?>">Borrar</a></td>
                              </tr>
                            <?php endwhile; ?>
                          </tbody>
                      </table>
                    </div>
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
}
require_once 'layaut/footer.php';
?>