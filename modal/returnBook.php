<?php
session_start();
include('dbconfig.php');
if (isset($_POST)) {
    $return_book_id = $_POST['return-book'];
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

        echo '<script>
                alert("Book returned");
                location="' . $_SESSION['url-return'] . '";
            </script>';
    } else {
        echo '<script>
                alert("Ops!...Some error occured");
                location="views/admin.php";
              </script>';
    }
}
