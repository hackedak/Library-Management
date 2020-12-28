 
<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar navbar-dark">
  <a class="navbar-brand text-white-50 text-monospace" href="http://localhost/views/dashboard.php">
	<img src="../public/img/logo.png" width="40" height="50" class="d-inline-block align-center" alt="Logo" loading="lazy">
	Librarion
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
	aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
	<ul class="navbar-nav text-center px-4 ml-auto nav-flex-icons">
	  <li class="nav-item py-4">
		<a class=" dropdown-item text-white-50 text-monospace" href="./user.php">
		<i class="fa fa-user-circle-o fa-lg">
			<?=$_SESSION['student_name'] ?>
		</i>
		</a>
	  </li>
	  <li class="nav-item py-4">
	  <a class="dropdown-item text-white-50 text-monospace" href="./signOut.php"><i class="fa fa-sign-out fa-lg">Sign Out</i></a>
	  </li>
	</ul>
  </div>
</nav>
<!--/.Navbar -->

