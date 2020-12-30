<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: http://localhost");
}
include('dbconfig.php');

if (isset($_GET)) {
    $book_name = $_GET['search'];
    $book_name = mysqli_real_escape_string($con, $book_name);
    $sql_query = "select *from books where lower(name) = lower('$book_name') && available_count>0";
    $result = mysqli_query($con, $sql_query);

    if (mysqli_num_rows($result) > 0) {
        // Fetch result rows as an associative array
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<p>" . $row['name'] . "</p>";
        }
    } else {
        echo "<p>No matches found</p>";
    }
}
mysqli_close($con);