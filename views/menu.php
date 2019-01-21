<nav class="navbar navbar-inverse navbar-fixed-top container">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="menu">
			<ul class="nav navbar-nav">
				<li><a href="http://<?= $_SESSION['server'] ?>index.php" id="accueil">Accueil</a></li>
				<li><a href="http://<?= $_SESSION['server'] ?>index.php?action=posts">Chapitres</a></li>
				<li><a href="http://<?= $_SESSION['server'] ?>index.php?action=contact" id="lienContact">Contact</a></li>
				<li><a href="http://<?= $_SESSION['server'] ?>index.php?action=formAdmin" id="menuAdmin">Admin</a></li>
			</ul>
		</div>
	</div>
</nav>
