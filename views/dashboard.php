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
    <!-- fontawesome  -->
    <script src="https://use.fontawesome.com/db754630e4.js"></script>
    <!-- Bootstrap CDN  -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <!-- custom css  -->
     <link rel="stylesheet" href="../public/css/dashboard.css" type="text/css">
    <title>Welcome</title>
</head>
<body id="bootstrap-overrides">
<?php require("./partials/navbar.php"); ?>

<div class="container">
    <br/>
	<div class="row justify-content-center border-round">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form action="resultPage.php" method="get" class="card card-sm bg-transparent border-0">
                                <div class="card-body border-round row no-gutters align-items-center card-color">
                                    <!--end of col-->
                                    <div class="col">
                                    <input class="form-control form-control-lg form-control-borderless border-round" id="search" type="text" name="search" placeholder="Book title or Author's name">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto space">
                                       <input type="submit" value="Search" class="btn btn-light">
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>   
                        </div>
                        <!--end of col-->
    </div>
    <div id="display">

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript" src="../public/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>