<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="style.css">

<style>

.hero{
    background:linear-gradient(135deg,#0d6efd,#4f8cff);
    color:white;
    padding:100px 0;
}

.feature-card{
    transition:.3s;
    border:none;
    border-radius:16px;
    box-shadow:0 8px 20px rgba(0,0,0,.08);
}

.feature-card:hover{
    transform:translateY(-8px);
}

</style>

</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg bg-white shadow-sm">

<div class="container">

<a class="navbar-brand fw-bold text-primary" href="#">

<i class="bi bi-mortarboard-fill"></i>

Student MS

</a>

<div class="ms-auto">

<a href="login.php" class="btn btn-primary rounded-pill px-4">

<i class="bi bi-box-arrow-in-right"></i>

Login

</a>

</div>

</div>

</nav>

<!-- Hero -->

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6">

<h1 class="display-4 fw-bold">

Student Management System

</h1>

<p class="lead mt-3">

Manage student records easily using PHP, MySQL and Bootstrap.

This project supports CRUD operations, Search functionality,
Responsive Dashboard and Authentication.

</p>

<a href="login.php" class="btn btn-light btn-lg mt-3">

Get Started

</a>

</div>

<div class="col-lg-6 text-center">

<i class="bi bi-mortarboard-fill"
style="font-size:220px;color:white;"></i>

</div>

</div>

</div>

</section>

<!-- Features -->

<section class="py-5">

<div class="container">

<h2 class="text-center fw-bold mb-5">

Project Features

</h2>

<div class="row g-4">

<div class="col-md-4">

<div class="card feature-card h-100">

<div class="card-body text-center">

<i class="bi bi-person-plus-fill text-primary fs-1"></i>

<h4 class="mt-3">

Student CRUD

</h4>

<p>

Add, Edit, Delete and View Students easily.

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card feature-card h-100">

<div class="card-body text-center">

<i class="bi bi-search text-success fs-1"></i>

<h4 class="mt-3">

Search Student

</h4>

<p>

Search students instantly by Name, Email or Course.

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card feature-card h-100">

<div class="card-body text-center">

<i class="bi bi-shield-lock-fill text-danger fs-1"></i>

<h4 class="mt-3">

Secure Login

</h4>

<p>

Admin authentication with PHP Sessions.

</p>

</div>

</div>

</div>

</div>

</div>

</section>
<!-- About Section -->

<section class="py-5 bg-light">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6">

<h2 class="fw-bold mb-4">

About This Project

</h2>

<p class="text-muted">

This Student Management System is developed using Core PHP,
MySQL and Bootstrap 5. It helps administrators manage
student records efficiently through a responsive and
user-friendly dashboard.

</p>

<ul class="list-group list-group-flush">

<li class="list-group-item">
<i class="bi bi-check-circle-fill text-success"></i>
Responsive Dashboard
</li>

<li class="list-group-item">
<i class="bi bi-check-circle-fill text-success"></i>
Complete CRUD Operations
</li>

<li class="list-group-item">
<i class="bi bi-check-circle-fill text-success"></i>
Search Functionality
</li>

<li class="list-group-item">
<i class="bi bi-check-circle-fill text-success"></i>
Secure Admin Login
</li>

</ul>

</div>

<div class="col-lg-6 text-center">

<i class="bi bi-laptop text-primary"
style="font-size:180px;"></i>

</div>

</div>

</div>

</section>

<!-- Call To Action -->

<section class="py-5 text-center">

<div class="container">

<h2 class="fw-bold">

Ready to Manage Students?

</h2>

<p class="text-muted mt-3">

Login to access the admin dashboard and manage student records.

</p>

<a href="login.php" class="btn btn-primary btn-lg rounded-pill px-5 mt-3">

<i class="bi bi-box-arrow-in-right"></i>

Login Now

</a>

</div>

</section>

<!-- Footer -->

<footer class="bg-primary text-white py-4">

<div class="container text-center">

<p class="mb-1">

© <?php echo date("Y"); ?>

Student Management System

</p>

<small>

Developed using PHP, MySQL & Bootstrap 5

</small>

</div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>