<?php
//Konfiguration zur Anzeige von Fehlern
//Auf http://www.php.net/manual/de/function.error-reporting.php sind die verfügbaren Modi aufgelistet

//Seit php-5.3 ist eine Angabe der TimeZone Pflicht
if (version_compare(phpversion(), '5.3') != -1) {
	if (E_ALL > E_DEPRECATED) {
		@error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
	} else {
		@error_reporting(E_ALL ^ E_NOTICE);
	}
	date_default_timezone_set('Europe/Berlin');
} else {
	@error_reporting(E_ALL ^ E_NOTICE);
}
@ini_set('display_errors','On');

clearstatcache(); //cache leeren
?>
<html>
<title>Zeichen Umformen</title>
<?php
if(empty($_POST)==false){
	$text = $_POST['text'];
	$textumgeformt = htmlentities($text, defined('ENT_HTML401') ? ENT_QUOTES | ENT_HTML401 : ENT_QUOTES, "ISO-8859-1");
}
?>
<head>
</head>
<body>
<table>
<form method="post" action="?" name="form">
	<tr>
	<td>Zeichen eingeben: <input type="submit" name="submit" value="Umformen"/></td>
	</tr>
	<tr>
	<td>
<textarea name="text" cols="50"><?php echo $text; ?></textarea>
	</td>
	</tr>
	<tr>
	<td>Zeichen umgeformt:</td>
	</tr>
	<tr>
	<td>
<textarea cols="50" readonly="readonly"><?php echo htmlentities($textumgeformt, defined('ENT_HTML401') ? ENT_COMPAT | ENT_HTML401 : ENT_COMPAT, "ISO-8859-1"); ?></textarea>
	</td>
	</tr>
</form>
</table>
</body>
	<center>
	<div id="footer">
		&copy; <a href="http://fettsack.de.vc"	title="home">FeTTsack</a> &middot; 2012 &middot; <a href="http://impressum/" title="Impressum">Impressum</a>
	</div>
	</center>
</html>