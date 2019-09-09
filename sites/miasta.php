<?
$ilepustych = $sql->mysql_count("miasta_strony", array("kategoria"=>'0', 'lokalizacja'=>$nnn) );
if($ilepustych>0){
echo '<b>Zobacz te¿: </b>';

$zapytanie = "SELECT * FROM ".PREFIX."miasta_strony WHERE kategoria='0' AND lokalizacja='".$nnn."'";
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
echo '<a href="index.php?id=miasta&nid='.$nnn.'&strona='.$wiersz['id'].'">[ '.$wiersz['nazwa'].' ]</a> ';
}

echo '<hr>';
}
$miasto = $sql->mysql_get("miasta", array('id'=>$nnn) );



echo '<h1>'.$miasto['nazwa'].'</h1>'.$miasto['opis'];



echo '<hr>';


if(is_numeric($_GET['strona'])){

$wykonaj22 = mysql_query("SELECT * FROM ".PREFIX."miasta_strony WHERE id='".$_GET['strona']."'");
while($wk = mysql_fetch_array($wykonaj22)){

if($wk['zdjecie']!=''){
echo '<h1>'.$wk['nazwa'].'</h1><img src="foto_miasta/'.$wk['zdjecie'].'" alt="" align="left" class="miasta_obrazek">'.$wk['opis'];
}
else{
echo '<h1>'.$wk['nazwa'].'</h1>'.$wk['opis'];
}




}

}


$wykonaj22 = mysql_query("SELECT * FROM ".PREFIX."miasta_kategorie WHERE id!=0");
while($wk = mysql_fetch_array($wykonaj22)){

echo '<div class="miasta_kategorie"><b>'.$wk['nazwa'].': </b><br>';
$zapytanie2 = "SELECT * FROM ".PREFIX."miasta_strony WHERE lokalizacja='".$miasto['id']."' AND kategoria='".$wk['id']."'";



$ile = $sql->mysql_count("miasta_strony", array("lokalizacja"=>$miasto['id'], "kategoria"=>$wk['id']) );

if($ile==0){
echo '<i>Brak instytucji w tej kategorii</i>';
}
$wykonaj2 = mysql_query($zapytanie2);
while($w = mysql_fetch_array($wykonaj2)){
echo '<a href="index.php?id=miasta&nid='.$nnn.'&strona='.$w['id'].'">'.$w['nazwa'].'</a><br>';
}
echo '</div>';



}







echo '<div class="miasta_firmy"><b>Firmy: </b><br>';
$zapytanie2 = "SELECT * FROM ".PREFIX."firmy WHERE miasto='".$miasto['nazwa']."' AND widoczne=1 AND wygasa>'".time()."'";
$wykonaj2 = mysql_query($zapytanie2);
while($w = mysql_fetch_array($wykonaj2)){
echo '<a href="index.php?id=ogloszenie&n='.$w['id'].'">'.$w['nazwa_firmy'].'</a><br>';
}
echo '</div><br style="clear: both"><br><br>';
?>