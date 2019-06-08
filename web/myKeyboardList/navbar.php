<?php
	$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
	session_start();

	if (isset($_SESSION['username']))
	{
		$usernameS = $_SESSION['username'];
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
			<a class="title nav-link" href="homepage.php?username=<?php echo $usernameS ?>">Welcome, <?php echo $usernameS ?></a>
		</li>
		<li class="nav-item">
			<a class="title nav-link" href="inputKeyboard.php">Add Keyboard</a>
		</li>
		<li class="nav-item">
			<a class="title nav-link" href="editKeyboard.php">Edit Your Keyboard</a>
		</li>
		<li class="nav-item">
			<a class="title nav-link" href="logout.php">Sign Out</a>
		</li>
	<ul>
</nav>