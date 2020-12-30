<?php
session_start();
include('dbconfig.php');
if (isset($_POST)) {
    $return_book_id = $_POST['returnbook'];
    $return_book_id = mysqli_real_escape_string($con, $return_book_id);
    $borrowed_by = $_SESSION['studentname'];

    $return_query = "DELETE FROM books_reserved 
                     WHERE book_id = '$return_book_id' AND
                     registration_id = '$borrowed_by';
                     UPDATE books 
                     SET available_count = available_count + 1 
                     WHERE book_id = '$return_book_id';
                     UPDATE students 
                     SET book_count = book_count - 1 
                     WHERE student = '$borrowed_by';";

    if ($con->multi_query($return_query)) {

        echo "Book returned";
    } else {
        echo "Ops!...Some error occured";
    }
}
mysqli_close($con);
