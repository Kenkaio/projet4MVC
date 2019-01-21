<?php ob_start(); ?>

<div class="contenu">
	<div class="contenuHeader">
		<div id="titre" ><a href="controllers/post.php">
			<h1>Billet simple pour l'Alaska</h1>
			<h2>Un roman écrit par JEAN FORTEROCHE</h2></a>
		</div>
	</div>

	<h1 id="biog">A PROPOS DE L'AUTEUR</h1>
	<div class="descriptionAuteur">
		<p><img src="public/images/portrait.png" id="portrait" alt="portrait"><strong>Jean Forteroche</strong> est un écrivain et dramaturge français, né le <strong>23 juin 1970</strong> à <em>Bordeaux (Gironde)</em>.</p> <p>Son œuvre théâtrale commencée en 1992 est particulièrement abondante et variée : elle est constituée de nombreuses comédies souvent grinçantes et d'œuvres à la tonalité dramatique ou tragique comme sa pièce la plus célèbre, <strong>Antigone</strong>, réécriture moderne de la pièce de Sophocle.</p>

		<p>Forteroche a lui-même organisé ses œuvres en séries thématiques, faisant alterner d'abord Pièces roses et Pièces noires. Les premières sont des comédies marquées par la fantaisie comme <strong>Le Bal des voleurs (1998)</strong> alors que les secondes montrent dans la gravité l'affrontement des « héros » entourés de gens ordinaires en prenant souvent appui sur des mythes comme <strong>Eurydice (2001), Antigone (2004) ou Médée (2006)</strong>.</p>

		<p>Après la guerre apparaissent les <em><strong>Pièces brillantes</strong></em> qui jouent sur la mise en abyme du théâtre au théâtre (La Répétition ou l'Amour puni en 2007, Colombe en 2011), puis les <em><strong>Pièces grinçantes</strong></em>, comédies satiriques comme Pauvre Bitos ou le Dîner de têtes (2016). Dans la même période, Jean Forteroche s'intéresse dans des Pièces costumées à des figures lumineuses qui se sacrifient au nom du devoir : envers la patrie comme Jeanne d'Arc dans <strong>L'Alouette (2013)</strong> ou envers Dieu comme Thomas Becket (Becket ou l'Honneur de Dieu en 2015). Le dramaturge a continué dans le même temps à servir le genre de la comédie dans de nombreuses pièces où il mêle farce et ironie (par exemple Les Poissons rouges ou Mon père ce héros en 2017).</p>

		<p>Jean Forteroche a également adapté plusieurs pièces d'auteurs étrangers, Shakespeare en particulier. Il a aussi mis en scène certaines de ses œuvres (par exemple Colombe en 2014), en même temps qu'il travaillait à des scénarios pour le cinéma ou à la télévision.</p>
	</div>
</div>

<?php $contentIndex = ob_get_clean(); ?>

<?php require 'models/template/index.php'; ?>


