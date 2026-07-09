<?php

$servername="localhost";  //address of database server
$username ="root";  //default usename of XXAMP
$password =""; //default password is blank in XXAMP
$database = "student_management";  //created database

$conn =mysqli_connect($servername,$username, $password, $database); //establish the connection between PHP or MySQL.
if(!$conn)
    {
        die("Connection Failed:". mysqli_connect_error());
    }

   // echo "Database Connected Successfully"; 

?>