<?php

require '../models/class/autoloader.php';
autoloader::register();

$post = new post();

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $posts = $post->getPost($_GET['id']);
    $comment = new comments();
    $comments = $comment->getComments($_GET['id']);
    require('../views/postView.php');
}
else {
	$posts = $post->getPosts();
    require('../views/indexView.php');
}

