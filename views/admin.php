<!-- <?php
session_start();
if (!$_SESSION['username']) {
    header("Location: http://localhost");
}
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/f71f402dff.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="../public/css/admin.css" type="text/css">
    <script src="../public/js/node_modules/jquery/dist/jquery.js"></script>
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
    <ul class="control-panel">
        <li><a href="#issue-book">Issue Book</a></li>
        <li><a href="#issue-book-offline">Issue Book Offline</a></li>
        <li><a href="#return-book">Return Book</a></li>
        <li><a href="#add-book">Add Book</a></li>
    </ul>
    <ul>
    <li><a href="./signOut.php">Log Out</a></li>
    </ul>
</div>

<!-- sidebar end  -->


<section>
    <div class="image-container">
        <img src="../public/img/logo.png" alt="" srcset="">
    </div>



<!-- Issue Book  -->
    <form action="issueBook.php" id="issue-book" class="tab-content" method="GET">
        <table class="flex-container" border="0px">
        
            <tr>
            
                <th>
                </th>
        
                <th>
                    <input type="text" name="userId" placeholder="user Id" required/>
                </th>
        
            </tr>
        
            
            <tr>
          
                <th>
                </th>
        
                <th>
                    <button type="submit" class="btn-Book">Search Books</button>
                </th>
            </tr>
        
        </table>
    </form>
<!-- / Issue book  -->

<!-- Issue book offline  -->


<form action="../modal/issueBookOffline.php" id="issue-book-offline" class="tab-content" method="POST">
        <table class="flex-container" border="0px">
        
            <tr>
            
                <th>
                </th>
        
                <th>
                    <input type="text" name="userId" placeholder="user Id" required />
                </th>
        
            </tr>

            <tr>
            
                <th>
                </th>
        
                <th>
                    <input type="text" name="bookId" placeholder="Book Id" required/>
                </th>
        
            </tr>
        
            
            <tr>
          
                <th>
                </th>
        
                <th>
                    <button type="submit" class="btn-Book">Issue Book</button>
                </th>
            </tr>
        
        </table>
        <?php $_SESSION['url-issue'] = $_SERVER['REQUEST_URI']; ?>
    </form>


<!-- / Issue book offline  -->




<!-- Return Book  -->
    
<form action="returnBook.php" id="return-book" class="tab-content" method="GET">
        <table class="flex-container" border="0px">
        
            <tr>
            
                <th>
                </th>
        
                <th>
                    <input type="text" name="userId" placeholder="user Id" required/>
                </th>
        
            </tr>
        
            
            <tr>
          
                <th>
                </th>
        
                <th>
                    <button type="submit" class="btn-Book">Search Books to return</button>
                </th>
            </tr>
        
        </table>
    </form>

<!-- /Return Book  -->

<!-- Add Book  -->
<form action="../modal/addBook.php" id="add-book" class="tab-content" method="POST">
        <table class="flex-container" border="0px">
        
            <tr>
            
                <th>
                </th>
        
                <th>
                    <input type="text" name="bookId" placeholder="Book Id" required/>
                </th>
        
            </tr>
        
            <tr>
            
                <th>
                </th>
        
                <th>
                    <input type="text" name="bookname" placeholder="Book Name" required/>
                </th>
        
            </tr>

            <tr>
            
                <th>
                </th>
        
                <th>
                    <input type="text" name="authorname" placeholder="Author name" required/>
                </th>
        
            </tr>

            <tr>
            
                <th>
                </th>
        
                <th>
                    <input type="number" name="tcount" placeholder="No of copies" required/>
                </th>
        
            </tr>
            
            <tr>
          
                <th>
                </th>
        
                <th>
                    <button type="submit" class="btn-Book">Add Book</button>
                </th>
            </tr>

        
        </table>
    </form>
<!-- / Issue book  -->



</section>

</div>













<script type="text/javascript" src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>