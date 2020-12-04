<?php    
    session_start();  
    include('dbconfig.php');
    $username = $_POST['username'];  
    $password = $_POST['password'];  
    if (isset($_POST['username'])){
    //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password); 
        
        $sql = "select *from authuser where registrationId = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
            
        if($count == 1){  
            $_SESSION['username'] = $username;     
            header("Location: /dashboard.php");
            exit; 
        }  
        else{  
            echo "<script>alert('Login credentials are incorrect...!')</script>";
            header("Location: http://localhost");   
        }
    }
    else {
        header("Location: http://localhost");
    }               