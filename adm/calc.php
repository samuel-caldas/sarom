<?php
//--------------Calculadoras--------------//
function format($v){return number_format($v, 2, ',','.');}//formata em real 1.000,00
function clean_v($v){return str_replace('.','',str_replace(',','',$v));}//converte em centavos
function soma($x,$y){$x=clean_v(format($x));$y=clean_v(format($y));return ($x+$y)/100;}
function subt($x,$y){$x=clean_v(format($x));$y=clean_v(format($y));return ($x-$y)/100;}
function divide($x,$y){$x=clean_v(format($x));$y=clean_v($y);return ($x/$y)/100;}
function mult($x,$y){$x=clean_v(format($x));$y=clean_v($y);return ($x*$y)/100;}
function calc($x,$s,$y){
	switch($s){
		case'+':return soma($x,$y);break;
		case'-':return subt($x,$y);break;
		case'/':return divide($x,$y);break;
		case'*':return mult($x,$y);break;
	}
}
?>