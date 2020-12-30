<?php
session_start();
include('../modal/dbconfig.php');
include('../modal/bookreservecheck.php');
mysqli_close($con);
session_unset();
session_destroy();
header('Location: http://localhost');