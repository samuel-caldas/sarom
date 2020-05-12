<?php
/* Define o limitador de cache para 'private' */
//session_cache_limiter('private');
/* Define o limite de tempo do cache em 30 minutos */ 
//session_cache_expire(60); 
/* Inicia a sessão */
session_start();
$url='Location: painel/';
if(isset($_GET['url'])){
	$url='Location: http://www.floresdesarom.com'.$_GET['url'];
}
if(isset($_POST['login']) && isset($_POST['senha'])){
	require_once('DBFramework.php');
	//require_once('../DBFramework_OLD.php');
	
	$usr=select('','','login',"`nome` =  '".$_POST['login']."' AND  `senha` =  '".md5($_POST['senha'])."' OR `email` =  '".$_POST['login']."' AND  `senha` =  '".md5($_POST['senha'])."' OR  `login` =  '".$_POST['login']."' AND  `senha` =  '".md5($_POST['senha'])."'",'');
	if($usr){
		$_SESSION['usr']=$usr;
		header($url);
		exit(0);
	}else{
		$erro='login';
	}
}
if(isset($_SESSION['usr'][0])){
	header($url);
	exit(0);
}else{
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/ico" href="favicon.ico" />
<title>Login</title>
<link href="Code-Light/stylesheet.css" rel="stylesheet" type="text/css">
<style type="text/css">
body,td,th {
	color: #FFF;
	font-family: Code-Light, "Segoe UI";
}
body {
	margin: 0px;
	padding: 0px;
	background-color: rgba(120,170,28,1);
}
a:hover {
	text-decoration: underline;
	color: #FFF;
}
a:link,a:visited,a:active {
	text-decoration: none;
	color: #FFF;
}
*::selection, input::selection{
	color: rgba(0,0,0,1);
	margin: 0px;
	padding: 0px;
	background-color: rgba(255,255,255,0);
	border: 0px none rgba(255,255,255,0);
}
.form{
	background-color: rgba(131,186,31,1);
	color: #EEE;
	font-weight: bolder;
	letter-spacing: 1px;
	position: absolute;
	margin-top: -75px;
	margin-left: -155px;
	top: 50%;
	left: 50%;
	border: 1px solid #648E18;
	width: 310px;
}
.form td{
	line-height: 20px;
	vertical-align: middle;
}
.form .title{
	text-align: center;
	vertical-align: middle;
	font-weight: bolder;
	text-transform: uppercase;
	text-decoration: none;
	background-color: rgba(145,209,0,1);
	line-height: 30px;
	border-bottom: 1px solid #648E18;
	font-size: 21px;
	padding-top: 6px;
}
.form .erro{
	font-weight: 900;
	line-height: 40px;
}
.form .txt{
	height: 25px;
	border: 0px none rgba(255,255,255,0);
	background-color: #FFF;
	display: block;
	width: 300px;
	margin: 0px;
	line-height: 35px;
	text-align: left;
	vertical-align: middle;
	padding: 5px;
}
.form #btn{
	border: 0px none rgba(255,255,255,0);
	background-color: rgba(145,209,0,1);
	color: #FFF;
	font-weight: 900;
	width: 45px;
	height: 25px;
	padding-top: 5px;
	padding-right: 3px;
	padding-bottom: 7px;
	padding-left: 3px;
	margin-top: 0px;
	margin-right: 3px;
	margin-bottom: 0px;
	margin-left: 3px;
	text-align: center;
	vertical-align: middle;
	display: block;
}
.form .btn{
	background-color: #FFF;
	height: 25px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
<?php
if(isset($_GET['erro'])){$erro=$_GET['erro'];}
if(isset($_POST['erro'])){$erro=$_POST['erro'];}
?>
</head>

<body>
<form action="." method="post" enctype="application/x-www-form-urlencoded">
<table border="0" align="center" cellpadding="0" cellspacing="0" class="form">
  <tr>
    <td colspan="2" align="center" valign="middle" class="title">Login Administrativo</td>
  </tr>
<?php if(isset($erro) && $erro!=''){ if($erro=='usr'){ ?>
  <tr>
    <td colspan="2" align="center" valign="middle" class="erro">Você não está logado!</td>
  </tr>
<?php } if($erro=='login'){ ?>
  <tr>
    <td colspan="2" align="center" valign="middle" class="erro">Dados incorretos!</td>
  </tr>
<?php } if($erro=='descon'){ ?>
  <tr>
    <td colspan="2" align="center" valign="middle" class="erro">Você foi desconectado!</td>
  </tr>
<?php }} ?>
  <tr>
    <td colspan="2" align="center" valign="middle" class="btn" style="border-bottom:1px solid #648E18;"><input name="login" type="text" class="txt" id="login" placeholder="Login" maxlength="50"></td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="btn"><input style="width:250px;" name="senha" type="password" class="txt" id="senha" placeholder="Senha" maxlength="8"></td>
    <td width="50" align="center" valign="middle" class="btn"><input name="btn" type="submit" id="btn" value="Entrar"></td>
    </tr>
</table>
</form>
</body>
</html>
<?php } ?>