var db;
var forum = new Array();
var timer = new Array();
timer[0] = new Array();

//ajax function
function ajax(url){
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
	if (xmlhttp.readyState==4 && xmlhttp.status==200){
			r=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
	return r;
}


function update(){
	
}

//onfline function
function online(){
	timer[0][1] = navigator.onLine;
	timer[0][0] = setTimeout("online()",1000); //timer refresh online
	var s = "Online";
	if (!timer[0][1]){
		s = "Offline";
	}
	document.getElementById('online1').innerHTML = s;
}

online();

//status box
function loading(status){

}

function init(){
	var list = document.createElement('div');
	list.id = 'assenze';
	list.title ='Assenze';
	list.className = 'panel';
	var html = "<h2>Seleziona il Turno</h2><ul>";
	html = html + '<li><a href="#turno0">Turno Unico</a></li>';
	html = html + '<li><a href="#turno1">Primo Turno</a></li>';
	html = html + '<li><a href="#turno2">Secondo Turno</a></li>';
	html = html + "</ul>";
	list.innerHTML = html;
	document.body.appendChild(list);
}