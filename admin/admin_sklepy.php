<?
if($_POST['link']!=''){
$ile = $sql->mysql_count("sklepy_linki", array('nazwa'=>$_POST['nazwa']));
if($ile>0){ echo wiadomosc("Istnieje ju¿ taki link w bazie danych"); }
else{
$sql->mysql_insert("sklepy_linki", array( 'nazwa'=>$_POST['nazwa'], 'opis'=>$_POST['opis'], 'link'=>$_POST['link'], 'kategoria'=>$_POST['kat']));
echo wiadomosc("Link do sklepu zosta³ dodany"); }
}

if($_POST['link2']!=''){
$sql->mysql_update("sklepy_linki", array( 'nazwa'=>$_POST['nazwa'], 'opis'=>$_POST['opis'], 'link'=>$_POST['link2'], 'kategoria'=>$_POST['kat']), array('id'=>$_POST['nid']) ); echo wiadomosc("Sklep zosta³ edytowany");
}
if($_GET['u']!=''){
$sql->mysql_delete("sklepy_linki", array('id'=>$_GET['u']) );
echo wiadomosc("Link do sklepu zosta³ usuniêty");
}
if($_GET['e']==''){
?>

<form action="index.php?admin=sklepy" method="POST">
Link do sklepu: <input type="text" name="link"><br>
Nazwa linka: <input type="text" name="nazwa"><br>
Nazwa kategorii: <input type="text" name="kat"><br>
Krótki opis:<br>
<textarea name="opis"></textarea>
<br><br>
<input type="submit" value="Dodaj" class="button1">
</form><br>
<br>
<?
}
?>

<div align="center">

  <table border="1" cellpadding="4" cellspacing="4" style="border-collapse: collapse; font-family: Verdana; font-size: 10px" bordercolor="#C0C0C0" width="70%">
<?

$zapytanie = "SELECT * FROM ".PREFIX."sklepy_linki";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{

echo '
    <tr>
      <td width="50%"><b>'.$wiersz['nazwa'].'</b></td>
      <td width="25%" align="center"><a href="index.php?admin=sklepy&e='.$wiersz['id'].'">'.png('templates/default/img/ico/mRedo32.png', 16, 16).'</a></td>
      <td width="25%" align="center"><a href="index.php?admin=sklepy&u='.$wiersz['id'].'" onclick="return potwierdzenie(\'Czy na pewno usun±æ ten sklep?\')">'.png('templates/default/img/ico/mStop32.png', 16, 16).'</a></td>
    </tr>
';

}

?>
 </table>

</div>
<?

if($_GET['e']!=''){
$dane = $sql->mysql_get("sklepy_linki", array('id'=>$_GET['e']) );
echo '<form action="index.php?admin=sklepy" method="POST"><input type="hidden" name="nid" value="'.$_GET['e'].'">
Link do sklepu: <input type="text" name="link2" value="'.$dane['link'].'"><br>
Nazwa linka: <input type="text" name="nazwa" value="'.$dane['nazwa'].'"><br>
Nazwa kategorii: <input type="text" name="kat" value="'.$dane['kategoria'].'"><br>
Krótki opis:<br>
<textarea name="opis">'.$dane['opis'].'</textarea>
<br><br>
<input type="submit" value="Edytuj" class="button1">
</form>';









}






?>
