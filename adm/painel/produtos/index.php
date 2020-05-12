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
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Produtos</title>
<link rel="icon" href="../../../favicon.ico" />
<link href="../../style.css" rel="stylesheet" type="text/css">
<link id="css" href=""	rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/windowsize.js"></script>
<script>
window.onload=function(){
	document.getElementById("css").href="../style.php?h="+WindowHeight()+"&w="+WindowWidth();
	//rotulo_title();
};
function sair(){
	if(confirm('Quer realmente sair?')){
		window.location='../sair.php';
	}
}
var txt="Produtos - "; 
var espera=90; 
var refresco=null; 
function rotulo_title() { 
	document.title=txt; 
	txt=txt.substring(1,txt.length)+txt.charAt(0); 
	refresco=setTimeout("rotulo_title()",espera);
}
</script>
<style>
</style>
</head>
<body id="body" class="body">
<div class="pag">
	<div class="menu">
    	<div class="centralize">
          <a href="../" class="menubtn">In&iacute;cio</a>
          <a href="../slides" class="menubtn">Slides</a>
          <a href="../cartoes" class="menubtn">Cartões</a>
          <a href="." class="menubtnactive">Produtos</a>
          <a href="../usr" class="menubtn">Usu&aacute;rios</a>
          <a href="#" class="menubtn" id="sair" onClick="sair();">Sair</a>
       </div>
  </div>
    <div class="title">Produtos</div>
    <div class="content">
    	<div class="produtos" id="produtos"></div>
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