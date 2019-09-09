<?







if($_POST['idzmien']!=''){
$sql->mysql_update("firmy_kategorie", array("kategoria"=>$_POST['nazwa']), array("id"=>$_POST['idzmien']));
}

if($_POST['idzmien2']!=''){
$sql->mysql_update("firmy_subkategorie", array("subkategoria"=>$_POST['nazwa']), array("id"=>$_POST['idzmien2']));
}

if($_POST['nazwa']!=''){


$wyk = mysql_query("SELECT * FROM ".PREFIX."firmy_kategorie ORDER BY poz DESC LIMIT 1;");
$naj = 0;
while($w2 = mysql_fetch_array($wyk)){ $naj = $w2['poz']; }
$sql->mysql_insert("firmy_kategorie", array("kategoria"=>$_POST['nazwa'], "poz"=>($naj+1)));
}

if($_POST['nazwasub']!=''){

$wyk = mysql_query("SELECT * FROM ".PREFIX."firmy_subkategorie WHERE idkat='".$_POST['glowna']."' ORDER BY poz DESC LIMIT 1;");
$naj = 0;
while($w2 = mysql_fetch_array($wyk)){ $naj = $w2['poz']; }
$sql->mysql_insert("firmy_subkategorie", array("idkat"=>$_POST['glowna'],"subkategoria"=>$_POST['nazwasub'], "poz"=>($naj+1)));


}



if(is_numeric($_GET['up'])){
$stare = $sql->mysql_get("firmy_kategorie", array("id"=>$_GET['up']));
$nowe = $stare['poz'] - 1;
if($nowe<1){ $nowe=1; }
$sql->mysql_update("firmy_kategorie", array("poz"=>$stare['poz']), array("poz"=>$nowe));
$sql->mysql_update("firmy_kategorie", array("poz"=>$nowe), array("id"=>$_GET['up']));
}



if(is_numeric($_GET['d'])){
$stare = $sql->mysql_get("firmy_kategorie", array("id"=>$_GET['d']));
$nowe = $stare['poz'] + 1;
$sql->mysql_update("firmy_kategorie", array("poz"=>$stare['poz']), array("poz"=>$nowe));
$sql->mysql_update("firmy_kategorie", array("poz"=>$nowe), array("id"=>$_GET['d']));
}



if(is_numeric($_GET['sup'])){
$stare = $sql->mysql_get("firmy_subkategorie", array("id"=>$_GET['sup']));
$nowe = $stare['poz'] - 1;
if($nowe<1){ $nowe=1; }
$sql->mysql_update("firmy_subkategorie", array("poz"=>$stare['poz']), array("poz"=>$nowe, "idkat"=>$_GET['main']));
$sql->mysql_update("firmy_subkategorie", array("poz"=>$nowe), array("id"=>$_GET['sup'], "idkat"=>$_GET['main']));
}



if(is_numeric($_GET['sd'])){
$stare = $sql->mysql_get("firmy_subkategorie", array("id"=>$_GET['sd']));
$nowe = $stare['poz'] + 1;
$sql->mysql_update("firmy_subkategorie", array("poz"=>$stare['poz']), array("poz"=>$nowe, "idkat"=>$_GET['main']));
$sql->mysql_update("firmy_subkategorie", array("poz"=>$nowe), array("id"=>$_GET['sd'], "idkat"=>$_GET['main']));
}

////////////// usuwanie

if(is_numeric($_GET['usuncalkiem'])){

$sql->mysql_delete("firmy_kategorie", array("id"=>$_GET['usuncalkiem']));
$sql->mysql_delete("firmy_subkategorie", array("idkat"=>$_GET['usuncalkiem']));
mysql_query("UPDATE firmy_kategorie SET poz = poz-1 WHERE poz > '".$_GET['pozold']."'");
echo wiadomosc("Kategoria zosta³a usuniêta, razem z jej subkategoriami");
}


if(is_numeric($_GET['usunsub'])){
$sql->mysql_delete("firmy_subkategorie", array("id"=>$_GET['usunsub']));
mysql_query("UPDATE firmy_subkategorie SET poz = poz-1 WHERE idkat = '".$_GET['stara']."' AND poz > '".$_GET['pozold']."'");
echo wiadomosc("Subkategoria zosta³a usuniêta");
}

?>


















<?
$dodajnowa = '<form action="index.php?admin=kategorie" method="post">
<input type="text" name="nazwa"><input type="submit" value="Dodaj now± kategoriê">
</form>';





$ile_kat = $sql->mysql_count("firmy_kategorie");
if($ile_kat==0){
echo '<b>Brak kategorii</b> '.$dodajnowa;
}
else{



echo $dodajnowa.'<br><br>';

$wyk = mysql_query("SELECT * FROM ".PREFIX."firmy_kategorie ORDER BY poz ASC");
$licz = 1;
while($w2 = mysql_fetch_array($wyk))
{


$dodajnowasub = '<form action="index.php?admin=kategorie" method="post">
<input type="hidden" name="glowna" value="'.$w2['id'].'">
<input type="text" name="nazwasub"><input type="submit" value="Dodaj now± subkategoriê">
</form>';


$cos = '<form action="index.php?admin=kategorie" method="POST"><div style="float: left"><input type="text" name="nazwa" value="'.$w2['kategoria'].'" size="40"><input type="hidden" name="idzmien" value="'.$w2['id'].'"></div>
<div style="width: 100px; float: left; padding-right: 10px;"><input type="submit" value="Zmieñ nazwê" class="button1"></div>
</form>';



$wgore = '<a href="index.php?admin=kategorie&up='.$w2['id'].'">'.png('templates/default/img/ico/Up32.png', 32, 32).'</a>';
$wdol  = '<a href="index.php?admin=kategorie&d='.$w2['id'].'">'.png('templates/default/img/ico/Down32.png', 32, 32).'</a>';
echo '<h1>'.$cos.' <a href="index.php?admin=kategorie&usuncalkiem='.$w2['id'].'&pozold='.$w2['poz'].'" onclick="return potwierdzenie(\'Czy na pewno usun±æ kategoriê, w raz z jej subkategoriami?\')">'.png('templates/default/img/ico/Stop32.png', 32, 32).'</a> '.(($licz>1) ? $wgore : '').' '.(($licz<$ile_kat) ? $wdol : '').'</h1><div style="border: 1px solid #033e8f; padding: 5px">';



$ile_kat2 = $sql->mysql_count("firmy_subkategorie", array("idkat"=>$w2['id']));
$wyk2 = mysql_query("SELECT * FROM ".PREFIX."firmy_subkategorie WHERE idkat='".$w2['id']."' ORDER BY poz ASC");
$licz2 = 1;
while($w3 = mysql_fetch_array($wyk2))
{
$wgore2 = '<a href="index.php?admin=kategorie&sup='.$w3['id'].'&main='.$w2['id'].'">'.png('templates/default/img/ico/mUp32.png', 16, 16).'</a>';
$wdol2  = '<a href="index.php?admin=kategorie&sd='.$w3['id'].'&main='.$w2['id'].'"">'.png('templates/default/img/ico/mDown32.png', 16, 16).'</a>';


$cos = '<form action="index.php?admin=kategorie" method="POST"><div style="float: left"><input type="text" name="nazwa" value="'.$w3['subkategoria'].'" size="40"><input type="hidden" name="idzmien2" value="'.$w3['id'].'"></div>
<div style="width: 100px; float: left; padding-right: 10px;"><input type="submit" value="Zmieñ nazwê" class="button1"></div>
</form>';






echo $cos.' '.(($licz2>1) ? $wgore2 : '').' '.(($licz2<$ile_kat2) ? $wdol2 : '').' <a href="index.php?admin=kategorie&usunsub='.$w3['id'].'&stara='.$w2['id'].'&pozold='.$w3['poz'].'" onclick="return potwierdzenie(\'Czy na pewno usun±æ subkategoriê?\')">'.png('templates/default/img/ico/mStop32.png', 16, 16).'</a><hr>';
$licz2++;
}

echo $dodajnowasub;


echo '</div><br style="clear: both;">';
$licz++;
}



echo $dodajnowa;
}

?>
