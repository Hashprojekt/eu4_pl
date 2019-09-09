<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>galeria</title>
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2">
<LINK href="css/css.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="css/js.js"></script>
</head>
<?
require_once 'array.inc.php';
$plks = glob('mini/*.jpg');
$ile_obrazow = count($plks);
$ile_kolumn = 8;
$ile_wierszy = ($ile_obrazow / $ile_kolumn);
$plks = array_1dim_to_2dim($plks, $ile_kolumn);



?>

<?
for ($i = 0; $i < $ile_wierszy; $i++) {
 echo '<tr>';
 for ($j = 0; $j < $ile_kolumn; $j++) {
 if (isset($plks[$i][$j]) && ($plks[$i][$j] != '')) {
echo '<td><img src="'.$plks[$i][$j]' onmouseover="show_popup(this_event);"'.' onmousemove="move_popup(event) ;"'.' onmouseout="hide_popup();"'.' alt="" /></td>';
	  } else {
     echo '<td></td>' . "n";
     }
  }
   echo '</tr>';
 }

?>
<body>
<div id="popup">
<img id="duze" src="none" alt="" />
<div id="exif">

</div>
</div>
</body>
</html>