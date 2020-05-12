<?php
include 'debug.php';
class sql{
	private $_con, $_table, $_where, $_what, $_order, $_error, $_status;
	public function __construct(){}
	public function __destruct() {}

// Define uma tabela para trabalho
	public function table($name){
		if(!empty($name)){
			$this->_table=$name;
			$this->log('Tabela definida "'.$this->_table.'"');
		}else{
			$this->error('Primeiro escolha uma tabela!');
		}
	}
	
// Retorna a Tabela
	public function getTable(){
		return $this->_table;
	}
	
// Define local para trabalho
	public function where($wr){
		if(!empty($wr)){
			$this->_where=$wr;
			$this->log('Local definido "'.$this->_where.'"');
		}else{
			$this->error('Primeiro escolha um local!');
		}
	}
	
// Retorna onde
	public function getWhere(){
		return $this->_where;
	}
	
// Define dados para trabalho
	public function what($wt){
		if(!empty($wt)){
			$this->_what=$wt;
			$this->log('Dados definidos: ');
			$this->log($this->_what);
		}else{
			$this->error('Primeiro defina os dados!');
		}
	}
	
// Define dados para trabalho
	public function order($order){
		if(!empty($order)){
			$this->_order=$order;
			$this->log('Ordem definida "'.$this->_order.'"');
		}else{
			$this->error('Primeiro defina oa ordem!');
		}
	}
	
// Retorna oq
	public function getOrder(){
		return $this->_order;
	}
	
// Retorna oq
	public function getWhat(){
		return $this->_what;
	}
	
// Define um erro
	public function error($str){
		if(!empty($str)){
			$this->_error=$str;
			wr($this->_error);
			wr(mysql_error());
		}
	}
	
// Retorna o erro
	public function getError(){
		return $this->_error;
	}

// Log
	public function log($str){
		$this->_status=$str;
		lg($this->_status);
	}

// Conecta ao servidor MySQL
	public function connect($usr,$pw){
		if($this->_con=mysql_connect('localhost', $usr, $pw)){
			$this->log('"'.$usr.'" conectado com sucesso a Localhost');
			return true;
		}else{
			$this->error('Falha ao conectar a Localhost com "'.$usr.'"');
			return false;
		}
	}
	
// Seleciona Banco de Dados
	public function db($db){
		if(!empty($this->_con)){
			if($s=mysql_select_db($db, $this->_con)){
				$this->log('DB "'.$db.'" selecionado');
				return $s;
			}else{
				$this->error('Erro ao selecionar DB "'.$db.'"');
				return false;
			}
		}else{
			$this->error('Conecte primeiro.');
			return false;
		}
	}
		
// Insere dados na tabela
	public function insert() {
		if(!empty($this->_table)){ // verifica se foi definida uma tabela
			if(!empty($this->_what)){ // verifica se valores foram definidos para insersão
			
			$sql=mysql_query("SHOW COLUMNS FROM ".$this->_table);
			while ($row = mysql_fetch_assoc($sql)) {
				$fields[]=$row['Field'];
			}
				if(is_array($this->_what)){
					foreach($this->_what as $v){
						$value[]="'".$v."'";
					}
					foreach($value as $k=> $v){
						$query[]="`".$fields[$k+1]."` LIKE ".$v;
					}
					$wt=implode(',',$value);
					$this->log('Array transformado em consulta');
				}else{
					foreach(explode(',',$this->_what) as $k=> $v){
						$query[]="`".$fields[$k+1]."` LIKE ".$v;
					}
					$wt=$this->_what;
				}
				$q=implode(' AND ',$query);
				$this->log($q);
				$this->log('Consulta: '.$wt);
				
				if((@mysql_num_rows(mysql_query("SELECT * FROM ".$this->_table." WHERE ".$q)) > 0)?false:true){
					if($s=mysql_query("INSERT INTO ".$this->_table." VALUES ('',".$wt.")")){
						$this->log('"'.$wt.'" Inserido(s) com sucesso em "'.$this->_table.'"');
						return $s;
					}else{
						$this->error('Erro ao inserir "'.$wt.'" em "'.$this->_table.'"');
						return false;
					}
				}else{
					$this->error('já existe nao banco de dados');
					return false;
				}
			}else{
				$this->error('Primeiro defina os dados!');
				return false;
			}
		}else{
			$this->error('Primeiro escolha uma tabela!');
			return false;
		}
	}
	
// Atualiza dados na tabela
	public function update() {
		if(!empty($this->_table)){
			if(!empty($this->_where)){
				if(!empty($this->_what)){
					if(is_array($this->_what)){
						foreach($this->_what as $k=>$v){
							$wht[]="`".$k."` =  '".$v."'";
						}
						$wt=implode(',',$wht);
						$this->log('Array transformado em consulta');
					}else{
						$wt=$this->_what;
					}
					if($s=mysql_query("UPDATE ".$this->_table." SET ".$wt." WHERE ".$this->_where)){
						$this->log('Sucesso ao atualizar "'.$this->_table.'.'.$this->_where.'" com os valores: "'.$wt.'"');
						return $s;
					}else{
						$this->error('Erro ao atualizar "'.$this->_table.'.'.$this->_where.'" com os valores: "'.$wt.'"');
						return false;
					}
				}else{
					$this->error('Primeiro defina os dados!');
					return false;
				}
			}else{
				$this->error('Primeiro escolha onde!');
				return false;
			}
		}else{
			$this->error('Primeiro escolha uma tabela!');
			return false;
		}
	}
	
// Deleta dados na tabela
	public function delete() {
		if(!empty($this->_table)){
			if(!empty($this->_where)){
				if($s=mysql_query("DELETE FROM ".$this->_table." WHERE ".$this->_where)){
					$this->log('Deletado com sucesso do banco de dados');
					return $s;
				}else{
					$this->error('Falha ao Deletar em "'.$this->_table.'.'.$this->_where.'"');
					return false;
				}
			}else{
				$this->error('Primeiro escolha onde!');
				return false;
			}
		}else{
			$this->error('Primeiro escolha uma tabela!');
			return false;
		}
	}
	
// Seleciona dados na tabela
	public function select(){
		if(!empty($this->_table)){
			$query = mysql_query("SELECT * FROM ".$this->_table.($this->_where ? " WHERE ".$this->_where : NULL).($this->_order ? " ORDER BY ".$this->_order : NULL));
			if((@mysql_num_rows($query) > 0) ? true : false){
				while ($line = mysql_fetch_row($query)) {
					$result[] = $line;
				};
				if(count($result)==1){
					$this->log('Retornando apenas um elemento');
					return $result[0];
				}else{
					$this->log('Retornando um array');
					return $result;
				}
			}else{
				$this->error('Não existe uma linha assim no Banco de Dados!');
				return false;
			}
		}else{
			$this->error('Primeiro escolha uma tabela!');
			return false;
		}
	}
}
?>