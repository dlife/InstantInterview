<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 11/05/2015
 * Time: 21:04
 */

include_once('../vendor/autoload.php');

$controller = new \Controller\Controller();

header('Content-type: text/html; charset=UTF-8') ;

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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                        <div class="item">
                            <h1>Lorem Ipsum zever 2</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                        <div class="item">
                            <h1>Lorem Ipsum zever 3</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                        <div class="item">
                            <h1>Lorem Ipsum zever 4</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Vorige</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Volgende</span>
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
            <div class="page-header" id="info">
                <h1>Info</h1>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <h3>Concept</h3>
                    <p>Het concept Instant Interview werd bedacht door Cedric. Hij doet interviews met kandidaten voor een sollicitatie. Hierbij gebruikt hij een lijst met vragen die gerangschikt staan per competentie in een Excel lijst. Verder heeft hij ook manier om voor een bepaalde functie een vaste lijst vragen te laten opstellen. Maar deze manier van werken is weinig overzichtelijk, niet gebruiksvriendelijk en moeilijk te onderhouden. Bovendien wil hij dit eventueel op termijn verder uitbouwen naar een online formulier waar hij ook meteen de antwoorden van de kandidaat kan invullen tijdens het interview. Daarom hebben wij, Cedric, Dieter en ik, een deel van dit concept uitgewerkt als project voor dit vak.</p>
                </div>
                <div class="col-xs-12 col-md-6">
                    <h3>Gebruikte concepten en frameworks</h3>
                    <p>De volgende zaken worden in dit project gebruikt:</p>
                    <ul>
                        <li>Bootstrap</li>
                        <li>jQuery</li>
                        <li>FPDF (netasign)</li>
                        <li>Composer</li>
                        <li>Helper klassen uit AnOrmApart</li>
                        <li>MVC</li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-8">
                    <h3>Concreet</h3>
                    <p>Dit project is een PHP project met een MySQL database. Sommige van de keuzes die hier gemaakt zijn, zijn omwille van de mogelijkheden of beperkingen die daar bij horen. Zo is beslist om dit project een single page website te maken. Aangezien de gebruiker vragen zal aanvinken of keuzes maken is het niet wenselijk veel van pagina te veranderen.</p>
                    <p>De gebruiker kan naar de verschillende delen op de website gaan, maar blijft op 1 pagina. Het Instant Interview gedeelte zelf wordt ook binnen deze ene pagina opgebouwd. De gebruiker krijgt een keuzelijst te zien waaruit een functie kan geselecteerd worden. Wanneer de gebruikt een keuze maakt, worden verschillende competenties weergeven die bij deze functie horen, de anderen worden voorlopig verborgen. Er worden al een aantal vragen aangeduid, maar de gebruiker is vrij om meer vragen aan te duiden. De vragen worden zichtbaar telkens er op een competentie geklikt wordt.</p>
                    <p>De gebruiker kan alle competenties zien door op een knop te klikken. Wanneer hij op de “Rapport” knop klikt, verschijnt in een kleiner bovenliggend venster een overzicht van de vragen die aangeduid zijn. Wanneer in dat venster op de “Download PDF” knop wordt geklikt, genereert de server een pdf met de aangeduide vragen en zal de browser dit bestand downloaden.</p>
                    <p>De laatste mogelijkheid die de gebruiker heeft, is het toevoegen van een vraag. Hiervoor klikt hij op de “Voeg vraag toe” knop die een kleiner venster opent. Hier kan men een competentie uit een keuzelijst selecteren en een vraag in een tekstvak typen. De vraag wordt dan aan de geselecteerd competentie toegevoegd. Hiervoor wordt de pagina wel vernieuwd en verdwijnt de selectie van vragen.</p>
                </div>
            </div>
    </section>
    <section>
        <div class="container">
            <div class="page-header" id="interview">
                <h1>Interview</h1>
            </div>
        </div>
        <div class="container" id="interview-form">
            <?php require '../app/views/JobFunctionsView.php'; ?>
            <!-- insert views -->
         </div>
        <div class="container">
            <div class="row">
                <button class="btn btn-primary hidden pull-right" id="modal-report-button">Rapport</button>
                <button class="btn btn-primary hidden pull-right" id="show-all-button" onclick="showAll()">Laat alles zien</button>
                <button class="btn btn-primary hidden" id="add-question-button">Voeg vraag toe</button>
            </div>
            <!-- Modal Report -->
            <div class="modal fade" id="report-modal" role="dialog" aria-labelledby="report-label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="report-label">Rapport</h4>
                        </div>
                        <div class="modal-body" id="report-body">
                            <!-- Fetch questions for report-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
                            <button type="button" class="btn btn-primary" id="get-report-button">Download PDF</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Modal Add question-->
            <div class="modal fade" id="add-question-modal" role="dialog" aria-labelledby="add-question-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="add-question-label">Voeg een niewe vraag toe.</h4>
                        </div>
                        <div class="modal-body">
                            <form id="form-add-question" name="form-add-question">
                                <div class="form-group">
                                    <h2>Selecteer hier een competentie.</h2>
                                    <select class="form-control" id="competence-select" name="competence-select">
                                        <option selected disabled hidden value=''></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="new-question" class="control-label">Niewe vraag:</label>
                                    <textarea class="form-control" id="new-question" name="question-text"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
                            <button type="button" class="btn btn-primary" id="send-question-button" type="submit" onclick="sendQuestion()">Voeg Toe</button>
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
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div>
                <div class="col-xs-12 col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div>
            </div>
    </section>
    <!-- Local javascript -->
    <!-- Dit moet hier geplaatst worden anders werkt affix navbar niet, vanwege timing inlezen js file -->
    </body>
    <script type="text/javascript" src="js/affix.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
</html>

