<?php
session_start();
include('dbconfig.php');
if (isset($_POST)) {
    $issue_book_id = $_POST['issuebook'];
    $issue_book_id = mysqli_real_escape_string($con, $issue_book_id);
    $borrowed_by = $_SESSION['studentname'];
    $due_date = new DateTime();
    $due_date->modify('+15 days');
    $due_date = $due_date->format('Y-m-d');
    $issue_query = "UPDATE books_reserved SET `return_date` = '$due_date' WHERE registration_id = '$borrowed_by' AND book_id = '$issue_book_id'";

    $result = mysqli_query($con, $issue_query);
    if ($result) {
        echo "Issued";
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
