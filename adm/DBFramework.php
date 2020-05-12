<?php
/*
	Framework Para Banco de dados em Mysql
	Desenvoltido por samuel.caldas@gmail.com
	V: 3.0
	OBS: debug ativa o relatorio
*/
	function utf8($string){
		return utf8_encode($string);
	}
	
	function conect($debug,$servidor,$usuario,$senha,$banco){
		if($con=mysql_select_db($banco,mysql_connect($servidor,$usuario,$senha))){
			if($debug){echo'Conectado!';}
			return $con;
		}else{
			if($debug){echo'Erro ao Conectar!'.$con.' Erro: '.mysql_error();}
			return false;
		}
	}

	function insert($debug,$tabela,$onde,$valores){
		if(mysql_query('INSERT INTO '.$tabela.' '.($onde?'('.$onde.')':false).' VALUES('.$valores.')')){
			if($debug){echo'Inserido!';}
			return true;
		}else{
			if($debug){echo'Falha ao Inserir! '.mysql_error();}
			return false;
		}
	}

	function del($debug,$tabela,$onde){
		if(mysql_query('DELETE FROM '.$tabela.' WHERE '.$onde)){
			if($debug){echo'Apagado!';}
			return true;
		}else{
			if($debug){echo'Falha ao Apagar! '.mysql_error();}
			return false;
		}
	}

	function update($debug,$tabela,$onde,$valores){
		if(mysql_query('UPDATE '.$tabela.' SET '.$valores.' WHERE '.$onde)){
			if($debug){echo'Atualizado!';}
			return true;
		}else{
			if($debug){echo'Falha ao Atualizar! '.mysql_error();}
			return false;
		}
	}
	
	function query($debug,$sql){
		$saida=mysql_query($sql);
		if(!$saida){
			if($debug){die('Query invalida: '.mysql_error());}
			return false;
		}else{
			return $saida;
		}
	}
	
	function select($debug,$oq,$tabela,$onde,$ordenar){
		$oq=$oq?$oq:'*';
		$onde=$onde?(' WHERE '.$onde):false;
		$ordenar=$ordenar?(' ORDER BY '.$ordenar):false;
		$sql=mysql_query('SELECT '.$oq.' FROM '.$tabela.''.$onde.$ordenar);
		if(!$sql){
			if($debug){die('Query invalida: '.mysql_error());}
			return false;
		}
			if($debug){
				while($line=mysql_fetch_assoc($sql)){
					$out[]=$line;
				}
			}else{
				while($line=mysql_fetch_row($sql)){
					$out[]=$line;
				}
			}
		if(isset($out)){
			return $out;
		}else{
			return false;
		}
	};
	conect(false,'localhost','floresde_sarom','sabedoria','floresde_sarom');

	//SELECT ur FROM img WHERE cd =1 AND tag LIKE 'capa' LIMIT 0 , 12
	
	/*$sql=mysql_query("SELECT * FROM carrossel,cat,img,login,produtos LIMIT 0 , 12");
	while ($row = mysql_fetch_assoc($sql)) {
		print_r($row);
		echo'<br />';
	}*/
?>