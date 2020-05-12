<?php
$v1='40.10';
$v2='3';
//--------------Calculadoras--------------//
function format($v){//formata em real 1.000,00
	return number_format($v, 2, ',','.');
}
function clean_v($v){//converte em centavos
	return str_replace('.','',str_replace(',','',$v));
}
function soma($v1,$v2){
	$v1=clean_v(format($v1));
	$v2=clean_v(format($v2));
	return ($v1+$v2)/100;
}
function divide($v1,$v2){
	$v1=clean_v(format($v1));
	$v2=clean_v(format($v2));
	return ($v1/$v2);
}


echo(format(divide($v1,$v2)));
?>