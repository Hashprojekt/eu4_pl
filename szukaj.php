<?

require_once("class/define.php");
require_once("class/mysql.class.php");
$sql = new db_mysql('root', '', 'przewodnik');




$szukana = 'bis';
$zap = "SELECT * FROM firmy WHERE nazwa_firmy LIKE '%".$szukana."%'";
$wykonaj = mysql_query($zap);
while($wiersz = mysql_fetch_array($wykonaj))
{
print '<a href="index.php"><b>'.$wiersz['nazwa_firmy'].'</b> - '.$wiersz['miasto'].' '.$wiersz['kod'].', ul. '.$wiersz['ulica'].' '.$wiersz['lokal'].'</a><br />';
}
 	

$sql->db_close();
?>