

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-2" />
<title>Cokolwiek</title>
</head>
<body>
<?

$db = mysql_connect( 'localhost', 'eu4_taoeu4', '7kazik3');
mysql_select_db('eu4_taoeu4', $db);
mysql_query("SET CHARSET 'utf-8'", $db);

$result = mysql_query('SELECT * FROM kategorie');
$asd = mysql_result($result, 0, 'asd');

echo $asd;

?>
</body>
</html> 

