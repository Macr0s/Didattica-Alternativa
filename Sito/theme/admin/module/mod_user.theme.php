<?php
	function already($g){
		$id = $_GET['sid_id'];
		$return = mysql_query("SELECT * FROM Iscritti$g WHERE id = '$id'");
		?><script  type="text/javascript"><?php
		while($row = mysql_fetch_array($return)){
			?>
			document.getElementById("<?php echo $g; ?>.<?php echo $row['id']; ?>").checked = true;
			<?php
		}
		?></script><?php
	}
	
	function get_forum($g,$t){
		$turno = $t;
		$giorno = $g;
		$id = $_GET['sid_id'];
		$classe = $_GET['sid_classe'];
		switch ($classe){
			case "3cA":
				$all = " ";
			break;
			case "3cB":
				$all = " ";
			break;
			case "5A":
				$all = " ";
			break;
			case "5B":
				$all = " ";
			break;
			case "5C":
				$all = " ";
			break;
			case "5D":
				$all = " ";
			break;
			case "5E":
				$all = " ";
			break;
			case "5F":
				$all = " ";
			break;
			case "5G":
				$all = " ";
			break;
			default:
				$all = " AND `all` = 1";
		}
		$return = mysql_query("SELECT * FROM Giorno$giorno WHERE turno = '$turno'$all");
		$r = array();
		while ( $row = mysql_fetch_array($return, MYSQL_ASSOC)){
			$r[$row['id']] = $row;
		}
		mysql_free_result($return);
		$return = mysql_query("SELECT COUNT(*) AS `real`, `id_forum` FROM `Iscritti$giorno` WHERE user != $id GROUP BY `id_forum` ORDER BY `id_forum`");
		while ( $row = mysql_fetch_array($return, MYSQL_ASSOC)){
			if ( $row['real'] >= $r[$row['id_forum']]['max']){
				unset($r[$row['id_forum']]);
			}
		}
		if ($t == "2"){
			$a = 1;
		}else{
			$a = $t;
		}
		
		foreach($r as $value){
		?>
		<input type="radio" name="turno<?php echo $value['turno']; ?>" value="<?php echo $value['id'];?>,<?php echo $value['name']; ?>,<?php echo $value['max']; ?>" onclick="add<?php echo $a; ?>(<?php echo $g; ?>,<?php echo $t;?>,this.value);" id = "<?php echo $giorno;?>.<?php echo $value['id'];?>"/><?php echo base64_decode($value['name']); ?><br />
		<?php
		}
		already($g);
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	
	<head>
		<title>Didattica alternativa</title>
		<link rel="stylesheet" type="text/css" href="style.css">
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
	<!-- Histats.com  START  (standard)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15_giftop.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="contatore" ><script  type="text/javascript" >
try {Histats.startgif(1,1744357,4,10003,"div#histatsC {position: absolute;top:0px;left:0px;}body>div#histatsC {position: fixed;}");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><style type="text/css">div#histatsC {position: absolute;top:0px;left:0px;}body>div#histatsC {position: fixed;}</style>
<a href="http://www.histats.com" alt="contatore" target="_blank" ><div id="histatsC"><img border="0" src="http://s4is.histats.com/stats/i/1744357.gif?1744357&103"></div></a>
</noscript>
        <!-- Histats.com  END  -->
		<div id="box"><center>
			<h1 align="center">Didattica alternativa</h1>
			<h2 align="center">Iscrizioni</h2>
			<h4 align="center"><font color = "green">Sei nella modifica di: <?php echo $_GET['name'];?> (<a href = "javascript:history.back()">Indietro</a>)</font></h4>
			
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
								<?php
									get_forum(1,0);
								?>
							</form>
							<form id ="112">
								<b>Primo turno</b><br />
								<?php
									get_forum(1,1);
								?>
							</form>
						</td>
						<td width="200px">
							<form id="11">
								<b>Secondo turno</b><br />
								<?php
									get_forum(1,2);
								?>
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
								<?php
									get_forum(2,0);
								?>
							</form>
							<form id="212">
								<b>Primo turno</b><br />
								<?php
									get_forum(2,1);
								?>
							</form>
						</td>
						<td width="200px">
							<form id = "21">
								<b>Secondo turno</b><br />
								<?php
									get_forum(2,2);
								?>
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
				Seleziona i forum del terzo giorno<br />
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
								<?php
									get_forum(3,0);
								?>
							</form>
							<form id="312">
								<b>Primo turno</b><br />
								<?php
									get_forum(3,1);
								?>
							</form>
						</td>
						
						<td width="200px">
							<form id="31">
								<b>Secondo turno</b><br />
								<?php
									get_forum(3,2);
								?>
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
				Stato: <font id = "status"></font>
			</div>
			<br />
			<br />
			<hr width="90%" />
			<table width="90%" align="center">
				<tr><td><i> Sviluppato da <b>Matteo Filippi</b> con il supporto del <b>Professore Mammoliti</b><br />La BCON ha offerto la piattaforma di hosting</i></td></tr>
			</table>
			<div style="width: 700px; margin-left: auto; margin-right: auto; text-align: center;">
				<img src="./cloud.jpg" align = "center" WIDTH="50" HEIGHT="50">
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
				forum[1][0][1] = "100";
				forum[1][1] = new Array();
				forum[1][1][0] = "1040";
				forum[1][1][1] = "100";
				forum[1][2] = new Array();
				forum[1][2][0] = "1040";
				forum[1][2][1] = "100";
				forum[1][4] = 1;
				forum[2] = new Array();
				forum[2][0] = new Array();
				forum[1][0][0] = "1040";
				forum[1][0][1] = "100";
				forum[2][1] = new Array();
				forum[1][1][0] = "1040";
				forum[1][1][1] = "100";
				forum[2][2] = new Array();
				forum[1][2][0] = "1040";
				forum[1][2][1] = "100";
				forum[2][4] = 2;
				forum[3] = new Array();
				forum[3][0] = new Array();
				forum[1][0][0] = "1040";
				forum[1][0][1] = "100";
				forum[3][1] = new Array();
				forum[1][1][0] = "1040";
				forum[1][1][1] = "100";
				forum[3][2] = new Array();
				forum[1][2][0] = "1040";
				forum[1][2][1] = "100";
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
				
				function send(g,i){
					var xmlhttp;
					var m = new Array();
					var o = new Array();
					for (var item = 0; item<3; item++){
						m[item] = i[item][0];
						o[item] = i[item][1];
					}
					if (window.XMLHttpRequest){
						xmlhttp=new XMLHttpRequest();
					}else{
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					var ok;
					var url = "index.php?page=admin&w=mod_user&fun=mod&sid_id=<? echo $_GET['sid_id']; ?>&g="+g+"&m="+JSON.encode(m)+"&i="+JSON.encode(o)
					xmlhttp.onreadystatechange = function(){
						if (xmlhttp.readyState==4 && xmlhttp.status==200){
							ok = "ok";
						}
						if (xmlhttp.readyState==4 && xmlhttp.status==503){
							xmlhttp.open("GET",url,false);
  							xmlhttp.send();
						}
					}
					xmlhttp.open("GET",url,false);
  					xmlhttp.send();
  					do{}while(ok != "ok");
  					return xmlhttp.responseText;
				}
				
				var tmp;
				
				function submit(a,n){
					g = a[4];
					document.getElementById('status').innerHTML = "Sto aggiornato la tua scheda";
					document.getElementById('status').color = "green";
					var r = JSON.decode(send(g,a));
					if (r[0] == "1" && r[1] == "1" && r[2] == "1"){
						document.getElementById("status").innerHTML = "Tuttti i forum che hai scelto sonno stati accettati e puoi andare alla prossima pagina";
						document.getElementById("status").color = "green";
						go(n);
						document.getElementById("status").innerHTML = "Pronto";
						document.getElementById("status").color = "green";
					}else{
						if (a[0][1] == "99"){
							ret = "Il forum che hai scelto non è piu disponibile, selezionane un'altra";
						}else{
							if (r[1] == "0" && r[2] == "0"){
								ret = "Entrambi i forum che hai scelto non sono più disponibili";
							}else if(r[1] == "0"){
								ret = "Il primo forum che hai scelto non è piu disponibile ";
							}else{
								ret = "Il secondo forum che hai scelto non è piu disponibile ";
							}
						}
						document.getElementById("status").innerHTML = "";
						document.getElementById("status").color = "red";
					}
				}
				
				function confirm(){
					var xmlhttp;
					var id = "<?php echo $_GET['sid_id']; ?>";
					if (window.XMLHttpRequest){
						xmlhttp=new XMLHttpRequest();
					}else{
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					var ok;
					xmlhttp.onreadystatechange = function(){
						if (xmlhttp.readyState==4 && xmlhttp.status==200){
							ok = "ok";
							document.getElementById("status").innerHTML = "Iscrizione confermata";
							document.getElementById("status").color = "green";
						}
					}
					xmlhttp.open("GET","index.php?page=admin&w=mod_user&fun=confirm&id="+id,false);
  					xmlhttp.send();
  					do{}while(ok != "ok");
				}
			</script>
		</center></div>
		</div>
	</body>
</html>