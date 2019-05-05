<?php
    $file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
	<ul class="navbar-nav">
		<li class="nav-item <?php if ($file === 'homepage') echo 'active' ?>">
			<a class="title nav-link" href="homepage.php">Smash Ultimate Homepage</a>
		</li>

		<li class="nav-item <?php if ($file === 'assignments') echo 'active' ?>">
			<a class="title nav-link" href="assignments.php">Assignments Page</a>
		</li>
	<ul>
</nav>

