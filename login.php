<?php
session_start();
$username = $_POST['Username'];
$password = $_POST['Password'];
    if ($username == 'admin' && $password == '123') {
        header("location:Add.php");
    } elseif ($username == 'boss' && $password == '123') {
        header("location:tables.php");
    } else
    {
        header("location:login.html");
        echo "<p>incorrect username and password</p>";
    }
?>
