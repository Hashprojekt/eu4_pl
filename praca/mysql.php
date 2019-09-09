<?
require_once("class/mysql.class.php");




$sql = new db_mysql('', '', 'gdzie_daniel');



$sql->SetPrefix('awt_');

$sql->SetTestMode(); // always die


// $kontogg = $sql->mysql_get('kontagg', array('wolny'=>'1'));

// echo $sql->mysql_count(  'newsy', array('nid' => '1', 'data' => '0')  );


// $sql->mysql_delete(  'newsy', array('nid' => '1', 'data' => '0', 'data2' => '0')  );


// $sql->mysql_update(  'newsy', array('nid' => '1', 'data' => '0', 'data2' => '0'), array('nid' => '1', 'nid2' => '1', 'data' => '0')  );



$sql->mysql_insert(  'newsy', array('data' => '123', 'tresc' => 'asdasd')  );












$sql->db_close();



?>
