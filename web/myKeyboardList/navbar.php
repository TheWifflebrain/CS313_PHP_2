<?php
    $file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
	<ul class="navbar-nav">
		<li class="nav-item <?php if ($file === 'listKeyboard') echo 'active' ?>">
			<a class="title nav-link" href="listKeyboard.php">Frontpage</a>
		</li>
	<ul>
</nav>

