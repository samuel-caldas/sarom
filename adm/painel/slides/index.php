<?php
/* Define o limitador de cache para 'private' */
//session_cache_limiter('private');
/* Define o limite de tempo do cache em 30 minutos */ 
//session_cache_expire(60); 
/* Inicia a sessão */
session_start();
/* verifica login */
if(!isset($_SESSION['usr'][0])){
	header('Location: ../../?erro=usr&url='.$_SERVER['PHP_SELF']);
}else{
	include('../../functions.php');
	if(isset($_GET['del'])){
		if(delete_slide($_GET['del'])){
		}
	}
	if(isset($_GET['url'])){
		echo 'ok'.$_GET['url'];
	}
	if(isset($_FILES['img'])){
		print_r ($_FILES['img']);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Slides</title>
<link rel="icon" href="../../../favicon.ico" />
<link href="../../style.css" rel="stylesheet" type="text/css">
<link href="slides.css" rel="stylesheet" type="text/css">
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
var txt="Slides - "; 
var espera=90; 
var refresco=null; 
function rotulo_title() { 
	document.title=txt; 
	txt=txt.substring(1,txt.length)+txt.charAt(0); 
	refresco=setTimeout("rotulo_title()",espera);
}
</script>
</head>
<body id="body" class="body">
<div class="pag">
  <div class="menu">
    <div class="centralize"><a href="../" class="menubtn">In&iacute;cio</a> <a href="." class="menubtnactive">Slides</a> <a href="../cartoes" class="menubtn">Cartões</a> <a href="../produtos" class="menubtn">Produtos</a> <a href="../usr" class="menubtn">Usu&aacute;rios</a> <a href="#" class="menubtn" id="sair" onClick="sair();">Sair</a> </div>
  </div>
  <div class="title">Slides</div>
  <div class="content">
  <div class="add"><form action="index.php" method="post" enctype="multipart/form-data"><label><strong>Criar novo slide:&nbsp;</strong></label><input name="url" type="text" id="url" placeholder="Link"><input name="img" type="file" class="file" id="img"><input type="submit" value="Criar"></form></div>
	<?php 
	//slide
    if($slide=select('','sl','','id')){
		foreach(select('','sl','','id') as $l){
			$id=$l[0];
			$img='../../../img/'.select_img($id,'slide').'.jpg';
			$url=$l[1];
			echo'<div class="slide"><a class="cover" href="?del='.$id.'" style="background-image:url('.$img.')">X</a><form method="get" class="link"><input name="id" type="hidden" id="id" value="'.$id.'"><input name="url" type="text" class="txt" id="url" placeholder="Link" value="'.$url.'"><input type="submit" class="btn" value="✔"></form></div>';
		}
    }
    ?>
  </div>
  <div class="botton"> <a href="#" class="btton" id="fbook"><strong>facebook</strong></a> <a href="#" class="btton" id="twtter">Twitter</a> </div>
</div>
</body>
</html>
<?php
} ?>