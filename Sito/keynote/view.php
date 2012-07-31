
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	
	<head>
		<title>Didattica alternativa</title>
		<link rel="stylesheet" type="text/css" href="http://studenti.liceoblaisepascal.it/style.css">
		<meta http-equiv="Content-type" content="charset=windows-1252" />
		<meta name="DC.Language" scheme="RFC1766" content="it" />
		<meta http-equiv="imagetoolbar" content="no" />
		<script  type="text/javascript">
		/*
Object: JSON
	Stand alone or prototyped encode, decode or toDate public methods.

Example:
	>alert(JSON.encode([0,1,false,true,null,[2,3],{"some":"value"}]));
	>// [0,1,false,true,null,[2,3],{"some":"value"}]
	>
	>alert(JSON.decode('[0,1,false,true,null,[2,3],{"some":"value"}]'))
	>// 0,1,false,true,,2,3,[object Object]
*/
JSON = new function(){
	this.decode = function(){
		var	filter, result, self, tmp;
		if($$("toString")) {
			switch(arguments.length){
				case	2:
					self = arguments[0];
					filter = arguments[1];
					break;
				case	1:
					if($[typeof arguments[0]](arguments[0]) === Function) {
						self = this;
						filter = arguments[0];
					}
					else
						self = arguments[0];
					break;
				default:
					self = this;
					break;
			};
			if(rc.test(self)){
				try{
					result = e("(".concat(self, ")"));
					if(filter && result !== null && (tmp = $[typeof result](result)) && (tmp === Array || tmp === Object)){
						for(self in result)
							result[self] = v(self, result) ? filter(self, result[self]) : result[self];
					}
				}
				catch(z){}
			}
			else {
				throw new JSONError("bad data");
			}
		};
		return result;
	};

	this.encode = function(){
		var	self = arguments.length ? arguments[0] : this,
			result, tmp;
		if(self === null)
			result = "null";
		else if(self !== undefined && (tmp = $[typeof self](self))) {
			switch(tmp){
				case	Array:
					result = [];
					for(var	i = 0, j = 0, k = self.length; j < k; j++) {
						if(self[j] !== undefined && (tmp = JSON.encode(self[j])))
							result[i++] = tmp;
					};
					result = "[".concat(result.join(","), "]");
					break;
				case	Boolean:
					result = String(self);
					break;
				case	Date:
					result = '"'.concat(self.getFullYear(), '-', d(self.getMonth() + 1), '-', d(self.getDate()), 'T', d(self.getHours()), ':', d(self.getMinutes()), ':', d(self.getSeconds()), '"');
					break;
				case	Function:
					break;
				case	Number:
					result = isFinite(self) ? String(self) : "null";
					break;
				case	String:
					result = '"'.concat(self.replace(rs, s).replace(ru, u), '"');
					break;
				default:
					var	i = 0, key;
					result = [];
					for(key in self) {
						if(self[key] !== undefined && (tmp = JSON.encode(self[key])))
							result[i++] = '"'.concat(key.replace(rs, s).replace(ru, u), '":', tmp);
					};
					result = "{".concat(result.join(","), "}");
					break;
			}
		};
		return result;
	};
	
	this.toDate = function(){
		var	self = arguments.length ? arguments[0] : this,
			result;
		if(rd.test(self)){
			result = new Date;
			result.setHours(i(self, 11, 2));
			result.setMinutes(i(self, 14, 2));
			result.setSeconds(i(self, 17, 2));
			result.setMonth(i(self, 5, 2) - 1);
			result.setDate(i(self, 8, 2));
			result.setFullYear(i(self, 0, 4));
		}
		else if(rt.test(self))
			result = new Date(self * 1000);
		return result;
	};

	var	c = {"\b":"b","\t":"t","\n":"n","\f":"f","\r":"r",'"':'"',"\\":"\\","/":"/"},
		d = function(n){return n<10?"0".concat(n):n},
		e = function(c,f,e){e=eval;delete eval;if(typeof eval==="undefined")eval=e;f=eval(""+c);eval=e;return f},
		i = function(e,p,l){return 1*e.substr(p,l)},
		p = ["","000","00","0",""],
		rc = null,
		rd = /^[0-9]{4}\-[0-9]{2}\-[0-9]{2}T[0-9]{2}:[0-9]{2}:[0-9]{2}$/,
		rs = /(\x5c|\x2F|\x22|[\x0c-\x0d]|[\x08-\x0a])/g,
		rt = /^([0-9]+|[0-9]+[,\.][0-9]{1,3})$/,
		ru = /([\x00-\x07]|\x0b|[\x0e-\x1f])/g,
		s = function(i,d){return "\\".concat(c[d])},
		u = function(i,d){
			var	n=d.charCodeAt(0).toString(16);
			return "\\u".concat(p[n.length],n)
		},
		v = function(k,v){return $[typeof result](result)!==Function&&(v.hasOwnProperty?v.hasOwnProperty(k):v.constructor.prototype[k]!==v[k])},
		$ = {
			"boolean":function(){return Boolean},
			"function":function(){return Function},
			"number":function(){return Number},
			"object":function(o){return o instanceof o.constructor?o.constructor:null},
			"string":function(){return String},
			"undefined":function(){return null}
		},
		$$ = function(m){
			function $(c,t){t=c[m];delete c[m];try{e(c)}catch(z){c[m]=t;return 1}};
			return $(Array)&&$(Object)
		};
	try{rc=new RegExp('^("(\\\\.|[^"\\\\\\n\\r])*?"|[,:{}\\[\\]0-9.\\-+Eaeflnr-u \\n\\r\\t])+?$')}
	catch(z){rc=/^(true|false|null|\[.*\]|\{.*\}|".*"|\d+|\d+\.\d+)$/}
};

/**
*
*  Base64 encode / decode
*  http://www.webtoolkit.info/
*
**/
 
var Base64 = {
 
	// private property
	_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
 
	// public method for encoding
	encode : function (input) {
		var output = "";
		var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
		var i = 0;
 
		input = Base64._utf8_encode(input);
 
		while (i < input.length) {
 
			chr1 = input.charCodeAt(i++);
			chr2 = input.charCodeAt(i++);
			chr3 = input.charCodeAt(i++);
 
			enc1 = chr1 >> 2;
			enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
			enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
			enc4 = chr3 & 63;
 
			if (isNaN(chr2)) {
				enc3 = enc4 = 64;
			} else if (isNaN(chr3)) {
				enc4 = 64;
			}
 
			output = output +
			this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
			this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);
 
		}
 
		return output;
	},
 
	// public method for decoding
	decode : function (input) {
		var output = "";
		var chr1, chr2, chr3;
		var enc1, enc2, enc3, enc4;
		var i = 0;
 
		input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
 
		while (i < input.length) {
 
			enc1 = this._keyStr.indexOf(input.charAt(i++));
			enc2 = this._keyStr.indexOf(input.charAt(i++));
			enc3 = this._keyStr.indexOf(input.charAt(i++));
			enc4 = this._keyStr.indexOf(input.charAt(i++));
 
			chr1 = (enc1 << 2) | (enc2 >> 4);
			chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
			chr3 = ((enc3 & 3) << 6) | enc4;
 
			output = output + String.fromCharCode(chr1);
 
			if (enc3 != 64) {
				output = output + String.fromCharCode(chr2);
			}
			if (enc4 != 64) {
				output = output + String.fromCharCode(chr3);
			}
 
		}
 
		output = Base64._utf8_decode(output);
 
		return output;
 
	},
 
	// private method for UTF-8 encoding
	_utf8_encode : function (string) {
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";
 
		for (var n = 0; n < string.length; n++) {
 
			var c = string.charCodeAt(n);
 
			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}
 
		}
 
		return utftext;
	},
 
	// private method for UTF-8 decoding
	_utf8_decode : function (utftext) {
		var string = "";
		var i = 0;
		var c = c1 = c2 = 0;
 
		while ( i < utftext.length ) {
 
			c = utftext.charCodeAt(i);
 
			if (c < 128) {
				string += String.fromCharCode(c);
				i++;
			}
			else if((c > 191) && (c < 224)) {
				c2 = utftext.charCodeAt(i+1);
				string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
				i += 2;
			}
			else {
				c2 = utftext.charCodeAt(i+1);
				c3 = utftext.charCodeAt(i+2);
				string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
				i += 3;
			}
 
		}
 
		return string;
	}
 
}
		</script>
	</head>
	
	<body>
		<div id="box"><center>
			<h1 align="center">Didattica alternativa</h1>
			<h2 align="center">Iscrizioni</h2>
			<h4 align="center"><font color = "green">Demo User, Sono contento di rivederti (<a href = "http://studenti.liceoblaisepascal.it">esci</a>)</font></h4>
			
			<div id = "main">
				Benvenuto nel programma per la didattica alternativa.<br />
				<br />
				Il sistema si articola in cinque fasi: 
				<ol>
					<li>la selezione dei forum per il primo giorno</li>
					<li>la selezione dei forum per il secondo giorno</li>
					<li>la selezione dei forum per il terzo giorno</li>
					<li>visualizzazione scheda personale, che potra essere stampata</li>
					<li>la conferma finale che renderà i forum da te scelti effettivi</li>
				</ol>
				<br />
				<input type="button" value="Avanti" align="left" onclick="go('giorno1');">
			</div>
			<div id = "giorno1">
				Seleziona i forum per il primo giorno.<br />
				<br />
				<br />
				<table width = "700px">
					<tr>
						<td width="200px"><input type="radio" name="main1" value="Forum0" onclick = "hide('112');hide('11');show('10');"/>Un solo turno<br /></td>
						<td width="200px"><input type="radio" name="main1" value="Forum0" onclick = "show('112');show('11');hide('10');"/>Due turni<br /></td>
						<td width="300px"><input type="radio" name="main1" value="97,UmVsYXRvcmU=,1040" onclick="add0(1,0,this.value); hide('112'); hide('11'); hide('10');" />Relatore<br />
							<input type="radio" name="main1" value="96,U2VjdXJpdHk=,1040" onclick="add0(1,0,this.value); hide('112'); hide('11'); hide('10');" />Security<br />
							<input type="radio" name="main1" value="98,QXNzZW50ZQ==,1040" onclick="add0(1,0,this.value); hide('112'); hide('11'); hide('10');" />Assenza<br />
						</td>
					</tr>
					<tr>
						<td width="200px">
							<form id = "10">
										<input type="radio" name="turno0" value="63,SSBQaW5rIEZsb3lkIGF0dHJhdmVyc28gaSBtdXJpIA==,30" onclick="add0(1,0,this.value);"/>I Pink Floyd attraverso i muri <br />
				<input type="radio" name="turno0" value="74,Q29zdGl0dXppb25lIEl0YWxpYW5h,50" onclick="add0(1,0,this.value);"/>Costituzione Italiana<br />
									</form>
							<form id ="112">
								<b>Primo turno</b><br />
										<input type="radio" name="turno1" value="1,Q2luZWZvcnVt,30" onclick="add1(1,1,this.value);"/>Cineforum<br />
				<input type="radio" name="turno1" value="3,QmFsbGkgZGkgZ3J1cHBv,30" onclick="add1(1,1,this.value);"/>Balli di gruppo<br />
				<input type="radio" name="turno1" value="5,U3BvcnQgcGVyIHR1dHRp,30" onclick="add1(1,1,this.value);"/>Sport per tutti<br />
				<input type="radio" name="turno1" value="7,U3BvcnQgQWNxdWF0aWNp,30" onclick="add1(1,1,this.value);"/>Sport Acquatici<br />
				<input type="radio" name="turno1" value="9,U3BvcnQgRXN0cmVtaQ==,30" onclick="add1(1,1,this.value);"/>Sport Estremi<br />
				<input type="radio" name="turno1" value="11,Si1BeCAmIENsdWIgRG9nbw==,30" onclick="add1(1,1,this.value);"/>J-Ax & Club Dogo<br />
				<input type="radio" name="turno1" value="13,TGEgbXVzaWNhIGRhZ2xpIGFubmkgJzcwIGEgb2dnaQ==,30" onclick="add1(1,1,this.value);"/>La musica dagli anni '70 a oggi<br />
				<input type="radio" name="turno1" value="15,QXR0dWFsaXTDoA==,30" onclick="add1(1,1,this.value);"/>Attualità<br />
				<input type="radio" name="turno1" value="17,U3RlcCBCeSBTdGVw,30" onclick="add1(1,1,this.value);"/>Step By Step<br />
				<input type="radio" name="turno1" value="19,Q2FtcGFnbmEgQUJDIGNvbnRybyBNVFM=,30" onclick="add1(1,1,this.value);"/>Campagna ABC contro MTS<br />
				<input type="radio" name="turno1" value="21,RGFsIGNpbmVtYSBhbGxhIHJlYWx0w6A=,30" onclick="add1(1,1,this.value);"/>Dal cinema alla realtà<br />
				<input type="radio" name="turno1" value="23,TXVzaWNhIHJhZ2dl,30" onclick="add1(1,1,this.value);"/>Musica ragge<br />
				<input type="radio" name="turno1" value="25,Q2luZWZvcnVtIENvbWljbw==,30" onclick="add1(1,1,this.value);"/>Cineforum Comico<br />
				<input type="radio" name="turno1" value="27,SGFycnkgUG90dGVy,30" onclick="add1(1,1,this.value);"/>Harry Potter<br />
				<input type="radio" name="turno1" value="29,SWwgQ2luZW1hIENvbWljbw==,30" onclick="add1(1,1,this.value);"/>Il Cinema Comico<br />
				<input type="radio" name="turno1" value="31,VGFyYW50aW5vLCBMZW9uZSAmIEt1YnJpY2s=,30" onclick="add1(1,1,this.value);"/>Tarantino, Leone & Kubrick<br />
				<input type="radio" name="turno1" value="33,SW50ZXJuZXQgcGVyIHR1dHRp,30" onclick="add1(1,1,this.value);"/>Internet per tutti<br />
				<input type="radio" name="turno1" value="35,U3RvcmlhIGRlbCByb2Nr,30" onclick="add1(1,1,this.value);"/>Storia del rock<br />
				<input type="radio" name="turno1" value="37,U2N1b2xhIGxpYmVyYSBkYWxsZSBkcm9naGU=,30" onclick="add1(1,1,this.value);"/>Scuola libera dalle droghe<br />
				<input type="radio" name="turno1" value="39,VW5hIG51b3ZhIG90dGljYSBzdWxsbyBzdHVkaW8=,30" onclick="add1(1,1,this.value);"/>Una nuova ottica sullo studio<br />
				<input type="radio" name="turno1" value="41,TGEgY3VsdHVyYSBnaWFwcG9uZXNlIGNvbiBNaXlhemFraQ==,30" onclick="add1(1,1,this.value);"/>La cultura giapponese con Miyazaki<br />
				<input type="radio" name="turno1" value="43,TG8gc3ZpbHVwcG8gZGVsbGEgdGVjbm9sb2dpYQ==,30" onclick="add1(1,1,this.value);"/>Lo sviluppo della tecnologia<br />
				<input type="radio" name="turno1" value="45,TG9ybyBsYSBjcmlzaSwgTm9pIGwnYWx0ZXJuYXRpdmEg,30" onclick="add1(1,1,this.value);"/>Loro la crisi, Noi l'alternativa <br />
				<input type="radio" name="turno1" value="47,U2VtaW5hcmlvIGRpIEZvdG9ncmFmaWE=,30" onclick="add1(1,1,this.value);"/>Seminario di Fotografia<br />
				<input type="radio" name="turno1" value="49,U2ltcHNvbixHcmlmZmluICYgQW1lcmljYW4gRGFk,30" onclick="add1(1,1,this.value);"/>Simpson,Griffin & American Dad<br />
				<input type="radio" name="turno1" value="51,QmlvbG9naWEgQWx0ZXJuYXRpdmE=,30" onclick="add1(1,1,this.value);"/>Biologia Alternativa<br />
				<input type="radio" name="turno1" value="53,QXRsZXRpY2E6IFJlZ2luYSBkZWxsbyBTcG9ydA==,30" onclick="add1(1,1,this.value);"/>Atletica: Regina dello Sport<br />
				<input type="radio" name="turno1" value="55,Q2hlIGNvcyfDqCB1bmEgYmFuY2E=,30" onclick="add1(1,1,this.value);"/>Che cos'è una banca<br />
				<input type="radio" name="turno1" value="57,VGl6aWFubyBGZXJybw==,30" onclick="add1(1,1,this.value);"/>Tiziano Ferro<br />
				<input type="radio" name="turno1" value="59,UHJvZ3Jlc3NpdmU6IE9yaWdpbmUgJiBFdm9sdXppb25l,30" onclick="add1(1,1,this.value);"/>Progressive: Origine & Evoluzione<br />
				<input type="radio" name="turno1" value="61,VHUgdGkgc2VudGkgZGF2dmVybyBsaWJlcm8=,30" onclick="add1(1,1,this.value);"/>Tu ti senti davvero libero<br />
				<input type="radio" name="turno1" value="64,Q3VsdHVyYSBISVAvSE9Q,70" onclick="add1(1,1,this.value);"/>Cultura HIP/HOP<br />
				<input type="radio" name="turno1" value="66,Q2luZWZvcnVtIENvbW1lZGlhL0hvcnJvcg==,30" onclick="add1(1,1,this.value);"/>Cineforum Commedia/Horror<br />
				<input type="radio" name="turno1" value="68,Si1BeCAmIEFydGljb2xvIDMx,30" onclick="add1(1,1,this.value);"/>J-Ax & Articolo 31<br />
				<input type="radio" name="turno1" value="70,TGEgTXVzaWNhIFJBUA==,30" onclick="add1(1,1,this.value);"/>La Musica RAP<br />
				<input type="radio" name="turno1" value="72,TW90byBjaGUgcGFzc2lvbmU=,30" onclick="add1(1,1,this.value);"/>Moto che passione<br />
				<input type="radio" name="turno1" value="75,SW50cm9kdXppb25lIGFsbGEgbXVzaWNh,30" onclick="add1(1,1,this.value);"/>Introduzione alla musica<br />
				<input type="radio" name="turno1" value="77,Rm90b2dyYWZpYSBEaWdpdGFsZQ==,30" onclick="add1(1,1,this.value);"/>Fotografia Digitale<br />
				<input type="radio" name="turno1" value="79,UGFya291cg==,30" onclick="add1(1,1,this.value);"/>Parkour<br />
				<input type="radio" name="turno1" value="81,QW5pbWUgJiBNYW5nYQ==,30" onclick="add1(1,1,this.value);"/>Anime & Manga<br />
				<input type="radio" name="turno1" value="83,RHJvZ2hl,30" onclick="add1(1,1,this.value);"/>Droghe<br />
				<input type="radio" name="turno1" value="85,TG90dGUgc3R1ZGVudGVzY2hlDQo=,30" onclick="add1(1,1,this.value);"/>Lotte studentesche

<br />
				<input type="radio" name="turno1" value="87,UGFnaW5lIGluIHBlbGxpY29sYQ0K,30" onclick="add1(1,1,this.value);"/>Pagine in pellicola

<br />
									</form>
						</td>
						<td width="200px">
							<form id="11">
								<b>Secondo turno</b><br />
										<input type="radio" name="turno2" value="2,Q2luZWZvcnVt,30" onclick="add1(1,2,this.value);"/>Cineforum<br />
				<input type="radio" name="turno2" value="4,QmFsbGkgZGkgZ3J1cHBv,30" onclick="add1(1,2,this.value);"/>Balli di gruppo<br />
				<input type="radio" name="turno2" value="6,U3BvcnQgcGVyIHR1dHRp,30" onclick="add1(1,2,this.value);"/>Sport per tutti<br />
				<input type="radio" name="turno2" value="8,U3BvcnQgQWNxdWF0aWNp,30" onclick="add1(1,2,this.value);"/>Sport Acquatici<br />
				<input type="radio" name="turno2" value="10,U3BvcnQgRXN0cmVtaQ==,30" onclick="add1(1,2,this.value);"/>Sport Estremi<br />
				<input type="radio" name="turno2" value="12,Si1BeCAmIENsdWIgRG9nbw==,30" onclick="add1(1,2,this.value);"/>J-Ax & Club Dogo<br />
				<input type="radio" name="turno2" value="14,TGEgbXVzaWNhIGRhZ2xpIGFubmkgJzcwIGEgb2dnaQ==,30" onclick="add1(1,2,this.value);"/>La musica dagli anni '70 a oggi<br />
				<input type="radio" name="turno2" value="16,QXR0dWFsaXTDoA==,30" onclick="add1(1,2,this.value);"/>Attualità<br />
				<input type="radio" name="turno2" value="18,U3RlcCBCeSBTdGVw,30" onclick="add1(1,2,this.value);"/>Step By Step<br />
				<input type="radio" name="turno2" value="20,Q2FtcGFnbmEgQUJDIGNvbnRybyBNVFM=,30" onclick="add1(1,2,this.value);"/>Campagna ABC contro MTS<br />
				<input type="radio" name="turno2" value="22,RGFsIGNpbmVtYSBhbGxhIHJlYWx0w6A=,30" onclick="add1(1,2,this.value);"/>Dal cinema alla realtà<br />
				<input type="radio" name="turno2" value="24,TXVzaWNhIHJhZ2dl,30" onclick="add1(1,2,this.value);"/>Musica ragge<br />
				<input type="radio" name="turno2" value="26,Q2luZWZvcnVtIENvbWljbw==,30" onclick="add1(1,2,this.value);"/>Cineforum Comico<br />
				<input type="radio" name="turno2" value="28,SGFycnkgUG90dGVy,30" onclick="add1(1,2,this.value);"/>Harry Potter<br />
				<input type="radio" name="turno2" value="30,SWwgQ2luZW1hIENvbWljbw==,30" onclick="add1(1,2,this.value);"/>Il Cinema Comico<br />
				<input type="radio" name="turno2" value="32,VGFyYW50aW5vLCBMZW9uZSAmIEt1YnJpY2s=,30" onclick="add1(1,2,this.value);"/>Tarantino, Leone & Kubrick<br />
				<input type="radio" name="turno2" value="34,SW50ZXJuZXQgcGVyIHR1dHRp,30" onclick="add1(1,2,this.value);"/>Internet per tutti<br />
				<input type="radio" name="turno2" value="36,U3RvcmlhIGRlbCByb2Nr,30" onclick="add1(1,2,this.value);"/>Storia del rock<br />
				<input type="radio" name="turno2" value="38,U2N1b2xhIGxpYmVyYSBkYWxsZSBkcm9naGU=,30" onclick="add1(1,2,this.value);"/>Scuola libera dalle droghe<br />
				<input type="radio" name="turno2" value="40,VW5hIG51b3ZhIG90dGljYSBzdWxsbyBzdHVkaW8=,30" onclick="add1(1,2,this.value);"/>Una nuova ottica sullo studio<br />
				<input type="radio" name="turno2" value="42,TGEgY3VsdHVyYSBnaWFwcG9uZXNlIGNvbiBNaXlhemFraQ==,30" onclick="add1(1,2,this.value);"/>La cultura giapponese con Miyazaki<br />
				<input type="radio" name="turno2" value="44,TG8gc3ZpbHVwcG8gZGVsbGEgdGVjbm9sb2dpYQ==,30" onclick="add1(1,2,this.value);"/>Lo sviluppo della tecnologia<br />
				<input type="radio" name="turno2" value="46,TG9ybyBsYSBjcmlzaSwgTm9pIGwnYWx0ZXJuYXRpdmEg,30" onclick="add1(1,2,this.value);"/>Loro la crisi, Noi l'alternativa <br />
				<input type="radio" name="turno2" value="48,U2VtaW5hcmlvIGRpIEZvdG9ncmFmaWE=,30" onclick="add1(1,2,this.value);"/>Seminario di Fotografia<br />
				<input type="radio" name="turno2" value="50,U2ltcHNvbixHcmlmZmluICYgQW1lcmljYW4gRGFk,30" onclick="add1(1,2,this.value);"/>Simpson,Griffin & American Dad<br />
				<input type="radio" name="turno2" value="52,QmlvbG9naWEgQWx0ZXJuYXRpdmE=,30" onclick="add1(1,2,this.value);"/>Biologia Alternativa<br />
				<input type="radio" name="turno2" value="54,QXRsZXRpY2E6IFJlZ2luYSBkZWxsbyBTcG9ydA==,30" onclick="add1(1,2,this.value);"/>Atletica: Regina dello Sport<br />
				<input type="radio" name="turno2" value="56,Q2hlIGNvcyfDqCB1bmEgYmFuY2E=,30" onclick="add1(1,2,this.value);"/>Che cos'è una banca<br />
				<input type="radio" name="turno2" value="58,VGl6aWFubyBGZXJybw==,30" onclick="add1(1,2,this.value);"/>Tiziano Ferro<br />
				<input type="radio" name="turno2" value="60,UHJvZ3Jlc3NpdmU6IE9yaWdpbmUgJiBFdm9sdXppb25l,30" onclick="add1(1,2,this.value);"/>Progressive: Origine & Evoluzione<br />
				<input type="radio" name="turno2" value="62,VHUgdGkgc2VudGkgZGF2dmVybyBsaWJlcm8=,30" onclick="add1(1,2,this.value);"/>Tu ti senti davvero libero<br />
				<input type="radio" name="turno2" value="65,Q3VsdHVyYSBISVAvSE9Q,70" onclick="add1(1,2,this.value);"/>Cultura HIP/HOP<br />
				<input type="radio" name="turno2" value="67,Q2luZWZvcnVtIENvbW1lZGlhL0hvcnJvcg==,30" onclick="add1(1,2,this.value);"/>Cineforum Commedia/Horror<br />
				<input type="radio" name="turno2" value="69,Si1BeCAmIEFydGljb2xvIDMx,30" onclick="add1(1,2,this.value);"/>J-Ax & Articolo 31<br />
				<input type="radio" name="turno2" value="71,TGEgTXVzaWNhIFJBUA==,30" onclick="add1(1,2,this.value);"/>La Musica RAP<br />
				<input type="radio" name="turno2" value="73,TW90byBjaGUgcGFzc2lvbmU=,30" onclick="add1(1,2,this.value);"/>Moto che passione<br />
				<input type="radio" name="turno2" value="76,SW50cm9kdXppb25lIGFsbGEgbXVzaWNh,30" onclick="add1(1,2,this.value);"/>Introduzione alla musica<br />
				<input type="radio" name="turno2" value="78,Rm90b2dyYWZpYSBEaWdpdGFsZQ==,30" onclick="add1(1,2,this.value);"/>Fotografia Digitale<br />
				<input type="radio" name="turno2" value="80,UGFya291cg==,30" onclick="add1(1,2,this.value);"/>Parkour<br />
				<input type="radio" name="turno2" value="82,QW5pbWUgJiBNYW5nYQ==,30" onclick="add1(1,2,this.value);"/>Anime & Manga<br />
				<input type="radio" name="turno2" value="84,RHJvZ2hl,30" onclick="add1(1,2,this.value);"/>Droghe<br />
				<input type="radio" name="turno2" value="86,TG90dGUgc3R1ZGVudGVzY2hlDQo=,30" onclick="add1(1,2,this.value);"/>Lotte studentesche

<br />
				<input type="radio" name="turno2" value="88,UGFnaW5lIGluIHBlbGxpY29sYQ0K,30" onclick="add1(1,2,this.value);"/>Pagine in pellicola

<br />
									</form>
						</td>
						<td width="300px" id="desc1">
							Passa il mouse sopra il forum per visualizzare la descrizione del forum
						</td>
					</tr>
				</table>
				<br />
				<input type="button" value="Indietro" align="left" onclick="go('main');"> | 
				<input type="button" value="Avanti" align="left" onclick="submit(forum[1],'giorno2');">
			</div>
			<div id = "giorno2">
				Seleziona i forum per il secondo giorno <br />
				<br />
				<br />
				<table width = "700px">
					<tr>
						<td width="200px"><input type="radio" name="main1" value="Forum0" onclick = "hide('212');hide('21');show('20');"/>Un solo turno<br /></td>
						<td width="200px"><input type="radio" name="main1" value="Forum0" onclick = "show('212');show('21');hide('20');"/>Due turni<br /></td>
						<td width="300px"><input type="radio" name="main1" value="97,UmVsYXRvcmU=,1040" onclick="add0(2,0,this.value); hide('212'); hide('21'); hide('20');" />Relatore<br />
							<input type="radio" name="main1" value="96,U2VjdXJpdHk=,1040" onclick="add0(2,0,this.value); hide('212'); hide('21'); hide('20');" />Security<br />
							<input type="radio" name="main1" value="98,QXNzZW50ZQ==,1040" onclick="add0(2,0,this.value); hide('212'); hide('21'); hide('20');" />Assenza<br />
						</td>
					</tr>
					<tr>
						<td width="200px">
							<form id = "20">
										<input type="radio" name="turno0" value="63,SSBQaW5rIEZsb3lkIGF0dHJhdmVyc28gaSBtdXJpIA==,30" onclick="add0(2,0,this.value);"/>I Pink Floyd attraverso i muri <br />
				<input type="radio" name="turno0" value="74,T2xvY2F1c3Rv,50" onclick="add0(2,0,this.value);"/>Olocausto<br />
									</form>
							<form id="212">
								<b>Primo turno</b><br />
										<input type="radio" name="turno1" value="1,Q2luZWZvcnVt,30" onclick="add1(2,1,this.value);"/>Cineforum<br />
				<input type="radio" name="turno1" value="3,QmFsbGkgZGkgZ3J1cHBv,30" onclick="add1(2,1,this.value);"/>Balli di gruppo<br />
				<input type="radio" name="turno1" value="5,U3BvcnQgcGVyIHR1dHRp,30" onclick="add1(2,1,this.value);"/>Sport per tutti<br />
				<input type="radio" name="turno1" value="7,U3BvcnQgQWNxdWF0aWNp,30" onclick="add1(2,1,this.value);"/>Sport Acquatici<br />
				<input type="radio" name="turno1" value="9,U3BvcnQgRXN0cmVtaQ==,30" onclick="add1(2,1,this.value);"/>Sport Estremi<br />
				<input type="radio" name="turno1" value="11,Si1BeCAmIENsdWIgRG9nbw==,30" onclick="add1(2,1,this.value);"/>J-Ax & Club Dogo<br />
				<input type="radio" name="turno1" value="13,TGEgbXVzaWNhIGRhZ2xpIGFubmkgJzcwIGEgb2dnaQ==,30" onclick="add1(2,1,this.value);"/>La musica dagli anni '70 a oggi<br />
				<input type="radio" name="turno1" value="15,QXR0dWFsaXTDoA==,30" onclick="add1(2,1,this.value);"/>Attualità<br />
				<input type="radio" name="turno1" value="17,U3RlcCBCeSBTdGVw,30" onclick="add1(2,1,this.value);"/>Step By Step<br />
				<input type="radio" name="turno1" value="19,Q2FtcGFnbmEgQUJDIGNvbnRybyBNVFM=,30" onclick="add1(2,1,this.value);"/>Campagna ABC contro MTS<br />
				<input type="radio" name="turno1" value="21,RGFsIGNpbmVtYSBhbGxhIHJlYWx0w6A=,30" onclick="add1(2,1,this.value);"/>Dal cinema alla realtà<br />
				<input type="radio" name="turno1" value="23,TXVzaWNhIHJhZ2dl,30" onclick="add1(2,1,this.value);"/>Musica ragge<br />
				<input type="radio" name="turno1" value="25,Q2luZWZvcnVtIENvbWljbw==,30" onclick="add1(2,1,this.value);"/>Cineforum Comico<br />
				<input type="radio" name="turno1" value="27,SGFycnkgUG90dGVy,30" onclick="add1(2,1,this.value);"/>Harry Potter<br />
				<input type="radio" name="turno1" value="29,SWwgQ2luZW1hIENvbWljbw==,30" onclick="add1(2,1,this.value);"/>Il Cinema Comico<br />
				<input type="radio" name="turno1" value="31,VGFyYW50aW5vLCBMZW9uZSAmIEt1YnJpY2s=,30" onclick="add1(2,1,this.value);"/>Tarantino, Leone & Kubrick<br />
				<input type="radio" name="turno1" value="33,SW50ZXJuZXQgcGVyIHR1dHRp,30" onclick="add1(2,1,this.value);"/>Internet per tutti<br />
				<input type="radio" name="turno1" value="35,U3RvcmlhIGRlbCByb2Nr,30" onclick="add1(2,1,this.value);"/>Storia del rock<br />
				<input type="radio" name="turno1" value="37,U2N1b2xhIGxpYmVyYSBkYWxsZSBkcm9naGU=,30" onclick="add1(2,1,this.value);"/>Scuola libera dalle droghe<br />
				<input type="radio" name="turno1" value="39,VW5hIG51b3ZhIG90dGljYSBzdWxsbyBzdHVkaW8=,30" onclick="add1(2,1,this.value);"/>Una nuova ottica sullo studio<br />
				<input type="radio" name="turno1" value="41,TGEgY3VsdHVyYSBnaWFwcG9uZXNlIGNvbiBNaXlhemFraQ==,30" onclick="add1(2,1,this.value);"/>La cultura giapponese con Miyazaki<br />
				<input type="radio" name="turno1" value="43,TG8gc3ZpbHVwcG8gZGVsbGEgdGVjbm9sb2dpYQ==,30" onclick="add1(2,1,this.value);"/>Lo sviluppo della tecnologia<br />
				<input type="radio" name="turno1" value="45,TG9ybyBsYSBjcmlzaSwgTm9pIGwnYWx0ZXJuYXRpdmEg,30" onclick="add1(2,1,this.value);"/>Loro la crisi, Noi l'alternativa <br />
				<input type="radio" name="turno1" value="47,U2VtaW5hcmlvIGRpIEZvdG9ncmFmaWE=,30" onclick="add1(2,1,this.value);"/>Seminario di Fotografia<br />
				<input type="radio" name="turno1" value="49,U2ltcHNvbixHcmlmZmluICYgQW1lcmljYW4gRGFk,30" onclick="add1(2,1,this.value);"/>Simpson,Griffin & American Dad<br />
				<input type="radio" name="turno1" value="51,QmlvbG9naWEgQWx0ZXJuYXRpdmE=,30" onclick="add1(2,1,this.value);"/>Biologia Alternativa<br />
				<input type="radio" name="turno1" value="53,QXRsZXRpY2E6IFJlZ2luYSBkZWxsbyBTcG9ydA==,30" onclick="add1(2,1,this.value);"/>Atletica: Regina dello Sport<br />
				<input type="radio" name="turno1" value="55,Q2hlIGNvcyfDqCB1bmEgYmFuY2E=,30" onclick="add1(2,1,this.value);"/>Che cos'è una banca<br />
				<input type="radio" name="turno1" value="57,VGl6aWFubyBGZXJybw==,30" onclick="add1(2,1,this.value);"/>Tiziano Ferro<br />
				<input type="radio" name="turno1" value="59,UHJvZ3Jlc3NpdmU6IE9yaWdpbmUgJiBFdm9sdXppb25l,30" onclick="add1(2,1,this.value);"/>Progressive: Origine & Evoluzione<br />
				<input type="radio" name="turno1" value="61,VHUgdGkgc2VudGkgZGF2dmVybyBsaWJlcm8=,30" onclick="add1(2,1,this.value);"/>Tu ti senti davvero libero<br />
				<input type="radio" name="turno1" value="64,Q3VsdHVyYSBISVAvSE9Q,70" onclick="add1(2,1,this.value);"/>Cultura HIP/HOP<br />
				<input type="radio" name="turno1" value="66,Q2luZWZvcnVtIENvbW1lZGlhL0hvcnJvcg==,30" onclick="add1(2,1,this.value);"/>Cineforum Commedia/Horror<br />
				<input type="radio" name="turno1" value="68,Si1BeCAmIEFydGljb2xvIDMx,30" onclick="add1(2,1,this.value);"/>J-Ax & Articolo 31<br />
				<input type="radio" name="turno1" value="70,TGEgTXVzaWNhIFJBUA==,30" onclick="add1(2,1,this.value);"/>La Musica RAP<br />
				<input type="radio" name="turno1" value="72,TW90byBjaGUgcGFzc2lvbmU=,30" onclick="add1(2,1,this.value);"/>Moto che passione<br />
				<input type="radio" name="turno1" value="75,QWdlZG8=,30" onclick="add1(2,1,this.value);"/>Agedo<br />
				<input type="radio" name="turno1" value="77,RGlyaXR0aSBlIERvdmVyaSBkZWdsaSBzdHVkZW50aQ==,30" onclick="add1(2,1,this.value);"/>Diritti e Doveri degli studenti<br />
				<input type="radio" name="turno1" value="79,V2FsdGRpc25leQ==,30" onclick="add1(2,1,this.value);"/>Waltdisney<br />
				<input type="radio" name="turno1" value="81,Q2luZWZvcnVtOiBUb21hcyBNaWxpYW4=,30" onclick="add1(2,1,this.value);"/>Cineforum: Tomas Milian<br />
				<input type="radio" name="turno1" value="83,Uy5PLlMuIFBpYW5ldGE=,30" onclick="add1(2,1,this.value);"/>S.O.S. Pianeta<br />
				<input type="radio" name="turno1" value="85,TG90dGUgU3R1ZGVudGVzY2hl,30" onclick="add1(2,1,this.value);"/>Lotte Studentesche<br />
				<input type="radio" name="turno1" value="87,QW5pbWUgJiBNYW5nYQ==,30" onclick="add1(2,1,this.value);"/>Anime & Manga<br />
									</form>
						</td>
						<td width="200px">
							<form id = "21">
								<b>Secondo turno</b><br />
										<input type="radio" name="turno2" value="2,Q2luZWZvcnVt,30" onclick="add1(2,2,this.value);"/>Cineforum<br />
				<input type="radio" name="turno2" value="4,QmFsbGkgZGkgZ3J1cHBv,30" onclick="add1(2,2,this.value);"/>Balli di gruppo<br />
				<input type="radio" name="turno2" value="6,U3BvcnQgcGVyIHR1dHRp,30" onclick="add1(2,2,this.value);"/>Sport per tutti<br />
				<input type="radio" name="turno2" value="8,U3BvcnQgQWNxdWF0aWNp,30" onclick="add1(2,2,this.value);"/>Sport Acquatici<br />
				<input type="radio" name="turno2" value="10,U3BvcnQgRXN0cmVtaQ==,30" onclick="add1(2,2,this.value);"/>Sport Estremi<br />
				<input type="radio" name="turno2" value="12,Si1BeCAmIENsdWIgRG9nbw==,30" onclick="add1(2,2,this.value);"/>J-Ax & Club Dogo<br />
				<input type="radio" name="turno2" value="14,TGEgbXVzaWNhIGRhZ2xpIGFubmkgJzcwIGEgb2dnaQ==,30" onclick="add1(2,2,this.value);"/>La musica dagli anni '70 a oggi<br />
				<input type="radio" name="turno2" value="16,QXR0dWFsaXTDoA==,30" onclick="add1(2,2,this.value);"/>Attualità<br />
				<input type="radio" name="turno2" value="18,U3RlcCBCeSBTdGVw,30" onclick="add1(2,2,this.value);"/>Step By Step<br />
				<input type="radio" name="turno2" value="20,Q2FtcGFnbmEgQUJDIGNvbnRybyBNVFM=,30" onclick="add1(2,2,this.value);"/>Campagna ABC contro MTS<br />
				<input type="radio" name="turno2" value="22,RGFsIGNpbmVtYSBhbGxhIHJlYWx0w6A=,30" onclick="add1(2,2,this.value);"/>Dal cinema alla realtà<br />
				<input type="radio" name="turno2" value="24,TXVzaWNhIHJhZ2dl,30" onclick="add1(2,2,this.value);"/>Musica ragge<br />
				<input type="radio" name="turno2" value="26,Q2luZWZvcnVtIENvbWljbw==,30" onclick="add1(2,2,this.value);"/>Cineforum Comico<br />
				<input type="radio" name="turno2" value="28,SGFycnkgUG90dGVy,30" onclick="add1(2,2,this.value);"/>Harry Potter<br />
				<input type="radio" name="turno2" value="30,SWwgQ2luZW1hIENvbWljbw==,30" onclick="add1(2,2,this.value);"/>Il Cinema Comico<br />
				<input type="radio" name="turno2" value="32,VGFyYW50aW5vLCBMZW9uZSAmIEt1YnJpY2s=,30" onclick="add1(2,2,this.value);"/>Tarantino, Leone & Kubrick<br />
				<input type="radio" name="turno2" value="34,SW50ZXJuZXQgcGVyIHR1dHRp,30" onclick="add1(2,2,this.value);"/>Internet per tutti<br />
				<input type="radio" name="turno2" value="36,U3RvcmlhIGRlbCByb2Nr,30" onclick="add1(2,2,this.value);"/>Storia del rock<br />
				<input type="radio" name="turno2" value="38,U2N1b2xhIGxpYmVyYSBkYWxsZSBkcm9naGU=,30" onclick="add1(2,2,this.value);"/>Scuola libera dalle droghe<br />
				<input type="radio" name="turno2" value="40,VW5hIG51b3ZhIG90dGljYSBzdWxsbyBzdHVkaW8=,30" onclick="add1(2,2,this.value);"/>Una nuova ottica sullo studio<br />
				<input type="radio" name="turno2" value="42,TGEgY3VsdHVyYSBnaWFwcG9uZXNlIGNvbiBNaXlhemFraQ==,30" onclick="add1(2,2,this.value);"/>La cultura giapponese con Miyazaki<br />
				<input type="radio" name="turno2" value="44,TG8gc3ZpbHVwcG8gZGVsbGEgdGVjbm9sb2dpYQ==,30" onclick="add1(2,2,this.value);"/>Lo sviluppo della tecnologia<br />
				<input type="radio" name="turno2" value="46,TG9ybyBsYSBjcmlzaSwgTm9pIGwnYWx0ZXJuYXRpdmEg,30" onclick="add1(2,2,this.value);"/>Loro la crisi, Noi l'alternativa <br />
				<input type="radio" name="turno2" value="48,U2VtaW5hcmlvIGRpIEZvdG9ncmFmaWE=,30" onclick="add1(2,2,this.value);"/>Seminario di Fotografia<br />
				<input type="radio" name="turno2" value="50,U2ltcHNvbixHcmlmZmluICYgQW1lcmljYW4gRGFk,30" onclick="add1(2,2,this.value);"/>Simpson,Griffin & American Dad<br />
				<input type="radio" name="turno2" value="52,QmlvbG9naWEgQWx0ZXJuYXRpdmE=,30" onclick="add1(2,2,this.value);"/>Biologia Alternativa<br />
				<input type="radio" name="turno2" value="54,QXRsZXRpY2E6IFJlZ2luYSBkZWxsbyBTcG9ydA==,30" onclick="add1(2,2,this.value);"/>Atletica: Regina dello Sport<br />
				<input type="radio" name="turno2" value="56,Q2hlIGNvcyfDqCB1bmEgYmFuY2E=,30" onclick="add1(2,2,this.value);"/>Che cos'è una banca<br />
				<input type="radio" name="turno2" value="58,VGl6aWFubyBGZXJybw==,30" onclick="add1(2,2,this.value);"/>Tiziano Ferro<br />
				<input type="radio" name="turno2" value="60,UHJvZ3Jlc3NpdmU6IE9yaWdpbmUgJiBFdm9sdXppb25l,30" onclick="add1(2,2,this.value);"/>Progressive: Origine & Evoluzione<br />
				<input type="radio" name="turno2" value="62,VHUgdGkgc2VudGkgZGF2dmVybyBsaWJlcm8=,30" onclick="add1(2,2,this.value);"/>Tu ti senti davvero libero<br />
				<input type="radio" name="turno2" value="65,Q3VsdHVyYSBISVAvSE9Q,70" onclick="add1(2,2,this.value);"/>Cultura HIP/HOP<br />
				<input type="radio" name="turno2" value="67,Q2luZWZvcnVtIENvbW1lZGlhL0hvcnJvcg==,30" onclick="add1(2,2,this.value);"/>Cineforum Commedia/Horror<br />
				<input type="radio" name="turno2" value="69,Si1BeCAmIEFydGljb2xvIDMx,30" onclick="add1(2,2,this.value);"/>J-Ax & Articolo 31<br />
				<input type="radio" name="turno2" value="71,TGEgTXVzaWNhIFJBUA==,30" onclick="add1(2,2,this.value);"/>La Musica RAP<br />
				<input type="radio" name="turno2" value="73,TW90byBjaGUgcGFzc2lvbmU=,30" onclick="add1(2,2,this.value);"/>Moto che passione<br />
				<input type="radio" name="turno2" value="76,QWdlZG8=,30" onclick="add1(2,2,this.value);"/>Agedo<br />
				<input type="radio" name="turno2" value="78,RGlyaXR0aSBlIERvdmVyaSBkZWdsaSBzdHVkZW50aQ==,30" onclick="add1(2,2,this.value);"/>Diritti e Doveri degli studenti<br />
				<input type="radio" name="turno2" value="80,V2FsdGRpc25leQ==,30" onclick="add1(2,2,this.value);"/>Waltdisney<br />
				<input type="radio" name="turno2" value="82,Q2luZWZvcnVtOiBUb21hcyBNaWxpYW4=,30" onclick="add1(2,2,this.value);"/>Cineforum: Tomas Milian<br />
				<input type="radio" name="turno2" value="84,Uy5PLlMuIFBpYW5ldGE=,30" onclick="add1(2,2,this.value);"/>S.O.S. Pianeta<br />
				<input type="radio" name="turno2" value="86,TG90dGUgU3R1ZGVudGVzY2hl,30" onclick="add1(2,2,this.value);"/>Lotte Studentesche<br />
				<input type="radio" name="turno2" value="88,QW5pbWUgJiBNYW5nYQ==,30" onclick="add1(2,2,this.value);"/>Anime & Manga<br />
									</form>
						</td>
						<td width="300px" id="desc2">
							Passa il mouse sopra il forum per visualizzare la descrizione del forum
						</td>
					</tr>
				</table>
				<br />
				<input type="button" value="Indietro" align="left" onclick="go('giorno1');"> | 
				<input type="button" value="Avanti" align="left" onclick="submit(forum[2],'giorno3');">
			</div>
			<div id = "giorno3">
				Seleziona i forum per il terzo giorno <br />
				<br />
				<br />
				<table width = "700px">
					<tr>
						<td width="200px"><input type="radio" name="main1" value="Forum0" onclick = "hide('312');hide('31');show('30');"/>Un solo turno<br /></td>
						<td width="200px"><input type="radio" name="main1" value="Forum0" onclick = "show('312');show('31');hide('10');"/>Due turni<br /></td>
						<td width="300px"><input type="radio" name="main1" value="97,UmVsYXRvcmU=,1040" onclick="add0(3,0,this.value); hide('312'); hide('31'); hide('30');" />Relatore<br />
							<input type="radio" name="main1" value="96,U2VjdXJpdHk=,1040" onclick="add0(3,0,this.value); hide('312'); hide('31'); hide('30');" />Security<br />
							<input type="radio" name="main1" value="98,QXNzZW50ZQ==,1040" onclick="add0(3,0,this.value); hide('312'); hide('31'); hide('30');" />Assenza<br />
						</td>
					</tr>
					<tr>
						<td width="200px">
							<form id="30">
										<input type="radio" name="turno0" value="63,SSBQaW5rIEZsb3lkIGF0dHJhdmVyc28gaSBtdXJpIA==,30" onclick="add0(3,0,this.value);"/>I Pink Floyd attraverso i muri <br />
				<input type="radio" name="turno0" value="74,U29saWRhcmlldMOg,50" onclick="add0(3,0,this.value);"/>Solidarietà<br />
									</form>
							<form id="312">
								<b>Primo turno</b><br />
										<input type="radio" name="turno1" value="1,Q2luZWZvcnVt,30" onclick="add1(3,1,this.value);"/>Cineforum<br />
				<input type="radio" name="turno1" value="3,QmFsbGkgZGkgZ3J1cHBv,30" onclick="add1(3,1,this.value);"/>Balli di gruppo<br />
				<input type="radio" name="turno1" value="5,U3BvcnQgcGVyIHR1dHRp,30" onclick="add1(3,1,this.value);"/>Sport per tutti<br />
				<input type="radio" name="turno1" value="7,U3BvcnQgQWNxdWF0aWNp,30" onclick="add1(3,1,this.value);"/>Sport Acquatici<br />
				<input type="radio" name="turno1" value="9,U3BvcnQgRXN0cmVtaQ==,30" onclick="add1(3,1,this.value);"/>Sport Estremi<br />
				<input type="radio" name="turno1" value="11,Si1BeCAmIENsdWIgRG9nbw==,30" onclick="add1(3,1,this.value);"/>J-Ax & Club Dogo<br />
				<input type="radio" name="turno1" value="13,TGEgbXVzaWNhIGRhZ2xpIGFubmkgJzcwIGEgb2dnaQ==,30" onclick="add1(3,1,this.value);"/>La musica dagli anni '70 a oggi<br />
				<input type="radio" name="turno1" value="15,QXR0dWFsaXTDoA==,30" onclick="add1(3,1,this.value);"/>Attualità<br />
				<input type="radio" name="turno1" value="17,U3RlcCBCeSBTdGVw,30" onclick="add1(3,1,this.value);"/>Step By Step<br />
				<input type="radio" name="turno1" value="19,Q2FtcGFnbmEgQUJDIGNvbnRybyBNVFM=,30" onclick="add1(3,1,this.value);"/>Campagna ABC contro MTS<br />
				<input type="radio" name="turno1" value="21,RGFsIGNpbmVtYSBhbGxhIHJlYWx0w6A=,30" onclick="add1(3,1,this.value);"/>Dal cinema alla realtà<br />
				<input type="radio" name="turno1" value="23,TXVzaWNhIHJhZ2dl,30" onclick="add1(3,1,this.value);"/>Musica ragge<br />
				<input type="radio" name="turno1" value="25,Q2luZWZvcnVtIENvbWljbw==,30" onclick="add1(3,1,this.value);"/>Cineforum Comico<br />
				<input type="radio" name="turno1" value="27,SGFycnkgUG90dGVy,30" onclick="add1(3,1,this.value);"/>Harry Potter<br />
				<input type="radio" name="turno1" value="29,SWwgQ2luZW1hIENvbWljbw==,30" onclick="add1(3,1,this.value);"/>Il Cinema Comico<br />
				<input type="radio" name="turno1" value="31,VGFyYW50aW5vLCBMZW9uZSAmIEt1YnJpY2s=,30" onclick="add1(3,1,this.value);"/>Tarantino, Leone & Kubrick<br />
				<input type="radio" name="turno1" value="33,SW50ZXJuZXQgcGVyIHR1dHRp,30" onclick="add1(3,1,this.value);"/>Internet per tutti<br />
				<input type="radio" name="turno1" value="35,U3RvcmlhIGRlbCByb2Nr,30" onclick="add1(3,1,this.value);"/>Storia del rock<br />
				<input type="radio" name="turno1" value="37,U2N1b2xhIGxpYmVyYSBkYWxsZSBkcm9naGU=,30" onclick="add1(3,1,this.value);"/>Scuola libera dalle droghe<br />
				<input type="radio" name="turno1" value="39,VW5hIG51b3ZhIG90dGljYSBzdWxsbyBzdHVkaW8=,30" onclick="add1(3,1,this.value);"/>Una nuova ottica sullo studio<br />
				<input type="radio" name="turno1" value="41,TGEgY3VsdHVyYSBnaWFwcG9uZXNlIGNvbiBNaXlhemFraQ==,30" onclick="add1(3,1,this.value);"/>La cultura giapponese con Miyazaki<br />
				<input type="radio" name="turno1" value="43,TG8gc3ZpbHVwcG8gZGVsbGEgdGVjbm9sb2dpYQ==,30" onclick="add1(3,1,this.value);"/>Lo sviluppo della tecnologia<br />
				<input type="radio" name="turno1" value="45,TG9ybyBsYSBjcmlzaSwgTm9pIGwnYWx0ZXJuYXRpdmEg,30" onclick="add1(3,1,this.value);"/>Loro la crisi, Noi l'alternativa <br />
				<input type="radio" name="turno1" value="47,U2VtaW5hcmlvIGRpIEZvdG9ncmFmaWE=,30" onclick="add1(3,1,this.value);"/>Seminario di Fotografia<br />
				<input type="radio" name="turno1" value="49,U2ltcHNvbixHcmlmZmluICYgQW1lcmljYW4gRGFk,30" onclick="add1(3,1,this.value);"/>Simpson,Griffin & American Dad<br />
				<input type="radio" name="turno1" value="51,QmlvbG9naWEgQWx0ZXJuYXRpdmE=,30" onclick="add1(3,1,this.value);"/>Biologia Alternativa<br />
				<input type="radio" name="turno1" value="53,QXRsZXRpY2E6IFJlZ2luYSBkZWxsbyBTcG9ydA==,30" onclick="add1(3,1,this.value);"/>Atletica: Regina dello Sport<br />
				<input type="radio" name="turno1" value="55,Q2hlIGNvcyfDqCB1bmEgYmFuY2E=,30" onclick="add1(3,1,this.value);"/>Che cos'è una banca<br />
				<input type="radio" name="turno1" value="57,VGl6aWFubyBGZXJybw==,30" onclick="add1(3,1,this.value);"/>Tiziano Ferro<br />
				<input type="radio" name="turno1" value="59,UHJvZ3Jlc3NpdmU6IE9yaWdpbmUgJiBFdm9sdXppb25l,30" onclick="add1(3,1,this.value);"/>Progressive: Origine & Evoluzione<br />
				<input type="radio" name="turno1" value="61,VHUgdGkgc2VudGkgZGF2dmVybyBsaWJlcm8=,30" onclick="add1(3,1,this.value);"/>Tu ti senti davvero libero<br />
				<input type="radio" name="turno1" value="64,Q3VsdHVyYSBISVAvSE9Q,70" onclick="add1(3,1,this.value);"/>Cultura HIP/HOP<br />
				<input type="radio" name="turno1" value="66,Q2luZWZvcnVtIENvbW1lZGlhL0hvcnJvcg==,30" onclick="add1(3,1,this.value);"/>Cineforum Commedia/Horror<br />
				<input type="radio" name="turno1" value="68,Si1BeCAmIEFydGljb2xvIDMx,30" onclick="add1(3,1,this.value);"/>J-Ax & Articolo 31<br />
				<input type="radio" name="turno1" value="70,TGEgTXVzaWNhIFJBUA==,30" onclick="add1(3,1,this.value);"/>La Musica RAP<br />
				<input type="radio" name="turno1" value="72,TW90byBjaGUgcGFzc2lvbmU=,30" onclick="add1(3,1,this.value);"/>Moto che passione<br />
				<input type="radio" name="turno1" value="75,SW50cm9kdXppb25lIGFsbGEgTXVzaWNh,30" onclick="add1(3,1,this.value);"/>Introduzione alla Musica<br />
				<input type="radio" name="turno1" value="77,Rm90b2dyYWZpYSBEaWdpdGFsZQ==,30" onclick="add1(3,1,this.value);"/>Fotografia Digitale<br />
				<input type="radio" name="turno1" value="79,V2FsdGRpc25leQ==,30" onclick="add1(3,1,this.value);"/>Waltdisney<br />
				<input type="radio" name="turno1" value="81,UGFya291cg==,30" onclick="add1(3,1,this.value);"/>Parkour<br />
				<input type="radio" name="turno1" value="84,Uy5PLlMuIFBpYW5ldGE=,30" onclick="add1(3,1,this.value);"/>S.O.S. Pianeta<br />
				<input type="radio" name="turno1" value="85,RHJvZ2hl,30" onclick="add1(3,1,this.value);"/>Droghe<br />
				<input type="radio" name="turno1" value="87,UGFnaW5lIGluIHBlbGxpY29sYQ==,30" onclick="add1(3,1,this.value);"/>Pagine in pellicola<br />
									</form>
						</td>
						
						<td width="200px">
							<form id="31">
								<b>Secondo turno</b><br />
										<input type="radio" name="turno2" value="2,Q2luZWZvcnVt,30" onclick="add1(3,2,this.value);"/>Cineforum<br />
				<input type="radio" name="turno2" value="4,QmFsbGkgZGkgZ3J1cHBv,30" onclick="add1(3,2,this.value);"/>Balli di gruppo<br />
				<input type="radio" name="turno2" value="6,U3BvcnQgcGVyIHR1dHRp,30" onclick="add1(3,2,this.value);"/>Sport per tutti<br />
				<input type="radio" name="turno2" value="8,U3BvcnQgQWNxdWF0aWNp,30" onclick="add1(3,2,this.value);"/>Sport Acquatici<br />
				<input type="radio" name="turno2" value="10,U3BvcnQgRXN0cmVtaQ==,30" onclick="add1(3,2,this.value);"/>Sport Estremi<br />
				<input type="radio" name="turno2" value="12,Si1BeCAmIENsdWIgRG9nbw==,30" onclick="add1(3,2,this.value);"/>J-Ax & Club Dogo<br />
				<input type="radio" name="turno2" value="14,TGEgbXVzaWNhIGRhZ2xpIGFubmkgJzcwIGEgb2dnaQ==,30" onclick="add1(3,2,this.value);"/>La musica dagli anni '70 a oggi<br />
				<input type="radio" name="turno2" value="16,QXR0dWFsaXTDoA==,30" onclick="add1(3,2,this.value);"/>Attualità<br />
				<input type="radio" name="turno2" value="18,U3RlcCBCeSBTdGVw,30" onclick="add1(3,2,this.value);"/>Step By Step<br />
				<input type="radio" name="turno2" value="20,Q2FtcGFnbmEgQUJDIGNvbnRybyBNVFM=,30" onclick="add1(3,2,this.value);"/>Campagna ABC contro MTS<br />
				<input type="radio" name="turno2" value="22,RGFsIGNpbmVtYSBhbGxhIHJlYWx0w6A=,30" onclick="add1(3,2,this.value);"/>Dal cinema alla realtà<br />
				<input type="radio" name="turno2" value="24,TXVzaWNhIHJhZ2dl,30" onclick="add1(3,2,this.value);"/>Musica ragge<br />
				<input type="radio" name="turno2" value="26,Q2luZWZvcnVtIENvbWljbw==,30" onclick="add1(3,2,this.value);"/>Cineforum Comico<br />
				<input type="radio" name="turno2" value="28,SGFycnkgUG90dGVy,30" onclick="add1(3,2,this.value);"/>Harry Potter<br />
				<input type="radio" name="turno2" value="30,SWwgQ2luZW1hIENvbWljbw==,30" onclick="add1(3,2,this.value);"/>Il Cinema Comico<br />
				<input type="radio" name="turno2" value="32,VGFyYW50aW5vLCBMZW9uZSAmIEt1YnJpY2s=,30" onclick="add1(3,2,this.value);"/>Tarantino, Leone & Kubrick<br />
				<input type="radio" name="turno2" value="34,SW50ZXJuZXQgcGVyIHR1dHRp,30" onclick="add1(3,2,this.value);"/>Internet per tutti<br />
				<input type="radio" name="turno2" value="36,U3RvcmlhIGRlbCByb2Nr,30" onclick="add1(3,2,this.value);"/>Storia del rock<br />
				<input type="radio" name="turno2" value="38,U2N1b2xhIGxpYmVyYSBkYWxsZSBkcm9naGU=,30" onclick="add1(3,2,this.value);"/>Scuola libera dalle droghe<br />
				<input type="radio" name="turno2" value="40,VW5hIG51b3ZhIG90dGljYSBzdWxsbyBzdHVkaW8=,30" onclick="add1(3,2,this.value);"/>Una nuova ottica sullo studio<br />
				<input type="radio" name="turno2" value="42,TGEgY3VsdHVyYSBnaWFwcG9uZXNlIGNvbiBNaXlhemFraQ==,30" onclick="add1(3,2,this.value);"/>La cultura giapponese con Miyazaki<br />
				<input type="radio" name="turno2" value="44,TG8gc3ZpbHVwcG8gZGVsbGEgdGVjbm9sb2dpYQ==,30" onclick="add1(3,2,this.value);"/>Lo sviluppo della tecnologia<br />
				<input type="radio" name="turno2" value="46,TG9ybyBsYSBjcmlzaSwgTm9pIGwnYWx0ZXJuYXRpdmEg,30" onclick="add1(3,2,this.value);"/>Loro la crisi, Noi l'alternativa <br />
				<input type="radio" name="turno2" value="48,U2VtaW5hcmlvIGRpIEZvdG9ncmFmaWE=,30" onclick="add1(3,2,this.value);"/>Seminario di Fotografia<br />
				<input type="radio" name="turno2" value="50,U2ltcHNvbixHcmlmZmluICYgQW1lcmljYW4gRGFk,30" onclick="add1(3,2,this.value);"/>Simpson,Griffin & American Dad<br />
				<input type="radio" name="turno2" value="52,QmlvbG9naWEgQWx0ZXJuYXRpdmE=,30" onclick="add1(3,2,this.value);"/>Biologia Alternativa<br />
				<input type="radio" name="turno2" value="54,QXRsZXRpY2E6IFJlZ2luYSBkZWxsbyBTcG9ydA==,30" onclick="add1(3,2,this.value);"/>Atletica: Regina dello Sport<br />
				<input type="radio" name="turno2" value="56,Q2hlIGNvcyfDqCB1bmEgYmFuY2E=,30" onclick="add1(3,2,this.value);"/>Che cos'è una banca<br />
				<input type="radio" name="turno2" value="58,VGl6aWFubyBGZXJybw==,30" onclick="add1(3,2,this.value);"/>Tiziano Ferro<br />
				<input type="radio" name="turno2" value="60,UHJvZ3Jlc3NpdmU6IE9yaWdpbmUgJiBFdm9sdXppb25l,30" onclick="add1(3,2,this.value);"/>Progressive: Origine & Evoluzione<br />
				<input type="radio" name="turno2" value="62,VHUgdGkgc2VudGkgZGF2dmVybyBsaWJlcm8=,30" onclick="add1(3,2,this.value);"/>Tu ti senti davvero libero<br />
				<input type="radio" name="turno2" value="65,Q3VsdHVyYSBISVAvSE9Q,70" onclick="add1(3,2,this.value);"/>Cultura HIP/HOP<br />
				<input type="radio" name="turno2" value="67,Q2luZWZvcnVtIENvbW1lZGlhL0hvcnJvcg==,30" onclick="add1(3,2,this.value);"/>Cineforum Commedia/Horror<br />
				<input type="radio" name="turno2" value="69,Si1BeCAmIEFydGljb2xvIDMx,30" onclick="add1(3,2,this.value);"/>J-Ax & Articolo 31<br />
				<input type="radio" name="turno2" value="71,TGEgTXVzaWNhIFJBUA==,30" onclick="add1(3,2,this.value);"/>La Musica RAP<br />
				<input type="radio" name="turno2" value="73,TW90byBjaGUgcGFzc2lvbmU=,30" onclick="add1(3,2,this.value);"/>Moto che passione<br />
				<input type="radio" name="turno2" value="76,SW50cm9kdXppb25lIGFsbGEgTXVzaWNh,30" onclick="add1(3,2,this.value);"/>Introduzione alla Musica<br />
				<input type="radio" name="turno2" value="78,Rm90b2dyYWZpYSBEaWdpdGFsZQ==,30" onclick="add1(3,2,this.value);"/>Fotografia Digitale<br />
				<input type="radio" name="turno2" value="80,V2FsdGRpc25leQ==,30" onclick="add1(3,2,this.value);"/>Waltdisney<br />
				<input type="radio" name="turno2" value="82,UGFya291cg==,30" onclick="add1(3,2,this.value);"/>Parkour<br />
				<input type="radio" name="turno2" value="83,Uy5PLlMuIFBpYW5ldGE=,30" onclick="add1(3,2,this.value);"/>S.O.S. Pianeta<br />
				<input type="radio" name="turno2" value="86,RHJvZ2hl,30" onclick="add1(3,2,this.value);"/>Droghe<br />
				<input type="radio" name="turno2" value="88,UGFnaW5lIGluIHBlbGxpY29sYQ==,30" onclick="add1(3,2,this.value);"/>Pagine in pellicola<br />
									</form>
						</td>
						
						<td width="300px" id="desc3">
							Passa il mouse sopra il forum per visualizzare la descrizione del forum
						</td>
					</tr>
				</table>
				<br />
				<input type="button" value="Indietro" align="left" onclick="go('giorno2');"> | 
				<input type="button" value="Avanti" align="left" onclick="submit(forum[3],'final');">
			</div>
			<div id = "final">
				Questa è la tua lista personale<br />
				<br />
					<table>
						<tr>
							<td><b>Primo Giorno</b><br /></td>
						</tr>
						<tr>
							<td>
								<form id = "f10">
									Un solo turno: <b><span id = "n10"></span></b><br />
								</form>
								<form id = "f11">
									Primo turno: <b><span id = "n11"></span></b><br />
								</form>
								<form id = "f12">
									Secondo turno: <b><span id = "n12"></span></b><br />
								</form>
							</td>
						</tr>
						<tr>
							<td><b>Secondo Giorno</b><br /></td>
						</tr>
						<tr>
							<td>
								<form id = "f20">
									Un solo turno: <b><span id = "n20"></span></b><br />
								</form>
								<form id = "f21">
									Primo turno: <b><span id = "n21"></span></b><br />
								</form>
								<form id = "f22">
									Secondo turno: <b><span id = "n22"></span></b><br />
								</form>
							</td>
						</tr>
						<tr>
							<td><b>Terzo Girno</b><br /></td>
						</tr>
						<tr>
							<td>
								<form id = "f30">
									Un solo turno: <b><span id = "n30"></span></b><br />
								</form>
								<form id = "f31">
									Primo turno: <b><span id = "n31"></span></b><br />
								</form>
								<form id = "f32">
									Secondo turno: <b><span id = "n32"></span></b><br />
								</form>
							</td>
						</tr>
					</table>
				<br />
				Questa pagina può essere stampata cliccando qui sotto.
				<br />
				<input type="button" value="Indietro" align="left" onclick="go('giorno3');"> |
				<input type="button" value="Conferma" align="left" onclick="confirm();"> | 
				<input type="button" value="Stampare" align="left" onclick="window.print();">
			</div>
			<div id = "id">
				Questa è la tua lista dei forum <br />
			</div>
			<br />
			<div>
				<font id = "status"></font>
			</div>
			<br />
			<br />
			<hr width="90%" />
			<table width="90%" align="center">
				<tr><td><i>La BCON ha offerto la piattaforma di hosting</i></td></tr>
			</table>
			<div style="width: 700px; margin-left: auto; margin-right: auto; text-align: center;">
				<img src="http://studenti.liceoblaisepascal.it/cloud.jpg" align = "center" WIDTH="50" HEIGHT="50">
			</div>
			<script type="text/javascript">
				
				document.getElementById("id").style.display = 'none';
				document.getElementById("giorno1").style.display = 'none';
				document.getElementById("giorno2").style.display = "none";
				document.getElementById("giorno3").style.display = "none";
				document.getElementById("final").style.display = "none";
				document.getElementById("10").style.display =  "none";
				document.getElementById("11").style.display =  "none";
				document.getElementById("112").style.display =  "none";
				document.getElementById("20").style.display =  "none";
				document.getElementById("21").style.display =  "none";
				document.getElementById("212").style.display =  "none";
				document.getElementById("30").style.display =  "none";
				document.getElementById("31").style.display =  "none";
				document.getElementById("312").style.display =  "none";
				document.getElementById("f10").style.display =  "none";
				document.getElementById("f11").style.display =  "none";
				document.getElementById("f12").style.display =  "none";
				document.getElementById("f20").style.display =  "none";
				document.getElementById("f21").style.display =  "none";
				document.getElementById("f22").style.display =  "none";
				document.getElementById("f30").style.display =  "none";
				document.getElementById("f31").style.display =  "none";
				document.getElementById("f32").style.display =  "none";
				var forum = new Array();
				forum[1] = new Array();
				var temp1 = new Array();
				forum[1][0] = new Array();
				forum[1][0][0] = 1040;
				forum[1][0][1] = "99";
				forum[1][1] = new Array();
				forum[1][1][0] = "1040";
				forum[1][1][1] = "99";
				forum[1][2] = new Array();
				forum[1][2][0] = "1040";
				forum[1][2][1] = "99";
				forum[1][4] = 1;
				forum[2] = new Array();
				forum[2][0] = new Array();
				forum[1][0][0] = "1040";
				forum[1][0][1] = "99";
				forum[2][1] = new Array();
				forum[1][1][0] = "1040";
				forum[1][1][1] = "99";
				forum[2][2] = new Array();
				forum[1][2][0] = "1040";
				forum[1][2][1] = "99";
				forum[2][4] = 2;
				forum[3] = new Array();
				forum[3][0] = new Array();
				forum[1][0][0] = "1040";
				forum[1][0][1] = "99";
				forum[3][1] = new Array();
				forum[1][1][0] = "1040";
				forum[1][1][1] = "99";
				forum[3][2] = new Array();
				forum[1][2][0] = "1040";
				forum[1][2][1] = "99";
				forum[3][4] = 3;
				
				function go(w){
					document.getElementById("main").style.display = "none";
					document.getElementById("id").style.display = 'none';
					document.getElementById("giorno1").style.display = 'none';
					document.getElementById("giorno2").style.display = "none";
					document.getElementById("giorno3").style.display = "none";
					document.getElementById("final").style.display = "none";
					document.getElementById(w).style.display = "block";
				}
				
				function add0(a,b,c){
					c= c.split(",");
					forum[a][b][1] = c[0];
					forum[a][b][0] = c[2];
					forum[a][1][1] = 99;
					forum[a][1][0] = 1040;
					forum[a][2][1] = 99;
					forum[a][2][0] = 1040;
					var d = "f" + a.toString() + b.toString();
					document.getElementById("f"+a.toString()+"0").style.display =  "none";
					document.getElementById("f"+a.toString()+"1").style.display =  "none";
					document.getElementById("f"+a.toString()+"2").style.display =  "none";
					document.getElementById(d).style.display =  "block";
					var e = "n" + a.toString() + b.toString();
					document.getElementById(e).innerHTML = Base64.decode(c[1]);
				}
				
				function add1(a,b,c){
					c= c.split(",");
					forum[a][b][1] = c[0];
					forum[a][b][0] = c[2];
					forum[a][0][0] = 1040;
					forum[a][0][1] = 99;
					var e = "n" + a.toString() + b.toString();
					document.getElementById(e).innerHTML = Base64.decode(c[1]);
					var d = "f" + a.toString() + b.toString();
					document.getElementById("f"+a.toString()+"0").style.display =  "none";
					document.getElementById("f"+a.toString()+"1").style.display =  "none";
					document.getElementById("f"+a.toString()+"2").style.display =  "none";
					document.getElementById("f"+a.toString()+"1").style.display =  "block";
					document.getElementById("f"+a.toString()+"2").style.display =  "block";
				}
				
				function hide(b){
					document.getElementById(b).style.display = "none";
				}
				
				function show(b){
					document.getElementById(b).style.display = "block";
				}
				
				function da(a,b){
					document.getElementById(a).style.display =  "none";
					document.getElementById(b).style.display =  "none";
				}
				
				var timer1;
				var timer2;
				var timer3;
				var timer4;
				
				function stop(){
					clearInterval(timer1);
					clearInterval(timer2);
					clearInterval(timer3);
					clearInterval(timer4);
				}
				
				function submit(a,n){
					document.getElementById('status').color = "green";
					document.getElementById('status').innerHTML = "Tentativo di inserimento... ";
					timer1 = setInterval("document.getElementById('status').innerHTML = 'Tutti i forum che hai inserito sono disponibili e puoi andare avanti al prossimo passo'",2000);
					timer2 = setInterval("go('"+n+"')",3000);
					timer3 = setInterval("document.getElementById('status').innerHTML = 'Pronto'",3050);
					timer4 = setInterval("stop();",3060);
				}
				
				function confirm(){
					document.getElementById("status").innerHTML = "Iscrizione confermata";
				}
			</script>
		</center></div>
		</div>
	</body>
</html>