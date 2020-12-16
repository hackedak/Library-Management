<?php      
    $host = "remotemysql.com";  
    $user = "4oT9U3rgUl";  
    $password = 'PXitfsXmcj';  
    $db_name = "4oT9U3rgUl";  
    $port = "3306";  
    $con = mysqli_connect($host, $user, $password, $db_name, $port);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  