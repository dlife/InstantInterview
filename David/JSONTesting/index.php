<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 20/05/2015
 * Time: 19:41
 */

/*
 *
 * $data = array(
    'userID'      => 'a7664093-502e-4d2b-bf30-25a2b26d6021',
    'itemKind'    => 0,
    'value'       => 1,
    'description' => 'Boa saudaÁ„o.',
    'itemID'      => '03e76d0a-8bab-11e0-8250-000c29b481aa'
);

$json = json_encode($data);

$client = new Zend_Http_Client($uri);
$client->setRawData($json, 'application/json')->request('POST');
 *
 */

/*
 * http://stackoverflow.com/questions/10955017/sending-json-to-php-using-ajax
 */



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
    <?php
        $t = time();
        echo(date("Y-m-d_H:i:s",$t));
    ?>
</body>
</html>