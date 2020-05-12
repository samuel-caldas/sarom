<?php
// Start
bag_start();
// External
require_once('DBFramework_OLD.php');
require_once('calc.php');


// bag-pedidos
function bag_start(){if(empty($_SESSION)){session_start('bag');}}
function bag(){if(count($_SESSION)==true){foreach($_SESSION as $id => $qtd){$bag[str_replace('id','',$id)]=$qtd;}return $bag;}else{return false;}}
function add_bag($id,$qtd){if($_SESSION['id'.$id]=$qtd){return true;}else{return false;}}
function select_bag($id){if(isset($_SESSION['id'.$id])){return $_SESSION['id'.$id];}else{return false;}}
function delete_bag($id){unset($_SESSION['id'.$id]);}
function bag_clean(){$_SESSION=array();session_destroy();}


// categorias
function create_categorias(){
}

function update_categorias($id){
}

function select_categorias($id){
}


// slide
function verify_slide($url){return exists('sl',"url='$url'");}

print_r(insert_slide('vvvvv',''));

function select_slides(){
	if($slide=select('','sl','','id')){
		foreach($slide as $l){
			if($img=select_img($l[0],'slide')){
				$sl['id']=$l[0];
				$sl['link']=$l[1];
				$sl['img']=$img;
				$saida[]=$sl;
			}
		}
		return $saida;
	}else{
		return false;
	}
}

function select_slide($id){
	if($l=sel('sl',"url='$url'",'')){
		if($img=select_img($l[0],'slide')){
			$sl['id']=$l[0];
			$sl['link']=$l[1];
			$sl['img']=$Img;
		}
	}
}

function insert_slide($url,$img){
	if(!verify_slide($url)){
		if(insert('sl','',"'','$url'")){
			if($sl=sel('sl',"url='$url'",'')){
				if(create_img($sl[0],'slide',$img)){
					return select_slide($sl[0]);
				}
			}
		}else{
			return 0;
		}
	}else{
		return 0;
	}
}

function delete_slide($id){
	if(delete_img($id,'slide') && delete('sl',$id)){
		return true;
	}else{
		return false;
	}
}


// img-imagens
function verify_img($id){return exists('img',"`cod` = '".$id."' AND  `cat` LIKE '%".$cat."%'");}

function upload_img($id,$file,$size){
	
}

function create_img($id,$cat,$arquivo){
	if(verify_img($id)){
		return false;
	}else{
		
	}
}

function update_img($id){
}

function select_img($id,$cat){if($img=sel('img',"`cod` = '".$id."' AND  `cat` LIKE '%".$cat."%'",'')){return $img[0][0];}else{return false;}}

function delete_img($id,$cat){
	if($img=select_img($id,$cat)){
		if(unlink("../../../img/$img.jpg")){
			if(del('img',"`id` = '$img'")){
				return true;
			}else return false;
		}else return false;
	}else return false;
}


// produtos
function create_produtos(){
}

function update_produtos($id){
}

function select_produtos($id){$x=select('','produtos','id='.$id,'');return $x[0];}// `id``nome``valor``desc``l_desc``tag``cat`

function select_allpr(){return select('','produtos','','');}


// General delete
function delete($tab,$id){return del($tab,'id='.$id);}
?>