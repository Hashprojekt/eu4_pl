<?
if(eregi('http', $firma['www'])){ $www = $firma['www']; }
else{ $www = 'http://'.$firma['www']; }
$type = $firma['rodzajkonta']; 



$dane = $firma['kod'].' '.$firma['miasto'].'<br>
ul.'.$firma['ulica'].' '.$firma['lokal'].'<br>
tel: '.$firma['telefon'].'<br><a href="'.$www.'" target="_blank">'.$firma['www'].'</a>';


if($firma['wygasa']<time()){
$firma = '';
$firma['nazwa_firmy'] = "Og這szenie wygas這";
$firma['kluczowe'] = "Og這szenie wygas這";
$dane = '';
}




if($firma['mapka']!=''){
$mapka = md5($firma['nip']).'.'.$firma['mapka'];
$mapka = '<img src="sites/mapki.php?f='.$mapka.'" alt="">';
}
else{ $mapka = ''; }



if($firma['rodzajkonta']=='1'){
$tpl->assign('NAZWA_FIRMY', $firma['nazwa_firmy']);
$tpl->assign('DANE', $dane);
$tpl->assign('MAPKA', $mapka);
$tpl->assign('OPIS', $firma['opis']);
echo $tpl->display( 'ogloszenie_1.tpl' );
}
elseif($firma['rodzajkonta']=='2'){



$opisy = explode('|e|b|i|s|', $firma['opisyzdjec']);
$zdjecie1_opis = $opisy[0];
$zdjecie2_opis = $opisy[1];
$zdjecie3_opis = $opisy[2];
$zdjecie4_opis = $opisy[3];

if($firma['zdjecie1']!=''){
$zdjecie1 = md5($firma['nip']).'.'.$firma['zdjecie1'];
$zdjecie1 = str_replace('.', '_1.', $zdjecie1);
$zdjecie1 = '<a href="#" OnClick="popupimg(\'sites/mapki.php?z='.$zdjecie1.'\')"><img src="sites/mapki.php?z='.$zdjecie1.'" alt="" width="150" height="150"><br>'.$zdjecie1_opis.'</a>';
}

if($firma['zdjecie2']!=''){
$zdjecie2 = md5($firma['nip']).'.'.$firma['zdjecie2'];
$zdjecie2 = str_replace('.', '_2.', $zdjecie2);
$zdjecie2 = '<a href="#" OnClick="popupimg(\'sites/mapki.php?z='.$zdjecie2.'\')"><img src="sites/mapki.php?z='.$zdjecie2.'" alt="" width="150" height="150"><br>'.$zdjecie2_opis.'</a>';
}

if($firma['zdjecie3']!=''){
$zdjecie3 = md5($firma['nip']).'.'.$firma['zdjecie3'];
$zdjecie3 = str_replace('.', '_3.', $zdjecie3);
$zdjecie3 = '<a href="#" OnClick="popupimg(\'sites/mapki.php?z='.$zdjecie3.'\')"><img src="sites/mapki.php?z='.$zdjecie3.'" alt="" width="150" height="150"><br>'.$zdjecie3_opis.'</a>';
}

if($firma['zdjecie4']!=''){
$zdjecie4 = md5($firma['nip']).'.'.$firma['zdjecie4'];
$zdjecie4 = str_replace('.', '_4.', $zdjecie4);
$zdjecie4 = '<a href="#" OnClick="popupimg(\'sites/mapki.php?z='.$zdjecie4.'\')"><img src="sites/mapki.php?z='.$zdjecie4.'" alt="" width="150" height="150"><br>'.$zdjecie4_opis.'</a>';
}

if($_GET['galeria']==1){
$firma['opis'] = '<div style="text-align: center">'.$zdjecie1.'<br><br>'.$zdjecie3.'</div>';
$mapka = '<div style="text-align: center">'.$zdjecie2.'<br><br>'.$zdjecie4.'</div>';


}

if($firma['logo']!=''){
$logo = '<img src="sites/mapki.php?l='.md5($firma['nip']).'.'.$firma['logo'].'" alt="">';
}


$tpl->assign('LOGO', $logo);
$tpl->assign('NAZWA_FIRMY', $firma['nazwa_firmy']);
$tpl->assign('DANE', $dane);
$tpl->assign('MAPKA', $mapka);
$tpl->assign('OPIS', $firma['opis']);
$tpl->assign('ID', $firma['id']);





echo $tpl->display( 'ogloszenie_2.tpl' );
}

?>
