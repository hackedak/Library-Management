<?php
session_start();
include('dbconfig.php');
if (isset($_POST)) {
    $reserve_book_id = $_POST['reservebook'];
    $reserve_book_id = mysqli_real_escape_string($con, $reserve_book_id);
    $borrowed_by = $_SESSION['username'];
    $check_book_count = "SELECT book_count FROM students WHERE student = $borrowed_by";

    $count_result = mysqli_query($con, $check_book_count);
    $row = mysqli_fetch_assoc($count_result);
    if ($row['book_count'] == 3) {
        echo "You have have more than 3 books";
        exit(); 
    } else {
        $issued_date = new DateTime();
        $issued_date->modify('+3 days');
        $issued_date = $issued_date->format('Y-m-d');
        $reserve_query = "INSERT INTO books_reserved 
                        (BOOK_ID, REGISTRATION_ID, ISSUE_DATE) 
                        VALUES('$reserve_book_id', '$borrowed_by', '$issued_date'); 
                        UPDATE books SET available_count = available_count - 1 
                        WHERE book_id = '$reserve_book_id' AND available_count >0;
                        UPDATE students SET book_count = book_count + 1 WHERE student = '$borrowed_by'";

        if ($con->multi_query($reserve_query)) {

            echo "Reserved";
            exit();
        }
       
        else {
            $error_code = mysqli_errno($con);
            switch ($error_code) {
                case 2002:
                    echo "Connection Error";
                    exit(); 
                case 1062:
                    echo "Already Booked";
                    exit(); 
                default:
                    echo "Ops!...Some error occured";
                    exit(); 
            }
        }
    }
}
mysqli_close($con);