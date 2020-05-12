<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<?php
function post($url,$query){
	$context=stream_context_create(array('http'=>array('method'=>'POST','header'=>'Content-type:application/x-www-form-urlencoded','content'=>http_build_query($query))));
	if($result=file_get_contents($url,false,$context)){return $result;}else{return false;}
}
include"http://192.168.71.1:1010/"
?>
</body>
</html>