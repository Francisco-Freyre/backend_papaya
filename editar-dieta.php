<?php
require_once 'config/parameters.php';
require_once 'layaut/nav.php';
require_once 'layaut/sidebar.php';
require_once 'model/dietas.php';
require_once 'config/db.php';
$_dietas = new dietas();
$dieta = $_dietas->readDieta($_GET['id']);
$Odieta = $dieta->fetch_object();
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar dieta</h1>
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
                            <textarea name="d_lunes" cols="15" rows="5"><?=$Odieta->d_lunes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="d_martes" cols="15" rows="5"><?=$Odieta->d_martes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="d_miercoles" cols="15" rows="5"><?=$Odieta->d_miercoles?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="d_jueves" cols="15" rows="5"><?=$Odieta->d_jueves?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="d_viernes" cols="15" rows="5"><?=$Odieta->d_viernes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="d_sabado" cols="15" rows="5"><?=$Odieta->d_sabado?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="d_domingo" cols="15" rows="5"><?=$Odieta->d_domingo?></textarea>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col">
                            <label>COLACIÓN</label>
                        </div>

                        <div class="col">
                            <textarea name="c_lunes" cols="15" rows="5"><?=$Odieta->c_lunes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c_martes" cols="15" rows="5"><?=$Odieta->c_martes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c_miercoles" cols="15" rows="5"><?=$Odieta->c_miercoles?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c_jueves" cols="15" rows="5"><?=$Odieta->c_jueves?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c_viernes" cols="15" rows="5"><?=$Odieta->c_viernes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c_sabado" cols="15" rows="5"><?=$Odieta->c_sabado?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c_domingo" cols="15" rows="5"><?=$Odieta->c_domingo?></textarea>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col">
                            <label>COLACIÓN</label>
                        </div>

                        <div class="col">
                            <textarea name="c3_lunes" cols="15" rows="5"><?=$Odieta->c3_lunes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c3_martes" cols="15" rows="5"><?=$Odieta->c3_martes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c3_miercoles" cols="15" rows="5"><?=$Odieta->c3_miercoles?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c3_jueves" cols="15" rows="5"><?=$Odieta->c3_jueves?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c3_viernes" cols="15" rows="5"><?=$Odieta->c3_viernes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c3_sabado" cols="15" rows="5"><?=$Odieta->c3_sabado?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c3_domingo" cols="15" rows="5"><?=$Odieta->c3_domingo?></textarea>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col">
                            <label>COMIDA</label>
                        </div>

                        <div class="col">
                            <textarea name="co_lunes" cols="15" rows="5"><?=$Odieta->co_lunes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="co_martes" cols="15" rows="5"><?=$Odieta->co_martes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="co_miercoles" cols="15" rows="5"><?=$Odieta->co_miercoles?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="co_jueves" cols="15" rows="5"><?=$Odieta->co_jueves?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="co_viernes" cols="15" rows="5"><?=$Odieta->co_viernes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="co_sabado" cols="15" rows="5"><?=$Odieta->co_sabado?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="co_domingo" cols="15" rows="5"><?=$Odieta->co_domingo?></textarea>
                        </div>
                    <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>COLACIÓN</label>
                        </div>

                        <div class="col">
                            <textarea name="c2_lunes" cols="15" rows="5"><?=$Odieta->c2_lunes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c2_martes" cols="15" rows="5"><?=$Odieta->c2_martes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c2_miercoles" cols="15" rows="5"><?=$Odieta->c2_miercoles?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c2_jueves" cols="15" rows="5"><?=$Odieta->c2_jueves?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c2_viernes" cols="15" rows="5"><?=$Odieta->c2_viernes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c2_sabado" cols="15" rows="5"><?=$Odieta->c2_sabado?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c2_domingo" cols="15" rows="5"><?=$Odieta->c2_domingo?></textarea>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col">
                            <label>COLACIÓN</label>
                        </div>

                        <div class="col">
                            <textarea name="c4_lunes" cols="15" rows="5"><?=$Odieta->c4_lunes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c4_martes" cols="15" rows="5"><?=$Odieta->c4_martes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c4_miercoles" cols="15" rows="5"><?=$Odieta->c4_miercoles?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c4_jueves" cols="15" rows="5"><?=$Odieta->c4_jueves?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c4_viernes" cols="15" rows="5"><?=$Odieta->c4_viernes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c4_sabado" cols="15" rows="5"><?=$Odieta->c4_sabado?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="c4_domingo" cols="15" rows="5"><?=$Odieta->c4_domingo?></textarea>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col">
                            <label>CENA</label>
                        </div>

                        <div class="col">
                            <textarea name="ce_lunes" cols="15" rows="5"><?=$Odieta->ce_lunes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="ce_martes" cols="15" rows="5"><?=$Odieta->ce_martes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="ce_miercoles" cols="15" rows="5"><?=$Odieta->ce_miercoles?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="ce_jueves" cols="15" rows="5"><?=$Odieta->ce_jueves?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="ce_viernes" cols="15" rows="5"><?=$Odieta->ce_viernes?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="ce_sabado" cols="15" rows="5"><?=$Odieta->ce_sabado?></textarea>
                        </div>

                        <div class="col">
                            <textarea name="ce_domingo" cols="15" rows="5"><?=$Odieta->ce_domingo?></textarea>
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
                                <input type="text" class="form-control" value="<?=$Odieta->tiem_alimen?>" name="temp_alim" autocomplete="off">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?=$Odieta->periodo?>" name="periodo" autocomplete="off">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="gr_car" value="<?=$Odieta->gr_car?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="gr_pro" value="<?=$Odieta->gr_pro?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="gr_gra" value="<?=$Odieta->gr_gra?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="por_car" value="<?=$Odieta->por_car?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="por_pro" value="<?=$Odieta->por_pro?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="por_gra" value="<?=$Odieta->por_gra?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?=$Odieta->categoria?>" name="categoria" autocomplete="off">
                            </div>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fibra">Fibra</label>
                                <input type="text" class="form-control" value="<?=$Odieta->fibra?>" name="fibra" autocomplete="off">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="kcal">Kcal</label>
                                <input type="text" class="form-control" value="<?=$Odieta->kcal?>" name="kcal" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-8">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" value="<?=$Odieta->descripcion?>" name="descripcion" autocomplete="off">
                            </div>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col text-center">
                        <input type="text" value="editar-dieta" name="accion" style="display: none;">
                        <input type="text" value="<?=$_GET['id']?>" name="id" style="display: none;">
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