<?php
//conectar
function conect($servidor,$user,$pass,$database){return($c=mysql_connect($servidor,$user,$pass))?mysql_select_db($database,$c):false;}

//seleciona
function select($table,$where,$order){//verificar se retorna false caso nao exista o valor no banco de dados
	if (@mysql_num_rows($sql=MYSQL_QUERY("SELECT * FROM $table".($where?" WHERE $where":"").($oder?" ORDER BY $order":"")))>0){
		$i=0;
		while($line=mysql_fetch_row($sql)){
			$result[$i]=$line;
			$i++;
		}
		return $result;
	}else{
		return false;
	}
}

//inserir
function insert($table,$values){//fazer uma função que verifique se ja existe antes de inserir e que retorne o id após inserir
	return mysql_query("INSERT INTO $table VALUES ('',$values)");
}

//delete
function delete($table,$where){return mysql_query("DELETE FROM $table WHERE $where");}

//Atualisa
function update($table,$where,$values){return mysql_query("UPDATE $table SET $values WHERE $where");}
?>