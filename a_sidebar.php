<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height:100%;">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">RVSian</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">
          <?php echo $_SESSION["member_user"]; ?>
        </a>
      </div>
    </div>

    <!-- SidebarSearch Form -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="a_dashboard.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="student.php" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Students
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="classes.php" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
            Classes 
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="subject.php" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
             Subjects
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="add_result.php" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Results
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>