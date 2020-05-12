<?php
session_start("theme");
if(isset($_GET['tema'])){
	if($_GET['tema']!=''){
		$_SESSION["tema"] = $_GET['tema'];
		echo'<meta http-equiv="refresh" content="0;URL=javascript:window.parent.location.reload(true);">';
	}
}
if($_SESSION["tema"]==''){
	$_SESSION["tema"]='mac';
	echo'<meta http-equiv="refresh" content="0;URL=javascript:window.parent.location.reload(true);">';
}
?>