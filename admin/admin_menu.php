<?
$ileogl = $sql->mysql_count("firmy", array("widoczne"=>0));



if($user['id']=='1'){

$MENU_ADMIN = '<li class="m0"><a href="javascript:ukryj_pokaz(\''.$dlaglownychlicze.'\');">ADMINISTRACJA</a></li><span id="sub_'.$dlaglownychlicze.'">';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=oczekujace">Oczekuj±ce og³oszenia <sup>('.($ileogl).')</sup></a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=stare">Przedawnione og³oszenia</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=za7dni">Og³oszenia ktore wygasaj±</a></li>';



$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=konfiguracja">Konfiguracja</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=kategorie">Zarz±dzanie kategoriami</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=przedluz">Przed³u¿ czas og³oszenia</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=strony">Zarz±dzaj stronami</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=o_edit">Zarz±dzaj og³oszeniami</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=sklepy">Zarz±dzaj sklepami</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=miasta">Miasta - Zarz±dzanie</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=kat">Miasta - kategorie</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=miasta_strony">Miasta - Podstrony</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=linki">Linki - Zarz±dzanie Sekcjami</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=linki_kat">Linki - Kategorie</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=linki_strony">Linki - Linki</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=moderatorzy">Moderatorzy</a></li>';




}
else{
$MENU_ADMIN = '
<li class="m1"><a href="index.php?admin=miasta">Miasta - Zarz±dzanie</a></li>
<li class="m1"><a href="index.php?admin=miasta_strony">Miasta - Podstrony</a></li>';
$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=linki">Linki - Zarz±dzanie Sekcjami</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=linki_kat">Linki - Kategorie</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=linki_strony">Linki - Linki</a></li>';
}

$dlaglownychlicze++;
?>
