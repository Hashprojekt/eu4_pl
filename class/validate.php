<?
function check_login($login){
global $sql;
// sprawdzam login

   if($login==''){
   $error = 'Nie wpisa�e� loginu!';
   }
   elseif(strlen($login)<4){
   $error = 'Login jest za kr�tki, powinien sk�ada� si� z przynajmniej 4 liter';
   }
   elseif(strlen($login)>20){
   $error = 'Login jest za d�ugi, powinien sk�ada� si� z maksymalnie 20 liter';
   }
   else{
  $ile = $sql->mysql_count(  'firmy', array('login' => $_POST['login'])  );
      if($ile<1){
      $error = '';
      }
      else{
      $error = 'Wpisany login istnieje ju� w naszej bazie danych, prosz� wpisa� inny';
      }

   }

return $error;

}










function check_pass($p1, $p2){

if($p1==''){
$error = 'Nie wpisa�e� has�a!';
}
elseif(strlen($p1)<6){
$error = 'Has�o powinno zawiera� minimum 6 znak�w';
}
elseif($p1!=$p2){
$error = 'Wpisane has�a s� r�ne';
}
else{
$error = '';
}
return $error;

}





function check_null($t, $s){
return ($s=='') ? 'Pole <u>'.$t.'</u> musi by� wype�nione!' : '';
}
function check_numeric($t, $s){
return (!is_numeric($s)) ? 'W polu <u>'.$t.'</u> powinny by� same cyfry!' : '';
}


function xss($s){
$s = stripslashes($s);
$znaki = array('&', '<', '>', '"', '\'');
$na    = array('&amp;', '&lt;', '&gt;', '&quot;', '&#39;');
return str_replace($znaki, $na, $s);
}

function check_nip($nip)
{
  $steps = array(6, 5, 7, 2, 3, 4, 5, 6, 7);
  $nip = str_replace('-', '', $nip);
  $nip = str_replace(' ', '', $nip);
  if (strlen($nip) != 10) return 0;
  for ($x = 0; $x < 9; $x++) $sum_nb += $steps[$x] * $nip[$x];
  $sum_m = $sum_nb % 11;
  if ($sum_m == 10) $sum_m = 0;
  if ($sum_m == $nip[9]) return 1;
  return 0;
}
function check_regon($regon)
{
  $steps = array(8, 9, 2, 3, 4, 5, 6, 7);
  $regon = str_replace('-', '', $regon);
  $regon = str_replace(' ', '', $regon);
  if (strlen($regon) != 9) return 0;
  for ($x = 0; $x < 8; $x++) $sum_nb += $steps[$x] * $regon[$x];
  $sum_m = $sum_nb % 11;
  if($sum_m == 10) $sum_m = 0;
  if ($sum_m == $regon[8]) return 1;
  return 0;
}


?>