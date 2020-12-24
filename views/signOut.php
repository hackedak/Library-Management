<?php
session_start();
include('../modal/dbconfig.php');
include('../modal/bookreservecheck.php');
session_destroy();
header('Location: http://localhost');