<?php

require('models/model.php');

$posts = getPosts();

require('views/indexView.php');