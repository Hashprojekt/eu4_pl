-- MySQL dump 10.11
--
-- Host: localhost    Database: infonet_przewodnik
-- ------------------------------------------------------
-- Server version	5.0.41-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(100) NOT NULL auto_increment,
  `login` varchar(200) NOT NULL,
  `haslo` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `miasto` int(100) NOT NULL,
  `zapis` tinyint(1) NOT NULL,
  `edycja` tinyint(1) NOT NULL,
  `usuwanie` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin','admin73','konfeusz@eu4.pl',2,1,1,1),(2,'marta','marta80','tojam@o2.pl',2,1,1,1);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `firmy`
--

DROP TABLE IF EXISTS `firmy`;
CREATE TABLE `firmy` (
  `id` int(255) NOT NULL auto_increment,
  `login` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `haslo` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `nazwa_firmy` varchar(200) collate utf8_unicode_ci NOT NULL default '',
  `imieinazwisko` varchar(200) collate utf8_unicode_ci NOT NULL default '',
  `miasto` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `ulica` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `lokal` varchar(10) collate utf8_unicode_ci NOT NULL default '',
  `kod` varchar(20) collate utf8_unicode_ci NOT NULL default '',
  `telefon` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `telefonkontaktowy` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `email` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `www` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `kluczowe` varchar(200) collate utf8_unicode_ci NOT NULL default '',
  `nip` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `regon` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `kategoria` int(180) NOT NULL default '0',
  `widoczne` tinyint(10) NOT NULL default '0',
  `wygasa` int(50) NOT NULL default '0',
  `opis` longtext collate utf8_unicode_ci NOT NULL,
  `mapka` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `logo` varchar(20) collate utf8_unicode_ci NOT NULL default '',
  `zdjecie1` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `zdjecie2` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `zdjecie3` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `zdjecie4` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `opisyzdjec` longtext collate utf8_unicode_ci NOT NULL,
  `rodzajkonta` tinyint(10) NOT NULL default '0',
  `datarejestracji` int(50) NOT NULL default '0',
  `ip` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `firmy`
--

LOCK TABLES `firmy` WRITE;
/*!40000 ALTER TABLE `firmy` DISABLE KEYS */;
INSERT INTO `firmy` VALUES (1,'amtour','679514','Am - Tour','Miros³aw Zastawny','Lublin','Bernardyñska','parter','20-109','81-5340535','81-5340535','am-tour@info.net.pl','','bilety lotnicze, autokarowe, promowe, wczasy, wycieczki, kolonie, obozy, karty euro 26, planeta m³odych','7121679514','0',46,1,1217843436,'Oferujemy Pañstwu us³ugi w zakresie:<br>\r\nOrganizacji wypoczynku, wakacji, wczasów, koloni.<br>\r\nProwadzimy sprzeda¿ tanich biletów autokarowych, lotniczych i promowych.<br>\r\nDowozimy klienta z domu na lotnisko.<br>','jpg','jpg','0','0','0','0','0|e|b|i|s||e|b|i|s||e|b|i|s|',2,1191921054,'193.189.116.28'),(2,'pandemonium','584248','Pandemonium Studio Tatu³a¿u','Adam Jakubowaki','Gdañsk','Szeroka','119/120','80-835','58-305 34 41','456456456','tattoopandemonium@gmail.com','www.tattoopandemonium.com','tattoo, tatu³a¿, tatua¿, piercing, gdañsk, dziary, kolczyki, kolczykowanie','5842488080','58',75,1,1194005710,'<center>\r\n<b>Profesjonalne Studio Tatua¿u i Percingu</b><br>\r\nzaprasza codziennie od 11 do 19 <br>\r\nsobota 11 - 16<br>\r\nPolecamy szeroki wybór wzorów z katalogów. Wykonujemy tak¿e indywidualne tatua¿e zaprojektowane na ¿yczenie klienta.<br>\r\nNajwiekszy wybór kolczyków i akcesoriów do percingu w Trójmie¶cie.\r\n<br><br>\r\nGwarantowana wysoka jako¶æ us³ugi, higiena oraz mi³a i dyskretna obs³uga.<br><br>\r\nZ wydrukiem tej strony otrzymasz <font color=\"red\">10% rabat</font></center>','jpg','jpg','jpg','jpg','jpg','','opis zdjecie pierwsze|e|b|i|s|zd 2|e|b|i|s|zd3|e|b|i|s|',2,1191932079,'87.205.229.245'),(3,'obiadydomowe','1083880','Obiady domowe, Gra¿yna Watras','Gra¿yna Watras','Kazimierz Dolny','Tyszkiewicza','22','24-120','081-8810731','081-8810731','obiadydomowe@eu4.pl','','obiady, jedzenie, posi³ki, Kazimierz Dolny','7161083880','0',95,1,1194102858,'Polecamy pyszne i niedrogie obiady domowe. W ofercie szeroki wybór dañ miêsnych, jarskich oraz napojów. Polecamy wy¶mienite potrawy tradycyjne i regionalne przygotowane wg domowych przepisów. \r\nDla grup zorganizowanych przewidujemy atrakcyjne rabaty!\r\nZapraszamy od maja do pa¼dziernika, w godzinach 12.00 - 20.00. ','','','0','0','0','0','0',1,1192021690,'86.63.157.122'),(4,'arkadiagissa','1363378','Akradia-Gissa','.........','Kazimierz Dolny','Krakowska','25','24-120','081-8810084',' 0691 024 500','poradnia@arkadia-gissa.pl','http://www.arkadia-gissa.pl','Arkadia-Gissa, preparaty zio³owe, Kazimierz Dolny, apiterapia, apitoksynoterapia, dieta Kwa¶niewskiego, naturalne metody leczenia, leki zio³owe, prepa','7161363378','0',107,1,1194120852,'O¶rodek Medycyny Naturalnej \"Arkadia-Gissa\" oferuje naturalne metody leczenia przewlek³ych chorób cywilizacyjnych (m.in.stwardnienie rozsiane, cukrzycê, zwyrodnienia, choroby serca i niektóre alergie).\r\nTerapia wspomagana niskowêglowodanow± diet± Kwa¶niewskiego opiera siê m.in. na unikatowej w skali Europy apiterapii (leczenie produktami pochodzenia pszczelego), apitoksynoterapii (leczenie jadem pszczelim) oraz na lekach zio³owych. \r\nDysponujemy 8 miejscami w 2-osobowych, komfortowych pokojach z ³azienk± i TV. \r\nW sprzeda¿y posiadamy lecznicze preparaty pochodzenia naturalnego.\r\n','','','0','0','0','0','0',1,1192030933,'86.63.157.122'),(5,'Galeriai','1323611','Galeria i','Izabella Maciejewska','Kazimierz Dolny','Tyszkiewicza','32','24-120','081-8810895','0 503 134 782','galeriai@eu4.pl','','pokoje go¶cinne, pokoje do wynajêcia, ze zwierzêtami, pokoje z parkingiem, miejsce parkingowe, Kazimierz Dolny','7161323611','0',121,1,1194120835,'Zaciszne 1, 2 i 3 osobowe pokoje go¶cinne i jedna z najstarszych galerii w Kazimierzu z tradycjami artystycznymi siêgaj±cymi XV w. w jednym. \r\nZalety naszej oferty to m.in.: ca³oroczne wy¿ywienie, mo¿liwo¶æ przyjazdu z pupilem, korzystna lokalizacja (4 min. piechot± do Rynku), miejsca parkingowe, przepiêkny widok na basztê oraz mo¿liwo¶æ zamówienia jazdy konnej lub rajdu konnego.\r\nSerdecznie zapraszamy.','','','0','0','0','0','0',1,1192032799,'86.63.157.122'),(6,'kawiarniasenatorska','0020191','Kawiarnia Senatorska','Irena Filipczak','Kazimierz Dolny','Senatorska','7','24-120','081-810089','081-8884360','kawiarniasenatorska@eu4.pl','http://www.senatorska.kazimierz.dln.pl','kawiarnia, restauracja, pub, pizzeria, drinki, lokal, ¶niadania, obiady, kolacja, bankiet, bos³uga grup zorganizowanych','7160020191','430883682',93,1,1194120824,'Kawiarnia o wyj±tkowej atmosferze i szerokim wachlarzu us³ug. Oferujemy dania kuchni tradycyjnej oraz wegetariañskiej, zestawy obiadowe i pizze, a w drinkbarze alkohole z ca³ego ¶wiata. Organizujemy przyjêcia okoliczno¶ciowe, bankiety i komunie. Naszym atutem jest mi³a i profesjonalna obs³uga. Dla grup zorganizowanych oraz sta³ych klientów atrakcyjne zni¿ki!\r\nZapraszamy','','','0','0','0','0','0',1,1192033834,'86.63.157.122'),(7,'ogrodowa','1411025','Galeria Kawiarnia Ogrodowa','Andrzej Koz³owski','Kazimierz Dolny','Tyszkiewicza','30a','24-120','081-8810541','0601979570','ogrodowa@eu4.pl','','galeria, kawiarnia, pokoje, pokoje go¶cinne, pokoje do wynajêcia, herbata, kawa, piwo, deser, ciasta, spotkania, imprezy integracyjne','7161411025','430683084',121,1,1194120818,'Zapraszamy do wyj±tkowego zak±tka w Kazimierzu Dolnym. Dwuosobowy apartament z ma³¿eñskim ³o¿em i osobnym wej¶ciem pozwoli Pañstwu odpoczaæ w atmosferze sztuki i  rozkoszowaæ siê cisz± i spokojem na zatopionym w zieleni tarasie. Polecamy tak¿e domowe ¶niadania i gor±c± herbatê z ciastkiem w naszej kawiarni. \r\nWierzymy, ¿e ta wyj±tkowa oferta spe³ni pañstwa marzenia o romantycznej przystani na weekend, a mo¿e i d³u¿ej... \r\n','','','0','0','0','0','0',1,1192034870,'86.63.157.122'),(8,'restauracjabarrybka','0022497','Restauracja - Bar Rybka','Helena Kosobucka','Kazimierz Dolny','Sadowa','21','24-120',' 81-8810920','0601913183','rybka@eu4.pl','','bar, kawiarnia, restauracja, rybka, sadowa, obiady, posi³ki, posi³ek, ¶niadanie, kolacja, piwo, drinki, ryba, ryba sma¿ona','7160022497','0',93,1,1194120805,'Zapraszamy na ¶niadania,  domowe obiady i kolacje. Nasz± specjalno¶ci± s± s± ryby morskie i s³odkowodne. Ponadto oferujemy tak¿e kuchniê jarsk±, desery, du¿y wybór alkoholi, w tym grzane wino i piwo. Oprócz klientów indywidualnych obs³ugujemy tak¿e grupy zorganizowane. \r\nZapraszamy w godzinach: 10.00 - 22.00.','','','0','0','0','0','0',1,1192035847,'86.63.157.122'),(9,'domekgóralski','1680239','Domek Góralski, Janina Weigt','Janina Weigt','Kazimierz Dolny','Krakowska','47','24-120','081-8810263','081-8810263','domekgoralski@eu4.pl','http://www.domekgoralski.noclegiw.pl','pokoje, pokoje do wynajêcia, wy¿ywienie, ¶niadania, obiady, kolacje, kuchnia','7161680239','0',121,1,1194120791,'Polecamy 2, 3 i 4 osobowe pokoje z ³azienkami w cenie ju¿ od 40z³/osobê. Dodatkowo oferujemy ¶niadania, obiady i kolacje, a tak¿e wybór ciast i deserów. Posiadamy w³asny parking. Zapraszamy na wypoczynek z pupilami.','','','0','0','0','0','0',1,1192038171,'86.63.157.122'),(10,'izabela','1163114','Pokoje Go¶cinne Izabela','Izabela Pa³czyñska','Kazimierz Dolny','Lubelska','31','24-120','081-8810830','0608730979','izabela@eu4.pl','','pokoje, pokoje go¶cinne, pokoje do wynajêcia, nocleg w Kazimierzu','9471163114','0',121,1,1194120786,'Oferujemy ca³oroczne pokoje 2, 3 i 4 osobowe z ³azienkami, w tym jeden pokój z aneksem kuchennym i tarasem. Dla go¶ci zapewniamy bezp³atne miejsca parkingowe. \r\nPolecamy odpoczynek przy grilu lub na le¿akach, spacery po Kazimierzu (do Rynku jest tylko 200m), a wieczorem zapraszamy na lampkê wina na o¶wietlonym tarasie z altank±. Dla lubi±cych aktywnie spêdzaæ czas prowadzimy wypo¿yczalniê rowerów. \r\nCena 45-50 z³/osobê, w razie d³u¿szego pobytu podlega negocjacji. Zni¿ki dla dzieci!','','','0','0','0','0','0',1,1192039973,'86.63.157.122'),(11,'pokojego¶cinne','1565509','Pokoje Go¶cinne, Jadwiga Janiak','Jadwiga Janiak','Kazimierz Dolny','Nadrzeczna','1','24-120','081-8810846','081-8810846','pokojego¶cinne@eu4.pl','','wynajem pokoi, nocleg, noclegi, pokoje do wynajêcia, pokoje go¶cinne, apartament, bezpieczny parking centrum','7161565509','0',121,1,1194120770,'Polecamy pokoje go¶cinne z odbiornikami TV oraz aneksami kuchennymi (lodówka, kuchenka, naczynia i sztuæce). W ofercie posiadamy jeden pokój 1 osobowy. Naszym atutem s± liczne udogodnienia: lokalizacja w ¶cis³ym centrum (100 m od Rynku), kompletnie wyposa¿ona jadalnia i kuchnia do samodzielnego przygotowywania posi³ków, bezp³atny parking oraz du¿y ogród z przygotowanym miejscem na grila. \r\nZapraszamy serdecznie.','','','0','0','0','0','0',1,1192042936,'86.63.157.122'),(12,'Wynajmpokoi','1142430','Wynajm Pokoi Noclegowych, Jan Tusiñski','Ewa Tusiñska','Kazimierz Dolny','Góry','22','24-120','081-8810235','081-8810235','wynajmpokoi@eu4.pl','','pokoje, nocleg, pokoje go¶cinne, gril, nocleg w Kazmierzu, przyjêcia w kazimierzu, ognisko, hotel, kwatera, pole namiotowe','7161142430','0',121,1,1194120753,'Oferujemy pokoje 1, 2 i 3 osobowe z ³azienkami i odbiornikami TV. Posiadamy wspólne, w pe³ni wyposa¿one kuchnie do wy³±cznej dyspozycji Go¶ci. Dom usytuowany 90 m nad poziomem Wis³y posiada du¿y ogród z wydzielonym miejscem na ognisko i grila.\r\nMile widziane grupy zorganizowane, zapewniamy parking dla samochodów osobowych oraz autokarów. Dysponujemy sal± bankietow± (przyjêcia okoliczno¶ciowe, konferencje). \r\nDla amatorów wypoczynku blisko natury polecamy pole namiotowe. Odleg³o¶æ od Rynku 800m. \r\nZapraszamy!','','','0','0','0','0','0',1,1192044368,'86.63.157.122'),(13,'pokojedowynajêcia','1655218','Pokoje Do Wynajêcia','Jan i Anna ¯ukowscy','Kazimierz Dolny','Czerniawy','3b','24-120','081-8810667','081-8810667','pokojedowynajecia@eu4.pl','','pokoje, pokoje do wynajêcia, nocleg, nocleg w Kazimierzu, pokoje go¶cinne, Czerniawa','7161655218','0',121,1,1194120713,'Je¶li szukasz odpoczynku od zgie³ku miasta nasza oferta powinna Ciê zainteresowaæ. Budynek po³o¿ony jest na uboczu, z daleka od ulicy, ale tylko 10 min piechot± do Rynku. Posiadamy pokoje 1, 3 i 4 osobowe oraz du¿y ogród do dyspozycji Go¶ci. Dogodna baza do penetrowania przebiegaj±cych nieopodal szlaków turystycznych. Mo¿liwosæ sto³owania siê w pobliskim o¶rodku. \r\nSerdecznie zapraszamy.','','','0','0','0','0','0',1,1192045113,'86.63.157.122'),(14,'Domekdowynajêcia','1973740','Domek Do Wynajêcia','Jerzy Wojtalik','Kazimierz Dolny','Skowieszynek','4','24-120','081-8810751','081-8810751','domekdowynajecia@eu4.pl','','pokój, do wynajêcia, dom do wynajêcia, domek do wynajêcia, kwatera, nocleg, grill, ognisko, w±wóz, wyci±g narciarski, R±blów, pole namiotowe, rower, w','7161973740','0',122,1,1194177771,'Odpoczynek od zgie³ku? Ukojenie nerwów? A mo¿e kolejny miesi±c miodowy i czas tylko dla siebie? Te i inne powody mog± uczyniæ nasz± ofertê dla Ciebie wyj±tkowo atrakcyjn±. \r\nPrzedstawiamy 2 domy, ka¿dy 2-4 osobowy, po³o¿one na uboczu, na skraju wsi, 4 km od Rynku w Kazimierzu.\r\nDla mi³o¶ników domów z dusz± polecamy ponad 100 letni wiejski dom z piecem chlebowym, kuchni± i ³azienk± z term±, otoczony ogrodem. Do szukaj±cych blisko¶ci lub rodzinnego ciep³a niew±tpliwie przemówi solidny dom z kominkiem, tarasem i nowoczesn± kuchni±. \r\nOba domy polecamy tak¿e dla rodzin z ma³ymi dzieæmi (posesje s± ogrodzone). Do dyspozycji Go¶ci pozostaj±: - bezpieczny parking, \r\n- kuchnie wyposa¿one w naczynia, zastawê sto³ow±, sztuæce, \r\n- miejsce do grilowania,\r\n- le¿aki ogrodowe \r\n- rowery górskie, dziêki którym mo¿na szybko dojechaæ do Kazimierza, Janowca czy Miêæmierza lub zwiedziæ kazimierskie w±wozy. W ogrodzie mo¿na te¿ rozbiæ namioty.\r\nDomki s± ca³oroczne i zim± stanowi± doskona³± bazê do wypadów na narty do pobliskiego R±blowa (4 km). \r\nSklep oddalony jest o 500 m. \r\nCena: od 30 z³/osobê.','','','0','0','0','0','0',1,1192048471,'86.63.157.122'),(15,'dwórwwyl±gach','2446385','Dwór W Wyl±gach','Ma³gorzata i Adam Dumowie','Kazimierz Dolny','Wyl±gi','43','24-120','081-88100','081-8810048','dworwwylagach@eu4.pl','','dwór, Wyl±gi, wczasy, hotel, nocleg, pokoje, wypoczynek, pokoje z ³azienk±, wy¿ywienie, wywczas, kulig, sylwester, pokój ze ¶niadaniem, pokoje ze ¶nia','7162446385','0',119,1,1194177758,'Przedstawiamy Dwór w Wyl±gach - niezwyk³± rezydencjê w niezwyk³ym miejscu. Datowany na 1848 rok od ponad 100 lat pozostaje w rêkach jednej rodziny. Posiad³o¶æ po³o¿ona jest 4 km od Kazimierza Dolnego, na wzgórzu, otoczona ogrodami, sadem i parkiem dworskim z zachowanym starodrzewiem (najstarsze dêby licz± ponad 700 lat) i stawami. Nieopodal zabudowañ znajduje siê mogi³a Juliusza Ma³achowskiego powstañca listopadowego. \r\n1 i 2 osobowe pokoje dla go¶ci (z mo¿liwo¶ci± dostawienia ³ó¿eczka dla dziecka)zlokalizowane s± w odrestaurowanej czê¶ci dworu. Posiadaj± dostêp do wyposa¿onej kuchni, du¿ej ³azienki oraz niekrêpuj±ce wej¶cia. Polecamy ca³odzienne wy¿ywienie oparte o przekazywane z pokolenia na pokolenie receptury, w wiêkszo¶ci przygotowane z w³asnych, ekologicznych produktów. W ogrodzie przygotowany grill. W ofercie równie¿ przeja¿d¿ki konne. \r\nCeny: 40 z³/osoba, dla dzieci przewidziano zni¿ki.\r\nZapraszamy.','','','0','0','0','0','0',1,1192050088,'86.63.157.122'),(16,'gontal','1008364','Gontal Sklep Chemiczno - Ogrodniczy','Barbara Walencik','Kazimierz Dolny','Ryne','3','24-120','081-8810256','081-8810256','gontal@eu4.pl','','ogrodnictwo, sklep ¿elazny, farby, kleje, artyku³y budowlane, gwo¼dzie, gospodarstwo domowe, przewody, elektryka, artyku³y elektryczne, kaset, foto, f','7161008364','0',114,1,1194177744,'W ofercie artyku³y:\r\n- gospodarstwa domowego (ceramika, garnki, talerze, porcelana, szk³o)\r\n- budowlane (farby, kleje, art. metalowe, gips)\r\n- ogrodnicze (nasiona, ziemia)\r\n- fotograficzne, kasety ','','','0','0','0','0','0',1,1192050765,'86.63.157.122'),(17,'wynajempokoi','1680104','Wynajem Pokoi','W³adys³awa Kubi¶ ','Kazimierz Dolny','Nadrzeczna','12','24-120','081-8810795','081-8810795','wynajempokoi@eu4.pl','','wynajm pokoi, wynajem pokoi, nocleg, pokoje do wynajêcia, apartament, bezpieczny parking centrum, blisko rynku, Kazimierz Dolny','7161680104','0',121,1,1194177734,'Oferujemy ca³oroczne pokoje 2, 3, i 4 osobowe z ³azienkami i TV, oraz jeden apartament. Do dyspozycji Go¶ci jest aneks kuchenny. Zapraszamy przez ca³y rok, tak¿e na Sylwestra. Wyj±tkowa lokalizacja - ¶cis³e Centrum.\r\nCenny do uzgodnienia.\r\n','','','0','0','0','0','0',1,1192051425,'86.63.157.122'),(18,'SkiSport','1993469','Ski-Sport','Halina £akomy-Drozd','Lublin','Chopina','7/1','20-026','081-7436593','509593693','skisport@eu4.pl','','sport, sklep sportowy, galanteria sportowa, narty, snowboard, odzie¿ sportowa, wi±zania, ³y¿wy','7121993469','430749096',106,1,1196962602,'Nasza oferta to szeroki wybór nart, ³y¿ew, wi±zañ oraz odzie¿y sportowej. Posiadamy w sprzeda¿y akcesoria do sportów zimowych i nie tylko. Zakupy u nas to korzystny wybór i fachowa obs³uga, która pomo¿e skompletowaæ bezpieczny i odpowiedni sprzêt na zimowe szaleñstwa. Serdecznie zapraszamy od poniedzia³ku do pi±tku w godzinach 10 - 18 oraz w sobotê od 10 do 14.','','','0','0','0','0','0',1,1192797874,'86.63.157.122'),(19,'Hestia','0150987','Hestia Tunelowa Myjnia Samochodowa','Teresa Krysa','Lublin','Spó³dzielczo¶ci Pracy','28','20-147','081-7410733','0817410733','tkrysa@pirotechnika.pl','','myjnia samochodowa lublin, lublin myjnia samochodowa, myjnia, woskowanie, mycie, odkurznie samochodu, myjnia tunelowa','7120150987','4179071',91,1,1196962596,'Zapraszamy\r\nPn-Pt od 5 do 23; Sob od 9 do 23; Niedz od 5 do 16\r\n\r\nCENNIK:\r\n12 PLN 	mycie wstêpne, mycie, suszenie\r\n14 PLN 	mycie wstêpne, aktywna piana, mycie, suszenie\r\n16 PLN 	mycie wstêpne, aktywna piana, mycie wysokoci¶nieniowe, mycie, piana woskuj±ca, suszenie\r\n18 PLN 	mycie wstêpne, aktywna piana, mycie wysokoci¶nieniowe, mycie, mycie podwozia, piana woskuj±ca, suszenie\r\n23 PLN 	mycie wstêpne, aktywna piana, mycie wysokoci¶nieniowe, mycie, mycie podwozia, konserwacja podwozia, piana woskuj±ca, suszenie\r\n25 PLN 	mycie wstêpne, aktywna piana, mycie wysokoci¶nieniowe, mycie, mycie podwozia, konserwacja podwozia, 2 x extra mycie kó³ i progów, piana woskuj±ca, suszenie\r\n30 PLN 	mycie wstêpne, aktywna piana, mycie wysokoci¶nieniowe, mycie, mycie podwozia, konserwacja podwozia, 2 x extra mycie kó³ i progów, polerowanie, piana woskuj±ca, suszenie','jpg','','0','0','0','0','0',1,1192798965,'86.63.157.122'),(20,'Limuzyna','0311812','LIMUZYNA Salon Us³ug Motoryzacyjnych','S³awomir Podolak','Lublin','Spó³dzielczo¶ci Pracy','28','20-147','081-7421940','0601266626','limuzyna@eu4.pl','','stacja obs³ugi pojazdów, diagnostyka, Lublin, naprawy','7120311812','4162290',128,1,1196962590,'Zapraszamy do nowoczesnej stacji obs³ugi. Posiadamy podno¶niki 4,5t oraz podno¶niki kolumnowe do 4t (dla samochodów pancernych). \r\nGodziny otwarcia: pon-pt 8 - 18, sob 8 - 16.','','','0','0','0','0','0',1,1192804496,'86.63.157.122'),(21,'Wawrysiuk','0014530','Wawrysiuk Biuro Rachunkowe','Cezary Wawrysiuk','Lublin','Turystyczna ','44','20-207','081-7496567','0601309308','info@wawrysiuk.pl','http://www.wawrysiuk.pl/pop.swf','biuro rachunkowe, biura rachunkowe, ksiêgowy, ksiêgowa, ksiêgowo¶æ, podatek, doradztwo podatkowe, podatki','7130014530','0',76,1,1196962584,'Biuro Rachunkowe Wawrysiuk s.c. oferuje obs³ugê ma³ych i ¶rednich przedsiêbiorstw z Lublina i okolic. Nasze atuty to wykwalifikowana kadra, elastyczno¶æ, do¶wiadczenie oraz stale powiêkszaj±ca siê grupa sta³ych klientów. \r\nOferjemy prowadzenie ksiêg handlowych, rachunkowych oraz us³ugi p³acowo - kadrowe. W celu jak najlepszego spe³nienia pañstwa oczekiwañ oferujemy równie¿ us³ugi dodatkowe, m.in. doradztwo podatkowe i reprezentowanie klienta w kontaktach z ZUSem oraz US.\r\n','','','0','0','0','0','0',1,1192805391,'86.63.157.122'),(22,'travels','1725042','Biuro Podró¿y Travels','Bogus³aw Misiak','Lublin','Tysi±clecia','3','20-121','081-5323951, 081-5323953','0604871391','travels@triada.pl ','http://www.biurotravels.com/','wycieczki zagraniczne, wycieczki, wczasy, sylwester, wyjazd, bus, bilety autobusowe, ','7121725042','431252446',123,1,1196962578,'Biuro podró¿y \"Travels\" oferuje:\r\n- wycieczki krajowe i zagraniczne,\r\n- stale aktualizowane oferty last minute,\r\n- sprzeda¿ biletów autokarowych i lotniczych,\r\n- wynajem autokarów,\r\n- ubezpieczenia turystyczne.\r\n\r\nNasze atuty to wspó³praca z renomowanymi touroperatorami, korzystne ceny i mi³a obs³uga. Zapraszamy do zapoznania siê z nasz± ofert± na stronie: http://www.biurotravels.com/','','','0','0','0','0','0',1,1192806240,'86.63.157.122'),(23,'gamma','0106934','\"Gamma\" Export-Import','Maria Sawicka','Lublin','Ko³³ataja','5','20-006','081-5321449','601443806','gamma@eu4.pl','','instrumenty muzyczne, perkusja, nuty','7120106934','0',105,1,1196962572,'Oferujemy szeroki asortyment instrumentów muzycznych. \r\nZapraszamy','','','0','0','0','0','0',1,1192808012,'86.63.157.122'),(24,'rado¶æ','2414261','\"Rado¶æ\" Firma Handlowo-Us³ugowa s.c.','Kazimierz, Danuta Ca³ka','Lublin','Spó³dzielczo¶ci Pracy','36/64','20-147','081-7475112, 081-5268782','602273553, 602692442','radosc@eu4.pl','http://www.tai.com.pl/radosc/index.html','przyjêcie urodzinowe, zabawa, dla dzieci, wypo¿ycznie platform, rozrywka dla dzieci, organizacja przyjêæ urodzinowych, imprezy okoliczno¶ciowe','7122414261','431024194',129,1,1196962566,'Centrum rozrywki dla Dzieci w Galerii Olimp to wyj±tkowe miejsce dla Ciebie i Twojego dziecka. P³ywanie w chiñskich basenach, skakanie na olbrzymiej batucie, liczne labirynty i tunele, wielka zje¿d¿alnia oraz liny i siatki ortopedyczne do wspinania zapewni± Twojemu dziecku bezpieczn± i wyj±tkow± rozrywkê. Taka zabawa to przebywanie z rówie¶nikami, naturalny sposób na uwolnienie dzieciêcej energii i niezapomniane prze¿ycie dla dzieci. Dla rodziców natomiast umo¿liwienie swobodnych zakupów w jednej z najwiêkszych galerii handlowych w mie¶cie.\r\n\r\nFirma \"Rado¶c\" prowadzi tak¿e wypo¿yczlniê platform do skakania wype³nionych powietrzem, czteroko³owców oraz trampolin. ','','','0','0','0','0','0',1,1192810484,'86.63.157.122'),(25,'hermlok','2383810','Hermlok','Nowak','Lublin','Dolna Panny Marii','28','20-010','081-7436094','081-7436094','biuro@hermlok.lublin.pl','http://www.hermlok.lublin.pl','kominki Lublin, wentylacja Lublin, systemy wentylacyjne, rekuperacja Lublin','7122383810','0',130,1,1196962560,'Oferta firmy Hermlok:\r\n- budowa kominków (szeroki wybór wzorów obudowy oraz wk³adów renomowanych firm),\r\n- instalacje wentylacyjne z kontrol± parametrów powietrza  (wilgotno¶æ, temperatura) oraz 90% odzyskiem ciep³a,\r\n- fachowa pomoc, doradztwo i serwis techiczny.\r\nZapraszamy na nasz± stronê internetow±: http://www.hermlok.lublin.pl','','','0','0','0','0','0',1,1192811575,'86.63.157.122'),(26,'massivemusic','1813042','Massive Music, Salon Muzyczny','Piotr Kusiak','Lublin','Narutowicza','78','20-013','081-5345598','0607488799','massive@massivemusic.pl','http://massivemusic.pl','nag³o¶nienie, instrumenty muzyczne, instrumenty klawiszowe, gitary, gitara akustyczna, gitara elektryczna, wzmacniacze, gitara basowa, perkusja, nuty,','9461813042','0',105,1,1196436426,'Oferujemy szerok± gamê instrumentów muzycznych: gitary klasyczne, elektryczne i basowe, perkusje akustyczne i elektryczne, instrumenty klawiszowe, nag³o¶nienie i o¶wietlenie oraz akcesoria i pisma muzyczne. \r\nZapraszamy pon-pt w godzinach 8-16','','','0','0','0','0','0',1,1192950112,'86.63.157.122'),(27,'biuroprawnohandlowe','1005632','\"A & A\" Biuro Prawno-Handlowe','Andrzej Matraszek','Lublin','Narutowicza','64','20-013','081-5323654','0602373349','biuroprawnohandlowe@eu4.pl','','skup z³ota, skup srebra, skup bi¿uterii, lombard, komis','7121005632','0',132,1,1196436414,'Skup bi¿uterii.','','','0','0','0','0','0',1,1192951366,'86.63.157.122'),(28,'nigella','1033953','\"Nigella\" Handel Art. Ogrodniczymi i Wiklin±','Witold Chudzicki','Lublin','M.C. Sk³odowskiej','28','20-29','081-5340226','081-5340226','nigella@eu4.pl','http://www.nigella.interpuls.pl/nigella','³adne rzeczy, rêkodzie³o, etniczne, wiklina, wyroby artystyczne, nawozy, meble indyjskie, egzotyczne meble, ','7121033953','430127710',124,1,1196436411,'Polecamy piêkne rzeczy do domu i ogrodu: muszle, ¶wiece, zmys³owe olejki eteryczne, szeroki wybór tkanin, rêkodzie³a artystycznego, wikliny, doniczek, kompozycji z suchych kwiatów, nasion i cebulek. W sprzeda¿y tak¿e orginalne meble indyjskie, artystyczne meble z metalu, ceramika i szk³o z Tunezji. \r\nProwadzimy tak¿e us³ugi z zakresu projektowania ogrodów, wykonujemy tak¿e meble wg wzoru klienta oraz kompozycje z suchych kwiatów na zamówienie.\r\nZapraszamy pon-pt: 10-18, sob 10-16.\r\n\r\n','','','0','0','0','0','0',1,1192956524,'86.63.157.122'),(29,'lombard','1622980','Lombard','Jacek Leonard Skowroñski','Lublin','Ko¶ciuszki','7','20-007','081-4425519','601172944','lombard@eu4.pl','','telefony gsm, telefony komórkowe, aparaty telefoniczne, lombard, zdejmowanie simlocków, skup telefonów','8671622980','0',132,1,1196436408,'Atrakcyjne ceny, mi³a obs³uga i negocjowane oprocentowanie. Gwarantujemy wp³aty zaraz po sprzeda¿y.','','','0','0','0','0','0',1,1192957862,'86.63.157.122'),(30,'julitta','2512443','Gabinet Kosmetyczny Julitta','J. Jackowska','Lublin','Zielona','5','20-082','081-5327752','081-5327752','julitta@eu4.pl','','gabinet kosmetyczny, kosmetyczka, ','7122512443','431189446',110,1,1196436403,'<b> Polecamy zabiegi:</b>\r\n<br> - pielêgnacjê twarzy i dekoltu\r\n<br> - masa¿ klasyczny i hydrofilny \r\n<br> - peeling enzymatyczny, biologiczny i azjatycki \r\n<br> - maseczki nawil¿aj±ce, relaksuj±ce, wybielaj±ce, liftinguj±ce, pojêdrniaj±ce\r\n<br><br>\r\nNasze atuty to mi³a i profesjonalna obs³uga, kosmetyki najwy¿szej jako¶ci, konkurencyjne ceny i atrakcyjne rabaty dla sta³ych klientów.\r\n','','','0','0','0','0','0',1,1192960643,'86.63.157.122'),(31,'jutur','2907064','Jutur Spó³ka z o.o.','Grzegorz Caboñ','Lublin','Przechodnia ','4','20-003','081-5321051','081-5321051','jutur@eu4.pl','','biuro nieruchomo¶ci, wynajem, sprzeda¿ mieszkania','7122907064','432736360',123,1,1196436400,'Biuro nieruchomo¶ci','','','0','0','0','0','0',1,1192962785,'86.63.157.122'),(32,'fonel','1732177','Fonel, Stanis³aw Pieñkowski','Stanis³aw Pieñkowski','Lublin','Nadrzeczna','135','20-443','081-7216161','081-7216161','fonel@eu4.pl','','akcesoria GSM, do telefonów komórkowych, baterie do telefonu, pokrowce, silikony, LCD, kable, ³adowarki, czê¶ci zamienne, karty startowe do telefonów,','9461732177','430744727',112,1,1196436397,'Zapraszamy do sklepu z akcesoriami gsm. Kupisz u nas telefony, czê¶ci zamienne, ³adowarki oraz karty startowe ró¿nych sieci.','','','0','0','0','0','0',1,1194198729,'86.63.157.122'),(33,'Introligatornia','1437225','Introligatornia, El¿bieta Fiodor','El¿bieta Fiodor','Lublin','Jasna','3/13','20-077','081-5327149','081-4421220','Introligatornia@eu4.pl','','oprawa, oprawianie, laminowanie, bindowanie, falcowanie, klejenie ksi±¿ek, oprawa dyplomów, prac licencjackich, magisterskich','7121437225','430289861',85,1,1196436394,'Szeroki zakres us³ug introligatorskich. Zapraszamy.','','','0','0','0','0','0',1,1194200461,'86.63.157.122'),(34,'Topmedical','0151774','Top-Medical Sp. z o.o.','Renata Gil-Kisielewicz','Lublin','Tadeusza Zana','29/19','20-601','081-5243406, 081-5243426','081-5243426','topmedical@eu4.pl','http://www.topmedical.pl','przychodnie lublin, przychodnie specjalistyczne, usg lublin, dianostyka, laboratorium','7120151774','2147483647',134,1,1196436390,'Zapraszamy na nasz± stronê internetow±\r\nwww.topmedical.pl','','','0','0','0','0','0',1,1194201118,'86.63.157.122'),(35,'abrys','2508453','Abrys s.c. Studio Mebli Kuchennych','??? ????','Lublin','Jana Sawy','1A/50A','20-632','081-5326557','081-5326557','abrys@eu4.pl','http://www.abrys-kuchnie.pl','meble kuchenne w Lublinie, meble na zamówienie, jadalnie, projekty zabudowy','7122508453','0',135,1,1196436387,'zapraszamy na nas± stronê \r\nhttp://www.abrys-kuchnie.pl','','','0','0','0','0','0',1,1194201908,'86.63.157.122'),(36,'terefere','2977107','Terefere s.c. Renata Chy¿ewska-Brewczak, Przemys³aw Ciechan','Renata Chy¿ewska-Brewczak','Lublin','Orla','8','20-022','0511698994','0511698994','terefere@eu4.pl','','alkohol, pub w Lublinie, pub, bar, alkohol, kawa, herbata','7122977107','60075075',126,1,1196436384,'Zapraszamy od poniedzia³ku do niedzieli w godzinach: 14.00-03.00','','','0','0','0','0','0',1,1194251349,'212.182.49.250'),(37,'skleperotyczny','2094833','Sklep erotyczny, Joanna Kowalska','Joanna Kowalska','Lublin','Lubartowska','20','20-084','081-5318630','081-5318630','skleperotyczny@eu4.pl','','akcesoria, video VHS DVD, bielizna, feromony, czasopisma, gad¼ety','7122094833','60006303',125,1,1196436381,'Z wydrukiem tej strony 15% upust!','','','0','0','0','0','0',1,1194253295,'212.182.49.250'),(38,'gabor','1006212','Gabor Agencja Handlowa','Artur Borowiec','Lublin','Lubartowska','70A','20-094','081-7473450','081-7473450','biuro@urzedowski.pl','http://www.urzedowski.pl','okna, drzwi, parapety','7121006212','431143480',100,1,1196436378,'Polecamy okna wykonane wg najnowszych technologii. Zapraszamy na nasz± stronê: http://www.urzedowski.pl','','','0','0','0','0','0',1,1194255103,'212.182.49.250'),(39,'stajenna','0101204','Ober¿a Stajenna','Agnieszka Soko³owska','Lublin','Ciep³a','7','20-403','0815349172','603932293','oberza@stajenna.pl','http://www.stajenna.pl','ober¿a, lkj, jedzenie, kulig, piknik, kawa, herbata','7120101204','0',93,1,1196436375,'Szanowni Pañstwo!\r\n\r\nZapraszamy do Ober¿y Stajennej, która znajduje siê przy ul. Ciep³ej 7 w Lublinie na terenie Lubelskiego Klubu Je¼dzieckiego. \r\n\r\nOrganizujemy pikniki, szkolenia, kuligi, koncerty, ogniska oraz spotkania kole¿eñskie, bankiety, przyjêcia firmowe, wesela, komunie. Zapraszamy na koncerty muzyki folkowej (Kapela Drewutnia, Czeremszyna). \r\nPo konnej przeja¿d¿ce polecamy gor±ce napoje i dania z polskiej kuchni. \r\n','','','0','0','0','0','0',1,1194256745,'212.182.49.250'),(40,'tenggertwest','0310893','Tengger West Awa Sp. z o.o.','Teresa Tar³owska','Lublin','Bursaki','19','20-150','602269943, 602236836','602269943, 602236836','alpina@futuro.net.pl','http://www.prace-budowlane.pl','prace wysoko¶ciowe, dachy, us³ugi remontowo-budowlane, remonty','6570310893','0',137,1,1196436372,'Tradycje przedsiêbiorstwa &#8222;ALPINA&#8221; siêgaj± 1988r. Oferujemy pe³ny zakres prac remontowo - budowlanych z wykorzystaniem technik wysoko¶ciowych. Dziêki nam zaoszczêdzisz czas i pieni±dze (monta¿ rusztowañ) oraz zrealizujesz projekty niemo¿liwe do przeprowadzenia metodami tradycyjnymi.\r\n<br>\r\nNasze zalety to przede wszystkim wysoka jako¶æ ¶wiadczonych us³ug oraz du¿a elastyczno¶æ i terminowo¶æ. Wychodz±c naprzeciw oczekiwaniom naszych klientów wiele robót wykonujemy tak¿e w dni wolne od pracy lub w godzinach nocnych. \r\n<br>\r\nO jako¶ci naszych us³ug ¶wiadczy fakt, ¿e od kwietnia 2002r posiadamy Certyfikat ISO 9001:2000. Jeste¶my zainteresowani d³ugookresow± wspó³prac±, dlatego powierzone pracy przeprowadzamy tanio, sprawnie i solidnie.\r\nPo szczegó³y zapraszamy na nasz± stronê internetow±:\r\nhttp://www.prace-budowlane.pl','','','0','0','0','0','0',1,1194258463,'212.182.49.250'),(41,'polmed','1450177','Polmed','Katarzyna Ostrowska','Lublin','Staszica','5','20-081','081-5348112 ','0602117117','polmed@eu4.pl','','	aparaty zdejmowane na zêby, autoklasy, brokat stomatologiczny, fotele dentystyczne, ortodoncja, plastyka dentystyczna, unity, wiert³a, wype³nienia, w','7121450177','431101888',139,1,1196436368,'Zapraszamy od poniedzia³ku do pi±tku w godzinach 09.00-17.00','','','0','0','0','0','0',1,1194259289,'212.182.49.250'),(42,'³ezka','1009512','Salon kwiatowy £ezka','Walentyna Górniak','Lublin','Ko³³ataja','5','20-006','081-5327580','05002115125','lezka@eu4.pl','','kwiaty, kosze, florystyka, kwiaty ciête, kwiaty doniczkowe, wi±zanki ¶lubne lublin, bukiety','7121009512','0',140,1,1196436365,'Zapraszamy od poniedzia³ku do pi±tku w godzinach: 8-18 oraz w sobotê: 9-14','','','0','0','0','0','0',1,1194259764,'212.182.49.250');
/*!40000 ALTER TABLE `firmy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `firmy_kategorie`
--

DROP TABLE IF EXISTS `firmy_kategorie`;
CREATE TABLE `firmy_kategorie` (
  `id` int(200) NOT NULL auto_increment,
  `kategoria` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `poz` int(50) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `firmy_kategorie`
--

LOCK TABLES `firmy_kategorie` WRITE;
/*!40000 ALTER TABLE `firmy_kategorie` DISABLE KEYS */;
INSERT INTO `firmy_kategorie` VALUES (22,'Us³ugi',1),(25,'Finanse i ubezpieczenia',2),(26,'Media',3),(28,'Biuro ',4),(29,'Us³ugi ró¿ne',5),(30,'	 Motoryzacja i transport ',6),(31,'Kuchnia',7),(32,'Materia³y i us³ugi budowlane',8),(33,'Edukacja',9),(34,'Hobby ',10),(35,'Zdrowie i uroda',11),(36,'Handel',12),(37,'	Turystyka ',13),(38,'Sztuka i wyposa¿enie wnêtrz',14),(39,'Rozrywka',15),(40,'Materia³y budowlane i wyposa¿enie wnêtrz',16),(41,'Materia³y i us³ugi budowlane, wyposa¿enie wnêtrz',17),(42,'Materia³y i us³ugi budowlane',18),(43,'Sztuka i wyposa¿enie wnêtrz',19);
/*!40000 ALTER TABLE `firmy_kategorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `firmy_subkategorie`
--

DROP TABLE IF EXISTS `firmy_subkategorie`;
CREATE TABLE `firmy_subkategorie` (
  `id` int(200) NOT NULL auto_increment,
  `idkat` int(200) NOT NULL default '0',
  `subkategoria` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `poz` int(50) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `firmy_subkategorie`
--

LOCK TABLES `firmy_subkategorie` WRITE;
/*!40000 ALTER TABLE `firmy_subkategorie` DISABLE KEYS */;
INSERT INTO `firmy_subkategorie` VALUES (75,22,'Tatu³a¿',3),(76,25,'Biura rachunkowe',1),(77,26,'Kawiarenka Internetowa',1),(78,26,'Us³ugi komputerowe',2),(79,28,'Artyku³y biurowe',1),(81,29,'Fotograficzne',1),(83,28,'Us³ugi poligraficzne',2),(84,29,'Reklamowe',2),(85,28,'Us³ugi introligatorskie',3),(86,30,'Alarmy samochodowe',1),(87,30,'Taxi',2),(88,30,'Transport miêdzynarodowy',3),(89,30,'Transport krajowy',4),(90,30,'Opony ',5),(91,30,'Myjnie samochodowe',6),(92,31,'Pizzerie',1),(93,31,'Restauracje',2),(94,31,'Kawiarnie',3),(95,31,'Obiady domowe',4),(96,32,'Sprzêt RTV',1),(97,32,'Wyk³adziny',2),(98,32,'Zegary',3),(99,32,'¯aluzje',4),(100,32,'Okna',5),(101,32,'Po¶ciel ',6),(102,32,'Ocieplanie budynków',7),(103,32,'Firany i zas³ony',8),(104,33,'Nauka jazdy ',1),(105,34,'Instrumenty muzyczne ',1),(106,34,'Akcesoria sportowe ',2),(107,35,'Medycyna naturalna',1),(108,35,'Optyk ',2),(109,35,'Us³ugi fryzjerskie',3),(110,35,'Us³ugi kosmetyczne',4),(111,35,'Studia tatua¿u',5),(112,36,'Telefony i akcesoria GSM',1),(114,36,'Artyku³y przemys³owe',2),(115,36,'Artyku³y spo¿ywcze',3),(116,36,'Komputery i akcesoria komputerowe',4),(117,36,'Artyku³y dzieciêce',5),(118,37,'Pensjonaty',1),(119,37,'Hotele',2),(120,37,'Agroturystyka',3),(121,37,'Pokoje go¶cinne',4),(122,37,'Domki do wynajêcia',5),(123,37,'Biura podró¿y',6),(124,38,'Galerie',1),(125,36,'Sklepy erotyczne',6),(126,39,'Pub',1),(127,39,'Klub',2),(128,30,'Stacje obs³ugi pojazdów',7),(129,39,'Dla dzieci',3),(130,32,'Wentylacja',9),(131,32,'Kominki',10),(132,36,'Komisy i lombardy',7),(133,38,'Wyroby artystyczne',2),(134,35,'Przychodnie specjalistyczne',6),(135,32,'Meble',11),(136,32,'Dachy',12),(137,32,'Us³ugi budowlane',13),(138,35,'Stomatolog',7),(139,35,'Artyku³y medyczne',8),(140,38,'Kwiaciarnie',3);
/*!40000 ALTER TABLE `firmy_subkategorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kina`
--

DROP TABLE IF EXISTS `kina`;
CREATE TABLE `kina` (
  `id` int(200) NOT NULL auto_increment,
  `nazwa` varchar(200) NOT NULL default '',
  `lokalizacja` int(100) NOT NULL default '0',
  `opis` longtext NOT NULL,
  `zdjecie` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kina`
--

LOCK TABLES `kina` WRITE;
/*!40000 ALTER TABLE `kina` DISABLE KEYS */;
INSERT INTO `kina` VALUES (2,'test',2,'tttttt23333','tin_can_phone.jpg');
/*!40000 ALTER TABLE `kina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `konfiguracja`
--

DROP TABLE IF EXISTS `konfiguracja`;
CREATE TABLE `konfiguracja` (
  `id` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `ustawienie` longtext character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfiguracja`
--

LOCK TABLES `konfiguracja` WRITE;
/*!40000 ALTER TABLE `konfiguracja` DISABLE KEYS */;
INSERT INTO `konfiguracja` VALUES ('coto','przewodnik po firmach, reklama w internecie, info.net.pl przewodnik po firmach, reklama w internecie, info.net.pl przewodnik po firmach, reklama w internecie, info.net.pl przewodnik po firmach, reklama w internecie, info.net.pl przewodnik po firmach, rekl'),('description','ogólnopolski internetowy przewodnik po firmach reklama w internecie pozycjonowanie stron www'),('ile_dni_za_darmo','24'),('keywords','ogólnopolski internetowy przewodnik po firmach reklama w internecie pozycjonowanie stron www'),('rozdzielnik_topa',' &#187; '),('template','default'),('title','przewodnik po firmach, reklama w internecie, info.net.pl'),('tresc_stopki','tu jaka¶ stopka'),('tytul_stopki','Informacje');
/*!40000 ALTER TABLE `konfiguracja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linki`
--

DROP TABLE IF EXISTS `linki`;
CREATE TABLE `linki` (
  `id` int(100) NOT NULL auto_increment,
  `nazwa` varchar(200) NOT NULL default '',
  `opis` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `linki`
--

LOCK TABLES `linki` WRITE;
/*!40000 ALTER TABLE `linki` DISABLE KEYS */;
/*!40000 ALTER TABLE `linki` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linki_kategorie`
--

DROP TABLE IF EXISTS `linki_kategorie`;
CREATE TABLE `linki_kategorie` (
  `id` int(100) NOT NULL auto_increment,
  `nazwa` varchar(255) NOT NULL default '',
  `sekcja` tinyint(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `linki_kategorie`
--

LOCK TABLES `linki_kategorie` WRITE;
/*!40000 ALTER TABLE `linki_kategorie` DISABLE KEYS */;
INSERT INTO `linki_kategorie` VALUES (12,'asd',8),(13,'jakas 2',9),(14,'jakas 3',9),(15,'jakas 4',9);
/*!40000 ALTER TABLE `linki_kategorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linki_strony`
--

DROP TABLE IF EXISTS `linki_strony`;
CREATE TABLE `linki_strony` (
  `id` int(200) NOT NULL auto_increment,
  `nazwa` varchar(200) NOT NULL default '',
  `opis` longtext NOT NULL,
  `zdjecie` varchar(100) NOT NULL default '',
  `kategoria` int(100) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `linki_strony`
--

LOCK TABLES `linki_strony` WRITE;
/*!40000 ALTER TABLE `linki_strony` DISABLE KEYS */;
INSERT INTO `linki_strony` VALUES (5,'testowy','<p>testowytesto wytestowytestowytes towytestowytestowytestowytesto wytestowyte stowy</p>','',11),(6,'http://www.google.com','<p>google google2</p>','',13),(7,'salsa','<p>salsasalsasalsasalsa</p>','',13),(8,'http://www.google.pl','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris magna mi, gravida nec, consequat ut, scelerisque vel, tortor. Phasellus ac libero. Proin pede elit, luctus eget, fringilla vestibulum, laoreet volutpat, lorem. Etiam gravida nonummy tellus. Nunc tortor erat, rutrum ac, tempor ut, lacinia ac,</p>','wrzutastop.gif',11);
/*!40000 ALTER TABLE `linki_strony` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `miasta`
--

DROP TABLE IF EXISTS `miasta`;
CREATE TABLE `miasta` (
  `id` int(100) NOT NULL auto_increment,
  `nazwa` varchar(200) NOT NULL default '',
  `opis` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `miasta`
--

LOCK TABLES `miasta` WRITE;
/*!40000 ALTER TABLE `miasta` DISABLE KEYS */;
INSERT INTO `miasta` VALUES (2,'Lublin','<p>dfgglk rniu eurh iirhei22222</p>'),(3,'Radom','hmmm'),(4,'Warszawa','hmmmm'),(6,'Kazimierz Dolny','mhhhhhh'),(8,'Gdañsk','<p>(kaszb. Gduñsk, niem. Danzig, ³ac. Gedania, Dantiscum, w³. Danzica, fr. Dantzig, esperanto Gdansko, Dancigo, lit. Gdanskas) to miasto po³o¿one nad Morzem Ba³tyckim, obecnie stolica wojew&oacute;dztwa pomorskiego oraz archidiecezji gdañskiej, niegdy¶ najludniejsze i najbogatsze miasto kr&oacute;lewskie w I Rzeczypospolitej.</p>\r\n<h1>Po³o¿enie</h1>\r\n<p>Gdañsk znajduje siê na terenie Pomorza Gdañskiego, nad Zatok± Gdañsk± u uj¶cia Mot³awy do Wis³y. Wraz z Gdyni± i Sopotem tworzy Tr&oacute;jmiasto, a z Pruszczem Gdañskim, Red±, Rumi± i Wejherowem&nbsp; aglomeracjê gdañsk±.</p>\r\n<h1>Historia</h1>\r\n<h2>Pocz±tki</h2>\r\n<p>Badania archeologiczne wskazuj±, ¿e ju¿ w VII wieku istnia³a w tym miejscu osada rzemie¶lniczo-rybacka. Jednak zesp&oacute;³ grodowo - miejski wraz z portem datowane s± na drug± po³owê X wieku. Pierwsze wzmianki o grodzie nad Mo³taw± pochodz± z &quot;¯ywota ¶w. Wojciecha&quot; autorstwa Jana Kanapariusza - benedyktyñskiego mnicha z klasztoru w Awentynie. ¦w. Wojciech, przysz³y patron Polski by³ misjonarzem z Czech, znanym tak¿e pod imieniem Adalbert. Pojawi³ siê w tych stronach w roku wiosn± 997 roku by g³osiæ S³owo Bo¿e.</p>\r\n<h2>Panowanie krzy¿ackie</h2>\r\n<p>Wydarzenia, kt&oacute;re mia³y miejsce w XIII i XIV wieku mia³y ogromne konsekwencje dla dalszych los&oacute;w miasta. Najpierw Boles³aw III Krzywousty przy³±czy³ ziemie Pomorza Gdañskiego do Polski. W tym okresie dziêki staraniom ksiêcia ¦wiêtope³ka II Wielkiego Gdañsk uzyska³ prawo organizacji jarmark&oacute;w ku czci ¶w. Dominika (1260 r.) oraz prawa miejskie (lubeckie) w 1263 roku. P&oacute;¼niej, w 1271r. roku Branderburczycy zajêli Gdañsk. M¶ciw&oacute;j II Pomorski zwany te¿ Mêstwinem, ksi±¿ê pomorski,&nbsp; kt&oacute;ry dziêki pomocy Boles³awa Pobo¿nego odzyska³ miasto w roku 1282, moc± zawartego w Kêpnie aktu przekaza³ swoj± ziemiê Przemys³awowi II - ksiêciu Wielkopolski. Kolejny najazd Branderburczyk&oacute;w mia³ miejsce w 1308 roku. Opanowali oni prawie ca³e miasto (bez obronionego przez kasztelana Boguszê grodu). W³adys³aw £okietek za rad±&nbsp; gdañskich Dominikan&oacute;w wezwa³ na pomoc Krzy¿ak&oacute;w, kt&oacute;rzy po wyparciu naje¼d¼c&oacute;w zaatakowali miasto dokonuj±c rzezi na mieszkañcach, kt&oacute;ra to przetrwa³a w historii jako &quot;rze¼ Gdañska&quot;. W 1343 na mocy podpisanej z Krzy¿akami ugody kr&oacute;l Kazimierz Wielki zrzek³ siê Pomorza Gdañskiego na rzecz Krzy¿ak&oacute;w. Trzy lata p&oacute;¼niej Mistrz Krzy¿acki Henryk Dusemer zast±pi³ prawa miejskie lubeckie prawem che³miñskimi.</p>\r\n<h2>Inkorporacja</h2>\r\n<p>Gdañszczanie wytrwale d±¿yli do uwolnienia siê spod krzy¿ackiego panowania. W roku 1410, po Bitwie pod Grundwaldem, rada miasta uzna³a zwierzchno¶æ W³adys³awa £okietka, jednak ju¿ w 1411, w wyniku traktatu toruñskiego, zosta³a przez kr&oacute;la zwolniona z danego s³owa. Skutkiem by³y liczne represje ze strony Krzy¿ak&oacute;w, kt&oacute;re spad³y na miasto. Jednak 11 lutego 1454 roku, po 145 latach zakoñczy³ siê okres zwierzchno¶ci Zakonu, Krzy¿acy zostaj± wypêdzeni, a 6 marca na wniosek poselstwa Zwi±zku Pruskiego, do kt&oacute;rego Gdañsk przystêpuje w 1440 roku, miasto zostaje przy³±czone do Polski (inkorporacja do Korony). Miasto wzbogaca siê nie tylko o liczne przywileje, ale tak¿e przejmuje maj±tek Zakonu. Za przyst±pienie do wojny trzynastoletniej Gdañsk otrzymuje tzw. Wielki Przywilej, czyli mo¿liwo¶æ swobodnego przywozu towar&oacute;w rzek± Wis³± z ca³ej Polski, Litwy oraz Rusi bez kontroli. Dla Gdañska rozpoczyna siê z³oty okres. Spu¶cizn± po okresie panowania krzy¿ackiego jest m.in. kana³ Raudni z istniej±cym do dzi¶ Wielkim M³ynem, liczne zabytki (Ko¶ci&oacute;³ MNP, mury obronne, ratusz).</p>\r\n<h2>Wielokulturowo¶æ miasta</h2>\r\n<p>W XVI wieku do Gdañska dotar³a reformacja, wskutek czego sta³ siê on miastem protestanckim. By³ to czas zamieszek na tle religijnym, kt&oacute;rym kres po³o¿y³ kr&oacute;l Zygmunt August prekursorskim w skali europejskiej dekretem tolerancyjnym (1557r.). Dwadzie¶cia lat p&oacute;¼niej Stefan Batory rozszerzy³ tolerancjê religijn± na inne wyznania, dziêki czemu Gdañsk sta³ siê Mekk± dla innowierc&oacute;w: holenderskich meonit&oacute;w, szkot&oacute;w, hugenot&oacute;w oraz ¯yd&oacute;w i najbardziej kosmopolitycznym miastem Polski, gdzie wsp&oacute;³istnia³y ze sob± w harmonii rozmaite kultury i religie.</p>\r\n<h2>Trudne lata</h2>\r\n<p>Podczas Potopu Szwedzkiego miasto stawi³o zaciek³y op&oacute;r, podobnie w latach 1700-1721 podczas wojny p&oacute;³nocnej. Niestety po II rozbiorze Polski zosta³o zaanektowane przez Prusy w 1793 roku. 27 maja 1807 roku wojska napoleoñskie dowodzone przez Franciszka J&oacute;zefa Lef&egrave;bvre&rsquo;a zdobywaj± miasto, kt&oacute;re otrzyma³o status Wolnego Miasta. Jednak ju¿ w 1815 roku Gdañsk powr&oacute;ci³ pod panowanie pruskie. Kolejne lata to upadek i katastrofa gospodarcza miasta. Wolnym miastem Gdañsk sta³ siê ponownie w roku 1919 na mocy traktatu wersalskiego, piêæ lat p&oacute;¼niej na jego terenie powsta³a diecezja gdañska.</p>\r\n<h2>Okres wojny</h2>\r\n<p>Lata trzydzieste XX wieku up³ynê³y pod znakiem narastaj±cej faszyzacji i terroru, zwieñczeniem kt&oacute;rych jest ostrza³ przez pancernik Schlezwig-Holstein polskiego posterunku na Westerplatte i pocz±tek II Wojny ¦wiatowej. Miasto zosta³o zdobyte przez wojska II Frontu Bia³oruskiego w 1945r. Bilans wojny to miasto zrujnowane w 55%, w tym zniszczenie 80% zabytkowego ¶r&oacute;dmie¶cia. Nie by³ to efekt walk o miasto, ale akcji regularnego wypalania i burzenia przez Armiê Czerwon±. Kolejne lata to czas ciê¿kiej pracy artyst&oacute;w, konserwator&oacute;w zabytk&oacute;w i zwyk³ych ludzi, dziêki kt&oacute;rym przywr&oacute;cono miastu jego dawny blask.</p>\r\n<h2>Historia najnowsza</h2>\r\n<p>W roku 1970 milicja i wojsko krwawo st³umi³y protest stoczniowc&oacute;w. To wydarzenie upamiêtnia Pomnik Poleg³ych Stoczniowc&oacute;w znajduj±cy siê u bram Stoczni Gdañskiej. Nast±pi³a fala masowych strajk&oacute;w, na skutek kt&oacute;rych pod koniec sierpnia 1980 roku podpisano porozumienia sierpniowe, gwarantuj±ce m.in. powstanie niezale¿nych zwi±zk&oacute;w zawodowych. By³ to pocz±tek koñca systemu komunistycznego w Polsce oraz Europie Wschodniej. Tablice z 21 postulatami z Sierpnia \'80 zasta³y wpisane przez UNESCO na listê Pamiêæ ¦wiata jako niepowtarzalny dokument, maj±cy wielki wp³yw na historiê.</p>\r\n<h1>S³awne postacie</h1>\r\n<p>Gdañsk to miasto, kt&oacute;re dziêki swej wielokulturowo¶ci i tolerancji przyci±ga³o artyst&oacute;w i my¶licieli. To tak¿e miasto ludzi niepokornych. Do znanych obywateli Gdañska nale¿eli m.in.:</p>\r\n<ul>\r\n    <li>Ksi±¿ê ¦wiêtope³k II Wielki (ok.1195-1266) - ksi±¿ê pomorski, najwybitniejszy w³adca z dynastii Sobies³awic&oacute;w</li>\r\n    <li>Jan Dantyszek (1485-1548) - biskup, sekretarz kr&oacute;lewski, dyplomata, humanista i literat</li>\r\n    <li>Abraham van den Blocke (1572-1628) - wybitny architekt i rze¼biarz, autor dzie³ takich jak: o³tarz w ko¶ciele ¦w. Jana, dekoracji w Wielkiej Zbrojowni, Z³otej Bramy, Fontanny Neptuna, Fasady Dworu Artusa i Z³otej Kamieniczki</li>\r\n    <li>Jan Heweliusz (1611-1687) - wybitny astronom</li>\r\n    <li>Daniel Gabriel Fahrenheit (1686-1736) - fizyk i in¿ynier, tw&oacute;rca skali Fahrenheita</li>\r\n    <li>Adam Kazimierz Joachim Ambro¿y Marek Czartoryski (1734-1823) - ksi±¿ê polityk, pisarz, krytyk literacki i teatralny</li>\r\n    <li>Arthur Schopenhauer (1788-1860) - filozof, przedstawiciel pesymizmu w filozofii</li>\r\n    <li>Adolf Friedrich Johann Butenandt (1903-1995) - biochemik i noblista</li>\r\n    <li>G&uuml;nter Wilhelm Grass (ur.1927) - literat i noblista</li>\r\n    <li>Henryk Jankowski (ur.1936) - opozycjonista, kapelan Solidarno¶ci</li>\r\n    <li>Lech Wa³êsa (ur.1943) - lider Solidarno¶ci, noblista, prezydent Rzeczypospolitej Polskiej</li>\r\n    <li>Krzysztof Kolberger (ur.1950) - aktor i re¿yser teatralny</li>\r\n    <li>Jerzy Owsiak (ur.1953 r.) - polski dziennikarz radiowy i telewizyjny, za³o¿yciel i prezes zarz±du Fundacji Wielkiej Orkiestry ¦wi±tecznej Pomocy</li>\r\n    <li>Donald Franciszek Tusk (ur.1957) - polityk</li>\r\n    <li>Dariusz Michalczewski (ur.1968) - polski bokser, mistrz ¶wiata zawodowc&oacute;w federacji WBO, WBA, IBF w kat. p&oacute;³ciê¿kiej</li>\r\n</ul>');
/*!40000 ALTER TABLE `miasta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `miasta_kategorie`
--

DROP TABLE IF EXISTS `miasta_kategorie`;
CREATE TABLE `miasta_kategorie` (
  `id` int(100) NOT NULL auto_increment,
  `nazwa` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `miasta_kategorie`
--

LOCK TABLES `miasta_kategorie` WRITE;
/*!40000 ALTER TABLE `miasta_kategorie` DISABLE KEYS */;
INSERT INTO `miasta_kategorie` VALUES (1,'Biura'),(2,'Biblioteki'),(3,'Kina'),(5,'Teatry'),(6,'Szpitale'),(7,'Urzêdy'),(8,'Kluby'),(9,'Szko³y'),(10,'Strona bez kategorii');
/*!40000 ALTER TABLE `miasta_kategorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `miasta_strony`
--

DROP TABLE IF EXISTS `miasta_strony`;
CREATE TABLE `miasta_strony` (
  `id` int(200) NOT NULL auto_increment,
  `nazwa` varchar(200) NOT NULL default '',
  `lokalizacja` int(100) NOT NULL default '0',
  `opis` longtext NOT NULL,
  `zdjecie` varchar(100) NOT NULL default '',
  `kategoria` int(100) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `miasta_strony`
--

LOCK TABLES `miasta_strony` WRITE;
/*!40000 ALTER TABLE `miasta_strony` DISABLE KEYS */;
INSERT INTO `miasta_strony` VALUES (1,'test',2,'<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas neque. Quisque condimentum leo id felis. Suspendisse id nisi. Nulla ultricies. Donec varius volutpat eros. Vestibulum pellentesque, nisl nec bibendum dapibus, leo nibh fermentum nisi, sit amet dictum ante dolor in orci. Suspendisse sagittis urna non felis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Fusce laoreet, lacus id sollicitudin dictum, est orci dignissim ligula, nec faucibus tortor neque et ipsum. Nulla adipiscing velit aliquam erat. Suspendisse orci tellus, gravida quis, ornare eleifend, placerat vel, libero. Phasellus pulvinar, ligula sed commodo ultricies, nisi odio sodales lectus, sed pellentesque enim nibh in sem. Pellentesque massa arcu, consectetuer a, aliquam a, tempus nec, dui. Nulla facilisi. Nullam tincidunt. Nam a quam. Nullam placerat nunc a odio. Aenean non neque. Proin commodo imperdiet diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.2</p>','logo2gg.jpg',2),(2,'Historia',2,'<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In sed lorem. Nullam in risus. Aenean mattis est ac nunc lobortis mattis. Ut at leo. Nulla facilisi. Nam eleifend mi a metus. Sed non elit. Etiam sit amet pede. Donec convallis sollicitudin orci. Vivamus quis lacus ac leo ornare sollicitudin. Sed sit amet pede. Quisque et tortor.<br />\r\n<br />\r\nSed feugiat malesuada augue. Nulla facilisi. Mauris pellentesque tortor eu sem. Aenean blandit orci vel turpis adipiscing tempor. Ut arcu lectus, commodo blandit, posuere non, tristique id, mauris. Vestibulum leo. Nunc ut velit vitae arcu hendrerit lacinia. Praesent nunc dui, rhoncus vel, suscipit quis, laoreet in, tortor. Phasellus viverra eros quis nunc. Duis vitae nisl. Quisque laoreet sem id est. Proin at enim dignissim mi condimentum varius. Vestibulum egestas pede ut odio. Etiam ultrices. Vivamus id diam. Maecenas gravida fermentum nunc.<br />\r\n<br />\r\nPraesent consequat bibendum leo. Cras ultricies malesuada velit. Aliquam erat volutpat. Cras ipsum. Sed quam. Nam eget sem. Phasellus vitae mi vitae enim placerat faucibus. Ut dui. Proin pharetra scelerisque dui. Donec viverra elementum erat. Duis at lacus a tellus ullamcorper dictum. Suspendisse varius egestas quam. Aenean sollicitudin massa ac nulla. Nulla varius risus ut erat. Suspendisse nec quam. Aliquam erat volutpat.</p>','',0),(3,'Inne informacje',2,'<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In sed lorem. Nullam in risus. Aenean mattis est ac nunc lobortis mattis. Ut at leo. Nulla facilisi. Nam eleifend mi a metus. Sed non elit. Etiam sit amet pede. Donec convallis sollicitudin orci. Vivamus quis lacus ac leo ornare sollicitudin. Sed sit amet pede. Quisque et tortor.<br />\r\n<br />\r\nSed feugiat malesuada augue. Nulla facilisi. Mauris pellentesque tortor eu sem. Aenean blandit orci vel turpis adipiscing tempor. Ut arcu lectus, commodo blandit, posuere non, tristique id, mauris. Vestibulum leo. Nunc ut velit vitae arcu hendrerit lacinia. Praesent nunc dui, rhoncus vel, suscipit quis, laoreet in, tortor. Phasellus viverra eros quis nunc. Duis vitae nisl. Quisque laoreet sem id est. Proin at enim dignissim mi condimentum varius. Vestibulum egestas pede ut odio. Etiam ultrices. Vivamus id diam. Maecenas gravida fermentum nunc.<br />\r\n<br />\r\nPraesent consequat bibendum leo. Cras ultricies malesuada velit. Aliquam erat volutpat. Cras ipsum. Sed quam. Nam eget sem. Phasellus vitae mi vitae enim placerat faucibus. Ut dui. Proin pharetra scelerisque dui. Donec viverra elementum erat. Duis at lacus a tellus ullamcorper dictum. Suspendisse varius egestas quam. Aenean sollicitudin massa ac nulla. Nulla varius risus ut erat. Suspendisse nec quam. Aliquam erat volutpat.</p>','',0),(4,'Kino Bajka',2,'<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla vehicula dui nec est. Mauris ipsum. Integer sollicitudin molestie neque. Ut eget eros ut mi congue posuere. Sed aliquam, nunc id mattis bibendum, turpis eros sagittis ante, iaculis ultricies magna mi sit amet arcu. Sed vulputate dolor sit amet justo. Aenean pharetra. Fusce posuere. Sed et purus. Nulla magna. Sed ut dolor quis lectus cursus viverra.<br />\r\n<br />\r\nVivamus adipiscing. Sed egestas. Sed tincidunt congue est. Morbi dolor. Suspendisse potenti. Morbi rutrum sodales enim. Phasellus lacinia enim sit amet diam. Aenean eros ipsum, dictum ut, accumsan sed, sodales ac, risus. Proin non libero vel odio semper mollis. Integer tempor rhoncus ante. Nam ac sem. In tempor ultrices libero. Duis risus nisl, fringilla eu, consequat vel, semper eu, nulla. Phasellus auctor gravida nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Phasellus eu orci. Vestibulum elementum. Quisque quam. Vestibulum gravida interdum quam. Proin aliquam.<br />\r\n<br />\r\nEtiam enim odio, convallis non, iaculis ut, auctor nec, dolor. Duis ut ligula. Suspendisse commodo nonummy tellus. Nullam et augue iaculis nisl ultrices cursus. Integer fermentum. Cras felis. Ut vel nisi et sem tempor auctor. Vivamus ac est. Proin lobortis dolor quis lorem. Morbi nec mauris quis leo porttitor fringilla. Nulla nulla neque, cursus eu, sodales vel, viverra ut, nulla.</p>','gggggg.jpg',3),(5,'testowe',2,'<p>Szpital przy ul. <strong>Chod¼ki</strong></p>','Image1.jpg',6);
/*!40000 ALTER TABLE `miasta_strony` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sklepy_linki`
--

DROP TABLE IF EXISTS `sklepy_linki`;
CREATE TABLE `sklepy_linki` (
  `id` int(200) NOT NULL auto_increment,
  `nazwa` varchar(200) NOT NULL default '',
  `opis` varchar(255) NOT NULL default '',
  `link` varchar(150) NOT NULL default '',
  `kategoria` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sklepy_linki`
--

LOCK TABLES `sklepy_linki` WRITE;
/*!40000 ALTER TABLE `sklepy_linki` DISABLE KEYS */;
INSERT INTO `sklepy_linki` VALUES (1,'2gg portal','Jakis opis 2gg, bla bla bla Jakis opis 2gg, bla bla bla Jakis opis 2gg, bla bla bla','http://2gg.pl','PORTALE'),(2,'CarBut sklep z oponami i felgami','szeroki asortyment opon i felg do wszystkich modeli samochodów','http://www.opony.info.net.pl','Sklep Motoryzacyjny');
/*!40000 ALTER TABLE `sklepy_linki` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `strony`
--

DROP TABLE IF EXISTS `strony`;
CREATE TABLE `strony` (
  `id` int(100) NOT NULL auto_increment,
  `nazwa` varchar(200) NOT NULL default '',
  `opis` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strony`
--

LOCK TABLES `strony` WRITE;
/*!40000 ALTER TABLE `strony` DISABLE KEYS */;
/*!40000 ALTER TABLE `strony` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teatry`
--

DROP TABLE IF EXISTS `teatry`;
CREATE TABLE `teatry` (
  `id` int(200) NOT NULL auto_increment,
  `nazwa` varchar(200) NOT NULL default '',
  `lokalizacja` int(100) NOT NULL default '0',
  `opis` longtext NOT NULL,
  `zdjecie` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teatry`
--

LOCK TABLES `teatry` WRITE;
/*!40000 ALTER TABLE `teatry` DISABLE KEYS */;
INSERT INTO `teatry` VALUES (1,'teatr 1',4,'opis teatru','zdjecieporfela.jpg'),(2,'jakis znowu teatr',3,'<p>tesdfs fsdfsdf</p>','');
/*!40000 ALTER TABLE `teatry` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2007-11-27 11:23:07
