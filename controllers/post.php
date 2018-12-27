<?php

require '../models/class/autoloader.php';
autoloader::register();

$manager = new postManager();

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $posts = $manager->getPost($_GET['id']);
    $comment = new comments();
    $comments = $comment->getComments($_GET['id']);
    require('../views/postView.php');
}
else {
	$posts = $manager->getPosts();
    require('../views/indexView.php');
}

