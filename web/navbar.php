<?php
    $file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<ul class="navbar-nav">
		<li class="nav-item <?php if ($file === 'homepage') echo 'active' ?>">
			<a class="title" href="homepage.php">Smash Ultimate Homepage</a>
		</li>

		<li class="nav-item <?php if ($file === 'assignments') echo 'active' ?>">
			<a class="title" href="assignments.php">Assignments Page</a>
		</li>
	<ul>
</nav>

