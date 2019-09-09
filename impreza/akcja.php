<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>impreza 2</title>
</head>
   <?php
    $hasloW = $_POST['haslo'];
    if ($hasloW === "spieta swinka"){
        echo("<form action=\"dane.php\" method=\"post\">");
        echo("podaj imię:<input type=\"text\" name=\"imie\" value=\"imię\" size\"50\" ><br />");
        include 'formularz.html';

        echo("<input type=\"submit\" value=\"Wyślij\" name=\"submit\" />");
        echo("</form>");
    }
    ?>
</body>
</html>
