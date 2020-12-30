<?php
session_start();
include('dbconfig.php');
if (isset($_POST)) {
    $issue_book_id = $_POST['bookId'];
    $issue_book_id = mysqli_real_escape_string($con, $issue_book_id);
    $student_to_borrow = $_POST['userId'];
    $student_to_borrow = mysqli_real_escape_string($con, $student_to_borrow);
    $checkuser_query = "SELECT books.book_Id, students.student FROM books, students WHERE books.book_Id = '$issue_book_id' AND students.student = '$student_to_borrow'";
    $result = mysqli_query($con, $checkuser_query);
    if (mysqli_num_rows($result) > 0) {
        
        $issue_date = new DateTime();
        $issue_date = $issue_date->format('Y-m-d');
        $due_date = new DateTime();
        $due_date->modify('+15 days');
        $due_date = $due_date->format('Y-m-d');
        $issue_query = "INSERT INTO books_reserved (book_id, registration_id, issue_date, return_date) 
                            VALUES ('$issue_book_id', '$student_to_borrow', '$issue_date', '$due_date'); 
                            UPDATE books SET available_count = available_count - 1 
                            WHERE book_id = '$issue_book_id' AND available_count >0;
                            UPDATE students SET book_count = book_count + 1 WHERE student = '$student_to_borrow'";

        if ($con->multi_query($issue_query)) {

            echo "Book Issued";
            exit();
        } else {
            $error_code = mysqli_errno($con);
            switch ($error_code) {
                case 2002:
                    echo "Connection Error";
                    exit();
                case 1062:
                    echo "Already Issued";
                    exit();
                default:
                    echo "Ops!...Some error occured";
                    exit();
            }
        }

    }
    else {
        echo "Given inputs doesn't exist";
    }
    
}else {
    $error_code = mysqli_errno($con);
    switch ($error_code) {
        case 2002:
            echo "Connection Error";
            exit();
        case 1062:
            echo "Already Issued";
            exit();
        default:
            echo "Ops!...Some error occured";
            exit();
    }
}
