<?php
session_start();
include('dbconfig.php');
if (isset($_POST)) {
    $issue_book_id = $_POST['issue-book'];
    $issue_book_id = mysqli_real_escape_string($con, $issue_book_id);
    $borrowed_by =$_SESSION['studentname'];
        $due_date = new DateTime();
        $due_date->modify('+15 days');
        $due_date = $due_date->format('Y-m-d');
        $issue_query = "UPDATE books_reserved SET `return_date` = '$due_date' WHERE registration_id = '$borrowed_by' AND book_id = '$issue_book_id'";

        $result = mysqli_query($con, $issue_query);
        if ($result) {
            echo'<script>
        alert("Issued");
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
