<html>
<head>
    <script>
        function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
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
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                    }
                }

                // actually call to the data
                xmlhttp.open("GET","getdata.php?q="+str,true);
                xmlhttp.send();
            }
        }
    </script>
</head>
<body>

<form>
    <select name="users" onchange="showUser(this.value)">
        <option value="">Select a person:</option>
        <option value="1">Peter Griffin</option>
        <option value="2">Lois Griffin</option>
        <option value="3">Joseph Swanson</option>
        <option value="4">Glenn Quagmire</option>
    </select>
    <br/>
    <input id="chkBike" type="checkbox" name="vehicle" value="Bike" onchange="showUser(this.value)"/>
    <label for="chkBike">I have a bike</label></br>
    <input id="chkCar" type="checkbox" name="vehicle" value="Car" onchange="showUser(this.value)"/>
    <label for="chkCar">I have a car</label>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>

</body>
</html>