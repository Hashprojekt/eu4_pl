<?
if($_POST['twojmail']!=''){
echo 'mail zosta� wys�any';
}
else{
echo $tpl->display( 'kontakt.tpl' );
}
?>