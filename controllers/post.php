<?php
require('../models/model.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('../views/postView.php');
}
else {
    header('location:../index.php');
}

