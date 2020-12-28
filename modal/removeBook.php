<?php
session_start();
include('dbconfig.php');
if (isset($_GET)) {
    $remove_book_id = $_GET['bookId'];
    $remove_book_id = mysqli_real_escape_string($con, $remove_book_id);  
    $remove_query = "DELETE FROM books where book_id = '$remove_book_id'";

    $result = mysqli_query($con, $add_query);
        if ($result) {
            echo'<script>
    alert("Book removed");
    location="'.$_SESSION['url-remove'].'";
    </script>';
        }else {
            $error_code = mysqli_errno($con);
                switch ($error_code) {
                case 2002:
                    echo 'connection error';
                    break;
                case 1062:
                    echo 'duplicate entry';
                    break;
                case 1064:
                    echo 'query syntax error';
                    break;    
                default:
                    echo mysqli_error($con);
                    break;
                } 
        }      

    }  
