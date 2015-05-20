<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 20/05/2015
 * Time: 20:42
 */

// testing sending JSON *TO* the server

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title></title>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script language="javascript">

        var postData =
        {
            "1": true,
            "2": false,
            "3": true,
            "4": false
        };
        var dataString = JSON.stringify(postData);


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
            // actually make the call
            xmlhttp.open("GET", "fetchquestions.php?q=" + id.replace('questionssection',''), true);
            xmlhttp.send();
        }

        // This just displays the first parameter passed to it
        // in an alert.
        function show(json) {
            alert(json);
        }

        function run() {
            $.getJSON(
                "data.php", // The server URL
                { id: 567 }, // Data you want to pass to the server.
                show // The function to call on completion.
            );
        }

        function run2() {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "returndata.php",
                data: {myData:postData},
                success: function(data){
                    alert(data);
                },
                error: function(e){
                    console.log(e.message);
                }
            });
        }
    </script>
</head>
<body>
<button onclick="run2()">Click me</button>
</body>
</html>