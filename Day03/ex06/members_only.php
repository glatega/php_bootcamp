<?php
$member_passwords = array("zaz" => "jaimelespetitsponeys");
$user = $_SERVER['PHP_AUTH_USER'];
$pw = $_SERVER['PHP_AUTH_PW'];
echo "<body><html>";
if (array_key_exists($user, $member_passwords) && $pw == $member_passwords[$user])
{
	$img = base64_encode(file_get_contents("img/42.png"));
	echo "Hello Zaz<br /><img src='data:image/png;base64,".$img."'>";
}
else
{
	echo "That area is accessible for members only";
}
echo "</body></html>";
?>
