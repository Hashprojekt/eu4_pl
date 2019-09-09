<?
function wiadomosc($w, $t='Wiadomo¶æ Informacyjna'){
global $tpl;

$tpl->assign( '1WIADOMOSC', $w);
$tpl->assign( '1TYTUL', $t);

return $tpl->display( 'wiadomosc.tpl' );
}
function typ($r){
$typ = array('Podstawowy', 'Rozwiniêty', 'Biznesowy');
return $typ[($r-1)];
}

function miasto($id){

$zapytanie = "SELECT * FROM ".PREFIX."miasta WHERE id=".$id;
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
return $wiersz['nazwa'];
}

}


function png($pngurl,$png_szerokosc,$png_wysokosc)
{

$x = $_SERVER['HTTP_USER_AGENT'];

if(substr_count($x,"pera")!=0)
   { $br = "Opera"; }
else if(substr_count($x,"MSIE")!=0)
   { $br = "IE"; }
else if(substr_count($x,"etscape6")!=0)
   { $br = "Netscape 6"; }
else if(substr_count($x,"rv:1.")!=0)
   { $br = "Mozilla 1.x"; }
else if(substr_count($x,"4.7")!=0)
   { $br = "Netscape 4.7x"; }
else
   { $br = "inna"; }




if($br=='IE'){
return "<img border='0' src='templates/default/img/blank.gif' style=".'"'."width: ".$png_szerokosc."px; height: ".$png_wysokosc."px; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='".$pngurl."', sizingMethod='scale')".'"'." />";
}
else{
return "<img src='".$pngurl."' border='0'>";
}

}
?>
