<?php
include "db.php";

// Update Student
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $course = trim($_POST['course']);

    $sql = "UPDATE students
            SET name='$name',
                email='$email',
                course='$course'
            WHERE id=$id";

    if(mysqli_query($conn, $sql))
    {
        header("Location: index.php");
        exit();
    }
    else
    {
        echo "Error : " . mysqli_error($conn);
    }
}

// Fetch Existing Student Data
$id = $_GET['id'];

$sql = "SELECT * FROM students WHERE id=$id";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form method="POST">

    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    Name <br>
    <input type="text" name="name" value="<?php echo $row['name']; ?>">
    <br><br>

    Email <br>
    <input type="email" name="email" value="<?php echo $row['email']; ?>">
    <br><br>

    Course <br>
    <input type="text" name="course" value="<?php echo $row['course']; ?>">
    <br><br>

    <input type="submit" name="update" value="Update Student">

</form>

</body>
</html>