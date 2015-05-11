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

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title></title>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
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
            }
            // actually call to the data
            xmlhttp.open("GET", "fetchquestions.php?v=" + id, true);
            xmlhttp.send();



        }

        $(document ).ready(function() {
            // hide all question sections
            $('.questionsection').hide();

            // one by one load the data and show them again
            $('[id^="questionssection"]').each(function(i, obj) {
                fetchdata(obj.id);
                alert(obj.id);
            });
        });
    </script>
</head>
<body>>
    <?php require 'fetchcompetences.php'; ?>
</body>
</html>