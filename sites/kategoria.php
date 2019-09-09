<?
$numerek = $_GET['numer'];
if(!is_numeric($numerek)){ die('error'); }
$kat = $sql->mysql_get('firmy_subkategorie', array("id"=>$numerek) );



$sql2 = 'select count(*) from '.PREFIX.'firmy WHERE kategoria="'.$numerek.'" AND widoczne="1" AND wygasa>"'.time().'"';




if(is_numeric($_GET['nid'])){
$sql2 = 'select count(*) from '.PREFIX.'firmy WHERE kategoria="'.$numerek.'" AND miasto="'.miasto($_GET['nid']).'" AND widoczne="1" AND wygasa>"'.time().'"';
}


$result = mysql_query($sql2);
$row = mysql_fetch_array($result);
$recordsCount = $row[0];


if($recordsCount==0){
$ilosc = 'Niema jeszcze ¿adnej firmy w podanej kategorii';
}
else{
$ilosc = 'Jest <b>'.$recordsCount.'</b> firm w podanej kategorii';
}

$tpl->assign('NAZWA_KATEGORII', $kat['subkategoria']);
$tpl->assign('KOMUNIKAT', $ilosc);













$pager = new Pager('str', 'index.php?id=archiwum'); // id pagera / adres pliku (domyslnie puste)
$pager->SetTotalRecords($recordsCount);
$pager->SetRecordsPerPage(15);
$pag = $pager->Render(true);
$start = $pager->GetIndexRecordStart();
$end = $pager->GetIndexRecordEnd();
$pager->_userWholeLink = 'index.php?id=kategoria&numerek='.$numerek;



//zapytanie z uwzglenieniem stronicowania
$zapytanie = 'select * from '.PREFIX.'firmy WHERE kategoria="'.$numerek.'" AND widoczne="1" AND wygasa>"'.time().'" ORDER BY datarejestracji DESC limit '.$start.','.($end - $start + 1);

if($_GET['nid']!=''){
$zapytanie = 'select * from '.PREFIX.'firmy WHERE kategoria="'.$numerek.'" AND widoczne="1" AND wygasa>"'.time().'" AND miasto="'.miasto($_GET['nid']).'" ORDER BY datarejestracji DESC limit '.$start.','.($end - $start + 1);

}


$spis = '';
//...pobranie wyników i ich wyswietlenie
$spis .= '<center>'.$pag.'</center>';
$spis .=  '<hr>';
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
$spis .= '- <a href="index.php?id=ogloszenie&amp;n='.$wiersz['id'].'&amp;type='.$wiersz['rodzajkonta'].'&amp;nid='.NID.'">'.$wiersz['nazwa_firmy'].' - '.$wiersz['miasto'].' ul.'.$wiersz['ulica'].' '.$wiersz['lokal'].'</a><br>';
}



$tpl->assign('SPIS', $spis);
echo $tpl->display( 'kategoria.tpl' );









?>
