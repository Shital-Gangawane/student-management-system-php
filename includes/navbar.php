
 <!-- Navbar -->
 <div class="content">
  <nav class="navbar navbar-expand-lg bg-white px-4">

                <div class="container-fluid">

                    <h4 class="text-primary fw-bold mb-0">

                        Student Management System

                    </h4>

                  <div class="ms-auto d-flex align-items-center">

    <i class="bi bi-person-circle fs-3 text-primary me-2"></i>

    <div class="me-3">
        <strong><?php echo $_SESSION['admin_name']; ?></strong><br>
        <small class="text-muted">Administrator</small>
    </div>

    <a href="logout.php" class="btn btn-outline-danger btn-sm">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>

</div>

                </div>

            </nav>
 </div>
