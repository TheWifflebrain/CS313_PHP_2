<?php
	$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
	session_start();

	if (isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
	}
	else
	{
		header("Location: login.php");
		die();
	}
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
	<ul class="navbar-nav">
		<li class="nav-item <?php if ($file === 'frontpage') echo 'active' ?>">
			<a class="title nav-link" href="frontpage.php">Frontpage</a>
		</li>
		<li class="nav-item">
			<a class="title nav-link" href="frontpage.php">Welcome <?php echo $username ?></a>
		</li>
		<li class="nav-item">
			<a class="title nav-link" href="logout.php">Sign Out</a>
		</li>
	<ul>
</nav>