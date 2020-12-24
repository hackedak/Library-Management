<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: http://localhost");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/f71f402dff.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
     <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
     <link rel="stylesheet" href="../public/css/admin.css" type="text/css">
     <script src="../public/js/adminControl.js"></script>
    <title>Admin</title>
</head>
<body id="bootstrap-overrides">

<!-- sidebar  -->
<input type="checkbox" id="check">
<label for="check">
<i class="fas fa-bars" id="btn-icon"></i>
<i class="fas fa-times" id="btn-cancel"></i>
</label>
<div class="sidebar">
    <header>Admin Panel</header>
    <ul>
        <li id="add-book"><a href="admin.php">Issue Book</a></li>
        <li><a id="return-book" href="admin.php">Return Book</a></li>
        <li><a href="./signOut.php">Log Out</a></li>
    </ul>
</div>

<!-- sidebar end  -->



<section>
<div class="image-container">
        <img src="../public/img/logo.png" alt="" srcset="">
    </div>
    <br/>
    <form action="../modal/returnBook.php" method="POST">
    <div class="table-div">
            <?php
            include('../modal/dbconfig.php');
            if (isset($_GET['userId'])){
                //to prevent from mysqli injection  
                    $username = $_GET['userId'];  
                    $username = stripcslashes($username);   
                    $username = mysqli_real_escape_string($con, $username); 
                    $sql = "select *from books_reserved  where registration_id = '$username' and return_date <> '0000-00-00'";  
                    $result = mysqli_query($con, $sql);   
                    if(mysqli_num_rows($result) > 0){
                        echo '<table class="table-issuebook">
                        <thead>
                            <tr>
                                <th scope="col">Book</th>
                                <th scope="col">Issued Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Fine</th>
                                <th scope="col">Return</th>
                            </tr>
                        </thead>
                        <tbody>';
                        // Fetch result rows as an associative array
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<tr>";
                    echo "<td>". $row['book_id']."</td>".
                         "<td>". $row['issue_date']."</td>".
                         "<td>". $row['return_date']."</td>";

                        // 888888888888888888888888888

                        $currentdate = time();
                        $duedate = strtotime($row['return_date']);
                        $duedate = $duedate/(60*60*24);
                        $currentdate = $currentdate/(60*60*24);
                        $diff = floor(($currentdate - $duedate));
                        if ($diff<=0) {
                            echo "<td>No fine</td>".
                            "<td><button type='submit' class='btn-issueBook' value= '".$row['book_id']."' name='return-book'>Return Book</button></td></tr>";
                        } else {
                            echo "<td> Rs.".($diff/2)."</td>.
                            <td><button type='submit' class='btn-issueBook' value= '".$row['book_id']."' name='return-book'>Return Book</button></td></tr>";
                        }
                        // 8888888888888888888888888888888
                }
            echo "</table> </div> </form>";
            $_SESSION['studentname'] = $_GET['userId'];
            $_SESSION['url-return'] = $_SERVER['REQUEST_URI'];
            }
             else{
                echo "<h1 style='background: rgba(255, 255, 255, 0.849);
                padding: 5px 10px;
                border-radius: 20px;
                margin: 0 auto;
                color: rgb(110, 92, 114); width: 200px'>No matches found</h1>";
            }
        }
            ?>
</section>

</div>












</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
 <script type="text/javascript" src="script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</html>