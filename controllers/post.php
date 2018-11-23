<?php

require('../models/modelCoBdd.php');
require('../models/modelBillets.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = getPost($_GET['id']);

    $comments = getComments($_GET['id']);
    require('../views/postView.php');
}
else {
	$posts = getPosts();
    require('../views/indexView.php');
}

