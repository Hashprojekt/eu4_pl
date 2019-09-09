<?

if($_GET['u']!=''){
   if(($user['id']!='1')&&($user['usuwanie']!='1')){
   echo wiadomosc("Niemasz nadanych praw do usuwania");
   }
   else{
   $sql->mysql_delete("miasta_strony", array('id'=>$_GET['u']) );
   echo wiadomosc("Podstrona miasta zosta³a usuniêta!");
   }
}

if($_POST['nazwa2']!=''){




if(($user['id']!='1')&&($user['edycja']!='1')){
echo wiadomosc("Niemasz nadanych praw do edytowania");
}
else{
$danekina = $sql->mysql_get("miasta_strony", array("id"=>$_POST['nid']) );
$dir = "foto_miasta/";
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

$sql->mysql_update("miasta_strony", array("nazwa"=>$_POST['nazwa2'], "lokalizacja"=>$_POST['lokalizacja'], "opis"=>$_POST['opis2'], "zdjecie"=>$foto, "kategoria"=>$_POST['kat']), array("id"=>$_POST['nid']) );
echo wiadomosc("Podstrona miasta zosta³a edytowana");
}





}


if($_POST['nazwa']!=''){

   if(($user['id']!='1')&&($user['edycja']!='1')){
   echo wiadomosc("Niemasz nadanych praw do edytowania");
   }
   else{
      $dir = "foto_miasta/";
      $file = $_FILES['file']['tmp_name'];
      $file_name = $_FILES['file']['name'];
      $ext = str_replace('.', '', substr($file_name, -4));
      if(($file_name!='')&&(($ext=='jpg')||($ext=='jpeg')||($ext=='gif')||($ext=='png'))){
      $file_name = preg_replace('/[^a-z0-9_\-\.]/i', '_', "$file_name");
      move_uploaded_file($file, $dir.$file_name);
      chmod($dir.$file_name, 0666);
      $foto = $file_name;
      }

      $sql->mysql_insert("miasta_strony", array("nazwa"=>$_POST['nazwa'], "lokalizacja"=>$_POST['lokalizacja'], "opis"=>$_POST['opis'], "zdjecie"=>$foto, "kategoria"=>$_POST['kat']) );
      echo wiadomosc("Podstrona miasta zosta³a dopisana");
   }
}


if($_GET['e']==''){
?>




<form action="index.php?admin=miasta_strony" method="POST" enctype="multipart/form-data">
<b>Dodaj now± podstronê:</b><br>
<br>

Kategoria dla podstrony: <select name="kat" size="1">
<?
$zapytanie = "SELECT * FROM ".PREFIX."miasta_kategorie";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj)){
echo '<option value="'.$wiersz['id'].'">'.$wiersz['nazwa'].'</option>';
}
?>
</select><br><br>
Nazwa: <input type="text" name="nazwa"><br><br>
Lokalizacja:



<select name="lokalizacja<? if($user['id']!='1'){ echo '_no'; } ?>" size="1"<? if($user['id']!='1'){ echo ' DISABLED'; } ?>>
<?
$zapytanie = "SELECT * FROM ".PREFIX."miasta";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj)){
echo '<option value="'.$wiersz['id'].'"'.(($user['miasto']==$wiersz['id']) ? ' selected' : '').'>'.$wiersz['nazwa'].'</option>';
}
?>
</select>

<? if($user['id']!='1'){
echo '<input type="hidden" name="lokalizacja" value="'.$user['miasto'].'">'; }
?>



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

$zapytanie = "SELECT * FROM ".PREFIX."miasta_strony";
if($user['id']!='1'){
$zapytanie = "SELECT * FROM ".PREFIX."miasta_strony WHERE lokalizacja=".$user['miasto'];
}
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{

echo '
    <tr>
      <td width="50%"><b>'.$wiersz['nazwa'].'</b></td>
      <td width="25%" align="center"><a href="index.php?admin=miasta_strony&e='.$wiersz['id'].'">'.png('templates/default/img/ico/mRedo32.png', 16, 16).'</a></td>
      <td width="25%" align="center"><a href="index.php?admin=miasta_strony&u='.$wiersz['id'].'" onclick="return potwierdzenie(\'Czy na pewno usun±æ to kino?\')">'.png('templates/default/img/ico/mStop32.png', 16, 16).'</a></td>
    </tr>
';

}

?>
 </table>

</div>

<?
if($_GET['e']!=''){

$danekina = $sql->mysql_get("miasta_strony", array("id"=>$_GET['e']) );

if(($user['id']!='1')&&($danekina['lokalizacja']!=$user['miasto'])){
echo wiadomosc("Mo¿esz edytowaæ strony tylko w swoim mie¶cie");
}
else{

echo '
<form action="index.php?admin=miasta_strony" method="POST" enctype="multipart/form-data">
Nazwa kina: <input type="text" name="nazwa2" value="'.$danekina['nazwa'].'"><br><br>
<input type="hidden" name="nid" value="'.$_GET['e'].'">


Kategoria dla podstrony: <select name="kat" size="1">';

$zapytanie = "SELECT * FROM ".PREFIX."miasta_kategorie";
$wykonaj = mysql_query($zapytanie);
   while($wiersz = mysql_fetch_array($wykonaj)){
   if($danekina['kategoria']==$wiersz['id']){
   echo '<option value="'.$wiersz['id'].'" selected>'.$wiersz['nazwa'].'</option>';
   }
   else{
   echo '<option value="'.$wiersz['id'].'">'.$wiersz['nazwa'].'</option>';
   }
   }
echo '
</select><br>
Lokalizacja:
<select name="lokalizacja" size="1"'.(($user['id']!='1') ? ' DISABLED' : '').'>';

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
Zdjêcie:<br>';
if($danekina['zdjecie']!=''){
echo 'Aktualne: <img src="foto_miasta/'.$danekina['zdjecie'].'" alt=""><br>';
}

echo '<input type="file" name="file" size="40"><br><br>
<input type="submit" value="Edytuj" class="button1">

</form>';
}
}


?>
