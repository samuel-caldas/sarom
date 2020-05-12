<?php
/* Define o limitador de cache para 'private' */
//session_cache_limiter('private');
/* Define o limite de tempo do cache em 30 minutos */ 
//session_cache_expire(60); 
/* Inicia a sessão */
session_start();
/* verifica login */
if(!isset($_SESSION['usr'][0])){
	header('Location: ../?erro=usr&url='.$_SERVER['SCRIPT_NAME']);
}else{
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inicio</title>
<link rel="icon" href="../../favicon.ico" />
<link href="../style.css" rel="stylesheet" type="text/css">
<link id="css" href=""	rel="stylesheet" type="text/css">
<link href="font/stylesheet.css"	rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/windowsize.js"></script>
<script>
window.onload=function(){
	document.getElementById("css").href="style.php?h="+WindowHeight()+"&w="+WindowWidth();
	//rotulo_title();
};
function sair(){
	if(confirm('Quer realmente sair?')){
		window.location='sair.php';
	}
}
var txt="Inicio - "; 
var espera=90; 
var refresco=null; 
function rotulo_title() { 
	document.title=txt; 
	txt=txt.substring(1,txt.length)+txt.charAt(0); 
	refresco=setTimeout("rotulo_title()",espera);
}
</script>
<style>
.start{
	font-family: trendexlightssiregular;
	padding-left: 40px;
	padding-right: 40px;
}
</style>
</head>
<body id="body" class="body">
<div class="pag">
	<div class="menu">
    	<div class="centralize">
          <a href="." class="menubtnactive">In&iacute;cio</a>
          <a href="slides/" class="menubtn">Slides</a>
          <a href="cartoes/" class="menubtn">Cartões</a>
          <a href="produtos/" class="menubtn">Produtos</a>
          <a href="usr/" class="menubtn">Usu&aacute;rios</a>
          <a href="#" class="menubtn" id="sair" onClick="sair();">Sair</a>
       </div>
  </div>
    <div class="title">Início</div>
    <div class="content">
    	<div class="start">
        <h1>Bem vindo a interface de controle de seu site!</h1>
        <p>É aqui que você vai poder criar conteúdo para seu site ou configurar como esse conteúdo vai ser exibido!</p>
        <p>Em breve teremos novidades aqui para você poder aproveitar ao máximo seu site, e ficar satisfeito com nosso serviço.</p>
        <p>Preparamos uma lista com tudo que está sendo desenvolvido nesse exato momento para você:</p>
        <ol>
          <li>Uma página para você poder escolher quais produtos vão aparecer nos banners de propaganda da sua página inicial;</li>
          <li>Uma página para você poder configurar quais usuários podem acessar a área administrativa;</li>
          <li>Uma página para você adicionar cartões ao seu site;</li>
          <li>Uma página para você adicionar seus produtos!</li>
          </ol>
        <p>Em breve vai estar tudo pronto para você. Estamos preparando tudo com a máxima qualidade e carinho, pra que tudo fique bem feito.</p>
        </div>
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