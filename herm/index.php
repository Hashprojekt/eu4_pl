<!-- ?php include "licznik.php";?--> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?
if (!$lang) {
$lang=pl;
}  else if ($lang='ua');

?>

<html>
<head>
<title>Hermlok</title>
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2">
<meta http-equiv="Creation-date" content="2009-09-26T09:52:50Z">
<meta http-equiv="Reply-to" content="biuro@eu4.pl">
<meta http-equiv="Content-Language" content="pl">
<meta name="Keywords" content="<? include ("$lang/tagi/tagi.inc"); ?>">
<meta name="Description" content="<? include ("$lang/tagi/opis.inc"); ?>">
<meta name="Author" content="Bartosz Siemczyn - eu4.pl">
<meta name="Robots" content="ALL">
<LINK href="js/css.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/galeria.css" type="text/css">
<script type="text/javascript" src="css/galeria.js"></script>
<!-- czy to jest potrzebne??
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="js/lightbox.css" type="text/css" media="screen" /> -->
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<TABLE BORDER="0" align="center" width="1022" cellspacing="3">

<TR>
<!-- TAGI -->
<TD width="1020" height="12" colspan="2" align="left" valign="top" class="pasek">
<table width="100%">
<tr><td width="900" align="left">
jesteś tutaj: <a class="aa"><? include ("$lang/tagi/opis.inc"); ?></a>.;&nbsp;&nbsp;tagi do tej strony: <a class="aa"><? include ("$lang/tagi/tagi.inc"); ?></a> 
</td>
<td width="118" align="right">
<a href="index.php" class="aa">pl</a>&nbsp;,&nbsp;<a href="index.php?lang=ua" class="aa">ua</a>
</td></tr></table>
<!-- koniec pasek -->
</td>
<!-- END tagi -->		
</tr>

<TR bgcolor="#C5C5FF">
<!-- menu baner -->
<TD valign="top" class="aa" height="180" colspan="2" align="center" width="1020">

<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="1020" height="180" id="banner" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="image/banner.swf" />
<param name="quality" value="high" />
<param name="bgcolor" value="#5e6ca2" />
<embed src="image/banner.swf" quality="high" bgcolor="#5e6ca2" width="1020" height="180" name="banner" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
<!-- END menu baner -->
</td>
</tr>

<TR>
<!-- menu lewe -->
<TD width="300" bgcolor="#A3B3E7" valign="top" height="786" align="center">
<table cellpadding="5">
<!-- oddzielenie komorki -->
<!-- promocje -->
<tr><td>
<table width="290" align="center" bgcolor="#7D8AB4" border="0" bordercolor="#6170A3">
<tr>
	<TD valign="top" width="290">
<img src="image/menu.jpg" alt="" border="0">
	</TD>
</tr>
<tr>
	<TD valign="top" width="290" bgcolor="#26378A">
	<div class="promocje">
<? 
include ("$lang/strona/menu.inc")
?>
	</div>
	</TD>
</tr>
</table>
</td></tr>
<!-- reklama -->
<tr><td>
<table width="290" align="center" bgcolor="#7D8AB4" border="0" bordercolor="#6170A3">
<tr>
	<TD valign="top" width="290">
<img src="image/reklama.jpg" alt="" border="0">
	</TD>
</tr>
<tr>
	<TD valign="top" width="290" bgcolor="#26378A">
	<div class="promocje">
<? 
include ("image/reklama.inc")
?>
	</div>
	</TD>
</tr>
</table>
</td></tr>

<!-- oddzielenie komorki -->
<!-- kontakt -->
<tr><td>
<table width="290" align="center" bgcolor="#7D8AB4" border="1" bordercolor="#6170A3">
<tr>
	<TD valign="top" width="290">
<img src="$lang/image/kontakt.jpg" alt="" border="0">
	</TD>
</tr>
<tr>
	<TD  bgcolor="#26378A">
<div  class="blok">
P.H.U. Hermlok<br>
ul. Koncertowa 9<br>
20-843 Lublin<br>
tel. 081 740 65 43<br>
tel. kom: 662 366 793
</div>
	</TD>
</tr>

<!-- tr>
	<TD width="200" bgcolor="#707070" valign="top">
<br>
Stronę odwiedziło w sumie: <?php echo($dane[0]); ?> osób<br>
Dzisiaj stronę odwiedziło: <?php echo($dane2[1]); ?> gości<br>
Wczoraj <?php echo($dane2[2]); ?> było: <?php echo($dane2[3]); ?><br>

	</TD>
</tr -->
</table>
</td></tr>

</table>
</TD>	

<!-- str wlasciwa -->	

<TD width="715" valign="top" align="center" bgcolor="#D8DCE9">
<!-- opcja menu lewe -->
<div class="inc">
<!-- include --> 
	<?
$url=$ind.".inc";
 if(!isset($ind)) {
            include("$lang/strona/start.inc");
        }
        else {
if(file_exists("$lang/strona/$url"))
{
include ("$lang/strona/$url");
}
else if(file_exists("pliki/$url"))
{
include ("$pliki/$url");
}
else {
print ("zawartosc dla $ind");
}
}


?>
</div>

	</TD>

</TR>
<TR>
<TD width="1020" height="12" colspan="2" align="center" valign="top" class="pasek">Design by <a href="http://www.eu4.pl/portfolio/" target="eu4" class="aa">eu4.pl</a> - Bartosz Siemczyn
</td></tr>
</TABLE>

</body>
</html>