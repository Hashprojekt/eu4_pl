<?

if($_POST['regon']!=''){
$ile = $sql->mysql_count("firmy", array("nazwa_firmy"=>$_POST['regon']) );
if($ile==0){ echo wiadomosc('niema firmy o takiej nazwie'); }
else{ $user2 = $sql->mysql_get("firmy", array("nazwa_firmy"=>$_POST['regon']) ); }
}


if(is_array($user2)){



if($user2['rodzajkonta']==1){





if($_POST['nazwa_firmy']!=''){

$dir = "mapki/";
$file = $_FILES['file']['tmp_name'];
$file_name = $_FILES['file']['name'];
$ext = str_replace('.', '', substr($file_name, -4));


if(($file_name!='')&&(($ext=='jpg')||($ext=='jpeg')||($ext=='gif')||($ext=='png'))){
$file_name = md5($user2['nip']).'.'.$ext;
$file_name = preg_replace('/[^a-z0-9_\-\.]/i', '_', "$file_name");
if($user2['mapka']!=''){
@unlink($dir.$file_name);
}

move_uploaded_file($file, $dir.$file_name);
chmod($dir.$file_name, 0666);
$mmm = $ext;
}
else{
$mmm = $user2['mapka'];
}


$sql->mysql_update("firmy", array("nazwa_firmy"=>$_POST['nazwa_firmy'], "miasto"=>$_POST['miasto'], "kod"=>$_POST['kod'], "ulica"=>$_POST['ulica'],"lokal"=>$_POST['lokal'], "telefon"=>$_POST['telefon'], "www"=>$_POST['www'], "email"=>$_POST['email'], "kluczowe"=>$_POST['kluczowe'], 'kategoria' => $_POST['kategoria'], "opis"=>$_POST['opis'], "mapka"=>$mmm), array("id"=>$user2['id']) );
echo wiadomosc('Wizytówka firmy zosta³a zmieniona');
}
else{

//
$formularzyk = '';
$wykonaj = mysql_query("SELECT * FROM ".PREFIX."firmy_kategorie ORDER BY poz ASC");
while($w111 = mysql_fetch_array($wykonaj))
{
$formularzyk .= '<b>'.$w111['kategoria'].'</b><br>';

$wykonaj2 = mysql_query("SELECT * FROM ".PREFIX."firmy_subkategorie WHERE idkat='".$w111['id']."' ORDER BY poz ASC");
while($w222 = mysql_fetch_array($wykonaj2))
{
if($w222['id']==$user2['kategoria']){
$formularzyk .= '<input type="radio" value="'.$w222['id'].'" name="kategoria" checked> '.$w222['subkategoria'].'<br>';
}
else{
$formularzyk .= '<input type="radio" value="'.$w222['id'].'" name="kategoria"> '.$w222['subkategoria'].'<br>';
}

}

}
//


if($user2['mapka']!=''){
$mapka = '<br><b>Twoja aktualna mapka: </b><br><img src="sites/mapki.php?f='.md5($user2['nip']).'.'.$user2['mapka'].'" alt=""><br>Wybierz inn± poni¿ej, aby zmieniæ<br><br>';
}



$mapka = '<input type="hidden" name="regon" value="'.$user2['regon'].'">'.$mapka;
$tpl->assign('kategorie', $formularzyk);
$tpl->assign( 'nazwa_firmy', $user2['nazwa_firmy']);
$tpl->assign( 'miasto', $user2['miasto']);
$tpl->assign( 'kod', $user2['kod']);
$tpl->assign( 'ulica', $user2['ulica']);
$tpl->assign( 'lokal', $user2['lokal']);
$tpl->assign( 'telefon', $user2['telefon']);
$tpl->assign( 'www', $user2['www']);
$tpl->assign( 'kluczowe', $user2['kluczowe']);
$tpl->assign( 'email', $user2['email']);
$tpl->assign( 'imieinazwisko', $user2['imieinazwisko']);
$tpl->assign( 'nip', $user2['nip']);
$tpl->assign( 'regon', $user2['regon']);
$tpl->assign( 'telefonkontaktowy', $user2['telefonkontaktowy']);
$tpl->assign( 'opis', $user2['opis']);
$tpl->assign( 'MAPKA', $mapka);
$tpl->assign( 'akcja', 'index.php?admin=o_edit');

echo $tpl->display( 'form_edit1.tpl' );





}








}




if($user2['rodzajkonta']==2){






if($_POST['nazwa_firmy']!=''){

$dir = "mapki/";
$file = $_FILES['file']['tmp_name'];
$file_name = $_FILES['file']['name'];
$ext = str_replace('.', '', substr($file_name, -4));


if(($file_name!='')&&(($ext=='jpg')||($ext=='jpeg')||($ext=='gif')||($ext=='png'))){
$file_name = md5($user2['nip']).'.'.$ext;
$file_name = preg_replace('/[^a-z0-9_\-\.]/i', '_', "$file_name");
if($user2['mapka']!=''){
@unlink($dir.$file_name);
}

move_uploaded_file($file, $dir.$file_name);
chmod($dir.$file_name, 0666);
$mmm = $ext;
}
else{
$mmm = $user2['mapka'];
}


////////// logo

$dir = "loga/";
$file = $_FILES['file2']['tmp_name'];
$file_name = $_FILES['file2']['name'];
$ext = str_replace('.', '', substr($file_name, -4));
if(($file_name!='')&&(($ext=='jpg')||($ext=='jpeg')||($ext=='gif')||($ext=='png'))){
$file_name = md5($user2['nip']).'.'.$ext;
$file_name = preg_replace('/[^a-z0-9_\-\.]/i', '_', "$file_name");
if($user2['logo']!=''){
@unlink($dir.$file_name);
}

move_uploaded_file($file, $dir.$file_name);
chmod($dir.$file_name, 0666);
$lll = $ext;
}
else{
$lll = $user2['logo'];
}
///////////


////////// zdjecie 1

$dir = "zdjecia/";
$file = $_FILES['file3']['tmp_name'];
$file_name = $_FILES['file3']['name'];
$ext = str_replace('.', '', substr($file_name, -4));
if(($file_name!='')&&(($ext=='jpg')||($ext=='jpeg')||($ext=='gif')||($ext=='png'))){
$file_name = md5($user2['nip']).'_1.'.$ext;
$file_name = preg_replace('/[^a-z0-9_\-\.]/i', '_', "$file_name");
if($user2['zdjecie1']!=''){
@unlink($dir.$file_name);
}

move_uploaded_file($file, $dir.$file_name);
chmod($dir.$file_name, 0666);
$zzz1 = $ext;
}
else{
$zzz1 = $user2['zdjecie1'];
}
///////////

////////// zdjecie 2

$dir = "zdjecia/";
$file = $_FILES['file4']['tmp_name'];
$file_name = $_FILES['file4']['name'];
$ext = str_replace('.', '', substr($file_name, -4));
if(($file_name!='')&&(($ext=='jpg')||($ext=='jpeg')||($ext=='gif')||($ext=='png'))){
$file_name = md5($user2['nip']).'_2.'.$ext;
$file_name = preg_replace('/[^a-z0-9_\-\.]/i', '_', "$file_name");
if($user2['zdjecie2']!=''){
@unlink($dir.$file_name);
}

move_uploaded_file($file, $dir.$file_name);
chmod($dir.$file_name, 0666);
$zzz2 = $ext;
}
else{
$zzz2 = $user2['zdjecie2'];
}
///////////


////////// zdjecie 3

$dir = "zdjecia/";
$file = $_FILES['file5']['tmp_name'];
$file_name = $_FILES['file5']['name'];
$ext = str_replace('.', '', substr($file_name, -4));
if(($file_name!='')&&(($ext=='jpg')||($ext=='jpeg')||($ext=='gif')||($ext=='png'))){
$file_name = md5($user2['nip']).'_3.'.$ext;
$file_name = preg_replace('/[^a-z0-9_\-\.]/i', '_', "$file_name");
if($user2['zdjecie3']!=''){
@unlink($dir.$file_name);
}

move_uploaded_file($file, $dir.$file_name);
chmod($dir.$file_name, 0666);
$zzz3 = $ext;
}
else{
$zzz3 = $user2['zdjecie3'];
}
///////////



////////// zdjecie 4

$dir = "zdjecia/";
$file = $_FILES['file6']['tmp_name'];
$file_name = $_FILES['file6']['name'];
$ext = str_replace('.', '', substr($file_name, -4));
if(($file_name!='')&&(($ext=='jpg')||($ext=='jpeg')||($ext=='gif')||($ext=='png'))){
$file_name = md5($user2['nip']).'_4.'.$ext;
$file_name = preg_replace('/[^a-z0-9_\-\.]/i', '_', "$file_name");
if($user2['zdjecie4']!=''){
@unlink($dir.$file_name);
}

move_uploaded_file($file, $dir.$file_name);
chmod($dir.$file_name, 0666);
$zzz4 = $ext;
}
else{
$zzz4 = $user2['zdjecie4'];
}
///////////
$ooo = $_POST['opis1'].'|e|b|i|s|'.$_POST['opis2'].'|e|b|i|s|'.$_POST['opis3'].'|e|b|i|s|'.$_POST['opis4'];

$sql->mysql_update("firmy", array("nazwa_firmy"=>$_POST['nazwa_firmy'], "miasto"=>$_POST['miasto'], "kod"=>$_POST['kod'], "ulica"=>$_POST['ulica'],"lokal"=>$_POST['lokal'], "telefon"=>$_POST['telefon'], "www"=>$_POST['www'], "email"=>$_POST['email'], "kluczowe"=>$_POST['kluczowe'], "opis"=>$_POST['opis'], "mapka"=>$mmm, "logo"=>$lll, "zdjecie1"=>$zzz1, "zdjecie2"=>$zzz2, "zdjecie3"=>$zzz3, "zdjecie4"=>$zzz4, "opisyzdjec"=>$ooo), array("id"=>$user2['id']) );
echo wiadomosc('Wizytówka firmy zosta³a zmieniona');
}
else{

//
$formularzyk = '';
$wykonaj = mysql_query("SELECT * FROM ".PREFIX."firmy_kategorie ORDER BY poz ASC");
while($w111 = mysql_fetch_array($wykonaj))
{
$formularzyk .= '<b>'.$w111['kategoria'].'</b><br>';

$wykonaj2 = mysql_query("SELECT * FROM ".PREFIX."firmy_subkategorie WHERE idkat='".$w111['id']."' ORDER BY poz ASC");
while($w222 = mysql_fetch_array($wykonaj2))
{
if($w222['id']==$user2['kategoria']){
$formularzyk .= '<input type="radio" value="'.$w222['id'].'" name="kategoria" checked> '.$w222['subkategoria'].'<br>';
}
else{
$formularzyk .= '<input type="radio" value="'.$w222['id'].'" name="kategoria"> '.$w222['subkategoria'].'<br>';
}

}

}
//


if($user2['mapka']!=''){
$mapka = '<br><b>Twoja aktualna mapka: </b><br><img src="sites/mapki.php?f='.md5($user2['nip']).'.'.$user2['mapka'].'" alt=""><br>Wybierz inn± poni¿ej, aby zmieniæ<br><br>';
}



if($user2['logo']!=''){
$logo = '<br><b>Twoje aktualne logo: </b><br><img src="sites/mapki.php?l='.md5($user2['nip']).'.'.$user2['logo'].'" alt=""><br>Wybierz inne poni¿ej, aby zmieniæ<br><br>';
}


if($user2['zdjecie1']!=''){
$galeria_1 = '<br><b>Twoje aktualne 1 zdjêcie w galerii: </b><br><img src="sites/mapki.php?z='.md5($user2['nip']).'_1.'.$user2['zdjecie1'].'" alt=""><br>Wybierz inne poni¿ej, aby zmieniæ';
}

if($user2['zdjecie2']!=''){
$galeria_2 = '<br><b>Twoje aktualne 2 zdjêcie w galerii: </b><br><img src="sites/mapki.php?z='.md5($user2['nip']).'_2.'.$user2['zdjecie2'].'" alt=""><br>Wybierz inne poni¿ej, aby zmieniæ';
}

if($user2['zdjecie3']!=''){
$galeria_3 = '<br><b>Twoje aktualne 3 zdjêcie w galerii: </b><br><img src="sites/mapki.php?z='.md5($user2['nip']).'_3.'.$user2['zdjecie3'].'" alt=""><br>Wybierz inne poni¿ej, aby zmieniæ';
}

if($user2['zdjecie4']!=''){
$galeria_4 = '<br><b>Twoje aktualne 4 zdjêcie w galerii: </b><br><img src="sites/mapki.php?z='.md5($user2['nip']).'_4.'.$user2['zdjecie4'].'" alt=""><br>Wybierz inne poni¿ej, aby zmieniæ';
}


list($opis1, $opis2, $opis3, $opis4) = explode('|e|b|i|s|',$user2['opisyzdjec']);
$tpl->assign( 'OPIS1', $opis1);
$tpl->assign( 'OPIS2', $opis2);
$tpl->assign( 'OPIS3', $opis3);
$tpl->assign( 'OPIS4', $opis4);


$tpl->assign('kategorie', $formularzyk);
$tpl->assign( 'nazwa_firmy', $user2['nazwa_firmy']);
$tpl->assign( 'miasto', $user2['miasto']);
$tpl->assign( 'kod', $user2['kod']);
$tpl->assign( 'ulica', $user2['ulica']);
$tpl->assign( 'lokal', $user2['lokal']);
$tpl->assign( 'telefon', $user2['telefon']);
$tpl->assign( 'www', $user2['www']);
$tpl->assign( 'kluczowe', $user2['kluczowe']);
$tpl->assign( 'email', $user2['email']);
$tpl->assign( 'imieinazwisko', $user2['imieinazwisko']);
$tpl->assign( 'nip', $user2['nip']);
$tpl->assign( 'regon', $user2['regon']);
$tpl->assign( 'telefonkontaktowy', $user2['telefonkontaktowy']);
$tpl->assign( 'opis', $user2['opis']);
$mapka = '<input type="hidden" name="regon" value="'.$user2['regon'].'">'.$mapka;
$tpl->assign( 'MAPKA', $mapka);

$tpl->assign( 'LOGO', $logo);

$tpl->assign( 'galeria_1', $galeria_1);
$tpl->assign( 'galeria_2', $galeria_2);
$tpl->assign( 'galeria_3', $galeria_3);
$tpl->assign( 'galeria_4', $galeria_4);

$tpl->assign( 'akcja', 'index.php?admin=o_edit');


echo $tpl->display( 'form_edit2.tpl' );





}







}


}
else{

echo '<form action="index.php?admin=o_edit" method="POST">
Wpisz nazwê firmy do edycji: <input type="text" name="regon"> <input type="submit" value="Edytuj">
</form>';










}


?>
