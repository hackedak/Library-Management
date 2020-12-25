<?php
session_start();
include('dbconfig.php');
if (isset($_POST)) {
    $unreserve_book_id = $_POST['unreserve-book'];
    $unreserve_book_id = mysqli_real_escape_string($con, $unreserve_book_id);
    $borrowed_by = $_SESSION['username'];
    $unreserve_query = "DELETE FROM books_reserved WHERE book_id ='$unreserve_book_id' AND registration_id = '$borrowed_by';
                        UPDATE books SET available_count = available_count + 1 WHERE book_id = '$unreserve_book_id';
                        UPDATE students SET book_count = book_count - 1 WHERE student = '$borrowed_by'";
    if ($con->multi_query($unreserve_query)) {

        echo'<script>
                alert("Book returned");
                location="'.$_SESSION['url-return'].'";
            </script>';
        
    } else {
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

// echo ($_POST['unreserve-book'].$_SESSION['username']);
}    