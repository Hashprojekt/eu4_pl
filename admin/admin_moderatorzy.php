<?
if($user['id']!='1'){ die(); }


if($_POST['login']!=''){
$sql->mysql_insert("admins", array("login"=>$_POST['login'], "haslo"=>$_POST['haslo'], "email"=>$_POST['email'], "miasto"=>$_POST['lokalizacja'], "zapis"=>$_POST['mz'], "edycja"=>$_POST['me'], "usuwanie"=>$_POST['mu']));
echo wiadomosc("Konto zosta³o dodane");

}


if($_POST['login2']!=''){

$sql->mysql_update("admins", array("login"=>$_POST['login2'], "haslo"=>$_POST['haslo'], "email"=>$_POST['email'], "miasto"=>$_POST['lokalizacja'], "zapis"=>$_POST['mz'], "edycja"=>$_POST['me'], "usuwanie"=>$_POST['mu']), array("id"=>$_POST['nid']) );
echo wiadomosc("Konto zosta³o edytowane");

}

if($_GET['u']!=''){

if($_GET['u']=='1'){ die('konta admina nie mo¿na usun±æ!'); }
$sql->mysql_delete("admins", array('id'=>$_GET['u']) );
echo wiadomosc("Konto zosta³o usuniête");
}

?>












<div align="center">

  <table border="1" cellpadding="4" cellspacing="4" style="border-collapse: collapse; font-family: Verdana; font-size: 10px" bordercolor="#C0C0C0" width="80%">
<?

$zapytanie = "SELECT * FROM ".PREFIX."admins";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{

if($wiersz['id']!='1'){
$fff = '<a href="index.php?admin=moderatorzy&u='.$wiersz['id'].'" onclick="return potwierdzenie(\'Czy na pewno usun&#177;æ to konto?\')">'.png('templates/default/img/ico/mStop32.png', 16, 16).'</a>';
}
echo '
    <tr>
      <td width="25%"><b>'.$wiersz['login'].'</b></td>
      <td width="25%"><b>'.miasto($wiersz['miasto']).'</b></td>


      <td width="25%" align="center"><a href="index.php?admin=moderatorzy&e='.$wiersz['id'].'">'.png('templates/default/img/ico/mRedo32.png', 16, 16).'</a></td>
      <td width="25%" align="center">'.$fff.'</td>
    </tr>
';

}

?>
 </table>

</div>




<?
if($_GET['e']!=''){

$danekina = $sql->mysql_get("admins", array("id"=>$_GET['e']) );

echo '
<h3>Edycja moderatora</h3>
<form action="index.php?admin=moderatorzy" method="POST" enctype="multipart/form-data">

Login: <input type="text" name="login2" value="'.$danekina['login'].'"><br>
Has³o: <input type="text" name="haslo" value="'.$danekina['haslo'].'"><br>
email: <input type="text" name="email" value="'.$danekina['email'].'"><br>

<br>
Miasto: <input type="hidden" name="nid" value="'.$_GET['e'].'">
<select name="lokalizacja" size="1">';

$zapytanie = "SELECT * FROM ".PREFIX."miasta";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj)){
if($danekina['miasto']==$wiersz['id']){
echo '<option value="'.$wiersz['id'].'" selected>'.$wiersz['nazwa'].'</option>';
}
else{
echo '<option value="'.$wiersz['id'].'">'.$wiersz['nazwa'].'</option>';
}
}


echo '</select>

<br>

<br><b>Prawa moderatora</b><br>

<input type="checkbox" name="mz" value="1"'.(($danekina['zapis']==1) ? ' checked' : '').'> mo¿liwo¶æ zapisu <br>
<input type="checkbox" name="me" value="1"'.(($danekina['edycja']==1) ? ' checked' : '').'> mo¿liwo¶æ edycji <br>
<input type="checkbox" name="mu" value="1"'.(($danekina['usuwanie']==1) ? ' checked' : '').'> mo¿liwo¶æ usuwania <br><br>



<input type="submit" value="Edytuj" class="button1">

</form>';
}
?>

<h3>Dodaj nowego moderatora</h3>

<?
echo '
<form action="index.php?admin=moderatorzy" method="POST" enctype="multipart/form-data">

Login: <input type="text" name="login"><br>
Has³o: <input type="text" name="haslo"><br>
email: <input type="text" name="email"><br>

<br>
Miasto:
<select name="lokalizacja" size="1">';
$zapytanie = "SELECT * FROM ".PREFIX."miasta";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj)){
echo '<option value="'.$wiersz['id'].'">'.$wiersz['nazwa'].'</option>';
}
echo '</select>

<br>

<br><b>Prawa moderatora</b><br>

<input type="checkbox" name="mz" value="1" checked> mo¿liwo¶æ zapisu <br>
<input type="checkbox" name="me" value="1" checked> mo¿liwo¶æ edycji <br>
<input type="checkbox" name="mu" value="1" checked> mo¿liwo¶æ usuwania <br><br>



<input type="submit" value="Dodaj" class="button1">

</form>';
?>


