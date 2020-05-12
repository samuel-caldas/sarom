<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Flores de Sarom - Contato</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link href="Code-Light/stylesheet.css" rel="stylesheet" type="text/css">
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
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="499" align="left" valign="top" class="contato">
        <h2>Onde nos encontrar:</h2>
        <p><strong>Endereço:</strong> Rua 31 de Março, Número 247, Centro<br>
          <strong>Cidade:</strong> Timóteo<br>
          <strong>Estado:</strong> Minas Gerais<br>
          <strong>Telefone:</strong> (031) 3848-3835<br>
          <strong>Email:</strong> fsarom@uai.com,br
        </p>
        <p>
        	<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt&amp;geocode=&amp;q=Flores+de+Sarom+Decora%C3%A7%C3%B5es&amp;aq=&amp;sll=-19.536596,-42.646618&amp;sspn=0.01183,0.013797&amp;t=w&amp;ie=UTF8&amp;hq=Flores+de+Sarom+Decora%C3%A7%C3%B5es&amp;hnear=&amp;ll=-19.536596,-42.646618&amp;spn=0.01183,0.013797&amp;output=embed"></iframe><br /><small><a href="http://goo.gl/maps/Y2TDm">Ver mapa maior</a></small>
        </p>
    </td>
    <td align="left" valign="top">
    <form action="" method="get">
    <table border="0" cellpadding="0" cellspacing="0" class="form2">
          <tr>
          	<td align="center" valign="middle" class="title">Fale com a gente!</td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="txta"><input name="nome" type="text" class="txt" id="nome" value="" placeholder="&nbsp;Nome"></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="txta"><input name="email" type="text" class="txt" id="email" value="" placeholder="&nbsp;Email"></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="txta"><textarea name="msg" class="txt" id="msg" placeholder="&nbsp;Mensagem"></textarea></td>
          </tr>
          <tr>
            <td align="center" valign="middle" class="">
            	<input name="Limpar" type="reset" class="btns" id="Limpar" value="Limpar">
            	<input name="enviar" type="submit" class="btns" id="enviar" value="Enviar"></td>
            </tr>
        </table>
		</form>
      </td>
  </tr>
</table>
	</div>
    <footer>
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="320" align="left" valign="top"><h4>Formas de Pagamento</h4></td>
          <td width="320" align="left" valign="top"><h4>Site Seguro</h4></td>
          <td width="320" align="left" valign="top"><h4>Redes Sociais</h4></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="cards"><div style="background-position: -1px center;"></div>
            <div style="background-position: -45px center;"></div>
            <div style="background-position: -89px center;"></div>
            <div style="background-position: -133px center;"></div>
            <div style="background-position: -133px center;"></div>
            <div style="background-position: -177px center;"></div>
            <div style="background-position: -221px center;"></div>
            <br>
            <div style="background-position: -264px center;"></div>
            <div style="background-position: -309px center;"></div>
            <div style="background-position: -353px center;"></div>
            <div style="background-position: -397px center;"></div>
            <div style="background-position: -440px center;"></div>
            <div style="background-position: -484px center;"></div>
            <div style="background-position: -528px center;"></div>
            <br>
            <div style="background-position: -573px center;"></div>
            <div style="background-position: -618px center;"></div>
            <div style="background-position: -663px center;"></div>
            <div style="background-position: -707px center;"></div>
            <div style="background-position: -751px center;"></div>
            <div style="background-position: -795px center;"></div>
            <div style="background-position: -839px center;"></div></td>
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
