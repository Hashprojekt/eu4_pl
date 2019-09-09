<?
if($_POST['miasto']!=''){
$ile = $sql->mysql_count("miasta_kategorie", array('nazwa'=>$_POST['miasto']));
if($ile>0){ echo wiadomosc("Istnieje ju¿ taka kategoria w bazie danych"); }
else{
mysql_query("INSERT INTO `".PREFIX."miasta_kategorie` ( `id` , `nazwa` )
VALUES (
NULL , '".$_POST['miasto']."'
);
");
echo wiadomosc("Kategoria zosta³a dodana"); }
}

if($_POST['miasto2']!=''){
$sql->mysql_update("miasta_kategorie", array('nazwa'=>$_POST['miasto2']), array('id'=>$_POST['nid']) ); echo wiadomosc("Kategoria zosta³a edytowana");
}
if($_GET['u']!=''){
if($_GET['u']==0){
echo wiadomosc("Tej kategorii nie mo¿na usun±æ!");
}
else{
$sql->mysql_delete("miasta_kategorie", array('id'=>$_GET['u']) );
echo wiadomosc("Kategoria zosta³a usuniêta!");
}
}
if($_GET['e']==''){
?>

<form action="index.php?admin=kat" method="POST">
Dodaj now± kategoriê: <input type="text" name="miasto"> <input type="submit" value="Dodaj">
</form><br>
<?
}
?>
<div align="center">
  <table border="1" cellpadding="4" cellspacing="4" style="border-collapse: collapse; font-family: Verdana; font-size: 10px" bordercolor="#C0C0C0" width="70%">
<?

$zapytanie = "SELECT * FROM ".PREFIX."miasta_kategorie WHERE id!=0";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
echo '
    <tr>
      <td width="50%"><b>'.$wiersz['nazwa'].'</b></td>
      <td width="25%" align="center"><a href="index.php?admin=kat&e='.$wiersz['id'].'">'.png('templates/default/img/ico/mRedo32.png', 16, 16).'</a></td>
      <td width="25%" align="center"><a href="index.php?admin=kat&u='.$wiersz['id'].'" onclick="return potwierdzenie(\'Czy na pewno usun±æ tê stronê?\')">'.png('templates/default/img/ico/mStop32.png', 16, 16).'</a></td>
    </tr>
';

}

?>
 </table>

</div>
<?

if($_GET['e']!=''){
$dane = $sql->mysql_get("miasta_kategorie", array('id'=>$_GET['e']) );
echo '<form action="index.php?admin=kat" method="POST"><input type="hidden" name="nid" value="'.$_GET['e'].'">
Edycja strony: <input type="text" name="miasto2" value="'.$dane['nazwa'].'"> <input type="submit" value="Edytuj">
</form>';
}
?>
