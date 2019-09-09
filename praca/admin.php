
Kliknij na u¿ytkowniku, aby zobaczyæ jego wszystkie raporty<br>
<br>
<?
//////////////////////////
function suma_pracy($uid){
global $user;
$zapytanie = "SELECT * FROM raporty WHERE idusera='".$uid."' AND czaskoniec!=0";
$wykonaj = mysql_query($zapytanie) or die(mysql_error());
$zarobione = 0;
while($wiersz = mysql_fetch_array($wykonaj)){
$zarobione = $zarobione + $wiersz['kasa'];
}
return $zarobione;
///
}
////////////////////////














if(($_POST['login']!='')&&($_POST['pass']!='')&&($_POST['gg']!='')&&($_POST['nid']=='')){

$ile=$sql->mysql_count("users", array("nick"=>$_POST['login']));
if($ile>0){
echo '<hr>Login: <b>'.$_POST['login'].'</b> ju¿ istnieje w bazie<hr>';
}
else{
$sql->mysql_insert("users", array("nick"=>$_POST['login'], "haslo"=>md5($_POST['pass']), "giegie"=>$_POST['gg'], "status"=>0, "ranga"=>0, "stawka"=>$_POST['stawka'] ) );
echo '<hr>Dodano nowe konto u¿ytkownika<hr>';
}


}

if($_POST['nid']!=''){
$sql->mysql_update("users", array("nick"=>$_POST['login'], "haslo"=>md5($_POST['pass']), "giegie"=>$_POST['gg'], "status"=>0, "ranga"=>0, "stawka"=>$_POST['stawka'] ), array("id"=>$_POST['nid']) );
echo '<hr>Edytowano konto u¿ytkownika<hr>';
}

$zapytanie = 'select * from users WHERE ranga=0';
echo '<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="40%">
  <tr>
    <td width="66%">&nbsp;&nbsp;<b>Pracownik</b></td>
    <td width="29%"><b>Status</b></td>
    <td width="6%"><b>GG</b></td>
  </tr>
';
$suma = 0;
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{

$zaczalprace = $sql->mysql_get("raporty", array("idusera"=>$wiersz['id'], "czaskoniec"=>0) );
$zaczalprace = $zaczalprace['czasstart'];

if($wiersz['status']==1){
$corobi = '<font color="green">pracuje</font> od '.date("H:i:s", $zaczalprace);
}
elseif($wiersz['status']==2){
$corobi = '<font color="#F8A600">przerwa</font>';
}
else{
$corobi = 'nie pracuje';
}

echo '
  <tr>
    <td width="66%">&nbsp;&nbsp;<a href="index.php?uid='.$wiersz['id'].'">'.$wiersz['nick'].' </a>&nbsp;&nbsp;&nbsp;- <a href="index.php?e='.$wiersz['id'].'">edycja</a></td>
    <td width="29%" align="center">'.$corobi.'</td>
    <td width="6%" align="center"><img src="http://www.gadu-gadu.pl/users/status.asp?id='.$wiersz['giegie'].'&styl=1"></td>
  </tr>
';


}
echo '</table>';


if($_GET['e']!=''){
$pracownik = $sql->mysql_get("users", array("id"=>$_GET['e']));
echo '<br>
<br><b>Edycja u¿ytkownika '.$pracownik['nick'].'</b>
<form action="index.php" method="POST">
Login: <input type="text" name="login" value="'.$pracownik['nick'].'"> GG: <input type="text" name="gg" size="9" value="'.$pracownik['giegie'].'"> Stawka: <input type="text" name="stawka" size="1" value="'.$pracownik['stawka'].'">z³.<input type="hidden" name="nid" value="'.$_GET['e'].'">
<input type="submit" value="edytuj usera"> <input type="button" value="anuluj" OnClick="window.location=\'index.php\'">
 
</form>
<hr>';
}
else{


echo '<br>
<br>
<form action="index.php" method="POST">
Login: <input type="text" name="login"> Has³o: <input type="text" name="pass" size="7"> GG: <input type="text" name="gg" size="9"> Stawka: <input type="text" name="stawka" size="1">z³.
<input type="submit" value="dodaj usera">

</form>
<hr>';

}









if($_GET['uid']!=''){
$pracownik = $sql->mysql_get('users', array('id'=>$_GET['uid']));



if($_POST['zl']!=''){
if($_POST['gr']==''){ $gr = '0'; }else{ $gr=$_POST['gr']; }


$kwota = $_POST['zl'].'.'.$gr;
$sql->mysql_insert('wyplaty', array('komu'=>$_POST['uid'], 'kwota'=>$kwota, 'czas'=>time()));
header("Location: index.php?uid=".$_POST['uid']."&msg=1");
}

function suma_wyplat($uid){
$zapytanie = "SELECT * FROM wyplaty WHERE komu='".$uid."'";
$wykonaj = mysql_query($zapytanie) or die(mysql_error());
$wyplacone = 0;
while($wiersz = mysql_fetch_array($wykonaj)){
$wyplacone = $wyplacone + $wiersz['kwota'];
}
return $wyplacone;
///
}

$wyplacono = suma_wyplat($pracownik['id']);
if($wyplacono == 0){
$wyplacono = '0';
}
$naleznosci = suma_pracy($pracownik['id']) - $wyplacono;

if($_GET['msg']==1){
echo '<b>dokonano wyp³aty!</b><br><br>';
}


echo '
Zarobi³  : <b>'.suma_pracy($pracownik['id']).'z³</b><br>
Wyp³acono: '.$wyplacono.'z³<br>
Pozosta³o do zap³aty: <b>'.$naleznosci.'z³</b>
<form action="index.php?uid='.$_GET['uid'].'" method="POST">Wyp³aæ:
<input type="hidden" name="uid" value="'.$_GET['uid'].'">
<input type="text" name="zl" size="2">z³ <input type="text" name="gr" size="1" maxlength="2" value="00"> groszy

<input type="submit" value="Kliknij aby zapisaæ wyp³atê">

</form><hr>';







echo '<h2>Raporty pracownika '.$pracownik['nick'].' </h2>';


/*


$sql2 = 'select count(*) from raporty WHERE idusera='.$_GET['uid'];
$result = mysql_query($sql2);
$row = mysql_fetch_array($result);
$recordsCount = $row[0];
$pager = new Pager('str', 'index.php?id=raporty'); // id pagera / adres pliku (domyslnie puste)
$pager->SetTotalRecords($recordsCount);
$pager->SetRecordsPerPage(20);
$pag = $pager->Render(true);
$start = $pager->GetIndexRecordStart();
$end = $pager->GetIndexRecordEnd();
$pager->_userWholeLink = 'index.php?id=raporty';
$zapytanie = 'select * from raporty WHERE czaskoniec!=0 AND idusera = '.$_GET['uid'].' ORDER BY czaskoniec DESC limit '.$start.','.($end - $start + 1);
echo '<center>'.$pag.'</center>';
echo '<hr>Na czerwono czas odjêty stanowi± przerwy w czasie pracy';
echo '<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="63%">
  <tr>
    <td width="13%"><b>Rozpoczêcie</b></td>
    <td width="14%"><b>Zakoñczenie</b></td>
    <td width="12%"><b>Czas</b></td>
    <td width="61%"><b>Raport</b></td>
  </tr>
';
$suma = 0;
$suma2 = 0;
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
$minut = floor(($wiersz['czaskoniec']-$wiersz['czasstart'])/60);
$suma = $minut + $suma;

$suma2 = $minut + $suma2 - ($wiersz['minus']/60);

echo '
  <tr>
    <td width="13%">'.date("Y-m-d H:i:s", $wiersz['czasstart']).'</td>
    <td width="14%">'.date("Y-m-d H:i:s", $wiersz['czaskoniec']).'</td>
    <td width="12%">'.$minut.'min.(<font color="red">-'.($wiersz['minus']/60).'</font>)</td>
    <td width="61%">'.$wiersz['raport'].'</td>
  </tr>';
}
echo '
  <tr>
    <td width="13%" colspan="2"><b>Czas pracy w sumie: </b></td>

    <td width="87%" colspan="2"><b>'.$suma.'min.</b> po odliczeniu wszystkich przerw: <b>'.$suma2.'</b></td>

  </tr>';
echo '</table>';
echo '<center>'.$pag.'</center>';
	
*/
////////////////////////////////////////////////////////
$pracownik = $sql->mysql_get('users', array('id'=>$_GET['uid']));
	if($_GET['rok']=='0'){
$_GET['rok']=date("Y");
}
$zzz = 'select MIN(czasstart) from raporty WHERE idusera='.$_GET['uid'].' LIMIT 1;';
$result2 = mysql_query($zzz);
$row2 = mysql_fetch_array($result2);
$min = $row2[0];
$zzz = 'select MAX(czasstart) from raporty LIMIT 1;';
$result2 = mysql_query($zzz);
$row2 = mysql_fetch_array($result2);
$max = $row2[0];

$min_rok = date("Y", $min);
$max_rok = date("Y", $max);

$min_mc  = date("n", $min);
$max_mc  = date("n", $max);

	
echo '<select onchange="window.location=\'index.php?uid='.$_GET['uid'].'&rok='.(($_GET['rok']=='') ? '0' : $_GET['rok']).'&m=\'+this.value"><option value="0">Wybierz miesi±c</option>';
$mce = array('', 'Styczeñ', 'Luty', 'Marzec', 'Kwiecieñ', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpieñ', 'Wrzesieñ', 'Pa¡dziernik', 'Listopad', 'Grudzieñ');
for($i=$min_mc; $i<=$max_mc; $i++){
echo '<option value="'.$i.'"'.(($i==$_GET['m']) ? ' selected' : '').'>'.$mce[$i].'</option>';
}

echo '</select>';

echo '<select onchange="window.location=\'index.php?uid='.$_GET['uid'].'&m='.(($_GET['m']=='') ? '0' : $_GET['m']).'&rok=\'+this.value"><option value="0">Wybierz rok</option>';

for($i=$min_rok; $i<=$max_rok; $i++){
echo '<option value="'.$i.'"'.(($i==$_GET['rok']) ? ' selected' : '').'>'.$i.'</option>';
}

echo '</select> <input type="button" value="Poka¿ wszystkie" OnClick="window.location=\'index.php?uid='.$_GET['uid'].'\'"> <input type="button" value="Zamknij raporty" OnClick="window.location=\'index.php\'">';



	
$sql2 = 'select count(*) from raporty WHERE idusera='.$_GET['uid'].' AND czaskoniec!=0';
$result = mysql_query($sql2);
$row = mysql_fetch_array($result);
$recordsCount = $row[0];
$pager = new Pager('str', 'index.php?uid='.$_GET['uid']); // id pagera / adres pliku (domyslnie puste)
$pager->SetTotalRecords($recordsCount);

if($_GET['m']!=''){
$pager->SetRecordsPerPage(1000000);
}
else{
$pager->SetRecordsPerPage(10);
}


$pag = $pager->Render(true);
$start = $pager->GetIndexRecordStart();
$end = $pager->GetIndexRecordEnd();
$pager->_userWholeLink = 'index.php?uid='.$_GET['uid'];
$zapytanie = 'select * from raporty WHERE czaskoniec!=0 AND idusera = '.$_GET['uid'].' ORDER BY czaskoniec DESC limit '.$start.','.($end - $start + 1);
echo '<center><font face="Verdana" size="1">'.$pag.'</font></center>';




echo '<table border="1" cellpadding="5" cellspacing="5" style="border-collapse: collapse" bordercolor="#C0C0C0" width="707" bgcolor="#F3F3F3">
  <tr>
    <td width="127" bgcolor="#CC0000">
    <font face="Verdana" size="1" color="#FFFFFF"><b>Rozpoczêcie</b> </font>
    </td>
    <td width="126" bgcolor="#CC0000">
    <font face="Verdana" size="1" color="#FFFFFF"><b>Zakoñczenie</b> </font>
    </td>
    <td width="80" bgcolor="#CC0000">
    <font face="Verdana" size="1" color="#FFFFFF"><b>Czas</b> </font></td>
    <td width="374" bgcolor="#CC0000">
    <font face="Verdana" size="1" color="#FFFFFF"><b>Raport</b></font></td>
  </tr>

';


$suma = 0;
$suma2 = 0;
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
$r_rok = date("Y", $wiersz['czasstart']);
$r_mc  = date("n", $wiersz['czasstart']);


if($_GET['m']!=''){

	if($_GET['rok']==''){ $rok = date("Y"); }else{ $rok = $_GET['rok']; }

   if(($rok==$r_rok)&&($r_mc==$_GET['m'])){
   
   $minut = floor(($wiersz['czaskoniec']-$wiersz['czasstart'])/60);
$suma = $minut + $suma;

$suma2 = $minut + $suma2 - floor($wiersz['minus']/60);
   
   echo '
     <tr>
       <td width="127"><font face="Verdana" size="1">'.date("Y-m-d H:i:s", $wiersz['czasstart']).'</font></td>
       <td width="126"><font face="Verdana" size="1">'.date("Y-m-d H:i:s", $wiersz['czaskoniec']).'</font></td>
       <td width="80"><font face="Verdana" size="1">'.$minut.'min.(<font color="red">-'.floor($wiersz['minus']/60).'</font>)</font></td>
       <td width="374"><font face="Verdana" size="1">'.$wiersz['raport'].'</font></td>
     </tr>
   ';
   }

}
else{
$minut = floor(($wiersz['czaskoniec']-$wiersz['czasstart'])/60);
$suma = $minut + $suma;

$suma2 = $minut + $suma2 - floor($wiersz['minus']/60);
echo '
  <tr>
    <td width="127"><font face="Verdana" size="1">'.date("Y-m-d H:i:s", $wiersz['czasstart']).'</font></td>
    <td width="126"><font face="Verdana" size="1">'.date("Y-m-d H:i:s", $wiersz['czaskoniec']).'</font></td>
    <td width="80"><font face="Verdana" size="1">'.$minut.'min.(<font color="red">-'.floor($wiersz['minus']/60).'</font>)</font></td>
    <td width="374"><font face="Verdana" size="1">'.$wiersz['raport'].'</font></td>
  </tr>
';
}





}


$zarobione = $pracownik['stawka'] * ($suma2/60);


echo '
  <tr>
    <td width="13%" colspan="2"><font face="Verdana" size="1"><b>Czas pracy w sumie: </b></font></td>

    <td width="87%" colspan="2"><font face="Verdana" size="1">'.$suma.'min. po odliczeniu wszystkich przerw: <b>'.floor($suma2).'min</b></font></td>

  </tr>';
echo '</table>';
echo '<center><font face="Verdana" size="1">'.$pag.'</font></center>';
	
	
	
	
///////////////////////////////////////////////////
}

?>


</table>
