<?php
define("SESID", SESSION_NAME() . "=" . SESSION_ID());
define("SN", 'infonet');




function get_user($id, $typ){

if($typ=='1'){
$tabela = 'firmy';
}
elseif($typ=='2'){
$tabela = 'admins';
}


   $zapytanie = "SELECT * from ".PREFIX.$tabela." WHERE id='".$id."' LIMIT 1; ";
   $wykonaj = mysql_query($zapytanie) or die(mysql_error());
   while($wiersz = mysql_fetch_array($wykonaj))
   {
   return $wiersz;

   }

}


# zaloguj user-a
function login($login, $passwd, $typ)
{

if($typ=='1'){
$tabela = 'firmy';
}
elseif($typ=='2'){
$tabela = 'admins';
}



$ile = mysql_query("SELECT COUNT(*) from ".PREFIX.$tabela." WHERE login='".$login."' AND haslo='".$passwd."' LIMIT 1; ") or die(mysql_error());
$ile = mysql_fetch_row($ile);
$ile = $ile[0];

if($ile==0){ return false; }
   else{
   $zapytanie = "SELECT * from ".PREFIX.$tabela." WHERE login='".$login."' AND haslo='".$passwd."' LIMIT 1; ";
   $wykonaj = mysql_query($zapytanie) or die(mysql_error());
   while($wiersz = mysql_fetch_array($wykonaj))
   { $_SESSION[SN."USER_AUTH"] = True; $_SESSION[SN."USER_ID"] = $wiersz['id'];
   $_SESSION[SN.'typ'] = $typ;

   }
    return True;

   }




}



# wyloguj user-a
function logout()
{
$user = '';
$_SESSION[SN."USER_AUTH"] = False;
$_SESSION[SN."USER_ID"] = Null;
session_destroy();
}




# sprawdz czy zalogowany
function auth(){ return ($_SESSION[SN."USER_AUTH"] == True); }
if(auth()){
$user=get_user($_SESSION[SN."USER_ID"], $_SESSION[SN.'typ']);
$user['typ'] = $_SESSION[SN.'typ'];
}
else{
$user='';
}

?>
