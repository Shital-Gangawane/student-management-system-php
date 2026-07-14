<?php
include "session.php";
include "db.php";
include "includes/header.php";
include "includes/footer.php";


$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT photo FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

$sql = "DELETE FROM students WHERE id=$id";

if(mysqli_query($conn, $sql))
{
    if(!empty($row['photo']) && file_exists("assets/uploads/".$row['photo']))
    {
        unlink("assets/uploads/".$row['photo']);
    }

    header("Location: dashboard.php?msg=deleted");
    exit();
}
else
{
    echo "Error : " . mysqli_error($conn);
}

?>