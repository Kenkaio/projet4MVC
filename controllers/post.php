<?php

require '../models/class/autoloader.php';
Autoloader::register();

$manager = new postManager();

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $posts = $manager->getPostId($_GET['id']);
    $comment = new comment();
    $comments = $comment->getCommentsId($_GET['id']);
    require('../views/postView.php');
}
else {
	$posts = $manager->getPosts();
    require('../views/indexView.php');
}

