<?php
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>

    <h2>Add Student</h2>

    <form action="" method="post">

        <label>Name:</label><br>
        <input type="text" name="name"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email"><br><br>

        <label>Course:</label><br>
        <input type="text" name="course"><br><br>

        <input type="submit" name="submit" value="Save Student">

    </form>

    <hr>

    <?php

    if(isset($_POST['submit'])) //isset() is used to check whether a variable is set and not null.
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $course = $_POST['course'];

        //Validation
        if(empty($name)||empty($email)||empty($course))
            {
                echo "<p style='color:red;'>All feilds are required.</p>";
            }
            else
                {
                    $sql ="INSERT INTO students(name,email,course) VALUES('$name','$email','$course')";

                    if(mysqli_query($conn,$sql))
                        {
                            echo "<p style='color:green;'>Student added Successfully.</p>";
                        }
                        else
                            {
                                echo "Error :". mysqli_error($conn);
                            }

                }
    }

    ?>

</body>
</html>