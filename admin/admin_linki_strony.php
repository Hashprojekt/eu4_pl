<?
if($_GET['u']!=''){
$sql->mysql_delete("linki_strony", array('id'=>$_GET['u']) );
echo wiadomosc("Link zosta³ usuniêty!");
}

if($_POST['nazwa2']!=''){
$danekina = $sql->mysql_get("linki_strony", array("id"=>$_POST['nid']) );
$dir = "foto_linki/";
$file = $_FILES['file']['tmp_name'];
$file_name = $_FILES['file']['name'];
$ext = str_replace('.', '', substr($file_name, -4));
if(($file_name!='')&&(($ext=='jpg')||($ext=='jpeg')||($ext=='gif')||($ext=='png'))){
$file_name = preg_replace('/[^a-z0-9_\-\.]/i', '_', "$file_name");
if($danekina['zdjecie']!=''){
unlink($dir.$danekina['zdjecie']);
}
move_uploaded_file($file, $dir.$file_name);
chmod($dir.$file_name, 0666);
$foto = $file_name;
}
else{
$foto = $danekina['zdjecie'];
}

$sql->mysql_update("linki_strony", array("nazwa"=>$_POST['nazwa2'], "opis"=>$_POST['opis2'], "zdjecie"=>$foto, "kategoria"=>$_POST['kat']), array("id"=>$_POST['nid']) );
echo wiadomosc("Link zosta³ edytowany");


}


if($_POST['nazwa']!=''){
$dir = "foto_linki/";
$file = $_FILES['file']['tmp_name'];
$file_name = $_FILES['file']['name'];
$ext = str_replace('.', '', substr($file_name, -4));
if(($file_name!='')&&(($ext=='jpg')||($ext=='jpeg')||($ext=='gif')||($ext=='png'))){
$file_name = preg_replace('/[^a-z0-9_\-\.]/i', '_', "$file_name");
move_uploaded_file($file, $dir.$file_name);
chmod($dir.$file_name, 0666);
$foto = $file_name;
}

$sql->mysql_insert("linki_strony", array("nazwa"=>$_POST['nazwa'], "opis"=>$_POST['opis'], "zdjecie"=>$foto, "kategoria"=>$_POST['kat']) );
echo wiadomosc("Link zosta³ dodany");
}
if($_GET['e']==''){
?>




<form action="index.php?admin=linki_strony" method="POST" enctype="multipart/form-data">
<b>Dodaj nowego linka:</b><br>
<br>
<?
$zapytanie = "SELECT * FROM ".PREFIX."linki";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj)){
echo '<div class="form-kat"><span style="color: #5A5A5A; font-weight: bold">'.$wiersz['nazwa'].'</span><br>';
$a = 1;
$zapytanie2 = "SELECT * FROM ".PREFIX."linki_kategorie";
$wykonaj2 = mysql_query($zapytanie2);
while($wiersz2 = mysql_fetch_array($wykonaj2)){
if($wiersz2['sekcja']==$wiersz['id']){
echo '<input type="radio" name="kat" value="'.$wiersz2['id'].'"'.(($a==1) ? ' checked' : '').'>'.$wiersz2['nazwa'].'<br>';
$a++;
}
}
echo '</div>';
}
?>
<br style="clear: both"><br>
Adres: <input type="text" name="nazwa" size="50"><br><br>


<br><br>
Opis: <br>
<?
require_once("fckeditor/fckeditor.php") ;
$oFCKeditor = new FCKeditor('opis') ;
$oFCKeditor->BasePath	= 'fckeditor/' ;
$oFCKeditor->Value		= '' ;
$oFCKeditor->Height		= 400;
$oFCKeditor->Create() ;
?>
<br>
<br>
Zdjêcie:<br>
<input type="file" name="file" size="40"><br><br>
<input type="submit" value="Dodaj" class="button1">

</form>



<?
}
?>





<div align="center">

  <table border="1" cellpadding="4" cellspacing="4" style="border-collapse: collapse; font-family: Verdana; font-size: 10px" bordercolor="#C0C0C0" width="70%">
<?

$zapytanie = "SELECT * FROM ".PREFIX."linki_strony";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{

echo '
    <tr>
      <td width="50%"><b>'.$wiersz['nazwa'].'</b></td>
      <td width="25%" align="center"><a href="index.php?admin=linki_strony&e='.$wiersz['id'].'">'.png('templates/default/img/ico/mRedo32.png', 16, 16).'</a></td>
      <td width="25%" align="center"><a href="index.php?admin=linki_strony&u='.$wiersz['id'].'" onclick="return potwierdzenie(\'Czy na pewno usun±æ to kino?\')">'.png('templates/default/img/ico/mStop32.png', 16, 16).'</a></td>
    </tr>
';

}

?>
 </table>

</div>

<?
if($_GET['e']!=''){

$danekina = $sql->mysql_get("linki_strony", array("id"=>$_GET['e']) );

echo '
<form action="index.php?admin=linki_strony" method="POST" enctype="multipart/form-data">
Adres linka: <input type="text" name="nazwa2" value="'.$danekina['nazwa'].'"><br><br>
<input type="hidden" name="nid" value="'.$_GET['e'].'">';




$zapytanie = "SELECT * FROM ".PREFIX."linki";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj)){
echo '<div class="form-kat"><span style="color: #5A5A5A; font-weight: bold">'.$wiersz['nazwa'].'</span><br>';
$a = 1;
$zapytanie2 = "SELECT * FROM ".PREFIX."linki_kategorie";
$wykonaj2 = mysql_query($zapytanie2);
while($wiersz2 = mysql_fetch_array($wykonaj2)){
if($wiersz2['sekcja']==$wiersz['id']){
echo '<input type="radio" name="kat" value="'.$wiersz2['id'].'"'.(($wiersz2['id']==$danekina['kategoria']) ? ' checked' : '').'>'.$wiersz2['nazwa'].'<br>';
$a++;
}
}
echo '</div>';
}







echo '<br style="clear: both"><br>
Opis: <br>';

require_once("fckeditor/fckeditor.php") ;
$oFCKeditor2 = new FCKeditor('opis2') ;
$oFCKeditor2->BasePath	= 'fckeditor/' ;
$oFCKeditor2->Value		= $danekina['opis'] ;
$oFCKeditor2->Height		= 400;
$oFCKeditor2->Create() ;


echo '<br>
<br>
Zdjêcie:<br>';
if($danekina['zdjecie']!=''){
echo 'Aktualne: <img src="foto_linki/'.$danekina['zdjecie'].'" alt=""><br>';
}

echo '<input type="file" name="file" size="40"><br><br>
<input type="submit" value="Edytuj" class="button1">

</form>';

?>





<?


}
?>
