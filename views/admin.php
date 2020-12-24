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
    <!-- Bootstrap CSS -->
     <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
     <link rel="stylesheet" href="../public/css/admin.css" type="text/css">
     <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

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
        <li><a href="#add-book">Issue Book</a></li>
        <li><a href="#return-book">Return Book</a></li>
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
    <form action="issueBook.php" id="add-book" class="tab-content" method="GET">
        <table class="flex-container" border="0px">
        
            <tr>
            
                <th>
                </th>
        
                <th>
                    <input type="text" name="userId" placeholder="user Id" />
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

<!-- Return Book  -->
    
<form action="returnBook.php" id="return-book" class="tab-content" method="GET">
        <table class="flex-container" border="0px">
        
            <tr>
            
                <th>
                </th>
        
                <th>
                    <input type="text" name="userId" placeholder="user Id" />
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





    <!-- <form class="flex-container" action="addBook.php" method="post">
        
        <div class="flex-items">
        <label for="bookId">Book Id</label>
        <input type="text" name="bookId" placeholder="Book Id" />
        </div>
        <div class="flex-items">
        <label for="bookName">Name of Book</label>
        <input type="text" name="bookName" placeholder="Book Name" />
        </div>
        <div class="flex-items">
        <label for="bookName">Name of Author</label>
        <input type="text" name="bookName" placeholder="Author Name" />
        </div>
        <div class="flex-items">
        <label for="bookName">Books Count</label>
        <input type="text" name="bookName" placeholder="Book Name" />
        </div>
    </form> -->

    <!-- <form action="addBook.php" class="form-display1" method="post">
        <table class="flex-container" border="0px">
        
            <tr>
            
                <th>
                    <label for="bookId">Book Id 2</label>
                </th>
        
                <th>
                    <input type="text" name="bookId" placeholder="BookId" />
                </th>
        
            </tr>
        
            <tr>
            
                <th>
                    <label for="bookName">Name of Book</label>
                </th>
        
                <th>
                    <input type="text" name="bookName" placeholder="Book Name" />
                </th>
        
            </tr>
        
            <tr>
          
                <th>
                    <label for="tcount">Count</label>
                </th>
        
                <th>
                    <input type="number" name="tcount" placeholder="Book Count" />
                </th>
            </tr>
        
            <tr>
          
                <th>
                </th>
        
                <th>
                    <button type="submit" id="btn-Book">Add Book</button>
                </th>
            </tr>
        
        </table>
        </form> -->
</section>

</div>















<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>