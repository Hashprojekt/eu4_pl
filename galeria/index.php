<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//PL">
<HTML><HEAD>
<TITLE>Galeria zdjęć</TITLE>
<META name="keywords" content="Galeria zdjęć">
<META name="description" content="Galeria zdjęć">
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=iso-8859-2">
<META HTTP-EQUIV="Reply-to" CONTENT="biuro@eu4.pl">
<META HTTP-EQUIV="Content-Language" CONTENT="pl">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META NAME="Author" CONTENT="Bartosz Siemczyn">
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<LINK href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#070803" style="font: verdana" text="#a308eb">
<center>
<table align="center" width="1000">
<tr>
	<td width="400" align="left" valign="bottom">

	</td>
	<td width="100" align="center" valign="bottom">
&nbsp;
<!-- srodkowy margin -->
	</td>
	<td width="400" align="right" valign="bottom">

	</td>
</tr>
<tr><td colspan="3" height="30">&nbsp;</td></tr>
<!-- strona glowna -->
<tr>
	<td width="400" align="center" valign="bottom" colspan="3" class="a"><center>
<!-- tab -->
	<table align="center" width="1000">
	<tr>
	<td align="center" width="1000">
	
	
<!-- srodek -->
<!-- div style="width: 800px" align="center"><center -->
<?
$dir = "galeria";
$dir2=$dir.'/';

if (is_dir($dir2)) {
   if ($dh = opendir($dir2)) {
       while (($file = readdir($dh)) !== false) {
           if($file != "." && $file != ".." && eregi('.jpg', $file)){
                $WSZYSTKIE[] = $file;
           }
       }
       closedir($dh);
   }
}
sort($WSZYSTKIE);  $_onPage = 4;
$_stron = ceil(count($WSZYSTKIE)/$_onPage);

$_numerStrony = (int) $_GET['strona'];
if($_numerStrony<1 || $_numerStrony>$_stron){ $_numerStrony = 1; }
$_page = $_numerStrony;

  function win2utf(){
       $tabela = Array(
        "\xb9" => "\xc4\x85", "\xa5" => "\xc4\x84", "\xe6" => "\xc4\x87", "\xc6" => "\xc4\x86",
        "\xea" => "\xc4\x99", "\xca" => "\xc4\x98", "\xb3" => "\xc5\x82", "\xa3" => "\xc5\x81",
        "\xf3" => "\xc3\xb3", "\xd3" => "\xc3\x93", "\x9c" => "\xc5\x9b", "\x8c" => "\xc5\x9a",
        "\x9f" => "\xc5\xbc", "\xaf" => "\xc5\xbb", "\xbf" => "\xc5\xba", "\xac" => "\xc5\xb9",
        "\xf1" => "\xc5\x84", "\xd1" => "\xc5\x83");
       return $tabela;
  }
  function konwertuj($tekst){
     return strtr($tekst, win2utf());
  }


for($i=(($_page*$_onPage)-$_onPage); $i<($_page*$_onPage); $i++){
    if($WSZYSTKIE[$i]){
        $opis = $dir2.(str_replace('.jpg', '.txt', $WSZYSTKIE[$i]));
        if(file_exists($opis)){ $title = konwertuj(file_get_contents($opis)); }else{ $title = ''; }
        echo '
        <a href="'.$dir2.$WSZYSTKIE[$i].'" rel="lightbox[dms]" title="'.$title.'">
        <img src="'.$dir2.$WSZYSTKIE[$i].'" alt="'.$file.'" height="120" class="img"/>
        </a>
        ';
    }
}
?>



<!-- /div -->
</td>
	</tr>
	<tr>
	<td align="center" width="1000">
	
Strona :
<?php
for($i=1; $i<=$_stron; $i++){
    echo ($i>1?' | ':'').'<a href="index.php?strona='.$i.'" class="stronicowanie'.($_numerStrony==$i?'On':'').'">'.$i.'</a>';
}

?>

</td></tr></table>

	</td>
</tr>
<tr><td colspan="3" height="30">&nbsp;</td></tr>
<!-- stopa -->

<tr bgcolor="#070803" width="1000" align="center">
	
<td width="1000" align="justify" colspan="3" class="d"><center>

</center></td>
</tr>




</table>
</center>
</body>
</html>
