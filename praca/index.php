<?
ob_Start();
require_once("sesja/index.php");
require_once("class/mysql.class.php");
require_once("class/pager.class.php");
//$sql = new db_mysql('eu4_5', 'raporty', 'eu4_5', 'sql.eu4.nazwa.pl');
$sql = new db_mysql('eu4_praca', 'gruzja', 'eu4_praca');

if(($_POST['login']!='')&&($_POST['pw']!='')){ 

login($_POST['login'], $_POST['pw']); 
}
if($_GET['id']=='lo'){
logout();
echo 'Zostałeś wylogowany<br>';
}


if(!auth()){
echo '<form action="index.php" method="POST">
Login: <input type="text" name="login" size="50"><br>
Hasło: <input type="password" name="pw" size="50"><br>
<br><input type="submit" value="Loguj"></form>';
exit;
}
$user = get_user($_SESSION["USER_ID"]);





?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2">
<title>PRACA</title>
<script src="sss/js.js" type="text/javascript"></script>
<style type="text/css">


a:link,
a:visited,
a:active
{
	background: transparent;
	color: #890000;
	text-decoration: none;
}

a:hover
{
	background: transparent;
	color: inherit;
	text-decoration: underline;
}
	#mainContainer{
		width:760px;
		margin:0 auto;
		border-left:1px solid #000;
		border-right:1px solid #000;
		text-align:left;
		background-color:#FFF;
		height:100%;
	}
	.leftMenu{
		float:left;
		width:167px;
		padding-left:3px;	
	}
	
	#contentContainer{
		width: 580px;
		float:left;
		padding-right:10px;
	}
	
	/* END CSS ONLY NEEDED FOR THIS DEMO */
	
	#dhtmlgoodies_menu{	/* Menu object */
		margin:0px;
		padding:0px;
		width:170px;	/* Width of menu */
	}
	#dhtmlgoodies_menu li{
		margin-top:2px;	/* Space between each menu item */
		
		
		/* Don't change these four values */
		list-style-type:none;				
		clear:both;
		display:block;	
		overflow:auto;
	}
	
	#dhtmlgoodies_menu li a{	/* Text rules for the menu items */
		color:#000;	/* Black text color */
		text-decoration:none;	/* No underline */
		font-family: Verdana;	/* Font to use */
		letter-spacing:1px;	/* Extra space between each letter of the menu items */
		font-size:10px;	/* Fixed font size */
		font-weight:bold;	/* Bold font */
		float:left;
		background-color:#F1F1F1;
		padding-left:3px;
		line-height:20px;	/* Height of menu links */

	}
	#dhtmlgoodies_menu li div{
		float:left;

	}
	
</style>
</head>
<body>

<div style="position: absolute; top: 10px; left: 20px;"><span style="font-size: 50px; font-weight: bold; font-family: Tahoma; color: black;">Panel pracownika E-Bis</span></div>
<div style="position: absolute; top: 8px; left: 18px;"><span style="font-size: 50px; font-weight: bold; font-family: Tahoma; color: silver">Panel pracownika E-Bis</span></div>


<br>
<br>
<br>


<br style="clear: both">
<div style="float: left; width: 210px; font-family: Verdana; font-size: 10px;">

<SCRIPT LANGUAGE="JavaScript">var clocksize='200';</SCRIPT>
<SCRIPT SRC="clock.js"></SCRIPT>





<br>
<br>
<?
$zapytanie = "SELECT * FROM przerwa WHERE idusera='".$user['id']."' AND czaskoniec>0";
$wykonaj = mysql_query($zapytanie);
$i = 1;
$suma = 0;
while($wiersz = mysql_fetch_array($wykonaj))
{
$ile = floor(($wiersz['czaskoniec']-$wiersz['czasstart'])/60);
$suma = $suma + $ile;
echo '<b>Twoja <u>'.$i.'</u> przerwa trwała:</b> '.$ile.'min.<br>';
$i++;
}
echo 'w sumie <span style="color:red"><b>'.$suma.'min.</b></span>';
?>



<br>
<br>


	<div class="leftMenu">
		<ul id="dhtmlgoodies_menu">
		<li><b>Menu Główne</b></li>
		
		
		
		
<?
if($user['ranga']==0){
?>
		
		
			<li><a href="index.php">Status pracy</a></li>
			<li><a href="index.php?id=raporty">Raporty</a></li>
			<li><a href="index.php?id=pracownicy">Spis pracowników</a></li>
		<li><b>Akcja</b></li>
			
			
<?
$przerwa = $sql->mysql_count(  'przerwa', array('idusera' => $user['id'], 'czaskoniec'=>0)  );
if((($przerwa==1)||($_GET['teraz']=='przerwa'))&&($_GET['teraz']!='praca')){
echo '<li><a href="index.php?teraz=praca">Koniec przerwy &lt;&lt;&lt; </a></li>';
}
else{
echo '<li><a href="index.php?teraz=przerwa">Zrób przerwę</a></li>';
}

}


?>
			
			
			
			

<li><a href="index.php?id=lo">Wyloguj</a></li>


		</ul>

<br>
<br>

<?
echo 'Zalogowany jako <b>'.$user['nick'].'</b>';
?>	
	</div>






</div>



<?



if($user['ranga']==0){
include("pracownik.php");
}
else{
include("admin.php");
}
?>























<?
$sql->db_close();
?>
</body>
</html>
<?
ob_end_flush();

?>