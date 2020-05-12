<?php
set_time_limit(60);
function baixarTV($serie,$s,$ep){
	if($file=file('http://www.baixartv.com/download/'.preg_replace('/[ -]+/' , '-' ,$serie).'/')){
	foreach($file as $lk){
		if(strstr($lk,$s."&#215;".str_pad($ep, 2, "0", STR_PAD_LEFT)." &#8211; ") && strstr($lk,'"http://r8link.com/')){
			foreach(explode('"',$lk) as $urldw){
				if(strstr($urldw,'http://')){
					$download[]=$urldw;
				}
			}
		}
	}
	}else{
		return false;
	}
	if(!isset($download)){
		$download=false;
	}
	return $download;
}
function seriesFree($serie,$s,$ep){
	if($file=file('http://www.seriesfree.biz/'.preg_replace('/[ -]+/' , '-' ,$serie).'-s'.str_pad($s, 2, "0", STR_PAD_LEFT).'e'.str_pad($ep, 2, "0", STR_PAD_LEFT).'/')){
	foreach($file as $l){
		if(strstr($l,'href="http://goo.gl/')){
			foreach(explode('"',$l) as $url){
				if(strstr($url,'http://goo.gl/')){
					$download[]=$url;
				}
			}
		}
	}
	if(!isset($download)){
		$download=false;
	}
	}else{
		return false;
	}
	return $download;
}
function makeUI($serie){
	if($serie){
echo'
	<!--'.$serie[0].'-->
	<div class="serie">
		<img src="'.$serie[7].'" class="capa">
		<h2>'.$serie[0].' - '.$serie[1].'</h2>
		Temporada: '.$serie[2].' Ep: '.$serie[3].'<br>
		Data de exibi&ccedil;&atilde;o:  '.$serie[4].'<br>
		<P>Resumo:<br>
		<a target="new" href="http://translate.google.com.br/#en/pt/'.$serie[5].'">'.$serie[5].'</a></P>
		Links:
		<ul>';
		if($serie[6]){
			foreach($serie[6] as $j=>$server){
				if($server){
					echo'<li>Server'.($j+1).'</li>';
					foreach($server as $i=>$link){
						echo '	<li><a href="'.$link.'">Link'.($i+1).'</a></li>';
					}
				}
			}
		}else{
			echo '<li>Em breve...</li>';
		}
echo'	</ul>
	</div>
	<!--'.$serie[0].'-->
';
	}else{
		echo'Serie não encontrada!';
	}
}
function getSerie($file,$serie){
	foreach($file as $line){
		if(strstr($line,'<br /><a href="/cat/'.preg_replace('/[ -]+/' , '-' ,ucwords($serie)).'-episode/')){
			$link=explode('"',$line);
			foreach(file("http://www.pogdesign.co.uk".$link[1]) as $lines){
				if(strstr($lines,'</em> Episode Summary</h2>')){
					$h=array('<h2><em>', '</em> Episode Summary</h2>');
					$saida[1]=str_replace($h,'',$lines);
				}
				if(strstr($lines,'<span>Episode Info :</span>')){
					$h=array('<div><span>Episode Info :</span>', '</div>', ' Season ', ' Episode ');
					$txt=explode(',',str_replace($h,'',$lines));
					$saida[2]=trim($txt[0]);
					$saida[3]=trim($txt[1]);
				}
				if(strstr($lines,'<span>Date Episode Aired :</span>')){
					$date=explode('"',$lines);
					$saida[4]=str_replace('-','/',str_replace('/cat/day/','',$date[1]));
				}
				if(strstr($lines,'<p>') && strstr($lines,'.</p>')){
					$p=array('<p>', '</p>');
					$saida[5]=str_replace($p,'',$lines);
				}
			}
		}
	}
	$saida[0]=ucwords($serie);
	$saida[6][]=baixarTV($serie,$saida[2],$saida[3]);
	$saida[6][]=seriesFree($serie,$saida[2],$saida[3]);
	$saida[7]='http://www.pogdesign.co.uk/cat/imgs/sibig/'.preg_replace('/[ -]+/' , '-' ,ucwords($serie)).'.jpg';
	if(!isset($saida[6])){
		$saida[6]=false;
	}
	if(!isset($saida)){
		$saida=false;
	}
	return $saida;
}
function findSerie($file,$serie){
	$i=0;
	foreach($file as $line){
		if(strstr($line,'<br /><a href="/cat/'.preg_replace('/[ -]+/' , '-' ,ucwords(strtolower($serie))).'-episode/')){
			$i++;
		}
	}
	if($i>0){
		makeUI(getSerie($_SESSION['file'],strtolower($serie)));
	}else{
		echo'<div class="serie">Serie não encontrada!</div>';
	}
}
function getAllSeries($file,$list){
	if($list=='all'){
		foreach($file as $line){
			if(strstr($line,'-summary"')){
				foreach(explode('>',$line) as $pts){
					if(!strstr($pts,'<')){
						if (!in_array(trim($pts), $name)) { 
							$name[]=trim($pts);
						}
					}
				}
			}
		}
		if(sort($name)){
			return $name;
		}else{return false;};
	}else{
		return'Parametro incorreto!</div>';
	}
}
ini_set('session.gc_maxlifetime', 1*60*60*24);
session_start();
if(!isset($_SESSION['file'])){
	$_SESSION['file']=file('http://www.pogdesign.co.uk/cat/');
}
?>
<!doctype html>
<html>
<head>
<meta name="google-site-verification" content="P59h8ZQMBW-Z-SxcCzYKOzqK2z9CW5thQs0hP0voDaE" />
<meta charset="utf-8">
<meta name="description" content="Site pessoal, voltado para a programação para internet." />
<meta name="keywords" content="programaÃ§ao,php,javascript,site,web,samuel,caldas,samuel.caldas@gmail.com,email,marketing,criarte,dominio,programador,musica,musico,curriculo" />
<meta name="author" content="Samuel Caldas">
<meta name="robots" content="index, follow" />
<link rel="icon" href="http://icons.iconarchive.com/icons/custo-man/christmas/128/Lib-Videos-icon.png" />
<title>Series 3.0</title>
<style type="text/css">
img,a{
	border: 0px none rgba(255,255,255,0.0);
}
body,td,th {
	color: #FFF;
	font-family: Code-Light, "Segoe UI";
	list-style-type: none;
	letter-spacing: 1px;
}
body {
	background-color: #9C49B5;
	background-image: url(img/Orroth.jpg);
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: center center;
	padding: 0px;
	margin: 0px;
	overflow-y: scroll;
/*	scrollbar-arrow-color: #EEEEEE;
	scrollbar-base-color: #666666;
	scrollbar-dark-shadow-color: #666666;
	scrollbar-track-color: #666666;
	scrollbar-face-color: #666666;
	scrollbar-shadow-color: #666666;
	scrollbar-highlight-color: #666666;
	scrollbar-3d-light-color: #666666;*/
}
::-webkit-scrollbar {  /* Fundo da barra de rolagem */
	background:rgba(240,240,240,1);
	width: 15px;
}
::-webkit-scrollbar-button { /* Fundo das setas pra cima/baixo */
	background:rgba(204,204,204,0);
	width: 10px;
	height:5px;
}
::-webkit-scrollbar-track { /* fundo da barrinha lateral,apenas onde o botao de rolagem alcança */ 

}
::-webkit-scrollbar-thumb { /* Botao de rolagem */

}
::-webkit-scrollbar-thumb:hover { /* Botao de rolagem precionada */
	background:background:rgba(204,204,204,0.5);
}
form #serie {
	width: 218px;
	border: 1px solid #666;
	color: #000;
	background-color: rgba(255,255,255,0.9);
	padding-right: 15px;
	padding-left: 15px;
	font-family: Code-Light;
	line-height: 45%;
	vertical-align: middle;
	font-size: 25px;
}
#bot {
	display: block;
	padding: 10px;
	border-top-width: 1px;
	border-top-style: solid;
	border-top-color: rgba(51,51,51,0.5);
	position: fixed;
	-webkit-transition: all 100ms 100ms;
	-moz-transition: all 100ms 100ms;
	-ms-transition: all 100ms 100ms;
	-o-transition: all 100ms 100ms;
	transition: all 100ms 100ms;
	margin: 0px;
	left: 0px;
	right: 0px;
	bottom: -105px;
	z-index: 99999999999;
	background-color: rgba(152,63,151,0.9);
}
a:link,a:visited,a:active {
	text-decoration: none;
	color: #FFF;
}
a:hover {
	text-decoration: underline;
	color: #FFF;
}
.capa{
	padding: 0px;
	width: 800px;
	margin-top: -10px;
	margin-right: -10px;
	margin-bottom: 0px;
	margin-left: -10px;
}
ul{
	list-style-type: none;
}
.serie{
	display: block;
	position: relative;
	overflow: hidden;
	padding: 10px;
	margin-bottom: 25px;
	margin-left: -400px;
	left: 50%;
	width: 780px;
	margin-top: 0px;
	margin-right: 0px;
	background-color: rgba(119,60,119,0.9);
	border: 10px solid rgba(0,0,0,0.5);
	font-size: 20px;
}
.serie:last-child{
	margin-bottom: 0px;
}
.xe-warning, .xdebug-error, font, table, table *, font *{
	visibility: hidden;
	position: fixed;
	height: 1px;
	width: 1px;
	left: 0px;
	bottom: 0px;
	font-size: 1px;
	display: block;
	margin: 0px;
	padding: 0px;
	float: left;
}
#v640fbaffb1{
	position: absolute;
	visibility: hidden;
	margin: 0px;
	padding: 0px;
	height: 0px;
	width: 0px;
	top: 0px;
	right: 0px;
}
form input, form img {
	margin: 5px;
	padding: 0px;
	height: 45px;
	float: left;
}
form #pesquisar {
}
form #pesquisar {
	width: 45px;
}
.title {
	line-height: 100px;
	height: 100px;
	clear: both;
	font-size: 90px;
	font-family: Code-Light, "Segoe UI";
	vertical-align: middle;
	padding: 25px;
}
</style>
<link href="sarom/Code-Light/stylesheet.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var op=false;
window.onselect=function(){return false;};
window.onmousemove=function(){return false;};
window.onmousedown=function(event){
   if(event.which == 1){
       //alert("Esquerdo");
   }
   if(event.which == 2){
       //alert("Meio");
   }
   if(event.which == 3){
       //alert("Direito");
	   document.oncontextmenu=function(){return false;};
	   var cont=document.getElementById('bot');
	   if(!op){
		   cont.style.bottom='0px';
		   op=true;
	   }else{
		   cont.style.bottom='-105px';
		   op=false;
	   }
   }
}
</script>
</head>

<body>
<div class="title">Series online</div>
<?php
if(isset($_GET['serie'])){
	findSerie($_SESSION['file'],trim($_GET['serie']));
}else if(isset($_GET['list'])){
	echo'<div class="serie"><ul>';
	foreach(getAllSeries($_SESSION['file'],$_GET['list']) as $item){
		if($item!=''){
			echo'<a href="series.php?serie='.$item.'"><li>'.$item.'</li></a>
';
		}
	}
	echo'</ul></div>';
}else{
	makeUI(getSerie($_SESSION['file'],'the big bang theory'));
	//makeUI(getSerie($_SESSION['file'],'elementary'));
	//makeUI(getSerie($_SESSION['file'],'arrow'));
	//makeUI(getSerie($_SESSION['file'],'raising hope'));
	//makeUI(getSerie($_SESSION['file'],'the vampire diaries'));
	makeUI(getSerie($_SESSION['file'],'the walking dead'));
	//makeUI(getSerie($_SESSION['file'],'bones'));
}
?>
<div id="bot">
<form action="series.php" method="get">
<input name="serie" type="text" id="serie" placeholder="Pesquisar" value="<?php if(isset($_GET['serie'])){echo $_GET['serie'];} ?>">
<input name="pesquisar" type="image" src="img/check.png" alt="Pesquisar" align="middle" scr="images/image.gif" id="pesquisar">
<a href="series.php"><img src="img/i.png" alt="Início" longdesc="Início"></a>
<a href="series.php?list=all"><img src="img/folder.png" alt="Lista completa" longdesc="Lista completa"></a>
</form>
</div>
</body>
</html>