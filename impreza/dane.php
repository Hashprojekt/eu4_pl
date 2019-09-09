<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>dane</title>
</head>
<body>
    <?php
    $dane = $_POST["imie"];
    $transport = $_POST["transport"];
    $miejsce = $_POST["miejsce"];
    $zbiorka = $_POST["zbiorka"];
    $muza = $_POST["muza"];
    $tel = $_POST["tel"];
    $dzielnica = $_POST["dzielnica"];
    echo("Witaj ".$dane ."<br>");
    echo ("transport ".$transport."<br>");
    echo ("dzielnica ".$dzielnica."<br>");
    echo ("miejsce w aucie ".$miejsce."<br>");
    echo ("zbiórka ".$zbiorka."<br>");
    echo ("preferowana muza ".$muza."<br>");
    echo ("uwagi ".$uwagi."<br>");

    echo (", br tel: ".$tel."<br>");
    $message = "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"><html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"></head><body style=\"font-size: 12pt; font-family: Arial;\" bgcolor=\"#4f7a58\">Imie: $dane\n transport $transport\n, dzielnica $dzielnica\n miejsce w aucie $miejsce\n zbiórka $zbiorka\n  muzyka $muza, br tel: $tel\n uwagi: $uwagi</body></html>";

    mail("konfeusz@eu4.pl","Impreza","$message","Content-type: text/html; charset=UTF-8")
    or die('Nie udało się wysłać wiadomości');
    // wyświetlenie komunikatu w przypadku powodzenia
    echo "<div align=\"center\"><strong>Zostałeś zabukowany $dane!<br>Czekamy na Was niecierpliwie. Sałatka już się kroi.</strong></div>";

    ?>
Do zajebiaszczej imprezy zostało <div id="czas"></div>
    <script>
    function czasDoWydarzenia(rok, miesiac, dzien, godzina, minuta, sekunda, milisekunda)
    {
    	var aktualnyCzas = new Date();
    	var dataWydarzenia = new Date(rok, miesiac, dzien, godzina, minuta, sekunda, milisekunda);
    	var pozostalyCzas = dataWydarzenia.getTime() - aktualnyCzas.getTime();

    	if (pozostalyCzas > 0)
    	{
    		var s = pozostalyCzas / 1000;	// sekundy
    		var min = s / 60;				// minuty
    		var h = min / 60;				// godziny

    		var sLeft = Math.floor(s  % 60);	// pozostało sekund
    		var minLeft = Math.floor(min % 60);	// pozostało minut
    		var hLeft = Math.floor(h);			// pozostało godzin

    		if (minLeft < 10)
    		  minLeft = "0" + minLeft;
    		if (sLeft < 10)
    		  sLeft = "0" + sLeft;

    		return hLeft + " godzin : " + minLeft + " minut, oraz " + sLeft +" sekund";
    	}
    	else
    		return "Bum bum bum! i jedziemy ;)";
    }

    window.onload = function()
    {
    	idElement = "czas";
    	document.getElementById(idElement).innerHTML = czasDoWydarzenia(2018, 01, 06, 18, 0, 0, 0);
    	setInterval("document.getElementById(idElement).innerHTML = czasDoWydarzenia(2018, 00, 06, 18, 0, 0, 0)", 1000);
    };
    </script>
</body>
</html>
