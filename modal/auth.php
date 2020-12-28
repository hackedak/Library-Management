<?php
session_start();
include('dbconfig.php');
$username = $_POST['username'];
$password = $_POST['password'];
if (isset($_POST['username'])) {
    //to prevent from mysqli injection  
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);
    $password = md5($password);
    $sql = "select *from authuser where registrationId = '$username' and password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        include('bookreservecheck.php');
        $_SESSION['username'] = $username;
        $_SESSION['student_name'] = $row['student'];
        if ($username == '1100490') {
            header("Location: ../views/admin.php");
            exit;
        } else {
            header("Location: ../views/dashboard.php");
            exit;
        }
    } else {
        echo "<script>alert('Login credentials are incorrect...!')</script>";
        header("Location: http://localhost");
    }
} else {
    header("Location: http://localhost");
}
