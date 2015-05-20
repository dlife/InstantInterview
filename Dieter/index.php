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
</header>
<!--Top navigation bar-->
<nav class="navbar navbar-inverse navbar-static-top" id="nav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-collapse-small-devices">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Instant Interview</a>
        </div>
        <div class="collapse navbar-collapse scrollspy" id="nav-collapse-small-devices">
            <ul class="nav navbar-nav navbar-left">
                <li class="scrollAnimate"><a href="#info">Info</a></li>
                <li class="scrollAnimate"><a href="#contact">Contact</a></li>
                <li class="scrollAnimate"><a href="#interview">Interview</a></li>
            </ul>
            <!--<ul class="nav navbar-nav navbar-right">
                <li class="scrollAnimate"><a href="#login">Login</a></li>
                <li class="scrollAnimate"><a href="#register">Register</a></li>
            </ul> Nog te bekijken-->
        </div>
    </div>
</nav>
<!--Bottom navigation bar-->
<!--<nav class="navbar navbar-inverse navbar-fixed-bottom">
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
</nav> Still neccesary ?-->
<!-- Content -->
<section>
    <div class="container">
        <div class="page-header"  id="info">
            <h1>Info</h1>
        </div>
</section>
<section>
    <div class="container">
        <div class="page-header"  id="contact">
            <h1>Contact</h1>
        </div>
</section>
<section>
    <div class="container">
        <div class="page-header" id="interview">
            <h1>Interview</h1>
        </div>
    </div>
    <div class="container">
        <?php include 'Views/CompetenceView.php';?>
    </div>
</section>

<section>
    <div class="container">
        <div class="page-header" id="login">
            <h1>Login</h1>
        </div>
</section>
<section>
    <div class="container">
        <div class="page-header" id="register">
            <h1>Register</h1>
        </div>
</section>
</body>
<!-- Local javascript -->
<!-- Dit moet hier geplaatst worden anders werkt het niet, vanwege timing inlezen js file -->
<script src="js/affix.js"></script>
</html>