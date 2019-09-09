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
$pozostalo = suma_pracy($user['id']) - suma_wyplat($user['id']);
echo 'Zarobi³e¶: <b>'.suma_pracy($user['id']).'</b>z³<br>Wyp³acono: '.suma_wyplat($user['id']).'z³, pozosta³o wyp³aty: <b>'.$pozostalo.'z³</b>';


echo '<hr>';

if($_GET['teraz']=='praca'){
$sql->mysql_update('przerwa', array('czaskoniec' => time()), array('idusera' => $user['id'], 'czaskoniec' => '0')  );
$sql->mysql_update(  'users', array('status' => '1'), array('id' => $user['id'])  );
}





if($_GET['teraz']=='przerwa'){
$przerwa = $sql->mysql_count(  'przerwa', array('idusera' => $user['id'], 'czaskoniec'=>0)  );
if($przerwa==0){
$sql->mysql_update(  'users', array('status' => '2'), array('id' => $user['id'])  );
$sql->mysql_insert("przerwa", array("idusera"=>$user['id'], "czasstart"=>time(), "czaskoniec"=>'0') );
}
}
$przerwa = $sql->mysql_count(  'przerwa', array('idusera' => $user['id'], 'czaskoniec'=>0)  );














if($przerwa==1){
echo '<span style="font-size: 10px; font-family: Verdana;"><a href="index.php?teraz=praca">Jeste¶ w trakcie przerwy, kliknij tu aby j± zakoñczyæ i wróciæ do pracy</a><br><br>Czas pracy jest ca³y czas naliczany, po dodaniu raportu, czas przerwy zostanie automatycznie odjêty od czasu Twojej pracy</span>';
exit;
}


switch ($_GET['id'])
{

	case pracownicy:
echo '<h2>Spis pracowników</h2>';
$zapytanie = 'select * from users ORDER by nick ASC';
	$i = 1;
$wykonaj = mysql_query($zapytanie);
while($wiersz = mysql_fetch_array($wykonaj))
{
	echo '<b>'.$i.'. </b><img src="http://www.gadu-gadu.pl/users/status.asp?id='.$wiersz['giegie'].'&styl=1"> <a href="gg:'.$wiersz['giegie'].'">'.$wiersz['nick'].' </a><br>'; $i++;
}
break;


	case raporty:

if($_GET['rok']=='0'){
$_GET['rok']=date("Y");
}
$zzz = 'select MIN(czasstart) from raporty WHERE idusera='.$user['id'].' LIMIT 1;';
$result2 = mysql_query($zzz);
$row2 = mysql_fetch_array($result2);
$min = $row2[0];
$zzz = 'select MAX(czasstart) from raporty WHERE idusera='.$user['id'].' LIMIT 1;';
$result2 = mysql_query($zzz);
$row2 = mysql_fetch_array($result2);
$max = $row2[0];

$min_rok = date("Y", $min);
$max_rok = date("Y", $max);

$min_mc  = date("n", $min);
$max_mc  = date("n", $max);

	
echo '<select onchange="window.location=\'index.php?id=raporty&rok='.(($_GET['rok']=='') ? '0' : $_GET['rok']).'&m=\'+this.value"><option value="0">Wybierz miesi±c</option>';
$mce = array('', 'Styczeñ', 'Luty', 'Marzec', 'Kwiecieñ', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpieñ', 'Wrzesieñ', 'Pa¼dziernik', 'Listopad', 'Grudzieñ');
for($i=$min_mc; $i<=$max_mc; $i++){
echo '<option value="'.$i.'"'.(($i==$_GET['m']) ? ' selected' : '').'>'.$mce[$i].'</option>';
}

echo '</select>';

echo '<select onchange="window.location=\'index.php?id=raporty&m='.(($_GET['m']=='') ? '0' : $_GET['m']).'&rok=\'+this.value"><option value="0">Wybierz rok</option>';

for($i=$min_rok; $i<=$max_rok; $i++){
echo '<option value="'.$i.'"'.(($i==$_GET['rok']) ? ' selected' : '').'>'.$i.'</option>';
}

echo '</select> <input type="button" value="Poka¿ wszystkie" OnClick="window.location=\'index.php?id=raporty\'">';



	
$sql2 = 'select count(*) from raporty WHERE idusera='.$user['id'].' AND czaskoniec!=0';
$result = mysql_query($sql2);
$row = mysql_fetch_array($result);
$recordsCount = $row[0];
$pager = new Pager('str', 'index.php?id=raporty'); // id pagera / adres pliku (domyslnie puste)
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
$pager->_userWholeLink = 'index.php?id=raporty';
$zapytanie = 'select * from raporty WHERE czaskoniec!=0 AND idusera = '.$user['id'].' ORDER BY czaskoniec DESC limit '.$start.','.($end - $start + 1);
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


$zarobione = $user['stawka'] * ($suma2/60);


echo '
  <tr>
    <td width="13%" colspan="2"><font face="Verdana" size="1"><b>Czas pracy w sumie: </b></font></td>

    <td width="87%" colspan="2"><font face="Verdana" size="1">'.$suma.'min. po odliczeniu wszystkich przerw: <b>'.floor($suma2).'</b> Zarobi³e¶: <b>'.$zarobione.'z³</b></font></td>

  </tr>';
echo '</table>';
echo '<center><font face="Verdana" size="1">'.$pag.'</font></center>';
	
	
  
		break;
	case status:
                default:
		if($_GET['id']=='start'){

if($user['status']==0){
$sql->mysql_insert(  'raporty', array('idusera' => $user['id'], 'czasstart' => time())  );
}

$user['status']=1;
$sql->mysql_update(  'users', array('status' => '1'), array('id' => $user['id'])  );


}

if($_POST['raport']!=''){




$zapytanie = "SELECT * FROM przerwa WHERE idusera='".$user['id']."'";
$wykonaj = mysql_query($zapytanie);
$sumaprzerw = 0;
while($wiersz = mysql_fetch_array($wykonaj))
{
$czasjednej = $wiersz['czaskoniec']-$wiersz['czasstart'];
$sumaprzerw = $sumaprzerw + $czasjednej;

}








$raport = $sql->mysql_get('raporty', array('idusera'=>$user['id'], 'czaskoniec'=>'0'));





$poczta = 'Czas rozpoczecia pracy: '.date("Y-m-d H:i:s", $raport['czasstart'])."\n Czas zakonczenia pracy:".date("Y-m-d H:i:s")."\n
 W sumie czas pracy po odjêciu przerw (przerwy wynosi³y w sumie ".($sumaprzerw/60)." min.): ".floor((time()-$raport['czasstart']-$sumaprzerw)/60)."min.\n Raport pracownika ".$user['nick']."\n\n".$_POST['raport'];
$tytul = 'Raport: '.$user['nick'];

$teraz = time();

$wsumie = $teraz - $raport['czasstart'] - $sumaprzerw;

$zarobil = round((($wsumie/60)/60)*$user['stawka'], 2);

$sql->mysql_update(  'raporty', array('czaskoniec' => $teraz, 'raport'=>$_POST['raport'], 'minus'=>$sumaprzerw, 'kasa'=>$zarobil), array('id' => $raport['id'])  );
$sql->mysql_update(  'users', array('status' => '0'), array('id' => $user['id'])  );


$sql->mysql_delete('przerwa', array("idusera"=>$user['id']) );

//mail("postmaster@info.net.pl",$tytul,$poczta);
$user['status']=0;
echo '<b>Raport zosta³ dodany!</b><hr>';
}








if($user['status']==0){
echo '<a href="index.php?id=start">[Zaczynam pracê]</a>';
}
if($user['status']==1){
$kiedyzaczal = $sql->mysql_get('raporty', array('idusera'=>$user['id'], 'czaskoniec'=>'0'));
$kiedyzaczal = $kiedyzaczal['czasstart'];

?>



<script type="text/javascript">
v=new Date(<? echo $kiedyzaczal*1000; ?>); 
var bx0=document.getElementById('bx0');
function zegar(){

D = new Date();


s2=0+Math.round((D.getTime()-v.getTime())/1000);
m2=0;
h2=0;
if(s2<0){
bx0.innerHTML='-';
}
else{
   if(s2>59){
   m2=Math.floor(s2/60);
   s2=s2-m2*60;
   }
   if(m2>59){
   h2=Math.floor(m2/60);
   m2=m2-h2*60;
   } 
   if(s2<10){
   s2="0"+s2;
   }
   if(m2<10){
   m2="0"+m2;
   }
document.getElementById('bx0').innerHTML=""+h2+":"+m2+":"+s2+'';

}
setTimeout('zegar()', 1000);
}
</script>







<?
echo '
<div style="float: left; font-size: 10px; font-weight: bold; font-family: Arial; text-align: center; width: 20px; color: silver;">
S<br>
T<br>
A<br>
T<br>
U<br>
S<br><br>
<br>
R<br>
A<br>
P<br>
O<br>
R<br>
T</div>

<div style="float: left; font-family: Verdana; font-size: 10px;">
';



echo '
<span style="font-size: 30px;"><span id="bx0"></span>
<script type="text/javascript">zegar()</script></span> - Czas Twojej pracy<br>
<span style="font-size: 20px; color: silver">'.date("H:i:s", $kiedyzaczal).'</span> - Godzina rozpoczêcia pracy<br>';

if(($_POST['f']==1)&&($_POST['raport']=='')){
echo '<b style="color: red">Nie wpisa³e¶ Raportu!</b><br>';
}


echo '
<br><form action="index.php?id=end" method="POST"><input type="hidden" name="f" value="1">
<textarea name="raport" style="height: 400px; width: 400px; font-family: Verdana; font-size: 10px; color: #530002; border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1; background-color: #F3F3F3"></textarea><br>
      <br>
      <input type="submit" value="Prze¶lij raport i zakoñcz pracê" style="color: #FFFFFF; font-family: Verdana; font-size: 10px; font-weight: bold; border: 1px solid #800000; background-color: #999999; width: 400px;"></form>
  
</div>';










}
}
?>






