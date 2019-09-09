<?
require("class/validate.php");





//

$formularzyk = '';
$wykonaj = mysql_query("SELECT * FROM ".PREFIX."firmy_kategorie ORDER BY poz ASC");
while($w111 = mysql_fetch_array($wykonaj))
{

$formularzyk .= '<div style="margin-bottom: 5px; float: left; padding: 10px; border: 1px solid silver; width: 200px; margin-left: 5px;"><b>'.$w111['kategoria'].'</b><br>';

$wykonaj2 = mysql_query("SELECT * FROM ".PREFIX."firmy_subkategorie WHERE idkat='".$w111['id']."' ORDER BY poz ASC");
while($w222 = mysql_fetch_array($wykonaj2))
{
$formularzyk .= '<input type="radio" value="'.$w222['id'].'" name="kategoria"> '.$w222['subkategoria'].'<br>';
}
$formularzyk .= '</div>';

}
//








if($_POST['c']=='a'){
$error = false;
///////////////////////////////////////////////////////////


$niewolno = array('<', '>', ',', '.', '/', '\\', ';', ':', '\'', '"', '[', ']', '?', '|', '{', '}', '!', '@', '#', '$', '%', '^', '&', '*', '(', '-', '+', '=', '`', '~');
$login = str_replace($niewolno, '', $_POST['login']);

$login_check = check_login($login);
$pass_check = check_pass($_POST['haslo'], $_POST['haslo2']);




$nazwa_firmy_check = check_null('Nazwa firmy', $_POST['nazwa_firmy']);
$miasto_check = check_null('Miasto', $_POST['miasto']);
$kod_check = check_null('Kod pocztowy', $_POST['kod']);
$ulica_check = check_null('Ulica', $_POST['ulica']);
$telefonkontaktowy_check = check_null('Telefon Kontaktowy', $_POST['telefonkontaktowy']);
$opis_check = check_null('Opis', $_POST['opis']);
$imieinazwisko_check = check_null('Imiê i nazwisko Osoby upowa¿nionej', $_POST['imieinazwisko']);
$telefon_check = check_null('Telefon', $_POST['telefon']);
$email_check = check_null('e-mail', $_POST['email']);





$nip = xss($_POST['nip']);
$regon = xss($_POST['regon']);

$ile_nip = $sql->mysql_count(  'firmy', array('nip' => $nip)  );

$sprawdzone = false;
$error = '';
if($login_check!=''){ $error = $login_check; }
elseif($pass_check!=''){ $error = $pass_check; }
elseif($nazwa_firmy_check!=''){ $error = $nazwa_firmy_check; }
elseif($miasto_check!=''){ $error = $miasto_check; }
elseif($kod_check!=''){ $error = $kod_check; }
elseif($telefon_check!=''){ $error = $telefon_check; }
elseif($email_check!=''){ $error = $email_check; }
elseif($imieinazwisko_check!=''){ $error = $imieinazwisko_check; }
elseif($telefonkontaktowy_check!=''){ $error = $kod_check; }
elseif(!check_nip($_POST['nip'])){ $error = 'NIP jest nieprawid³owy'; }
elseif($ile_nip!=0){ $error = 'Ju¿ istnieje podany NIP w naszej bazie danych!'; }
elseif($_POST['kategoria']==0){ $error = 'Musisz wybraæ kategoriê swojego przedsiêbiorstwa'; }
elseif($opis_check!=''){ $error = $opis_check; }
else{
$sprawdzone = true;
}


if($sprawdzone){




$dir = "mapki/";
$file = $_FILES['file']['tmp_name'];
$file_name = $_FILES['file']['name'];
$ext = str_replace('.', '', substr($file_name, -4));


if(($file_name!='')&&(($ext=='jpg')||($ext=='jpeg')||($ext=='gif')||($ext=='png'))){


$file_name = md5($_POST['nip']).'.'.$ext;
$file_name = preg_replace('/[^a-z0-9_\-\.]/i', '_', "$file_name");
move_uploaded_file($file, $dir.$file_name);
chmod($dir.$file_name, 0666);
}

$regon = (int) $_POST['regon'];
$sql->mysql_insert(  'firmy', array('login' => $login,
'haslo' => $_POST['haslo'],
'imieinazwisko' => $_POST['imieinazwisko'],
'nazwa_firmy' => $_POST['nazwa_firmy'],
'miasto' => $_POST['miasto'],
'ulica' => $_POST['ulica'],
'lokal' => $_POST['lokal'],
'kod' => $_POST['kod'],
'telefon' => $_POST['telefon'],
'telefonkontaktowy' => $_POST['telefonkontaktowy'],
'email' => $_POST['email'],
'www' => $_POST['www'],
'kluczowe' => substr($_POST['kluczowe'],0,150),
'nip' => $_POST['nip'],
'regon' => $regon,
'kategoria' => $_POST['kategoria'],
'widoczne' => 0,
'wygasa' => 0,
'opis' => $_POST['opis'],
'mapka' => $ext,
'zdjecie1' => 0,
'zdjecie2' => 0,
'zdjecie3' => 0,
'zdjecie4' => 0,
'opisyzdjec' => 0,
'rodzajkonta' => 1,
'datarejestracji' => time(),
'ip' => $_SERVER['REMOTE_ADDR']
 )  );
echo wiadomosc('Firma zosta³a dodana! Po akceptacji przez którego¶ z moderatorów, wizytówka firmy zostanie udostêpniona publicznie na naszej stronie, powiadomimy o tym mailem.<br>Aby dokonaæ edycji swojego konta, wystarczy siê zalogowaæ do serwisu, podaj±c uprzednio wpisany login i has³o. <b>Dziêkujemy</b>');



}








//////////////////////////////////////////////////////////////////////
}

if((!$sprawdzone)&&($error!='')){
echo wiadomosc($error, 'B³±d!');
}


//////////
if($_POST['nazwa_firmy']==''){ $_POST['nazwa_firmy']='tescior'; }
if($_POST['login']==''){ $login='tescior'; }
if($_POST['miasto']==''){ $_POST['miasto']='tescior'; }
if($_POST['kod']==''){ $_POST['kod']='20-091'; }
if($_POST['ulica']==''){ $_POST['ulica']='tescior'; }
if($_POST['lokal']==''){ $_POST['lokal']='11'; }
if($_POST['telefon']==''){ $_POST['telefon']='15635315'; }
if($_POST['www']==''){ $_POST['www']='tescior'; }
if($_POST['kluczowe']==''){ $_POST['kluczowe']='kluczowe'; }
if($_POST['email']==''){ $_POST['email']='email@email.pl'; }
if($_POST['imieinazwisko']==''){ $_POST['imieinazwisko']='tescior'; }
if($_POST['nip']==''){ $_POST['nip']='1234567890'; }
if($_POST['regon']==''){ $_POST['regon']='672990717'; }
if($_POST['telefonkontaktowy']==''){ $_POST['telefonkontaktowy']='456456456'; }
if($_POST['opis']==''){ $_POST['opis']='opisopisopisopisopis opisopisopisopis opisopisopisopisopis'; }







///////
if(!$sprawdzone){
$tpl->assign('kategorie', $formularzyk);
$tpl->assign( 'login', $login);
$tpl->assign( 'nazwa_firmy', xss($_POST['nazwa_firmy']));
$tpl->assign( 'miasto', xss($_POST['miasto']));
$tpl->assign( 'kod', xss($_POST['kod']));
$tpl->assign( 'ulica', xss($_POST['ulica']));
$tpl->assign( 'lokal', xss($_POST['lokal']));
$tpl->assign( 'telefon', xss($_POST['telefon']));
$tpl->assign( 'www', xss($_POST['www']));
$tpl->assign( 'kluczowe', xss($_POST['kluczowe']));
$tpl->assign( 'email', xss($_POST['email']));
$tpl->assign( 'imieinazwisko', xss($_POST['imieinazwisko']));
$tpl->assign( 'nip', xss($_POST['nip']));
$tpl->assign( 'regon', xss($_POST['regon']));
$tpl->assign( 'telefonkontaktowy', xss($_POST['telefonkontaktowy']));




$tpl->assign( 'opis', xss($_POST['opis']));
echo $tpl->display( 'form_register.tpl' );
}




?>
