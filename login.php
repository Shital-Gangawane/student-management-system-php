<?php

include "db.php";

session_start();
if (isset($_SESSION['admin_email'])) {
    header("Location: dashboard.php");
    exit();
}
$error = "";

if(isset($_POST['login']))
{
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM admins WHERE email='$email'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        $admin = mysqli_fetch_assoc($result);

        if(password_verify($password,$admin['password']))
        {
            $_SESSION['admin_name'] = $admin['username'];
            $_SESSION['admin_email'] = $admin['email'];

            header("Location:dashboard.php");
            exit();
        }
        else
        {
            $error = "Invalid Password!";
        }
    }
    else
    {
        $error = "Invalid Email!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="assets/css/style.css">

<style>

body{
    background:#f5f7fb;
}

.login-card{
    border:none;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,.1);
}

</style>

</head>

<body>

<div class="container">

<div class="row justify-content-center align-items-center vh-100">

<div class="col-lg-5">

<div class="card login-card">

<div class="card-body p-5">

<div class="text-center mb-4">

<i class="bi bi-mortarboard-fill text-primary"
style="font-size:70px;"></i>

<h2 class="fw-bold mt-3">

Admin Login

</h2>

<p class="text-muted">

Student Management System

</p>

</div>

<?php

if($error!="")
{
?>

<div class="alert alert-danger">

<?php echo $error; ?>

</div>

<?php
}
?>

<form method="POST">

<div class="mb-3">

<label class="form-label">

Email Address

</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">

Password

</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>
<div class="d-grid mb-3">

    <button
        type="submit"
        name="login"
        class="btn btn-primary btn-lg">

        <i class="bi bi-box-arrow-in-right"></i>

        Login

    </button>

</div>

<div class="text-center">

    <a href="landing.php" class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left"></i>

        Back to Home

    </a>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>