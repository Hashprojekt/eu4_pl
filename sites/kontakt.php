<?
if($_POST['twojmail']!=''){
echo 'mail zosta³ wys³any';
}
else{
echo $tpl->display( 'kontakt.tpl' );
}
?>