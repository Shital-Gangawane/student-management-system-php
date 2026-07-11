<?php
include "session.php";
include "db.php";
include "includes/header.php";
include "includes/footer.php";

$id = $_GET['id'];

$sql = "DELETE FROM students WHERE id=$id";

if(mysqli_query($conn, $sql))
{
   header("Location: index.php?msg=deleted");
exit();
}
else
{
    echo "Error : " . mysqli_error($conn);
}

?>