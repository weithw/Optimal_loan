window.onload=function(){
	init();
}
function init () {
	maskformsuit();
	bindevents();
}
function bindevents(){
	document.getElementById("createroom").onclick = function() {
		document.getElementById("mask").style.display = "block" ;
		document.getElementById("maskform").style.display = "block" ;
	}
	document.getElementById("exit").onclick = function() {
		document.getElementById("mask").style.display = "none" ;
		document.getElementById("maskform").style.display = "none" ;
	}
	window.onresize = function() {
		maskformsuit();
	}
}
function maskformsuit() {
	var cwidth = document.body.clientWidth || document.documentElement.clientWidth;
	document.getElementById("maskform").style.left = (cwidth - 350)/2 + "px";
	document.getElementById("maskform").style.top = "150px";
}