<?
$zapytanie = "SELECT * FROM ".PREFIX."kina WHERE id='".$nnn."'";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
if($wiersz['zdjecie']!=''){
$obrazek = '<img src="foto_kina/'.$wiersz['zdjecie'].'" alt="" align="left" style="padding: 10px;">';
}
echo '<h1>'.$wiersz['nazwa'].'</h1>'.$obrazek.$wiersz['opis'].'<br style="clear: both">';
}
?>
