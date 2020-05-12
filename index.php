<?php
include('adm/functions.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Flores de Sarom - In&iacute;cio</title>
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
$(window).load(function(){
	$('#slider').nivoSlider();
});
</script>
<style>

</style>
</head>
<body>
<div class="body">
<div class="top">
  <a href="index.php"><img src="img/sarom logo.png" height="120" alt="flores de sarom"></a>
  <a href="carrinho.php">
  <ul class="car">

  	<li id="val">
    <?php
	if(bag()){
		$val=0;
		foreach(bag() as $id => $q){	
			$pr=select_produtos($id);
			$val=soma($val,$pr[2]);
		}
		echo format($val);
	}else{
		echo"0,00";
	}
	?>
    R$</li>
    <li id="it">
	<?php
	$qtd=0;
	if(bag()){
		foreach(bag() as $q){	
			$qtd+=$q;
		}
	}
	echo $qtd;
	?>
    iten(s)</li>
  </ul>
  </a>
</div>
<div class="menu">
	<a href="#"><div class="btn">home</div></a>
	<a href="sobre.php"><div class="btn">Sobre n&oacute;s</div></a>
    <a href="eventos.php"><div class="btn">Decora&ccedil;&atilde;o de eventos</div></a>
	<a href="conta.php"><div class="btn">Minha conta</div></a>
	<a href="contato.php"><div class="btn">Contato</div></a>
	<form action="buscar.php" method="post" class="form">
		<input name="tudo" type="text" class="intxt" placeholder="Escreva aqui e clique em ">
		<input type="submit" class="inbtn" value="Pesquisar">
	</form>
</div>
<div class="slide slider-wrapper theme-light">
	<div id="slider" class="nivoSlider">
<?php 
/////////////////////////////////////////////// slide ///////////////////////////////////////////////

if($slide=select_slides()){
	foreach($slide as $l){
		echo'		<a href="'.$l['link'].'"><img src="img/'.$l['img'].'.jpg" data-thumb="" alt="" /></a>
';
	}
}else{
	echo'		<a href="contato.php"><img src="img/1.jpg" data-thumb="" alt="" /></a>
';
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
?>
    </div>
</div>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F1F1F1" class="bkg">
  <tr>
    <td width="200" align="left" valign="top" class="sidebar">
    <div class="wg">
    	<h4>Categorias</h4><br>

        <ul>
		
<?php //categorias
	if($cat=select('','cat','','cat')){
		foreach($cat as $line){
			echo '<a href="categoria.php?id='.$line[0].'" title="'.$line[1].'"><li>'.$line[1].'</li></a>
';
		}
	}else{
		echo '<a href="todosprodutos.php"><li>Nada aqui...</li></a>
';
	}
?>
        </ul>
    </div>
    <div class="wg" style="visibility:hidden;">
    	<form action="./adm/" method="post" enctype="application/x-www-form-urlencoded" class="frm">
        	<h4>Minha conta</h4>
            <input name="login" type="text" class="txt" id="login" placeholder="Login"><br>
            <input name="senha" type="password" class="txt" id="senha" placeholder="Senha"><br>
            <input type="submit" value="Login" class="btn">
        </form>
	</div>
    </td>
    <td width="800" align="left" valign="top" class="pagina">
    <div class="borda-topo"><div class="titulo">Destaques</div></div>
    <p></p>
<?php //produtos
if($produtos=select_allpr()){
  foreach($produtos as $pr){
	  $img='';
	  echo
  '	<a href="produto.php?id='.$pr[0].'">
	  <table border="0" cellpadding="0" cellspacing="0" class="prlista">
		  <tr>
				  <td align="center" valign="middle">
					  <img src="'.'img\Samuel\100_3736.jpg'.'" width="150" height="100" alt="'.''.'">
				  </td>
		  </tr>
		  <tr>
				  <td align="center" valign="middle">'.$pr[1].'</td>
		  </tr>
		  <tr>
				  <td align="center" valign="middle">À vistas por R$'.format($pr[2]).'</td>
		  </tr>
		  <tr>
		  <tr>
				  <td align="center" valign="middle">ou até 18x no cartão.</td>
		  </tr>
	  </table> 
	  </a>';
  }
}
?>
    </td>
  </tr>
</table>
<footer>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="320" align="left" valign="top"><h4>Formas de Pagamento</h4></td>
    <td width="320" align="left" valign="top"><h4>Site Seguro</h4></td>
    <td width="320" align="left" valign="top"><h4>Redes Sociais</h4></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="cards">
      <div style="background-position: -1px center;"></div>
      <div style="background-position: -45px center;"></div>
      <div style="background-position: -89px center;"></div>
      <div style="background-position: -133px center;"></div>
      <div style="background-position: -133px center;"></div>
      <div style="background-position: -177px center;"></div>
      <div style="background-position: -221px center;"></div><br>
      
      <div style="background-position: -264px center;"></div>
      <div style="background-position: -309px center;"></div>
      <div style="background-position: -353px center;"></div>
      <div style="background-position: -397px center;"></div>
      <div style="background-position: -440px center;"></div>
      <div style="background-position: -484px center;"></div>
      <div style="background-position: -528px center;"></div><br>
      
      <div style="background-position: -573px center;"></div>
      <div style="background-position: -618px center;"></div>
      <div style="background-position: -663px center;"></div>
      <div style="background-position: -707px center;"></div>
      <div style="background-position: -751px center;"></div>
      <div style="background-position: -795px center;"></div>
      <div style="background-position: -839px center;"></div>
      </td>
    <td align="left" valign="top"><img src="logo_pagseguro_228x56.png" width="228" height="56" alt="PagSeguro"></td>
    <td align="left" valign="top"><a href="#">Facebook</a></td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top" id="end">Rua 31 De Março, Numero 247, Centro, Timóteo - MG | <strong>EMAIL:</strong> fsarom@uai.com.br | <strong>TELEFONE:</strong> (031) 3848-3835</td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" class="obs"><blockquote>
      <p>Todas as Marcas referidas neste website são ou podem ser marcas comerciais registradas e protegidas por leis internacionais de copyright e propriedade industrial e pertencem aos seus respectivos fabricantes e proprietários.</p>
    </blockquote></td>
    <td align="left" valign="top" class="obs">Layout e Desenvolvimento:<br>
<a href="mailto:samuel.caldas@gmail.com">Samuel Caldas</a></td>
  </tr>
</table>
</footer>
</div>
</body>
</html>
