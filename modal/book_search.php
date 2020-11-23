<?php
include('dbconfig.php');

if (isset($_GET)) {
    $book_name = $_GET['search'];
    $book_name = mysqli_real_escape_string($con, $book_name);
    $book_name_tags = preg_split('/ +/', $book_name);
    $book_name_tags_combined = implode(",",array_map("add_quotes",$book_name_tags));
    $sql_query = "select *from books where lower(name) = lower('$book_name') && available_count>0";
    $result = mysqli_query($con, $sql_query);

    if(mysqli_num_rows($result) > 0){
        // Fetch result rows as an associative array
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo "<p>" . $row['name'] . "</p>";
        }
    } else{
        echo "<p>No matches found</p>";
    }
}


function add_quotes($each_class_value){
    return "'".$each_class_value."'";
}