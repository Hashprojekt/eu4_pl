<?
if(($_POST['regon']!='')&&($_POST['dni']!='')){

$ile = $sql->mysql_count('firmy', array("nazwa_firmy"=>$_POST['regon']));

if($ile<1){
echo wiadomosc("W bazie nie istnieje firma o takiej nazwie");
}
else{

$firma = $sql->mysql_get('firmy', array("nazwa_firmy"=>$_POST['regon']) );


$kiedy = time() + (86400*$_POST['dni']);

$sql->mysql_update('firmy', array("wygasa"=>$kiedy), array("nazwa_firmy"=>$_POST['regon']) );


echo wiadomosc('Og³oszenie zosta³o przed³u¿one dla firmy: <b>'.$firma['nazwa_firmy'].'</b>');
}
}






?>

<form action="index.php?admin=przedluz" method="POST">
Nazwa firmy: <input type="text" name="regon"><br><br>

Przed³u¿ og³oszenie o <input type="text" name="dni" size="2"> dni (od dnia dzisiejszego)<br>
<br>
<input type="submit" value="Przed³u¿..." class="button1">

</form>
