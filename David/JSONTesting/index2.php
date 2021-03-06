<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 20/05/2015
 * Time: 20:42
 */

// test sending JSON *FROM* the server

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title></title>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script language="javascript">
        function postfetchdata() {
            if (document.getElementById("divtoreplace") != null) {
                document.getElementById("divtoreplace").innerHTML = "";
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
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    // receiving from the php page
                    var myArr = JSON.parse(xmlhttp.responseText);
                    displayArray(myArr);
                }
            }
            // actually make the call
            xmlhttp.open("GET", "postfetchdata.php", true);
            xmlhttp.send();
        }

        // display the array in the div with jQuery
        function displayArray(arr) {
            var out = "";
            var i;
            for(i = 0; i < arr.length; i++) {
                out += arr[i] + '</br>';
            }
            document.getElementById("divtoreplace").innerHTML = out;
        }
    </script>
</head>
<body>
    <button onclick="fetchdata()">Click me</button>
    <div id="divtoreplace">replace this text</div>
</body>
</html>