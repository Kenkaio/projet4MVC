<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="public/css/admin.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="public/assets/sbAdmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="public/assets/sbAdmin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/assets/sbAdmin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="public/assets/sbAdmin/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="public/assets/sbAdmin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="public/css/articles.css">

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=0hkhpc4x9cs6zila14oyvwobq0nvvwt8jz83d0b6k58i1q6s"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <a href="index.php?action=formNewPost">
                    <i class="fa fa-book" aria-hidden="true"></i>
                </a>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Mon profil</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="index.php?action=deco"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="page-wrapp">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="hudeCom"></div>
                                    <div>Nouveaux commentaires !</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?action=viewComs">
                            <div class="panel-footer" id="showComments">
                                <span class="pull-left">Voir les détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-offset-1 col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">2</div>
                                    <div>Mes articles !</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?action=allPosts">
                            <div class="panel-footer" id="showArticles">
                                <span class="pull-left">Voir les détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-offset-2 col-lg-4 col-lg-offset-1 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="hudeSign"></div>
                                    <div>Commentaires signalés !</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?action=viewSign">
                            <div class="panel-footer" id="showSignal">
                                <span class="pull-left">Voir les détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div>
			    <?= $contentAdmin ?>
		    </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="public/assets/sbAdmin/vendor/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/assets/sbAdmin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="public/assets/sbAdmin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="public/assets/sbAdmin/vendor/raphael/raphael.min.js"></script>
    <!-- <script src="../models/sbAdmin/vendor/morrisjs/morris.js"></script> -->
    <!-- <script src="../models/sbAdmin/data/morris-data.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="public/assets/sbAdmin/dist/js/sb-admin-2.js"></script>

    <script src="public/js/newPost.js"></script>
    <script src="public/js/admin.js"></script>


</body>

</html>
