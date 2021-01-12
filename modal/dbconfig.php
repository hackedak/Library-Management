<?php      
    $host = "remotemysql.com";  
    $user = "GRtY26B9ZG";  
    $password = "I1EdgShbRK";  
    $db_name = "GRtY26B9ZG"; 
    $port = "3306"; 
      
    $con = mysqli_connect($host, $user, $password, $db_name, $port);  

//    $host = "localhost";  
  //  $user = "root";  
 //   $password = '';  
  //  $db_name = "soelib";  
      
  //  $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with database");  
    }  
?>  
