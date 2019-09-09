<?

$zap = "SELECT * FROM ".PREFIX."firmy WHERE widoczne>0 AND wygasa>'".time()."' ORDER BY 'datarejestracji' ASC LIMIT 0,5;";
$wykonaj123 = mysql_query($zap) or die(mysql_error());
while($wierszz = mysql_fetch_array($wykonaj123))
{
$ostatnie_10 .= '<b><a href="index.php?id=ogloszenie&amp;n='.$wierszz['id'].'">'.$wierszz['nazwa_firmy']."</a></b><br>".$wierszz['opis'].'<br><br>';

}
$zap = "SELECT * FROM ".PREFIX."sklepy_linki";
$wykonaj123 = mysql_query($zap) or die(mysql_error());
$NASZE_SKLEPY = '    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%">';
while($wierszz = mysql_fetch_array($wykonaj123))
{
$NASZE_SKLEPY .= '      <tr>
        <td width="18%">'.$wierszz['kategoria'].'</td>
        <td width="37%"><a href="'.$wierszz['link'].'" target="_blank">'.$wierszz['nazwa'].'</a></td>
        <td width="45%">'.$wierszz['opis'].'</td>
      </tr>';
}
$NASZE_SKLEPY .= '</table>';

$tpl->assign( 'NASZE_SKLEPY', $NASZE_SKLEPY);

$tpl->assign( 'OPIS', $k['coto']);

$tpl->assign( 'OSTATNIE_10', $ostatnie_10);











echo $tpl->display( 'start.tpl' );






//////////





$zap = mysql_query("SELECT * FROM ".PREFIX."linki");

while($w = mysql_fetch_array($zap))
{


echo '<h1>'.$w['nazwa'].'</h1>
<table style="border-collapse: collapse;" border="0" cellpadding="0" cellspacing="0" width="100%">      <tbody>
<tr>';
$zap2 = mysql_query("SELECT * FROM ".PREFIX."linki_kategorie WHERE sekcja='".$w['id']."'");
   while($w2 = mysql_fetch_array($zap2))
   {


$zap3 = mysql_query("SELECT * FROM ".PREFIX."linki_strony WHERE kategoria='".$w2['id']."'");
      while($w3 = mysql_fetch_array($zap3))
      {

if($w3['zdjecie']!=''){
$fotka = '<img src="foto_linki/'.$w3['zdjecie'].'" alt=""><br>';
}
else{
$fotka = '';
}
   	echo '<tr>
           <td width="18%">'.$w2['nazwa'].'</td>
           <td width="37%"><a href="'.$w3['nazwa'].'">'.$fotka.'
'.$w3['nazwa'].'</a></td>
           <td width="45%">'.$w3['opis'].'</tr>';


      }


   }



echo '</tr></tbody></table>';
}










?>
