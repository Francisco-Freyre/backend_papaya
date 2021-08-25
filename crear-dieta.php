<?php
require_once 'config/parameters.php';
require_once 'layaut/nav.php';
require_once 'layaut/sidebar.php';
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear dieta</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="controller/dietaController.php" method="post">
                    <div class="row">
                        <div class="col">

                        </div>

                        <div class="col">
                            <label>LUNES</label>
                        </div>

                        <div class="col">
                            <label>MARTES</label>
                        </div>

                        <div class="col">
                            <label>MIERCOLES</label>
                        </div>

                        <div class="col">
                            <label>JUEVES</label>
                        </div>

                        <div class="col">
                            <label>VIERNES</label>
                        </div>

                        <div class="col">
                            <label>SABADO</label>
                        </div>

                        <div class="col">
                            <label>DOMINGO</label>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col">
                            <label>DESAYUNO</label>
                        </div>

                        <div class="col">
                            <textarea name="d_lunes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="d_martes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="d_miercoles" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="d_jueves" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="d_viernes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="d_sabado" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="d_domingo" cols="18" rows="5"></textarea>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col">
                            <label>COLACIÓN</label>
                        </div>

                        <div class="col">
                            <textarea name="c_lunes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c_martes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c_miercoles" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c_jueves" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c_viernes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c_sabado" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c_domingo" cols="18" rows="5"></textarea>
                        </div>
                    <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>COLACIÓN</label>
                        </div>

                        <div class="col">
                            <textarea name="c2_lunes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c2_martes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c2_miercoles" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c2_jueves" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c2_viernes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c2_sabado" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c2_domingo" cols="18" rows="5"></textarea>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col">
                            <label>COMIDA</label>
                        </div>

                        <div class="col">
                            <textarea name="co_lunes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="co_martes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="co_miercoles" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="co_jueves" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="co_viernes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="co_sabado" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="co_domingo" cols="18" rows="5"></textarea>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col">
                            <label>COLACIÓN</label>
                        </div>

                        <div class="col">
                            <textarea name="c3_lunes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c3_martes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c3_miercoles" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c3_jueves" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c3_viernes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c3_sabado" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c3_domingo" cols="18" rows="5"></textarea>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col">
                            <label>COLACIÓN</label>
                        </div>

                        <div class="col">
                            <textarea name="c4_lunes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c4_martes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c4_miercoles" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c4_jueves" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c4_viernes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c4_sabado" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c4_domingo" cols="18" rows="5"></textarea>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col">
                            <label>CENA</label>
                        </div>

                        <div class="col">
                            <textarea name="ce_lunes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="ce_martes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="ce_miercoles" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="ce_jueves" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="ce_viernes" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="ce_sabado" cols="18" rows="5"></textarea>
                        </div>

                        <div class="col">
                            <textarea name="ce_domingo" cols="18" rows="5"></textarea>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col">
                            <label for="">Tiempos de alimentacion:</label>
                        </div>

                        <div class="col">
                            <label for="">Periodo:</label>
                        </div>

                        <div class="col">
                            <label for="">Grs. HCO'S:</label>
                        </div>

                        <div class="col">
                            <label for="">Grs. P'S:</label>
                        </div>

                        <div class="col">
                            <label for="">Grs. L'S:</label>
                        </div>

                        <div class="col">
                            <label for="">% HCO'S:</label>
                        </div>

                        <div class="col">
                            <label for="">% P'S:</label>
                        </div>

                        <div class="col">
                            <label for="">% L'S:</label>
                        </div>

                        <div class="col">
                            <label for="">Categoria:</label>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="temp_alim" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="periodo" autocomplete="off">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="gr_car" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="gr_pro" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="gr_gra" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="por_car" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="por_pro" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="por_gra" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="categoria" autocomplete="off">
                            </div>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fibra">Fibra</label>
                                <input type="text" class="form-control" name="fibra" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="kcal">Kcal</label>
                                <input type="text" class="form-control" name="kcal" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-8">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" name="descripcion" autocomplete="off">
                            </div>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col text-center">
                            <input type="text" value="crear-dieta" name="accion" style="display: none;">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </form>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
require_once 'layaut/footer.php';
?>