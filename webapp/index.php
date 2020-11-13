<?php
    if(isset($_GET['userInput'])) {
        $curlVar = curl_init();
        curl_setopt($curlVar, CURLOPT_URL, $_GET['userInput']);
        curl_setopt($curlVar, CURLOPT_HEADER, 0);
        curl_exec($curlVar);
        curl_close($curlVar);
    }

?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Fetch a URL</title>
    </head>

    <body>
        <h2>Fetch a URL</h2>

        <p>
            This functionality is for fethcing an URL for example http://www.google.com (note: this PHP script is still in the works).
        </p>
        <div>
            <form method="GET" action="#">
            <span>URL: <input name="userInput" type="text" placeholder="https://www.google.com"/><input type="submit" /></span>
            </form>
        </div>
    </body>
</html>
