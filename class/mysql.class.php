<?
class db_mysql {

	var $_c_server = 'localhost';
	var $_c_user = 'eu4_przewodnik';
	var $_c_database = 'eu4_przewodnik';
	var $_c_password = '7kazik3';



   var $_t_prefix = '';
   
   
   
   var $_TestMode = false;
   
   var $_s_sql;

	
	
	
	
	
	function SetPrefix($val){
	$this->_t_prefix = $val;
	}
	
	function SetTestMode($val=true){
	$this->_TestMode = $val;
	}	
	
	
	

    function db_mysql($user, $password, $database, $serwer='') {
		$this->_c_user = $user;
		$this->_c_password = $password;
		$this->_c_database = $database;
		$this->_c_server = ($serwer == '') ? $this->_c_server : $serwer;
		
		$this->_s_sql = mysql_connect($this->_c_server, $this->_c_user, $this->_c_password) or die(mysql_error());
		mysql_select_db($this->_c_database) or die(mysql_error());
		
		
		return true;
	}
	function db_close(){
	   mysql_close($this->_s_sql);
	}
//////////////////////// pobieranie jednego wiersza, zwroci tablice

	function mysql_get($table, $where){
       $sum = count($where);
       			
       			
       			
       			if($sum==1){
                        while($e = each($where)){
   							$zap = "SELECT * FROM ".$this->_t_prefix.$table." WHERE ".$e["key"]."='".$e["value"]."'";    
                        }
       			}
       			elseif($sum>1){
       			
       				$i=0;
                        while($e = each($where)){
                        $zap = ($i==0) ? "SELECT * FROM ".$this->_t_prefix.$table." WHERE ".$e["key"]."='".$e["value"]."'" : $zap;
                        $zap .= ($i!=0) ? " AND ".$e["key"]."='".$e["value"]."'" : "";
   							$i++;
                        }

       			}
$zap .= " LIMIT 1";
   if($this->_TestMode)	die($zap);
   
   
   $wykonaj = mysql_query($zap);
   while($wiersz = mysql_fetch_array($wykonaj))
   {
	return $wiersz;
	} 
	
	

	
	}


	function mysql_q($zap){
	
   $result = mysql_query($zap) or die(mysql_error());
   
if($this->_TestMode)	die($zap);
   
   return $result;
	
	}


//////////////////////// zliczanie rekordow
    function mysql_count($table, $where='') {  // where - tablica asocjacyjna
    
       if($where==''){
       $zap = 'SELECT COUNT(*) FROM '.$this->_t_prefix.$table;    
       }
       elseif(is_array($where)){
       $sum = count($where);
       			
       			
       			
       			if($sum==1){
                        while($e = each($where)){
   							$zap = "SELECT COUNT(*) FROM ".$this->_t_prefix.$table." WHERE ".$e["key"]."='".$e["value"]."'";    
                        }
       			}
       			elseif($sum>1){
       			
       				$i=0;
                        while($e = each($where)){
                        $zap = ($i==0) ? "SELECT COUNT(*) FROM ".$this->_t_prefix.$table." WHERE ".$e["key"]."='".$e["value"]."'" : $zap;
                        $zap .= ($i!=0) ? " AND ".$e["key"]."='".$e["value"]."'" : "";
   							$i++;
                        }

       			}
      
       }

if($this->_TestMode)	die($zap);


$result = mysql_query($zap) or die(mysql_error());
$row = mysql_fetch_array($result);
return $row[0];  



	}

	
/////////////////////// kasowanie rekordu
	function mysql_delete($table, $where){  // where - tablica asocjacyjna
	

	
       $sum = count($where);
       			
       			
       			
       			if($sum==1){
                        while($e = each($where)){
   							$zap = "DELETE FROM ".$this->_t_prefix.$table." WHERE ".$e["key"]."='".$e["value"]."'";    
                        }
       			}
       			elseif($sum>1){
       			
       				$i=0;
                        while($e = each($where)){
                        $zap = ($i==0) ? "DELETE FROM ".$this->_t_prefix.$table." WHERE ".$e["key"]."='".$e["value"]."'" : $zap;
                        $zap .= ($i!=0) ? " AND ".$e["key"]."='".$e["value"]."'" : "";
   							$i++;
                        }

       			}

	
if($this->_TestMode)	die($zap);

$result = mysql_query($zap) or die(mysql_error());
return $result;
	
	
	
	
	
	}
	

/////////////////////// edycja rekordu
	function mysql_update($table, $what , $where){  // $what, $where - tablica asocjacyjna
	






       $sum = count($what);
       			
       			
       			
       			if($sum==1){
                        while($e = each($what)){
   							$zap = "UPDATE ".$this->_t_prefix.$table." SET ".$e["key"]."='".$e["value"]."'";    
                        }
       			}
       			elseif($sum>1){
       			
       				$i=0;
                        while($e = each($what)){
                        $zap = ($i==0) ? "UPDATE ".$this->_t_prefix.$table." SET ".$e["key"]."='".$e["value"]."'" : $zap;
                        $zap .= ($i!=0) ? ", ".$e["key"]."='".$e["value"]."'" : "";
   							$i++;
                        }

       			}


        $sum = count($where);			
       			
       			if($sum==1){
                        while($e = each($where)){
   							$zap2 .= " WHERE ".$e["key"]."='".$e["value"]."'";
                        }
       			}
       			elseif($sum>1){
       			
       				$i=0;
                        while($e = each($where)){
                        $zap2 = ($i==0) ? " WHERE ".$e["key"]."='".$e["value"]."'" : $zap2;
                        $zap2 .= ($i!=0) ? " AND ".$e["key"]."='".$e["value"]."'" : "";
   							$i++;
                        }

       			}	

      $zap .= $zap2;



      	
      if($this->_TestMode)	die($zap);

      $result = mysql_query($zap) or die(mysql_error());
      return $result;
	
	
	
	
	
	}


/////////////////////// dodawanie rekordu
	function mysql_insert($table, $what){  // $what - tablica asocjacyjna
	

       $sum = count($what);
       			
       			
       			
       			if($sum==1){
                        while($e = each($what)){
   							$zap = "INSERT INTO ".$this->_t_prefix.$table." (`".$e["key"]."`) VALUES (`".$e["value"]."`)";    
                        }
       			}
       			elseif($sum>1){
       			
       				$i=0;
                        while($e = each($what)){
                        $zap = ($i==0) ? "INSERT INTO ".$this->_t_prefix.$table." (".$e["key"] : $zap;
                        $zap .= ($i!=0) ? " , ".$e["key"] : "";
                        

								
								
                        $zap2 = ($i==0) ? "'".$e["value"]."'" : $zap2;
                        $zap2 .= ($i!=0) ? " , '".$e["value"]."'" : "";
								
								

   							$i++;
   							
   							
   							
                        }
                        
                        $zap .= ") VALUES (".$zap2.");";
                        

                        
                        
                        
                        
                        
                        
                        
                        

       			}


 



      	
      if($this->_TestMode)	die($zap);

      $result = mysql_query($zap) or die(mysql_error());
      return $result;
	
	
	
	
	
	}


}
?>
