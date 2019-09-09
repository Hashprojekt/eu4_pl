<?

if($_POST['h']==1){


$zapytanie = "SELECT * FROM ".PREFIX."konfiguracja";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
mysql_query("UPDATE `".PREFIX."konfiguracja` SET `ustawienie` = '".$_POST[$wiersz['id']]."' WHERE `id` = '".$wiersz['id']."' LIMIT 1;");
}




}




?>



<form action="index.php?admin=konfiguracja" method="POST">
<?
$zapytanie = "SELECT * FROM ".PREFIX."konfiguracja";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
echo '<b>'.$wiersz['id'].': </b> <input type="text" name="'.$wiersz['id'].'" value="'.$wiersz['ustawienie'].'" size="60"><br><br>
';

}

?><input type="hidden" value="1" name="h">
<br><input type="submit" value="zachowaj zmiany" class="button1">







</form>
