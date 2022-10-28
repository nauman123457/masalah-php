<?php include "dbClass.php";
class fspublisher_connection_db_con extends connection_db_con_dbclass
{
	public function min_max($table,$cond,$column,$max_min='max'){
		if (in_array($table, $this->tables) && strlen($column) < 15) {
			$con_tbl=[];$param="";
			foreach ($cond as $key => $value){
			$con_tbl[].= $value;
			$param    .=$key."=? AND "; }
			foreach ($cond as $key => $value){
			$con_tbl[].= $value;}
			$param  = substr($param,0,-5);
			if ($max_min == 'max') {
				$sql="SELECT * FROM `".$this->prefix.$table."` Where $param AND $column=(SELECT MAX($column) from `".$this->prefix.$table."` Where $param)";
			}elseif($max_min == 'min'){
				$sql="SELECT * FROM `".$this->prefix.$table."` Where $param AND $column=(SELECT MIN($column) from `".$this->prefix.$table."` Where $param)";
			}
			// echo $sql;
			$result=$this->bind_variables($sql,$con_tbl);
			$row=$result->fetch_array();
			return $row;	 
		}
	}
	public function fetch_data($table){
		if (in_array($table, $this->tables)) {
			$sql="SELECT * FROM `".$this->prefix.$table."`";
			$query=$this->connection_db_con->query($sql);
			$row = array();
			while ($result=$query->fetch_array()) {
				$row[]=$result;
			}
			return $row;
			$query->close();
		}
	}
	public function select_data($table,$con){
		if (in_array($table, $this->tables)) {
			$con_tbl=[];$param="";
			foreach ($con as $key => $value){
			    $con_tbl[].= $value;
			    $param    .=$key."=? AND "; 
			}
			$param  = substr($param,0,-5);
			$sql="SELECT * FROM `".$this->prefix.$table."` WHERE $param";
			$result=$this->bind_variables($sql,$con_tbl);
			$row=array();
				while ($query=$result->fetch_assoc()) 
				{
					$row[]=$query;
				}
				return $row;
			$result->close(); 
		}
	}
	public function distinct_data($table,$column){
		if (in_array($table, $this->tables)) {
	 		$sql = "SELECT  DISTINCT "; 
	 		foreach ($column as $key => $value) {
	 			$sql .=" ?, "; 
	 			$con_tbl[].= $key;
	 		} 
	 		$sql=substr($sql,0,-2); 
	 		$sql=$sql." FROM `".$this->prefix.$table."`"; 
	 		$arrayName=array();
	 		$result=$this->bind_variables($sql,$con_tbl);
	 		if ($result) {
	 			while ($row=$result->fetch_array()) {
	 				$arrayName[]=$row; 
	 			} 
	 			return $arrayName; 
	 		} else{return false; } 
	 		$result->close(); 
		}
 	} 
 	public function distinct_data_con($table,$column,$condition){
		if (in_array($table, $this->tables)) {
	 		$sql = "SELECT  DISTINCT "; 
	 		foreach ($column as $key => $value) {
	 			$sql .=" $key, "; 
	 		} 
	 		$sql=substr($sql,0,-2); $con_tbl=[];
	 		$sql=$sql." FROM `".$this->prefix.$table."` WHERE "; 
	 		foreach ($condition as $key => $value) {
	 			$sql .=$key."=? AND "; 
	 			$con_tbl[].=$value;
	 		} 
	 		$sql=substr($sql,0,-5); 
	 		$arrayName=array(); 
	 		$result=$this->bind_variables($sql,$con_tbl);
	 		if ($result) {
	 			while ($row=$result->fetch_assoc()) {
	 				$arrayName[]=$row; 
	 			} return $arrayName; 
	 		} else{return false; } 
		}
 	} 

	/* end of distinct data function */
	public function select_data_or($table,$con,$column,$order){
		if (strlen($order) < 13 && in_array($table, $this->tables) && strlen($column) < 15){
			$con_tbl=array();$param="";
			foreach ($con as $key => $value){
			$con_tbl[] .= $value;
			$param    .=$key."=? AND "; }
			$param  = substr($param,0,-5);
			$sql="SELECT * FROM `".$this->prefix.$table."` WHERE $param";
	 		$result=$this->bind_variables($sql,$con_tbl);
			$rows=array();
			while ($query=$result->fetch_assoc()) { $rows[]=$query; }
				if ($order == "ASC") {
					$rows=$this->array_orderby($rows,$column,SORT_ASC);
				}else{
					$rows=$this->array_orderby($rows,$column,SORT_DESC);
				}
			return $rows;
		}
	}
	public function search_data($table,$condition){
		if (in_array($table, $this->tables)) {
	 		$sql = "SELECT * FROM `".$this->prefix.$table."` WHERE ";$con_tbl=[]; 
	 		foreach ($condition as $key => $value) {
	 			$sql .=$key." LIKE ? AND ";
	 			$con_tbl[].= "%".$value."%";
	 		} 
	 		$sql=substr($sql,0,-5); 
	 		$arrayName=array(); 
	 		$result=$this->bind_variables($sql,$con_tbl);  		
	 		if ($result) {
	 			while ($row=$result->fetch_assoc()) {
	 				$arrayName[]=$row; 
	 			} 
	 			return $arrayName; 
	 		} 
	 		else{
	 			return false; 
	 		} 
		}
 	} 
	public function one_value($table,$con){
		if (in_array($table, $this->tables)) {
			$con_tbl=[];$param="";
			foreach ($con as $key => $value){
			$con_tbl[].= $value;
			$param    .=$key."=? AND "; }
			$param = substr($param, 0,-5);
			$sql="SELECT * FROM `".$this->prefix.$table."` WHERE $param";
			$result=$this->bind_variables($sql,$con_tbl);
			
			$query=$result->fetch_assoc();
			return $query;
		}
	}
	/* end of one value function */
	public function insert_data($table,$tbl_data){ 
		if (in_array($table, $this->tables)) {
			$table_fields = "";
			$data = "";	
			$param="";
			$con_tbl=[];
			foreach ($tbl_data as $key => $value) {
				$table_fields .= "" . $key . ",";
				$param .= "?,";
				$con_tbl[] .= $value;
			}
			
			$table_fields = substr($table_fields, 0,-1);
			$param = substr($param, 0,-1);
			 $sql="INSERT INTO `".$this->prefix.$table."` ($table_fields) VALUES ($param)"; 
			 
			$stmt = $this->bind_variables($sql,$con_tbl);
			return true;
		}
	}
		/* end of insert data */
	public function delete_data($table,$data){
		if (in_array($table, $this->tables)) {
			$con_tbl=[]; $param="";
			
			foreach ($data as $key => $value) {
			$param .= $key."=? AND ";
			$con_tbl[] .= $value;
			}
			$param=substr($param,0,-4);
			$sql="DELETE FROM `".$this->prefix.$table."` WHERE $param";
			$reselt = $this->bind_variables($sql,$con_tbl);
			return true;
		}
	}
		/* end of delete_data function */
	public	function edit_data($table,$tbl_data,$cond){
		if (in_array($table, $this->tables)) {
			$con_tbl=[]; $data_param="";
			$cond_param="";

			foreach ($tbl_data as $key => $value) {
			$con_tbl[] .= $value;
			$data_param .= "$key=?,";}

			$data_param=substr($data_param,0,-1);
			foreach ($cond as $key => $value) {
			$con_tbl[] .=$value; 
			$cond_param .= "$key=? AND ";}
			$cond_param=substr($cond_param,0,-4);

			$sql="UPDATE `".$this->prefix.$table."` SET  $data_param WHERE $cond_param";
			$stmt = $this->bind_variables($sql,$con_tbl);
			return true;
		}
	}
	/* end of update_data function.php */
	public function row_count($table){
		if (in_array($table, $this->tables)) {
			$con_tbl=[];
			$sql="SELECT * FROM `".$this->prefix.$table."`";
			$result=$this->bind_variables($sql,$con_tbl);
			$num=mysqli_num_rows($result);
			return $num; 
			$result->close();
		}
	}
	public function row_count_con($table,$con){
		if (in_array($table, $this->tables)) {
			$con_tbl=[];$param="";
			foreach ($con as $key => $value) {
				$con_tbl[] .= $value;
				$param .= $key."=? AND ";
			}
			$param=substr($param,0,-5);
			$sql="SELECT * FROM `".$this->prefix.$table."` WHERE $param";
			$result=$this->bind_variables($sql,$con_tbl);
			$num=mysqli_num_rows($result);
			return $num;
			$stmt->close();
		}
	}
	public function direct_query($sql){
		 
		// echo $sql;
		$query=$this->connection_db_con->query($sql);
		$row = array();
		while ($result=$query->fetch_array()) {
			$row[]=$result;
		}
		return $row;
		$query->close();
	}

	public function direct_query_one($sql){
		 
		// echo $sql;
		$query=$this->connection_db_con->query($sql);
		$result=$query->fetch_assoc();
			return $result;
	}
	
	public function bind_variables($sql,$values){
		$stmt= $this->connection_db_con->prepare($sql);

		$num=count($values);
		if ($num==1) {
			$stmt->bind_param(str_repeat("s", $num),$values[0]);
		}elseif($num==2){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1]);
		}elseif($num==3){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2]);
		}elseif($num==4){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3]);
		}elseif($num==5){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4]);
		}elseif($num==6){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5]);
		}elseif($num==7){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6]);
		}elseif($num==8){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7]);
		}elseif($num==9){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8]);
		}elseif($num==10){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9]);
		}elseif($num==11){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10]);
		}elseif($num==12){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11]);
		}elseif($num==13){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12]);
		}elseif($num==14){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13]);
		}elseif($num==15){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14]);
		}elseif($num==16){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15]);
		}elseif($num==17){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16]);
		}elseif($num==18){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17]);
		}elseif($num==19){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18]);
		}elseif($num==20){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19]);
		}elseif($num==21){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20]);
		}elseif($num==22){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21]);
		}elseif($num==23){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22]);
		}elseif($num==24){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23]);
		}elseif($num==25){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24]);
		}elseif($num==26){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25]);
		}elseif($num==27){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26]);
		}elseif($num==28){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27]);
		}elseif($num==29){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28]);
		}elseif($num==30){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29]);
		}elseif($num==31){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30]);
		}elseif($num==45){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44]);
		}elseif($num==46){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45]);
		}elseif($num==47){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46]);
		}elseif($num==48){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47]);
		}elseif($num==49){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48]);
		}elseif($num==50){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48],$values[49]);
		}elseif($num==51){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48],$values[49],$values[50]);
		}elseif($num==52){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48],$values[49],$values[50],$values[51]);
		}elseif($num==53){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48],$values[49],$values[50],$values[51],$values[52]);
		}elseif($num==54){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48],$values[49],$values[50],$values[51],$values[52],$values[53]);
		}elseif($num==55){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48],$values[49],$values[50],$values[51],$values[52],$values[53],$values[54]);
		}elseif($num==56){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48],$values[49],$values[50],$values[51],$values[52],$values[53],$values[54],$values[55]);
		}elseif($num==57){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48],$values[49],$values[50],$values[51],$values[52],$values[53],$values[54],$values[55],$values[56]);
		}elseif($num==58){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48],$values[49],$values[50],$values[51],$values[52],$values[53],$values[54],$values[55],$values[56],$values[57]);
		}elseif($num==59){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48],$values[49],$values[50],$values[51],$values[52],$values[53],$values[54],$values[55],$values[56],$values[57],$values[58]);
		}elseif($num==60){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48],$values[49],$values[50],$values[51],$values[52],$values[53],$values[54],$values[55],$values[56],$values[57],$values[58],$values[59]);
		}elseif($num==61){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48],$values[49],$values[50],$values[51],$values[52],$values[53],$values[54],$values[55],$values[56],$values[57],$values[58],$values[59],$values[60]);
		}elseif($num==62){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48],$values[49],$values[50],$values[51],$values[52],$values[53],$values[54],$values[55],$values[56],$values[57],$values[58],$values[59],$values[60],$values[61]);
		}elseif($num==63){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48],$values[49],$values[50],$values[51],$values[52],$values[53],$values[54],$values[55],$values[56],$values[57],$values[58],$values[59],$values[60],$values[61],$values[62]);
		}elseif($num==64){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48],$values[49],$values[50],$values[51],$values[52],$values[53],$values[54],$values[55],$values[56],$values[57],$values[58],$values[59],$values[60],$values[61],$values[62],$values[63]);
		}elseif($num==65){
			$stmt->bind_param(str_repeat("s", $num),$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14],$values[15],$values[16],$values[17],$values[18],$values[19],$values[20],$values[21],$values[22],$values[23],$values[24],$values[25],$values[26],$values[27],$values[28],$values[29],$values[30],$values[31],$values[33],$values[33],$values[34],$values[35],$values[36],$values[37],$values[38],$values[39],$values[40],$values[41],$values[44],$values[43],$values[44],$values[45],$values[46],$values[47],$values[48],$values[49],$values[50],$values[51],$values[52],$values[53],$values[54],$values[55],$values[56],$values[57],$values[58],$values[59],$values[60],$values[61],$values[62],$values[63],$values[64]);
		}
		$stmt->execute();
	 	$result=$stmt->get_result();
	 	return $result;
		$stmt->close();
	}
	function array_orderby()
	{
	    $args = func_get_args();
	    $data = array_shift($args);
	    foreach ($args as $n => $field) {
	        if (is_string($field)) {
	            $tmp = array();
	            foreach ($data as $key => $row)
	                $tmp[$key] = $row[$field];
	            $args[$n] = $tmp;
	        }
	    }
	    $args[] = &$data;
	    call_user_func_array('array_multisort', $args);
	    return array_pop($args);
	}
}
$fun=new fspublisher_connection_db_con(); ?>