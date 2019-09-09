<?php
session_start();
ob_start();
ob_implicit_flush(0);
include('logi/db.php');

/** 
 * odpytywanie i listing z bazy danych
 * 
 * @author konfeusz@eu4.pl
 * @copyright 2013
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_new.css" />
<title>Strona</title>
</head>
<body>
<?php
$kategorie="SELECT * FROM `kategorie`";
mysql_query('SET NAMES \'utf8\'');
$lista_kat=mysql_query($kategorie);
$ile_kat=mysql_num_rows($lista_kat);
echo "<b>kategorie ($ile_kat):</b><br><br>";
while($lista=mysql_fetch_array($lista_kat))
echo "$lista[1] $lista[3] <br>";


?>
</body>