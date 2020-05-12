<?php
include('adm/functions.php');
bag_start();
if(isset($_GET['d_id'])){delete_bag($_GET['d_id']);}
if(isset($_GET['limpar'])){bag_clean();}
if(isset($_POST['id']) && isset($_POST['qtd'])){
	if(!is_numeric($_POST['qtd']) || $_POST['qtd']<1){
		$qtd=1;
	}else{
		$qtd=$_POST['qtd'];
	}
	add_bag($_POST['id'],$qtd);
}
$val=0;
$qtd=0;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Flores de Sarom - Carrinho de compras</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
</head>
<body>
<div class="body">
  <div class="top"> <a href="index.php"><img src="img/sarom logo.png" height="120" alt="flores de sarom"></a>
  <a href="carrinho.php">
  <ul class="car">

  	<li id="val">
    <?php
//	bag_clean();
//	add_bag('27','2');
//	add_bag('29','3');
//	add_bag('30','100');
	if(bag()){
		foreach(bag() as $id => $q){	
			$pr=select_produtos($id);
			$val=soma($val,mult($pr[2],$q));
		}
		echo format($val);
	}else{
		echo"0,00";
	}
	?>
    R$</li>
    <li id="it">
	<?php
	
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
  <div style="padding-top:25px; padding-bottom:25px;">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
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
    <td align="left" valign="top" class="obs">Layout e Desenvolvimento::<br>
<a href="mailto:samuel.caldas@gmail.com">Samuel Caldas</a></td>
  </tr>
</table>
</footer>
</div>
</body>
</html>

