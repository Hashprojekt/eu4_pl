<?
$ileogl = $sql->mysql_count("firmy", array("widoczne"=>0));



if($user['id']=='1'){

$MENU_ADMIN = '<li class="m0"><a href="javascript:ukryj_pokaz(\''.$dlaglownychlicze.'\');">ADMINISTRACJA</a></li><span id="sub_'.$dlaglownychlicze.'">';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=oczekujace">Oczekujące ogłoszenia <sup>('.($ileogl).')</sup></a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=stare">Przedawnione ogłoszenia</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=za7dni">Ogłoszenia ktore wygasają</a></li>';



$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=konfiguracja">Konfiguracja</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=kategorie">Zarządzanie kategoriami</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=przedluz">Przedłuż czas ogłoszenia</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=strony">Zarządzaj stronami</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=o_edit">Zarządzaj ogłoszeniami</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=sklepy">Zarządzaj sklepami</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=miasta">Miasta - Zarządzanie</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=kat">Miasta - kategorie</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=miasta_strony">Miasta - Podstrony</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=linki">Linki - Zarządzanie Sekcjami</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=linki_kat">Linki - Kategorie</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=linki_strony">Linki - Linki</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=moderatorzy">Moderatorzy</a></li>';




}
else{
$MENU_ADMIN = '
<li class="m1"><a href="index.php?admin=miasta">Miasta - Zarządzanie</a></li>
<li class="m1"><a href="index.php?admin=miasta_strony">Miasta - Podstrony</a></li>';
$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=linki">Linki - Zarządzanie Sekcjami</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=linki_kat">Linki - Kategorie</a></li>';

$MENU_ADMIN .= '<li class="m1"><a href="index.php?admin=linki_strony">Linki - Linki</a></li>';
}

$dlaglownychlicze++;
?>
