<?
ob_start();
session_start();
require_once("class/define.php");
require_once("class/mysql.class.php");

$nid = (int) $_GET['nid'];
define('NID', $nid);

$sql = new db_mysql('eu4_przewodnik', '7kazik3', 'eu4_przewodnik');



$sql->SetPrefix(PREFIX);
require_once("class/pager.class.php");
require_once("class/template.class.php");
require_once("sesja/index.php");
require_once("class/funkcje.php");

$g=mysql_query("SELECT * FROM ".PREFIX."konfiguracja") or die(mysql_error()); while($w=mysql_fetch_array($g)){$k[$w['id']]=$w['ustawienie'];}

$tpl = new template;
$tpl->Teplate( $k['template'] );


$ile_stron = $sql->mysql_count("strony");


if($_GET['id']=='ogloszenie'){
$n = $_GET['n'];
if(!is_numeric($n)){ die('error'); }
$firma = $sql->mysql_get('firmy' ,array("id"=>$n) );


$tpl->assign( 'TITLE', $firma['nazwa_firmy'].' - info.net.pl');
$tpl->assign( 'KEYWORDS', $firma['nazwa_firmy'].', '.$firma['kluczowe'].', '.$k['keywords']);
$tpl->assign( 'DESCRIPTION', $firma['nazwa_firmy'].', '.$firma['kluczowe'].', '.$k['description']);



}
else{
$tpl->assign( 'TITLE', $k['title']);
$tpl->assign( 'KEYWORDS', $k['keywords']);
$tpl->assign( 'DESCRIPTION', $k['description']);

}

///// sprawdzanie czy admin
if(auth()){
if($user['typ']==2){ $admin = true; }else{ $admin = false; }
}
/////





$tpl->assign('DODATKI_JS', $dodatki_js);

if($_GET['i']=='l'){
logout();
$admin = false;
}


$top = auth() ? 'Witaj, jeste¶ zalogowany jako <b>'.$user['login'].'</b>, <a href="index.php?i=l">Kliknij, aby siê wylogowaæ</a>' : '';



$tpl->assign('HEADER', $top);

require_once("sites/step.php");






$tpl->assign('STEP', $bc->_bc);



echo $tpl->display( 'header.tpl' );




if((auth())&&(!$admin)){


if($user['wygasa']>time()){
echo '<a href="index.php?id=user_edit&amp;nid='.NID.'">Kliknij, aby edytowaæ swoje og³oszenie</a>, przypominamy i¿ wygasa ono dnia: <b>'.date("Y-m-d H:i:s", $user['wygasa']).'</b><hr>';
}
else{
echo '<a href="index.php?id=user_edit&amp;nid='.NID.'">Kliknij, aby edytowaæ swoje og³oszenie</a>, przypominamy i¿ Twoje og³oszenie jest nie aktywne, lub wygas³o<hr>';
}


}






if(($admin)&&(auth())){
$numermenu = -1;
include("admin/admin_menu.php");
   if($_GET['admin']!=''){
      switch ($_GET['admin'])
      {
      case o_edit:
      include("sites/admin_edit.php");
      break;
      case sklepy:
      include("admin/admin_sklepy.php");
      break;
      case kat:
      include("admin/admin_miasta_kat.php");
      break;
      case miasta_strony:
      include("admin/admin_miasta_strony.php");
      break;
      case moderatorzy:
      include("admin/admin_moderatorzy.php");
      break;


      	case oczekujace:
      		include("admin/admin.php");
      		break;
            	case stare:
      		include("admin/stare.php");
      		break;
      	case przedluz:
      		include("admin/admin_przedluz.php");
      		break;
       	case miasta:
      		include("admin/admin_miasta.php");
      		break;


      case za7dni:

      include("admin/wygasnaza7dni.php");

      break;
      case linki:
     include("admin/admin_linki.php");
      break;

      case linki_kat:
      include("admin/admin_linki_kat.php");
      break;
      case linki_strony:
      include("admin/admin_linki_strony.php");
      break;




      	case strony:
      		include("admin/admin_strony.php");




      		break;
       	case kina:
      		include("admin/admin_kina.php");
      		break;
       	case teatry:
      		include("admin/admin_teatry.php");
      		break;
      	case konfiguracja:
      include("admin/admin_k.php");
      		break;
      	case kategorie:
      include("admin/admin_kat.php");
      		break;
      	case start:
                      default:
      		include("admin/admin.php");
      }
   }
}


switch ($_GET['id'])
{


  case szukaj:

  $szukane = $_POST['sz'];
  if(strlen($szukane)<3){
  echo 'Proszê wpisaæ nazwê poszukiwanej firmy, minimum 3 znaki';
  }
  else{
  $szukane = str_replace('\'', '', $szukane);
  $szukane = str_replace('"', '', $szukane);
  $szukane = str_replace('<', '', $szukane);
  $szukane = str_replace('>', '', $szukane);

$szukana = $szukane;
$zap = "SELECT * FROM ".PREFIX."firmy WHERE nazwa_firmy LIKE '%".$szukana."%' AND wygasa > '".time()."'";
$wykonaj = mysql_query($zap);

echo '<h1>Wyszukiwanie firm</h1><br>
<br>';

$i = 0;
$wynik = '';
while($wiersz = mysql_fetch_array($wykonaj))
{
$wynik .= '<a href="index.php?id=ogloszenie&amp;n='.$wiersz['id'].'&amp;type='.$wiersz['rodzajkonta'].'"><b>'.$wiersz['nazwa_firmy'].'</b> - '.$wiersz['miasto'].' '.$wiersz['kod'].', ul. '.$wiersz['ulica'].' '.$wiersz['lokal'].'</a><br />';
$i++;
}
echo 'Znaleziono <b>'.$i.'</b> firm pasuj±cych do wyra¿enia: '.$szukana.'<br><br>';
echo $wynik;

  }
  break;



	case rejestracja:

	if(!auth()){
	$tpl->assign('NID', NID);
	echo $tpl->display( 'form_choose.tpl' );
	}
	else{
	echo wiadomosc('Ju¿ masz konto w przewodniku');
	}
		$numermenu = 2;
		break;
	case zamawiam_podstawowy:
include("sites/r_podstawowy.php");

$numermenu = -1;
		break;

	case user_edit:
	if(auth()){
include("sites/user_edit.php");
}
else{
wiadomosc("Musisz byæ zalogowany, aby edytowaæ og³oszenie");
}
$numermenu = -1;
		break;


	case zamawiam_rozszerzony:
include("sites/r_rozszerzony.php");

$numermenu = -1;
		break;


 	case logowanie:

	if(!auth()){
	include("sites/logowanie.php");
	}
	else{
	echo wiadomosc('Ju¿ jeste¶ zalogowany jako <b>'.$user['login'].'</b>');
	}





$numermenu = 3;
		break;
 	case kategoria:
include("sites/kategoria.php");
break;


 	case miasta:
 	$nnn = (int) $_GET['nid'];
include("sites/miasta.php");
break;

 	case kontakt:
include("sites/kontakt.php");
	$numermenu = 4;
break;
 	case kina:
 	$nnn = (int) $_GET['nid'];

include("sites/kina.php");

break;

 	case teatry:
 	$nnn = (int) $_GET['nid'];
include("sites/teatry.php");
break;

 	case ogloszenie:
include("sites/ogloszenie.php");
break;


	case start:
                default:
                if($_GET['admin']==''){
		include("sites/start.php");
		}
		$numermenu = 1;
}








$ilewczesniejmenu = 4+$ile_stron;

$ilejuzkategorii = 0;
$dlaglownychlicze = 0;
//
$MENU_KATEGORIE = '';


 if(($admin)&&(auth())){
$numermenu = -1;
include("admin/admin_menu.php");


	$MENU_KATEGORIE .= $MENU_ADMIN;

}



if(NID>0){








////////////////////////////////////////
   $wykonaja = mysql_query("SELECT * FROM ".PREFIX."firmy_kategorie ORDER BY poz ASC");
   while($w111a = mysql_fetch_array($wykonaja))
   {
	$kategoria[$w111a['id']] = 0;
   $wykonaj2a = mysql_query("SELECT * FROM ".PREFIX."firmy_subkategorie WHERE idkat='".$w111a['id']."' ORDER BY poz ASC");

      while($w222a = mysql_fetch_array($wykonaj2a))
      {

    	$zapytanie123 = 'select count(*) from '.PREFIX.'firmy WHERE miasto="'.miasto(NID).'" AND kategoria="'.$w222a['id'].'" AND widoczne="1" AND wygasa>"'.time().'"';
$wykonaj123 = mysql_query($zapytanie123) or die(mysql_error());
list($firmwsub) = mysql_fetch_row($wykonaj123);
    	if($firmwsub>0){    	$kategoria[$w111a['id']]=1; $subkategoria[$w222a['id']]=1; }

      }


}


//////////////////////////////////////////

   $wykonaja = mysql_query("SELECT * FROM ".PREFIX."firmy_kategorie ORDER BY poz ASC");
   while($w111a = mysql_fetch_array($wykonaja))
   {



  if ($kategoria[$w111a['id']]==1){




   $MENU_KATEGORIE .= '<li class="m0"><a href="javascript:ukryj_pokaz(\''.$dlaglownychlicze.'\');">'.$w111a['kategoria'].'</a></li><span id="sub_'.$dlaglownychlicze.'">';
   $ilejuzkategorii++;
   $wykonaj2a = mysql_query("SELECT * FROM ".PREFIX."firmy_subkategorie WHERE idkat='".$w111a['id']."' ORDER BY poz ASC");




   while($w222a = mysql_fetch_array($wykonaj2a))
   {
     if ($subkategoria[$w222a['id']]==1){
   $ilejuzkategorii++;
   $MENU_KATEGORIE .= '<li class="m1"><a href="index.php?id=kategoria&amp;numer='.$w222a['id'].'&amp;h='.($ilejuzkategorii+$ilewczesniejmenu).'&amp;nid='.NID.'">'.$w222a['subkategoria'].'</a></li>';
			}
   }




	$MENU_KATEGORIE .= '<li class="m1"><span style="cursor: pointer; font-size: 10px; font-family: Verdana; color: silver; text-align: right" OnClick="ukryj_pokaz(\''.($dlaglownychlicze).'\');">Kliknij aby ukryæ listê</span></li></span>';
		$dlaglownychlicze++;
   }

}
}
//









if($_GET['id']=='kategoria'){
if(is_numeric($_GET['h'])){
$numermenu = $_GET['h'];
}
}

if($numermenu==''){ $numermenu = -1; }
$tpl->assign( 'NUMERMENU', $numermenu);







$FORM_MIASTA = '<option value="#">Wybierz miasto</option>';
$miasta = '';
$kina = '';
$teatry = '';
$zapytanie = "SELECT * FROM ".PREFIX."miasta";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
$miasta .= '<li class="m1"><a href="index.php?id=miasta&amp;nid='.$wiersz['id'].'">'.$wiersz['nazwa'].'</a></li>';
if($_GET['nid']==$wiersz['id']){ $sel = ' selected'; }else{ $sel=''; }

$FORM_MIASTA .= '<option value="index.php?id=miasta&amp;nid='.$wiersz['id'].'"'.$sel.'>'.$wiersz['nazwa'].'</option>';
}

$zapytanie = "SELECT * FROM `".PREFIX."teatry` ORDER BY RAND() LIMIT 0,5";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
$teatry .= '<li class="m1"><a href="index.php?id=teatry&amp;nid='.$wiersz['id'].'">'.$wiersz['nazwa'].'</a></li>';
}



$zapytanie = 'select * from '.PREFIX.'firmy WHERE widoczne="1" AND wygasa>"'.time().'" AND miasto="'.miasto(NID).'" ORDER BY datarejestracji DESC LIMIT 0,5';

if(!NID){
$zapytanie = 'select * from '.PREFIX.'firmy WHERE widoczne="1" AND wygasa>"'.time().'" ORDER BY datarejestracji DESC LIMIT 0,5';
}




$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
$kina .= '<li class="m1"><a href="index.php?id=ogloszenie&amp;n='.$wiersz['id'].'&amp;nid='.NID.'">'.$wiersz['nazwa_firmy'].'</a></li>';
}



$tpl->assign( 'MENU_KATEGORIE', $MENU_KATEGORIE);


$tpl->assign( 'MIASTA', $miasta);
$tpl->assign( 'KINA', $kina);
$tpl->assign( 'TEATRY', $teatry);




$strony = '';

$zapytanie = "SELECT * FROM `".PREFIX."strony`";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
$strony .= '<li class="m1"><a href="index.php?id=strony&amp;aid='.$wiersz['id'].'&amp;nid='.NID.'">'.$wiersz['nazwa'].'</a></li>';
}


$tpl->assign( 'STRONY', $strony);


$tpl->assign( 'FORM_MIASTA', $FORM_MIASTA);
$tpl->assign( 'nid', NID);



$SECOND = '		<ul class="ms_menu">
		<li class="m0"><a href="#">'.$k['tytul_stopki'].'</a></li>
		</ul>'.$k['tresc_stopki'];





if($SECOND!=''){ $SECOND = '<div class="main_in2">'.$SECOND.'</div>'; }






$tpl->assign( 'SECOND', $SECOND);



if(!NID){
$miasta123 = '		<li class="m0"><a href="#">Miasta</a></li>';
$zapytanie = "SELECT * FROM ".PREFIX."miasta";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
$miasta123 .= '<li class="m1"><a href="index.php?id=miasta&amp;nid='.$wiersz['id'].'">'.$wiersz['nazwa'].'</a></li>';
}

}
else{
$miasta123 = '';
}

$tpl->assign( 'MIASTA1', $miasta123);
echo $tpl->display( 'footer.tpl' );
$sql->db_close();
ob_end_flush();
?>
