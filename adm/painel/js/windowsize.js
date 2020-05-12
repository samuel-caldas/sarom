// JavaScript Document
function WindowWidth(){
	var w=null;
	if (window.innerWidth){
		w=window.innerWidth;
	} else
	if (window.document.innerWidth){
		w=window.document.innerWidth;
	} else
	if (window.document.documentElement.clientWidth){
		w=window.document.documentElement.clientWidth;
	} else
	if (window.document.body.clientWidth>w){
		w=window.document.body.clientWidth;
	}
	return parseInt(w);
}
function WindowHeight(){
	var h=null;
	if (window.innerHeight){
		h=window.innerHeight;
	} else
	if (window.document.innerHeight){
		h=window.document.innerHeight;
	} else
	if (window.document.documentElement.clientHeight){
		h=window.document.documentElement.clientHeight;
	} else
	if (window.document.body.clientHeight){
		h=window.document.body.clientHeight;
	}
	return parseInt(h);
}