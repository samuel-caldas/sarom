<?php
/*
	Framework Para Banco de dados em Mysql
	Desenvoltido por samuel.caldas@gmail.com
	V: 3.0 lite
	OBS:debug ativa o relatorio
*/
	function conect($debug,$servidor,$usuario,$senha,$banco){
		if($con=mysql_select_db($banco,mysql_connect($servidor,$usuario,$senha))){
			if($debug){echo'Conectado!';}
			return $con;
		}else{
			if($debug){echo'Erro ao Conectar!'.$con;}
			return false;
		}
	}
	
	
	function insert($debug,$tabela,$onde,$valores){
		if(mysql_query('INSERT INTO '.$tabela.' '.($onde?'('.$onde.')':false).' VALUES('.$valores.')')){
			if($debug){echo'Inserido!';}
			return true;
		}else{
			if($debug){echo'Falha ao Inserir!';}
			return false;
		}
	}
	
	
	function del($debug,$tabela,$onde){
		if(mysql_query('DELETE FROM '.$tabela.' WHERE '.$onde)){
			if($debug){echo'Apagado!';}
			return true;
		}else{
			if($debug){echo'Falha ao Apagar!';}
			return false;
		}
	}
	
	
	function update($debug,$tabela,$onde,$valores){
		if(mysql_query('UPDATE '.$tabela.' SET '.$valores.' WHERE '.$onde)){
			if($debug){echo'Atualizado!';}
			return true;
		}else{
			if($debug){echo'Falha ao Atualizar!';}
			return false;
		}
	}
	
	
	function select($debug,$oq,$tabela,$onde,$order){
		if(mysql_num_rows($sql=MYSQL_QUERY('SELECT '.($oq?$oq:'*').' FROM '.$tabela.($onde?' WHERE '.$onde:'').($order?' ORDER BY '.$order:'')))!=0){
			foreach(mysql_fetch_row($sql) as $line){
				$out[]=$line;
			}
			if($debug){echo'Selecionado!';}
			return count($out)>1?$out:false;
		}else{
			if($debug){echo'Falaha ao Selecionar!';}
			return false;
		}
	};
	
	
	conect(false,'localhost','floresde_sarom','sabedoria','floresde_sarom');
?>