<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 4/05/2015
 * Time: 15:18
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Instant Interview</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/lavish-bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>
<body id="scroll">
<header class="masthead">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1><a href="#" title="scroll down for your viewing pleasure">Bootstrap 3 Layout Template</a></h1>

                <p class="lead">Big Top Header and Fixed Sidebar</p>
            </div>
            <div class="col-sm-6">
                <div class="pull-right hidden-sm">
                    <h1><a href="#"><i class="glyphicon glyphicon-user"></i> <i
                                class="glyphicon glyphicon-chevron-down"></i></a></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!--Top navigation bar-->
<nav class="navbar navbar-inverse navbar-static-top" id="nav">
    <div class="container">
        <div class="navbar-header navbar-collapse collapse">
            <a class="navbar-brand" href="#">Instant Interview</a>
        </div>
        <div class="scrollspy">
            <ul class="nav navbar-nav navbar-collapse collapse">
                <li class="active scrollAnimate"><a href="#info">Info</a></li>
                <li class="scrollAnimate"><a href="#contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="scrollAnimate"><a href="#login">Login</a></li>
                <li class="scrollAnimate"><a href="#register">Register</a></li>
            </ul>
        </div>
    </div>
</nav>
<!--Bottom navigation bar-->
<nav class="navbar navbar-inverse navbar-fixed-bottom">
    <div class="container">
        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Page 1</a></li>
            </ul>
        </div>
    </div>
</nav>
<!--Jumbotron-->
<div class="jumbotron" id="jumbotron">
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <h1>Lorem Ipsum zever 1</h1>
                </div>

                <div class="item">
                    <h1>Lorem Ipsum zever 2</h1>
                </div>

                <div class="item">
                    <h1>Lorem Ipsum zever 3</h1>
                </div>

                <div class="item">
                    <h1>Lorem Ipsum zever 4</h1>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<!-- Content -->
<section>
    <div class="container">
        <div class="page-header"  id="info">
            <h1>Info</h1>
        </div>
        <p>This is some text.</p>

        <p>This is another text.</p>
    </div>
    <div class="container">
        <h1>My First Bootstrap Page</h1>

        <p>This is some text.</p>
    </div>
    <div class="container">
        <h1>My First Bootstrap 2 Page</h1>

        <p>This is some text.</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">.col-sm-4</div>
            <div class="col-sm-8">.col-sm-8</div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="page-header"  id="contact">
            <h1>Contact</h1>
        </div>
        <p>This is some text.</p>

        <p>This is another text.</p>
    </div>
    <div class="container">
        <h1>My First Bootstrap Page</h1>

        <p>This is some text.</p>
    </div>
    <div class="container">
        <h1>My First Bootstrap 2 Page</h1>

        <p>This is some text.</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">.col-sm-4</div>
            <div class="col-sm-8">.col-sm-8</div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="page-header" id="login">
            <h1>Login</h1>
        </div>
        <p>This is some text.</p>

        <p>This is another text.</p>
    </div>
    <div class="container">
        <h1>My First Bootstrap Page</h1>

        <p>This is some text.</p>
    </div>
    <div class="container">
        <h1>My First Bootstrap 2 Page</h1>

        <p>This is some text.</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">.col-sm-4</div>
            <div class="col-sm-8">.col-sm-8</div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="page-header" id="register">
            <h1>Register</h1>
        </div>
        <p>This is some text.</p>

        <p>This is another text.</p>
    </div>
    <div class="container">
        <h1>My First Bootstrap Page</h1>

        <p>This is some text.</p>
    </div>
    <div class="container">
        <h1>My First Bootstrap 2 Page</h1>

        <p>This is some text.</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">.col-sm-4</div>
            <div class="col-sm-8">.col-sm-8</div>
        </div>
    </div>
</section>
</body>
<!-- Local javascript -->
<!-- Dit moet hier geplaatst worden anders werkt het niet, vanwege timing inlezen js file -->
<script src="js/affix.js"></script>
</html>