<?
if($_POST['miasto']!=''){
$ile = $sql->mysql_count("linki_kategorie", array('nazwa'=>$_POST['miasto']));
if($ile>0){ echo wiadomosc("Istnieje ju¿ taka kategoria w bazie danych"); }
else{
mysql_query("INSERT INTO `".PREFIX."linki_kategorie` ( `id` , `nazwa`, `sekcja` )
VALUES (
NULL , '".$_POST['miasto']."', '".$_POST['sekcja']."'
);
");
echo wiadomosc("Kategoria zosta³a dodana"); }
}

if($_POST['miasto2']!=''){
$sql->mysql_update("linki_kategorie", array('nazwa'=>$_POST['miasto2'], 'sekcja'=>$_POST['sekcja']), array('id'=>$_POST['nid']) ); echo wiadomosc("Kategoria zosta³a edytowana");
}
if($_GET['u']!=''){
if($_GET['u']==0){
echo wiadomosc("Tej kategorii nie mo¿na usun±æ!");
}
else{
$sql->mysql_delete("linki_kategorie", array('id'=>$_GET['u']) );
echo wiadomosc("Kategoria zosta³a usuniêta!");
}
}
if($_GET['e']==''){
?>

<form action="index.php?admin=linki_kat" method="POST">
Dodaj now± kategoriê: <input type="text" name="miasto"> <br>
Dla sekcji: <select name="sekcja" size="1">
<?
$zapytanie = "SELECT * FROM ".PREFIX."linki";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj)){
echo '<option value="'.$wiersz['id'].'">'.$wiersz['nazwa'].'</option>';
}
?>
</select>

<br><br>
<input type="submit" value="Dodaj" class="button1">
</form><br>
<?
}
?>
<div align="center">
  <table border="1" cellpadding="4" cellspacing="4" style="border-collapse: collapse; font-family: Verdana; font-size: 10px" bordercolor="#C0C0C0" width="70%">
<?

$zapytanie = "SELECT * FROM ".PREFIX."linki_kategorie WHERE id!=0";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
echo '
    <tr>
      <td width="50%"><b>'.$wiersz['nazwa'].'</b></td>
      <td width="25%" align="center"><a href="index.php?admin=linki_kat&e='.$wiersz['id'].'">'.png('templates/default/img/ico/mRedo32.png', 16, 16).'</a></td>
      <td width="25%" align="center"><a href="index.php?admin=linki_kat&u='.$wiersz['id'].'" onclick="return potwierdzenie(\'Czy na pewno usun±æ tê stronê?\')">'.png('templates/default/img/ico/mStop32.png', 16, 16).'</a></td>
    </tr>
';

}

?>
 </table>

</div>
<?

if($_GET['e']!=''){
$dane = $sql->mysql_get("linki_kategorie", array('id'=>$_GET['e']) );
echo '<form action="index.php?admin=linki_kat" method="POST"><input type="hidden" name="nid" value="'.$_GET['e'].'">
Edycja kategorii: <input type="text" name="miasto2" value="'.$dane['nazwa'].'"> <br>
z sekcji: <select name="sekcja" size="1">';

$zapytanie = "SELECT * FROM linki";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj)){
echo '<option value="'.$wiersz['id'].'"'.(($dane['sekcja']==$wiersz['id']) ? ' selected' : '').'>'.$wiersz['nazwa'].'</option>';
}



echo '</select><br>
<br>

<input type="submit" value="Edytuj" class="button1">
</form>';
}
?>
