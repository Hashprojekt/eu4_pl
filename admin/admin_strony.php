<?
if($_POST['miasto']!=''){
$ile = $sql->mysql_count("strony", array('nazwa'=>$_POST['miasto']));
if($ile>0){ echo wiadomosc("Istnieje ju¿ takie miasto w bazie danych"); }
else{ $sql->mysql_insert("strony", array('nazwa'=>$_POST['miasto'], 'opis'=>$_POST['opis'])); echo wiadomosc("Strona zosta³a dodana"); }
}

if($_POST['miasto2']!=''){
$sql->mysql_update("strony", array('nazwa'=>$_POST['miasto2'], 'opis'=>$_POST['opis2']), array('id'=>$_POST['nid']) ); echo wiadomosc("Strona zosta³a edytowana");
}
if($_GET['u']!=''){
$sql->mysql_delete("strony", array('id'=>$_GET['u']) );
echo wiadomosc("Strona zosta³a usuniêta!");
}
if($_GET['e']==''){
?>

<form action="index.php?admin=strony" method="POST">
Dodaj stronê, tytu³: <input type="text" name="miasto"><br>
Opis:<br>




<?
require_once("fckeditor/fckeditor.php") ;
$oFCKeditor = new FCKeditor('opis') ;
$oFCKeditor->BasePath	= 'fckeditor/' ;
$oFCKeditor->Value		= '' ;
$oFCKeditor->Height		= 400;
$oFCKeditor->Create() ;
?>





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

$zapytanie = "SELECT * FROM ".PREFIX."strony";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{

echo '
    <tr>
      <td width="50%"><b>'.$wiersz['nazwa'].'</b></td>
      <td width="25%" align="center"><a href="index.php?admin=strony&e='.$wiersz['id'].'">'.png('templates/default/img/ico/mRedo32.png', 16, 16).'</a></td>
      <td width="25%" align="center"><a href="index.php?admin=strony&u='.$wiersz['id'].'" onclick="return potwierdzenie(\'Czy na pewno usun±æ tê stronê?\')">'.png('templates/default/img/ico/mStop32.png', 16, 16).'</a></td>
    </tr>
';

}

?>
 </table>

</div>
<?

if($_GET['e']!=''){
$dane = $sql->mysql_get("strony", array('id'=>$_GET['e']) );
echo '<form action="index.php?admin=strony" method="POST"><input type="hidden" name="nid" value="'.$_GET['e'].'">
Edycja strony: <input type="text" name="miasto2" value="'.$dane['nazwa'].'"><br>
Opis:<br>
';

require_once("fckeditor/fckeditor.php") ;
$oFCKeditor2 = new FCKeditor('opis2') ;
$oFCKeditor2->BasePath	= 'fckeditor/' ;
$oFCKeditor2->Value		= $dane['opis'];
$oFCKeditor2->Height		= 400;
$oFCKeditor2->Create() ;
echo '<br><br>
<input type="submit" value="Edytuj" class="button1">
</form>';









}






?>
