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
     <link rel="stylesheet" href="/css/dashboard.css" type="text/css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Welcome</title>
</head>
<body id="bootstrap-overrides">
<?php require("navbar.html"); ?>

<div class="container">
    <br/>
	<div class="row justify-content-center border-round">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form action="./modal/book_search.php" method="get" class="card card-sm bg-transparent border-0">
                                <div class="card-body border-round row no-gutters align-items-center card-color">
                                    <!--end of col-->
                                    <div class="col">
                                    <input class="form-control form-control-lg form-control-borderless border-round" type="text" name="title" placeholder="Book Title">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto space">
                                        <input type="submit" class="btn btn-light">
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
</div>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
// $link = mysqli_connect("localhost", "root", "", "");
 
// // Check connection
// if($link === false){
//     die("ERROR: Could not connect. " . mysqli_connect_error());
// }
 
// if(isset($_REQUEST["term"])){
//     // Prepare a select statement
//     $sql = "SELECT * FROM books WHERE name LIKE ?";
    
//     if($stmt = mysqli_prepare($link, $sql)){
//         // Bind variables to the prepared statement as parameters
//         mysqli_stmt_bind_param($stmt, "s", $param_term);
        
//         // Set parameters
//         $param_term = $_REQUEST["term"] . '%';
        
//         // Attempt to execute the prepared statement
//         if(mysqli_stmt_execute($stmt)){
//             $result = mysqli_stmt_get_result($stmt);
            
//             // Check number of rows in the result set
//             if(mysqli_num_rows($result) > 0){
//                 // Fetch result rows as an associative array
//                 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
//                     echo "<p>" . $row["name"] . "</p>";
//                 }
//             } else{
//                 echo "<p>No matches found</p>";
//             }
//         } else{
//             echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
//         }
//     }
     
//     // Close statement
//     mysqli_stmt_close($stmt);
// }
 
// // close connection
// mysqli_close($link);
?>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>