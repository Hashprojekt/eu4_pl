<?

class breadcrump{

	var $_sep = '-';
	var $_crumps = array('Strona g³ówna' => 'index.php');
	var $_template = '<a href="{LINK}">{NAME}</a>';
	var $_temp;
	var $_temp2 = 1;
	var $_bc;
	
	function SetSeparator($val){
	$this->_sep = $val;
	}
	function SetTemplate($val){
	$this->_template = $val;
	}

	function _add($val=''){
	if($val!=''){ 	$this->_crumps = array_merge($this->_crumps, $val); }

   	while(list($k,$v) = each($this->_crumps)){
   	
   	if(count($this->_crumps)==$this->_temp2){ $k = '<b>'.$k.'</b>'; }
      	if($k!='Strona g³ówna'){
         	if(!eregi('nid', $v)){
         	if(eregi('\?', $v)){ $v = $v.'&nid='.NID; }else{ $v = $v.'?nid='.NID; }
         	}
      	}
   	
   	$this->_bc .= $this->_temp.str_replace(array('{LINK}', '{NAME}'), array($v, $k), $this->_template );
   	if(count($this->_crumps)>1){ $this->_temp = $this->_sep; }
   	
   	
   	$this->_temp2++;
   	}

	}



}

$bc = new breadcrump();
$bc->SetSeparator($k['rozdzielnik_topa']);



$spis['rejestracja'] = array('Rejestracja'=>'index.php?id=rejestracja');
$spis['zamawiam_podstawowy'] = array('Zamawiam Podstawowy'=>'index.php?id=zamawiam_podstawowy');					 	    
$spis['zamawiam_rozszerzony'] = array('Zamawiam Rozszerzony'=>'index.php?id=zamawiam_rozszerzony');
$spis['logowanie'] = array('Logowanie'=>'index.php?id=logowanie');
      $numer = (int) $_GET['numer'];
      $h = (int) $_GET['h'];
      if($numer!=''){
      $kat = $sql->mysql_get("firmy_subkategorie", array('id'=>$numer));
      }
$spis['kategoria'] = array($kat['subkategoria']=>'index.php?id=kategoria&numer='.$numer.'&h='.$h);
      $kat = $sql->mysql_get("firmy_subkategorie", array('id'=>$firma['kategoria']));
$spis['ogloszenie'] = array($kat['subkategoria']=>'index.php?id=kategoria&numer='.$firma['kategoria'], 
									$firma['nazwa_firmy']=>'index.php?id=ogloszenie&n='.$firma['id']);
$spis['user_edit'] = array('Edycja wizytówki'=>'index.php?id=user_edit');

$spis['zamawiam_podstawowy'] = array_merge($spis['rejestracja'], $spis['zamawiam_podstawowy']);
$spis['zamawiam_rozszerzony'] = array_merge($spis['rejestracja'], $spis['zamawiam_rozszerzony']);
$spis['miasta'] = array('Miasto'=>'index.php?id=miasta');
$miasto2 = array(miasto(NID)=>'index.php?nid='.NID);
$spis['kontakt'] = array('Kontakt'=>'index.php?id=kontakt');

if(NID!=''){
if(is_array($spis[$_GET['id']])){
$bc->_add(@array_merge($miasto2, $spis[$_GET['id']]));
}else{
$bc->_add($miasto2);
}



  }else{
$bc->_add($spis[$_GET['id']]);
}


?>
