<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./public/css/masterstyle.css" type="text/css">
    <title>login</title>
  </head>
  <body>
      
    <div class="masterbox">
      

       <form class="lform" action="modal/auth.php" method="post">
        <h1>login</h1>
        <div class="input1">
          <p>Registration number</p><br>
          <i class="fas fa-user" aria-hidden="true"></i>
          <input type="text" name="username" placeholder="Enter Username" required>
        </div>


        <div class="input1">
          <p>Password</p><br>
          <i class="fas fa-lock" aria-hidden="true"></i>
         <input type="password" name="password" placeholder="Enter Password" required>
        </div>

         

          <div align="right">
            <input type="submit" class="button1" value="Sign In">
          </div>
        </form>
    
    </div>

  </body>
</html>

