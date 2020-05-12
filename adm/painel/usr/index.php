<?php
/* Define o limitador de cache para 'private' */
//session_cache_limiter('private');
/* Define o limite de tempo do cache em 30 minutos */ 
//session_cache_expire(60); 
/* Inicia a sessão */
session_start();
/* verifica login */
if(!isset($_SESSION['usr'][0])){
	header('Location: ../../?erro=usr&url='.$_SERVER['SCRIPT_NAME']);
}else{
	require_once('../../DBFramework.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Usuários</title>
<link rel="icon" href="../../../favicon.ico" />
<link href="../../style.css" rel="stylesheet" type="text/css">
<link id="css" href=""	rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/windowsize.js"></script>
<script>
var cont=0;
window.onload=function(){
	document.getElementById("css").href="../style.php?h="+WindowHeight()+"&w="+WindowWidth();
var	title=setInterval(function(){
	if(cont==0){
		document.title='Painel de controle';
		cont=1;
	}else{
		document.title='Usuários';
		cont=0;
	}
},5000);
}
function sair(){
	if(confirm('Quer realmente sair?')){
		window.location='../sair.php';
	}
}
</script>
<style>
#usr{
}
</style>
</head>
<body id="body" class="body">
<div class="pag">
	<div class="menu">
    	<div class="centralize">
          <a href="../" class="menubtn">In&iacute;cio</a>
          <a href="../slides" class="menubtn">Slides</a>
          <a href="../cartoes" class="menubtn">Cartões</a>
          <a href="../produtos" class="menubtn">Produtos</a>
          <a href="." class="menubtnactive" id="sair">Usu&aacute;rios</a>
          <a onClick="sair();" href="#" class="menubtn">Sair</a>
       </div>
  </div>
    <div class="title">Usu&aacute;rios</div>
    <div class="content">
    	<table border="0" align="center" cellpadding="0" cellspacing="0" id="usr">
          <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Login</td>
            <td>Senha</td>
            <td>Grupo</td>
            <td>Deletar</td>
          </tr>
<?php
	foreach(select('','','login','','nome') as $line){
		$del='<td align="center">X</td>';
		echo'<tr><td>'.$line[0].'</td><td>'.$line[1].'</td><td>'.$line[2].'</td><td>'.$line[3].'</td><td><input name="senha" type="text" id="senha" value="'.$line[4].'" size="10"></td><td><select><option>'.$line[5].'</option></select></td>'.$del.'</tr>';
	}
?>

        </table>
    </div>
  <div class="botton">
    	<a href="#" class="btton" id="fbook"><strong>facebook</strong></a>
        <a href="#" class="btton" id="twtter">Twitter</a>
  </div>
</div>
</body>
</html>

<?php
} ?>