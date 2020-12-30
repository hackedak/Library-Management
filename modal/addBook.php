<?php
session_start();
include('dbconfig.php');
if (isset($_POST)) {
    $add_book_id = $_POST['bookId'];
    $add_book_name = $_POST['bookname'];
    $add_authorname = $_POST['authorname'];
    $book_count = $_POST['tcount'];
    $add_book_id = mysqli_real_escape_string($con, $add_book_id);
    $add_book_name = mysqli_real_escape_string($con, $add_book_name);
    $add_authorname = mysqli_real_escape_string($con, $add_authorname);
    $book_count = mysqli_real_escape_string($con, $book_count);
    $add_query = "INSERT INTO books (book_id, name, author, is_issued, available_count, total_count) VALUES ('$add_book_id','$add_book_name','$add_authorname','0', '$book_count', '$book_count')";

    $result = mysqli_query($con, $add_query);
    if ($result) {
        echo "Book added";
        exit();
    } else {
        $error_code = mysqli_errno($con);
        switch ($error_code) {
            case 2002:
                echo "Connection Error";
                exit();
            case 1062:
                echo "Already added";
                exit();
            default:
                echo "Ops!...Some error occured";
                exit();
        }
    }
}
mysqli_close($con);
