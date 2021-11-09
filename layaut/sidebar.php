<?php
require_once 'model/categorias_alimentos.php';
require_once 'model/alimentos.php';
require_once 'config/db.php';
$_categorias = new categorias_alimentos();
$categorias = $_categorias->readAll();
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="assets/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Papaya</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">La BRITNEY</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Clientes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lista-clientes.php" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p> Lista de clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p> Nuevo cliente</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-running"></i>
              <p>
                Ejercicios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ejercicios.php" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p> Lista de ejercicios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crear-ejercicio.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p> Crear ejercicios</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-utensils"></i>
              <p>
                Dietas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dietas.php" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p> Lista de dietas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crear-dieta.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p> Crear dietas</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-utensil-spoon"></i>
              <p>
                Platillos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="platillos.php" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p> Lista de platillos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crear-platillos.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p> Crear platillos</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-apple-alt"></i>
              <p>
                Alimentos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php while($categoria = $categorias->fetch_object()): ?>
                <li class="nav-item">
                  <a href="alimentos.php?id=<?=$categoria->id?>" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p><?=$categoria->nombre?></p>
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->