<?php
include "session.php";
include "db.php";
include "includes/header.php"; 
include "includes/sidebar.php";
 
?>

<?php
// Form Submit Code
if(isset($_POST['submit']))
{

    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    // Validation
    if(empty($name) || empty($email) || empty($course))
    {
        $error = "All fields are required.";
    }
    else
{
// Check Duplicate Email
$checkEmail = "SELECT * FROM students WHERE email='$email'";
$emailResult = mysqli_query($conn, $checkEmail);


if(mysqli_num_rows($emailResult) > 0)
{
    $error = "Email already exists.";
}
else
{
    $sql = "INSERT INTO students(name,email,course)
            VALUES('$name','$email','$course')";

    if(mysqli_query($conn,$sql))
    {
        header("Location: index.php?msg=added");
        exit();
    }
    else
    {
        $error = mysqli_error($conn);
    }
}


}

}
?>

    <!-- Sidebar -->

    <!-- Main Content -->

    <div class="content">

        <!-- Navbar -->
    <?php include "includes/navbar.php"; ?>


        <div class="container-fluid p-4">

            <div class="row justify-content-center">

                <div class="col-lg-8">

                    <div class="card">

                        <div class="card-header bg-primary text-white">

                            <h4 class="mb-0">

                                <i class="bi bi-person-plus-fill"></i>

                                Add Student

                            </h4>

                        </div>

                        <div class="card-body">

                        <?php
if(isset($error))
{
?>
<div class="alert alert-danger">
    <?php echo $error; ?>
</div>
<?php
}
?>

                            <form action="" method="post">

                                <div class="mb-3">

                                    <label class="form-label fw-bold">

                                        Student Name

                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        placeholder="Enter Student Name" required>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label fw-bold">

                                        Email Address

                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="Enter Email" required>

                                </div>

                                <div class="mb-4">

                                    <label class="form-label fw-bold">

                                        Course

                                    </label>

                                    <input
                                        type="text"
                                        name="course"
                                        class="form-control"
                                        placeholder="Enter Course" required>

                                </div>
                                                                <div class="d-flex gap-2">

                                    <button type="submit"
                                            name="submit"
                                            class="btn btn-primary">

                                        <i class="bi bi-check-circle"></i>

                                        Save Student

                                    </button>

                                    <a href="index.php"
                                       class="btn btn-secondary">

                                        <i class="bi bi-arrow-left"></i>

                                        Back

                                    </a>

                                </div>

                            </form>

                            <hr>


                        </div>

                    </div>

                </div>

            </div>


        </div>
   <!-- Footer -->
        <?php include "includes/footer.php"; ?>

    </div>

</div>

   
        