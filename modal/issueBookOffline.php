<?php
session_start();
include('dbconfig.php');
if (isset($_POST)) {
    $issue_book_id = $_POST['bookId'];
    $issue_book_id = mysqli_real_escape_string($con, $issue_book_id);
    $student_to_borrow = $_POST['userId'];
    $student_to_borrow = mysqli_real_escape_string($con, $student_to_borrow);
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

echo'<script>
alert("Book Issued");
location="'.$_SESSION['url-issue'].'";
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
