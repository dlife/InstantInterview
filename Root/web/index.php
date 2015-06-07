<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 11/05/2015
 * Time: 21:04
 */

include('../vendor/autoload.php');

header('Content-type: text/html; charset=UTF-8') ;

$controller = new Controller\Controller();
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
    <!-- Optional theme -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">-->
    <link rel="stylesheet" href="css/lavish-bootstrap.css"><!--Bootstrap color theme-->
    <link rel="stylesheet" href="css/style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script> Conflicts version 1.11.1 for affix menu -->
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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
        </div>
    </div>
</nav>
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
    <div class="container" id="interviewForm">
            <?php require '../app/views/JobFunctionsView.php'; ?>
        <!-- Hier komen de competencies en vragen behorende bij de functies-->
     </div>
    <div class="container">
        <div class="row">
            <button class="btn btn-primary hidden" id="QSubmit">Rapport</button>
            <button class="btn btn-primary hidden" id="ShowAll" onclick="showAll()">Laat alles zien</button>
            <button class="btn btn-primary hidden" id="AddQuestionButton">Voeg vraag toe</button>
        </div>
        <div class="row">
            <div id="testdiv"></div>
        </div>
        <!-- Modal Report -->
        <div class="modal fade" id="report" role="dialog" aria-labelledby="reportLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="reportLabel">Rapport</h4>
                    </div>
                    <div class="modal-body" id="reportBody">
                        <!-- Fetch questions for report-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="GetPdf">Download PDF</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal Add question-->
        <div class="modal fade" id="AddQuestionModal" role="dialog" aria-labelledby="AddQuestionLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="AddQuestionLabel">Voeg een niewe vraag toe.</h4>
                    </div>
                    <div class="modal-body">
                        <form id="formAddQuestion" name="formAddQuesiton">
                            <div class="form-group">
                                        <h2>Selecteer hier een competentie.</h2>
                                        <select class="form-control" id="competenceSelect" name="selectCompetence">
                                            <option selected disabled hidden value=''></option>
                                        </select>
                            </div>
                            <div class="form-group">
                                <label for="newQuestion" class="control-label">Niewe vraag:</label>
                                <textarea class="form-control" id="newQuestion" name="questionText"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="sendQuestionButton" type="submit" onclick="sendQuestion()">Voeg Toe</button>
                    </div>
                </div>
            </div>
        </div>
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
<script type="text/javascript" src="js/affix.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
</html>

