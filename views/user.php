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
    <title>User</title>
</head>
<body id="bootstrap-overrides">
<?php require("./partials/navbar.php"); ?>

<div class="container">
        <?php
            include('../modal/dbconfig.php');
            $user = $_SESSION['username'];
            $books_borrowed = "SELECT books.name, books_reserved.book_id, books_reserved.issue_date, books_reserved.return_date FROM books, books_reserved WHERE books_reserved.registration_id = $user AND books.book_id = books_reserved.book_id";  
            $result = mysqli_query($con, $books_borrowed);
            if(mysqli_num_rows($result) > 0){
                echo'<table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Book</th>
                        <th scope="col">Borrowed On</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Unreserve</th>
                    </tr>
                </thead>
                <tbody>';
                // Fetch result rows as an associative array
                while($rowlist = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<tr>";
                    echo "<td>".$rowlist['name']."</td>".
                          "<td>".$rowlist['issue_date']."</td>".
                          "<td>".$rowlist['return_date']."</td>";
                          if ($rowlist['return_date'] == '0000-00-00') {

                            echo "<td><button type='submit' class='btn btn-outline-light unreserve-btn' value= '".$rowlist['book_id']."' name='unreserve-book'>Un-reserve</button></td> </tr>";

                          }
                }
            echo '</tbody> </table>';            
            }
            else{
                    echo '<div class="card w-50 p-3 my-0 mx-auto bg-secondary text-light">
                            <div class="card-body align-center text-center">
                            No books reserved/borrowed.
                            </div>
                        </div>';       
            }
        
            mysqli_close($con);
        ?>    
</div>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="../public/js/unreserveBook.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>

</html>