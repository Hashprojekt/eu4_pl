<?
if($_GET['u']!=''){
$sql->mysql_delete("kina", array('id'=>$_GET['u']) );
echo wiadomosc("Kino zosta這 usuni皻e!");
}

if($_POST['nazwa2']!=''){
$danekina = $sql->mysql_get("kina", array("id"=>$_POST['nid']) );
$dir = "foto_kina/";
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

$sql->mysql_update("kina", array("nazwa"=>$_POST['nazwa2'], "lokalizacja"=>$_POST['lokalizacja'], "opis"=>$_POST['opis2'], "zdjecie"=>$foto), array("id"=>$_POST['nid']) );
echo wiadomosc("Kino zosta這 edytowane");


}


if($_POST['nazwa']!=''){
$dir = "foto_kina/";
$file = $_FILES['file']['tmp_name'];
$file_name = $_FILES['file']['name'];
$ext = str_replace('.', '', substr($file_name, -4));
if(($file_name!='')&&(($ext=='jpg')||($ext=='jpeg')||($ext=='gif')||($ext=='png'))){
$file_name = preg_replace('/[^a-z0-9_\-\.]/i', '_', "$file_name");
move_uploaded_file($file, $dir.$file_name);
chmod($dir.$file_name, 0666);
$foto = $file_name;
}

$sql->mysql_insert("kina", array("nazwa"=>$_POST['nazwa'], "lokalizacja"=>$_POST['lokalizacja'], "opis"=>$_POST['opis'], "zdjecie"=>$foto) );
echo wiadomosc("Kino zosta這 dopisane");
}
if($_GET['e']==''){
?>




<form action="index.php?admin=kina" method="POST" enctype="multipart/form-data">
Nazwa kina: <input type="text" name="nazwa"><br><br>

Lokalizacja:
<select name="lokalizacja" size="1">
<?
$zapytanie = "SELECT * FROM ".PREFIX."miasta";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj)){
echo '<option value="'.$wiersz['id'].'">'.$wiersz['nazwa'].'</option>';
}
?>
</select>

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
Zdj璚ie:<br>
<input type="file" name="file" size="40"><br><br>
<input type="submit" value="Dodaj">

</form>



<?
}
?>





<div align="center">

  <table border="1" cellpadding="4" cellspacing="4" style="border-collapse: collapse; font-family: Verdana; font-size: 10px" bordercolor="#C0C0C0" width="70%">
<?

$zapytanie = "SELECT * FROM ".PREFIX."kina";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{

echo '
    <tr>
      <td width="50%"><b>'.$wiersz['nazwa'].'</b></td>
      <td width="25%" align="center"><a href="index.php?admin=kina&e='.$wiersz['id'].'">'.png('templates/default/img/ico/mRedo32.png', 16, 16).'</a></td>
      <td width="25%" align="center"><a href="index.php?admin=kina&u='.$wiersz['id'].'" onclick="return potwierdzenie(\'Czy na pewno usun望 to kino?\')">'.png('templates/default/img/ico/mStop32.png', 16, 16).'</a></td>
    </tr>
';

}

?>
 </table>

</div>

<?
if($_GET['e']!=''){

$danekina = $sql->mysql_get("kina", array("id"=>$_GET['e']) );

echo '
<form action="index.php?admin=kina" method="POST" enctype="multipart/form-data">
Nazwa kina: <input type="text" name="nazwa2" value="'.$danekina['nazwa'].'"><br><br>
Lokalizacja: <input type="hidden" name="nid" value="'.$_GET['e'].'">
<select name="lokalizacja" size="1">';

$zapytanie = "SELECT * FROM ".PREFIX."miasta";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj)){
if($danekina['lokalizacja']==$wiersz['id']){
echo '<option value="'.$wiersz['id'].'" selected>'.$wiersz['nazwa'].'</option>';
}
else{
echo '<option value="'.$wiersz['id'].'">'.$wiersz['nazwa'].'</option>';
}
}


echo '</select>

<br><br>
Opis: <br>';

require_once("fckeditor/fckeditor.php") ;
$oFCKeditor2 = new FCKeditor('opis2') ;
$oFCKeditor2->BasePath	= 'fckeditor/' ;
$oFCKeditor2->Value		= $danekina['opis'] ;
$oFCKeditor2->Height		= 400;
$oFCKeditor2->Create() ;


echo '<br>
<br>
Zdj璚ie:<br>';
if($danekina['zdjecie']!=''){
echo 'Aktualne: <img src="foto_kina/'.$danekina['zdjecie'].'" alt=""><br>';
}

echo '<input type="file" name="file" size="40"><br><br>
<input type="submit" value="Edytuj">

</form>';
}
?>







