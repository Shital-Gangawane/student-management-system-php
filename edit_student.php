<?php
include "session.php";
include "db.php";
include "includes/header.php";
include "includes/sidebar.php";
?>

<?php
// Update Student

if(isset($_POST['update']))
{
    $result = mysqli_query($conn,"SELECT * FROM students WHERE id=".$_POST['id']);
$row = mysqli_fetch_assoc($result);

    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $course = trim($_POST['course']);
    $photo = $row['photo'];
      // Photo upload code...

if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0)
{
    if(!empty($row['photo']) && file_exists("assets/uploads/".$row['photo']))
    {
        unlink("assets/uploads/".$row['photo']);
    }

    $photo = time()."_".$_FILES['photo']['name'];

    move_uploaded_file($_FILES['photo']['tmp_name'], "assets/uploads/".$photo);
}

    $sql = "UPDATE students
            SET name='$name',
                email='$email',
                course='$course',
                photo='$photo'
            WHERE id=$id";


    if(mysqli_query($conn, $sql))
{
    header("Location: dashboard.php?msg=updated");
    exit();
}
else
{
    echo "Error : " . mysqli_error($conn);
}

}

// Fetch Existing Student Data
$id = $_GET['id']? (int)$_GET['id'] : 0;

$sql = "SELECT * FROM students WHERE id=$id";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
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

<div class="card-header bg-warning">

<h4 class="mb-0 text-dark">

<i class="bi bi-pencil-square"></i>

Update Student

</h4>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<input
type="hidden"
name="id"
value="<?php echo $row['id']; ?>">

<div class="mb-3">

<label class="form-label fw-bold">

Student Name

</label>

<input
type="text"
name="name"
class="form-control"
value="<?php echo $row['name']; ?>"
required>

</div>

<div class="mb-3">

<label class="form-label fw-bold">

Email Address

</label>

<input
type="email"
name="email"
class="form-control"
value="<?php echo $row['email']; ?>"
required>

</div>

<div class="mb-4">

<label class="form-label fw-bold">

Course

</label>

<input
type="text"
name="course"
class="form-control"
value="<?php echo $row['course']; ?>"
required>

</div>

<div class="mb-3">
    <label class="form-label">Current Photo</label><br>

    <?php if(!empty($row['photo'])) { ?>
    <img src="assets/uploads/<?php echo $row['photo']; ?>" width="80" height="80" style="border-radius:50%; object-fit:cover;" >
<?php } ?>

</div>

<div class="mb-3">
    <label class="form-label">Change Photo</label>
    <input type="file" name="photo" class="form-control">
</div>

                                <div class="d-flex gap-2">

                                    <button
                                        type="submit"
                                        name="update"
                                        class="btn btn-warning">

                                        <i class="bi bi-check-circle"></i>

                                        Update Student

                                    </button>

                                    <a href="dashboard.php"
                                       class="btn btn-secondary">

                                        <i class="bi bi-arrow-left"></i>

                                        Back

                                    </a>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>
  <!-- Footer -->
        <?php include "includes/footer.php"; ?>
    </div>

</div>

