<?php
if ($_GET["action"] == "set" && $_GET["name"] && $_GET["value"])
	setcookie($_GET["name"], $_GET["value"]);
elseif ($_GET["action"] == "get" && $_COOKIE[$_GET["name"]])
	echo $_COOKIE[$_GET["name"]]."\n";
elseif ($_GET["action"] == "del" && $_GET["name"])
	setcookie($_GET["name"], null);
?>
