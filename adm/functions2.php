<?php
//função de envio de email
function sendMail($email,$senha,$remetente,$assunto,$corpoHTML,$corpoAlt,$destinatarios,$anexo){
	require 'phpmailer/class.phpmailer.php';
	$PHPMailer = new PHPMailer();
	$PHPMailer->SetLanguage("br", 'phpMailer/language/');
	$PHPMailer->IsSMTP();
	$PHPMailer->isHTML( true );
	$PHPMailer->Charset = 'UTF-8';
	$PHPMailer->SMTPAuth = true;
	$PHPMailer->SMTPSecure = 'ssl';
	$PHPMailer->Host = 'smtp.gmail.com';
	$PHPMailer->Port = 465;
	$PHPMailer->Username = $email;
	$PHPMailer->Password = $senha;
	$PHPMailer->From = $email;
	$PHPMailer->FromName = $remetente;
	$PHPMailer->Subject = $assunto;
	$PHPMailer->Body = $corpoHTML;
	$PHPMailer->AltBody = $corpoAlt;
	$nodestinatarios=count($destinatarios);
	for($W=0;$w<$nodestinatarios;$w++){
		$PHPMailer->AddAddress($destinatarios[$w]);
	}
	// adiciona um anexo
	if($anexo){$PHPMailer->AddAttachment($anexo);}
	 
	// verifica se enviou corretamente
	if ($PHPMailer->Send()){
		return false;//sem erros
	}else{
		return 'Erro '.$PHPMailer->ErrorMsg;//erro
	}
}
require 'DBFramework.php';
//bag-pedidos
function create_bag(){}
function update_bag($id){}
function select_bag($id){}

//slide
function create_slide(){}
function update_slide($id){}
function select_slide($id){}

//carousel-slide
function create_carousel(){}
function update_carousel($id){}
function select_carousel($id){}

//categorias
function create_categorias(){}
function update_categorias($id){}
function select_categorias($id){}

//img-imagens
function create_img(){}
function update_img($id){}
function select_img($id){}

//login-usuarios
function create_login(){}
function update_login($id){}
function select_login($id){}

//produtos
function create_produtos(){}
function update_produtos($id){}
function select_produtos($id){}

//General delete
function delete($tab,$id){return del($tab,'id='.$id);}
?>