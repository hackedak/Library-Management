<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: http://localhost");
}
?>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://use.fontawesome.com/db754630e4.js"></script>
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="../public/css/dashboard.css" type="text/css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Result</title>
</head>
<body id="bootstrap-overrides">
<?php require("./partials/navbar.php"); ?>

<div class="container">
    <br/>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Book</th>
                    <th scope="col">Author</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            include('../modal/dbconfig.php');
            if (isset($_GET)) {
                $book_name = $_GET['search'];
                $book_name = mysqli_real_escape_string($con, $book_name);
                $sql_query = 'select *from books where match(name) against("'.$book_name.'") or match(author) against("'.$book_name.'")';
                $result = mysqli_query($con, $sql_query);
            }
            
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>". $row['name']."</td>".
                        "<td>". $row['author']."</td>".
                        "<td><button type='submit' class='btn btn-outline-light reserve-btn' value= '".$row['book_id']."' name='reserve-book'>Reserve</button></td>
                        </tr>";
                }
            } else{
                echo "<p>No matches found</p>";
            }
            mysqli_close($con);
            ?>
        </table>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="../public/js/reserveBook.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
