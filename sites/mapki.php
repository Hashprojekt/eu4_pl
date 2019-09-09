<?
header('content-type: image/png');
header("Content-Disposition: attachment; filename=inf_net_pl.png;");
$znaczek = '../mapki/watermark.png';
if($_GET['f']!=''){

///////////////////////////////////////////////////
$plik = str_replace("/", '', $_GET['f']);
$plik = str_replace("..", '', $plik);
$plik = '../mapki/'.$plik;

//////////////////////////////////////////////////
}
elseif($_GET['l']!=''){
$plik = str_replace("/", '', $_GET['l']);
$plik = str_replace("..", '', $plik);
$plik = '../loga/'.$plik;
}
elseif($_GET['z']!=''){
$plik = str_replace("/", '', $_GET['z']);
$plik = str_replace("..", '', $plik);
$plik = '../zdjecia/'.$plik;
}

$obrazek = ImageCreateFromJPEG($plik);
$znaczek = imagecreatefrompng($znaczek);
$znaczek_w = @imagesx($znaczek);  
$znaczek_h = @imagesy($znaczek);  
$rozmiar = getimagesize($plik);  
$x = 0;  
$y = $rozmiar[1] - $znaczek_h;  

@imagecopy($obrazek, $znaczek, $x, $y, 0, 0, imagesx($znaczek), imagesy($znaczek) );
Imagepng($obrazek);
ImageDestroy($obrazek);
ImageDestroy($znaczek);
?>
