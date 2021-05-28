<?php
require_once 'config/parameters.php';
require_once 'layaut/nav.php';
require_once 'layaut/sidebar.php';
require_once 'model/clientes.php';
require_once 'model/pesos.php';
require_once 'model/formularios.php';
require_once 'config/db.php';
$clientes = new clientes();
$pesos = new pesos();
$formularios = new formularios();

if(isset($_GET['id'])){
  $cliente = $clientes->readOne($_GET['id']);
  $datos = [];
  if($cliente && $cliente->num_rows > 0){
    $client = $cliente->fetch_object();
    $meta = $pesos->pesoMeta($client->id);
    $met = $meta->fetch_object();
    $ultimos = $pesos->ultimosPesos($client->id);
    while($ultimo = $ultimos->fetch_object()){
      array_push($datos, $ultimo->peso);
    }
    $formulario = $formularios->getFormulario($client->id);
  }
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Avances del cliente</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3"> </div>
          <!-- /.col -->
          <div class="col-md-6">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username"><?=$client->nombre.' '.$client->apellido?></h3>
                <h5 class="widget-user-desc">Founder & CEO</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="assets/dist/img/user1-128x128.jpg" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?=$datos[1]?></h5>
                      <span class="description-text">Peso anterior</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?=$datos[0]?></h5>
                      <span class="description-text">Peso actual</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header"><?=$met->peso?></h5>
                      <span class="description-text">Meta</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <!-- /.col -->
          <div class="col-md-3"> </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <!-- PIE CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">IMC</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart" data-id="<?=$_GET['id']?>" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Linea de avance</h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Resultados del formulario..</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="altura">Altura</label>
                    <input type="text" class="form-control" value="<?=$formulario->altura?>" name="altura" placeholder="altura" readonly>
                  </div>
                  <div class="form-group">
                    <label for="peso">Peso</label>
                    <input type="text" class="form-control" value="<?=$formulario->peso?>" name="peso" placeholder="peso" readonly>
                  </div>
                  <div class="form-group">
                    <label for="meta">Meta</label>
                    <input type="text" class="form-control" value="<?=$formulario->meta?>" name="meta" placeholder="meta" readonly>
                  </div>
                  <div class="form-group">
                    <label for="fisica">Actividad fisica</label>
                    <input type="text" class="form-control" value="<?=$formulario->actividad_fisica?>" name="fisica" placeholder="fisica" readonly>
                  </div>
                  <div class="form-group">
                    <label for="alergia">Alergias</label>
                    <input type="text" class="form-control" value="<?=$formulario->altura?>" name="alergia" placeholder="alergia" readonly>
                  </div>
                  <div class="form-group">
                    <label for="excluidos">Alimentos excluidos</label>
                    <input type="text" class="form-control" value="<?=$formulario->altura?>" name="excluidos" placeholder="excluidos" readonly>
                  </div>
                  <div class="form-group">
                    <label for="bebidas">Cantidad de bebidas con azucar</label>
                    <input type="text" class="form-control" value="<?=$formulario->vasos_bebidas?>" name="bebidas" placeholder="bebidas" readonly>
                  </div>
                  <div class="form-group">
                    <label for="comida">Comida grande</label>
                    <input type="text" class="form-control" value="<?=$formulario->comida_grande?>" name="comida" placeholder="comida" readonly>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->
<?php
require_once 'layaut/footer.php';
?>