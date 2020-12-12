<?php
session_start();
include('./modal/dbconfig.php');
if (isset($_GET)) {
    $reserve_book_id = $_GET['reserve-book'];
    $reserve_book_id = mysqli_real_escape_string($con, $reserve_book_id);
    $borrowed_by = $_SESSION['username'];
    // $issue_date = date('Y/m/d');
    // echo ($issue_date + strtotime(''));

    $issued_date = new DateTime();
    $issued_date->modify('+2 days');
    $issued_date = $issued_date->format('Y-m-d');
    $reserve_query = "INSERT INTO books_reserved 
                     (BOOK_ID, REGISTRATION_ID, ISSUE_DATE) 
                     VALUES('$reserve_book_id', '$borrowed_by', '$issued_date'); 
                     UPDATE books SET available_count = available_count - 1 
                     WHERE book_id = '$reserve_book_id' AND available_count >0";

    if ($con->multi_query($reserve_query)) {

        echo "<script> alert('executed successfully') </script>";
        
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
}

