<?
require_once('class/pager.class.php');


$sql2 = 'select count(*) from '.DB_PREFIX.'news';


$result = mysql_query($sql2);
$row = mysql_fetch_array($result);
$recordsCount = $row[0];


$pager = new Pager('str', 'index.php?id=archiwum'); // id pagera / adres pliku (domyslnie puste)
$pager->SetTotalRecords($recordsCount);
$pager->SetRecordsPerPage(15);
$pag = $pager->Render(true);
$start = $pager->GetIndexRecordStart();
$end = $pager->GetIndexRecordEnd();
$pager->_userWholeLink = 'index.php?id=archiwum';

	

//zapytanie z uwzglenieniem stronicowania
$zapytanie = 'select * from '.DB_PREFIX.'news ORDER BY kiedy DESC limit '.$start.','.($end - $start + 1);


//...pobranie wyników i ich wyswietlenie
echo '<center>'.$pag.'</center>';
echo '<hr>';
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
echo $wiersz['id'].', ';
}








	
echo '<center>'.$pag.'</center>';

?>
