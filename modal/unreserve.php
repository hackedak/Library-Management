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

        echo '<script>
                alert("Reservation cancelled");
                location="' . $_SESSION['url-return'] . '";
            </script>';
    } else {
        echo '<script>
        alert("Ops!...Some error occured");
        location="views/admin.php";
        </script>';
    }

    // echo ($_POST['unreserve-book'].$_SESSION['username']);
}
