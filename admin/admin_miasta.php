<?
if($_POST['miasto']!=''){

   if(($user['id']!='1')||($user['zapis']!='1')){
    echo wiadomosc("Nie mo¿esz dodawaæ miast");
   }
   else{
$ile = $sql->mysql_count("miasta", array('nazwa'=>$_POST['miasto']));
if($ile>0){ echo wiadomosc("Istnieje ju¿ takie miasto w bazie danych"); }
else{ $sql->mysql_insert("miasta", array('nazwa'=>$_POST['miasto'], 'opis'=>$_POST['opis'])); echo wiadomosc("Miasto zosta³o dodane"); }
   }

}

if($_POST['miasto2']!=''){

   if(($user['id']!='1')||($user['edycja']!='1')){
    echo wiadomosc("Nie mo¿esz edytowaæ miast");
   }
   else{
   $sql->mysql_update("miasta", array('nazwa'=>$_POST['miasto2'], 'opis'=>$_POST['opis2']), array('id'=>$_POST['nid']) ); echo wiadomosc("Miasto zosta³o edytowane");
   }

}
if($_GET['u']!=''){

if($user['id']!='1'){ die('Nie mo¿esz usuwaæ miast!'); }

$sql->mysql_delete("miasta", array('id'=>$_GET['u']) );
echo wiadomosc("Miasto zosta³o usuniête!");
}
if($_GET['e']==''){
?>

<form action="index.php?admin=miasta" method="POST">
Dodaj miasto: <input type="text" name="miasto"><br>
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

$zapytanie = "SELECT * FROM ".PREFIX."miasta";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{

echo '
    <tr>
      <td width="50%"><b>'.$wiersz['nazwa'].'</b></td>
      <td width="25%" align="center"><a href="index.php?admin=miasta&e='.$wiersz['id'].'">'.png('templates/default/img/ico/mRedo32.png', 16, 16).'</a></td>
      <td width="25%" align="center"><a href="index.php?admin=miasta&u='.$wiersz['id'].'" onclick="return potwierdzenie(\'Czy na pewno usun±æ to miasto?\')">'.png('templates/default/img/ico/mStop32.png', 16, 16).'</a></td>
    </tr>
';

}

?>
 </table>

</div>
<?

if($_GET['e']!=''){
$dane = $sql->mysql_get("miasta", array('id'=>$_GET['e']) );
echo '<form action="index.php?admin=miasta" method="POST"><input type="hidden" name="nid" value="'.$_GET['e'].'">
Edycja miasta: <input type="text" name="miasto2" value="'.$dane['nazwa'].'"><br>
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
