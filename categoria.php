<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Flores de Sarom - Categoria</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
</head>
<body>
<div class="erro" style="visibility:hidden;">
<?php include("DBFramework_OLD.php"); include('adm/functions.php'); ?>
</div>
<div class="body">
  <div class="top"> <a href="index.php"><img src="img/sarom logo.png" height="120" alt="flores de sarom"></a> <a href="carrinho.php">
    <ul class="car">
      <?php
	bag_start();
?>
      <li id="val">0,00 R$</li>
      <li id="it"><?php echo(count(bag())); ?> iten(s)</li>
    </ul>
  </a> </div>
  <div class="menu"> <a href="index.php">
    <div class="btn">home</div>
    </a> <a href="sobre.php">
    <div class="btn">Sobre n&oacute;s</div>
      </a> <a href="eventos.php">
        <div class="btn">Decora&ccedil;&atilde;o de eventos</div>
        </a> <a href="conta.php">
          <div class="btn">Minha conta</div>
          </a> <a href="contato.php">
            <div class="btn">Contato</div>
            </a>
    <form action="buscar.php" method="post" class="form">
      <input name="tudo" type="text" class="intxt" placeholder="Escreva aqui e clique em ">
      <input type="submit" class="inbtn" value="Pesquisar">
    </form>
  </div>
  <div class="white">
    <div>
<?php include("DBFramework_OLD.php"); include('adm/functions.php');
foreach(select('','produtos','','') as $row){
	echo
'	<a href="produto.php?id='.$row[0].'">
	<table border="0" cellpadding="0" cellspacing="0" class="prlista">
		<tr>
				<td align="center" valign="middle">
					<img src="'.'http://www.rosasonline.com.br/config/imagens_conteudo/produtos/imagensGRD/GP1060_RO.JPG'.'" width="150" height="120" alt="'.''.'">
				</td>
		</tr>
		<tr>
				<td align="center" valign="middle">'.$row[1].'</td>
		</tr>
		<tr>
				<td align="center" valign="middle">À vistas por R$'.$row[2].'</td>
		</tr>
		<tr>
		<tr>
				<td align="center" valign="middle">ou 3 X&nbsp;'.substr(($row[2]/3),0,5).'&nbsp; no cartão.</td>
		</tr>
	</table> 
	</a>';
}
?> </div>
    </div>
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
