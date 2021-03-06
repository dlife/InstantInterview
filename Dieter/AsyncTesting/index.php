<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 11/05/2015
 * Time: 21:04
 */



// then creates divs for questions based on competences that will async fill with questions using a different php page with querystring

// fetch with jquery when document.ready()
// use $('[id^="content_"]').hide();

include('controller/Controller.php');
use controller\Controller;

$controller = new Controller();
$controller->LoadTestData();

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8" />
    <meta name="application-name" content="Instant Interview">
    <meta name="description" content="Vragen voor de interviewer per functie of competentie">
    <meta name="generator" content="www.dieterbenoot.be">
    <meta name="keywords" content="Sollicitatie, Vragen">
    <meta name="author" content="Cedric Jacobs, David Vlaminck, Dieter Benoot">
    <meta name="date" content="20150608">

    <!-- viewport for bootstrap device initialisation-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>InstantInterview</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/lavish-bootstrap.css"><!--Bootstrap color theme-->
    <link rel="stylesheet" href="css/style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script> Conflicts version 1.11.1 for affix menu -->
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript">

        function fetchdata(id) {
            if (document.getElementById(id) != null) {
                document.getElementById(id).innerHTML = "";
            }
            var xmlhttp;
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            // this will be called when loaded succesfully
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById(id).innerHTML = xmlhttp.responseText;
                }
            };
            // actually make the call
            xmlhttp.open("GET", "fetchquestions.php?q=" + id.replace('questionssection',''), true);
            xmlhttp.send();
        }

        $(document ).ready(function() {
            // one by one load the data
            $('[id^="questionssection"]').each(function(i, obj) {
                fetchdata(obj.id);
            });
        });

    </script>
</head>
<body id="scroll">
<header class="masthead">
    <!--Jumbotron-->
    <div class="jumbotron" id="jumbotron">
        <div class="container">
            <!-- CAROUSEL-->
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
                <li class="scrollAnimate"><a href="#interview">Interview</a></li>
                <li class="scrollAnimate"><a href="#contact">Contact</a></li>
            </ul>
            <!--<ul class="nav navbar-nav navbar-right">
                <li class="scrollAnimate"><a href="#login">Login</a></li>
                <li class="scrollAnimate"><a href="#register">Register</a></li>
            </ul> Is dit nog nodig ? -->
        </div>
    </div>
</nav>
<!--Bottom navigation bar-->
<!--Is dit nog nodig ?
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
</nav>-->
<!-- Content -->
<section>
    <div class="container">
        <div class="page-header"  id="info">
            <h1>Info</h1>
        </div>
</section>
<section>
    <div class="container">
        <div class="page-header" id="interview">
            <h1>Interview</h1>
        </div>
    </div>
    <div class="container">
            <?php require 'fetchjobtitles.php'; ?>
            <?php require 'fetchcompetences.php'; ?>
    </div>
</section>
<section>
    <div class="container">
        <div class="page-header"  id="contact">
            <h1>Contact</h1>
        </div>
</section>
<!-- Local javascript -->
<!-- Dit moet hier geplaatst worden anders werkt affix navbar niet, vanwege timing inlezen js file -->
</body>
<script src="js/affix.js"></script>
</html>