<?

   $_POST['dni'] = (int) $_POST['dni'];
if(($_POST['regon']!='')&&($_POST['dni']!='')){

$ile = $sql->mysql_count('firmy', array("id"=>$_POST['regon']));

if($ile<1){
echo wiadomosc("W bazie nie istnieje firma o takiej nazwie");
}
else{

$firma = $sql->mysql_get('firmy', array("id"=>$_POST['regon']) );


$kiedy = time() + (86400*$_POST['dni']);

$sql->mysql_update('firmy', array("wygasa"=>$kiedy), array("id"=>$_POST['regon']) );


echo wiadomosc('Og這szenie zosta這 przed逝穎ne dla firmy: <b>'.$firma['nazwa_firmy'].'</b>');
}
}




echo '<b>Og這szenia przedawnione:</b><br><br>';
$zapytanie = 'select * from '.PREFIX.'firmy WHERE wygasa<"'.time().'" ORDER BY datarejestracji DESC';
$wykonaj = mysql_query($zapytanie);

while($w = mysql_fetch_array($wykonaj))
{
echo '<h1>'.$w['nazwa_firmy'].'</h1><div style="padding: 10px; width: 45%; float: left">';
echo '<b>Og這szenie wygas這: </b>'.date("Y-m-d H:i:s",$w['wygasa']).'<br>';
echo '<b>Typ og這szenia: </b>'.typ($w['rodzajkonta']).'<br>';
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
echo '</div><div style="border-left: 1px solid black; padding: 10px; width: 45%; float: left">';


echo '<b>Data rejestracji: </b>'.date("Y-m-d (H:i:s)", $w['datarejestracji']).'<br><b>IP: </b>'.$w['ip'].'<br><br>';
echo '<b>Osoba upowa積iona: </b>'.$w['imieinazwisko'].'<br>';
echo '<b>Telefon: </b>'.$w['telefonkontaktowy'].'<br><br>';
echo '<b>FIRMA: </b>'.$w['nazwa_firmy'].'<br>';
echo '<b>ADRES: </b>'.$w['miasto'].' '.$w['kod'].' ul.'.$w['ulica'].' '.$w['lokal'].'<br>';
echo '<b>NIP: </b>'.$w['nip'].'<br>';
echo '<b>REGON: </b>'.$w['regon'].'<br><br>';


echo '</div><br style="clear: both"><form action="index.php?admin=stare" method="post">
<input name="regon" type="hidden" value="'.$w['id'].'"><br><br>
Przed逝� og這szenie o <input name="dni" size="2" type="text"> dni (od dnia dzisiejszego)<br>
<br>
<input value="Przed逝�..." class="button1" type="submit">

</form><hr><br style="clear: both">';
}


?><br style="clear: both">
