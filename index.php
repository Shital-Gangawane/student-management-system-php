<?php
include "db.php";

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <style>
        table{
            border-collapse: collapse;
            width: 80%;
        }

        table, th, td{
            border:1px solid black;
            padding:10px;
            text-align:center;
        }

        a{
            text-decoration:none;
        }
    </style>
</head>
<body>

<h2>Student Management System</h2>

<a href="add_student.php">Add New Student</a>

<br><br>

<table>

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Course</th>
    <th>Action</th>
</tr>

<?php

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['course']; ?></td>
    <td>
    <a href="edit_student.php?id=<?php echo $row['id']; ?>">Edit</a> |

    <a href="delete_student.php?id=<?php echo $row['id']; ?>"
   onclick="return confirm('Are you sure you want to delete this student?');">
   Delete
</a>
    </td>
</tr>

<?php
    }
}
else
{
?>

<tr>
    <td colspan="4">No Record Found</td>
</tr>

<?php
}
?>

</table>

</body>
</html>