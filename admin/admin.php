<?
if($_POST['przyczyna']!=''){
$dane = $sql->mysql_get('firmy', array("id"=>$_POST['idd']));
mail($dane['email'], $_POST['tytul'], $_POST['przyczyna']);
echo wiadomosc("Wiadomo¶æ zosta³a wys³ana do firmy <b>".$dane['nazwa_firmy']."</b>", "Wys³ano");
}




if(is_numeric($_GET['akceptuj'])){
$dzien_sek = 86400;
$ile_dni = $k['ile_dni_za_darmo'];
$wygasa = time() + ($ile_dni*$dzien_sek);




$sql->mysql_update("firmy", array("widoczne"=>'1', "wygasa"=>$wygasa), array("id"=>$_GET['akceptuj']));




echo wiadomosc('Og³oszenie zosta³o zaakceptowane! Od tej pory jest ju¿ wy¶wietlane na stronie g³ównej', 'Potwierdzenie');
}

if(is_numeric($_GET['usun'])){
$sql->mysql_delete("firmy", array("id"=>$_GET['usun']));
echo wiadomosc('Og³oszenie zosta³o bezpowrotnie usuniête!', 'Potwierdzenie');
}

if(is_numeric($_GET['usun2'])){
echo '<form action="index.php?admin=oczekujace" method="POST">Wpisz przyczynê tymczasowego odrzucenia (zostanie przes³ana na adres email firmy)<br>
<input type="hidden" name="idd" value="'.$_GET['usun2'].'">
<b>Tytu³ maila: </b><input type="text" name="tytul" value="Og³oszenie tymczasowo odrzucone" size="50"><br>

<textarea name="przyczyna" cols="50" rows="10"></textarea><br>

<input type="submit" value="Wy¶lij...">
</form>';

}


echo '<b>Firmy oczekuj±ce na akceptacjê:</b><br><br>';
$zapytanie = "SELECT * FROM ".PREFIX."firmy WHERE widoczne=0 AND nip!=".ADM_NIP." ORDER BY datarejestracji DESC";
$wykonaj = mysql_query($zapytanie);

while($w = mysql_fetch_array($wykonaj))
{
echo '<div style="border: 1px solid black; padding: 10px; width: 45%; float: left">';

echo '<b>Typ og³oszenia: </b>'.typ($w['rodzajkonta']).'<br>';
echo '<b>Firma: </b>'.$w['nazwa_firmy'].'<br>';


echo '<b>Adres: </b>'.$w['miasto'].' '.$w['kod'].' ul.'.$w['ulica'].' '.$w['lokal'].'<br>';
echo '<b>Telefon: </b>'.$w['telefon'].'<br>';
echo '<b>Strona internetowa: </b>'.$w['www'].'<br>';
echo '<b>E-mail: </b>'.$w['email'].'<br>';
if($w['mapka']!=''){
echo '<b>Mapka:</b><br><a href="#" OnClick="popupimg(\'mapki/'.md5($w['nip']).'.'.$w['mapka'].'\')"><img src="mapki/'.md5($w['nip']).'.'.$w['mapka'].'" alt="" width="100" height="100"></a><br>';
}
echo '<b>Opis: </b><br>
'.$w['opis'].'<br>';
echo '</div><div style="border: 1px solid black; padding: 10px; width: 45%; float: left">';


echo '<b>Data rejestracji: </b>'.date("Y-m-d (H:i:s)", $w['datarejestracji']).'<br><b>IP: </b>'.$w['ip'].'<br><br>';
echo '<b>Osoba upowa¿niona: </b>'.$w['imieinazwisko'].'<br>';
echo '<b>Telefon: </b>'.$w['telefonkontaktowy'].'<br><br>';
echo '<b>FIRMA: </b>'.$w['nazwa_firmy'].'<br>';
echo '<b>ADRES: </b>'.$w['miasto'].' '.$w['kod'].' ul.'.$w['ulica'].' '.$w['lokal'].'<br>';
echo '<b>NIP: </b>'.$w['nip'].'<br>';
echo '<b>REGON: </b>'.$w['regon'].'<br><br>';

echo '<a href="index.php?admin=oczekujace&akceptuj='.$w['id'].'" onclick="return potwierdzenie(\'Czy na pewno zaakceptowaæ to og³oszenie?\')">Akceptuj og³oszenie i uruchom 2 tygodniowy okres próbny</a><br><br>
<a href="index.php?admin=oczekujace&usun2='.$w['id'].'">Odrzuæ og³oszenie tymczasowo informuj±c o przyczynie</a><br><br>
<a href="index.php?admin=oczekujace&usun='.$w['id'].'" onclick="return potwierdzenie(\'Czy na pewno usun±æ og³oszenie bezpowrotnie?\')">Odrzuæ og³oszenie bezpowrotnie</a>';


echo '</div><div style="clear: both;"></div>';
}


?>
