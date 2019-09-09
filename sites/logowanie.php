<?



if(($_POST['login']!='')&&($_POST['haslo']!='')){




   if(login($_POST['login'], $_POST['haslo'], $_POST['us'])){

   header("Location: index.php");

   }
   else{
   echo wiadomosc('Wpisa³e¶ z³e dane', 'B³±d');
   echo $tpl->display( 'logowanie.tpl' );
   }


}
else{
echo $tpl->display( 'logowanie.tpl' );
}
?>
