#!/usr/bin/php
<?php
$file = @fopen("/var/run/utmpx", "r") or die("Unable to open file, bitch!\n");
$size = filesize("/var/run/utmpx");
$utmpx = fread($file, $size);
for ($offset = 1256; $offset < $size; $offset += 628)
{
	$sesh["user"] = unpack("A32", $utmpx, $offset)[1];
	$sesh["host"] = unpack("a32", $utmpx, $offset + 260)[1];
	$sesh["status"] = unpack("s", $utmpx, $offset + 296)[1];
	$sesh["time"] = unpack("I", $utmpx, $offset + 300)[1];
	$sessions[] = $sesh;
}
foreach ($sessions as $sesh)
{
	if ($sesh[status] == 7)
	{
		$dt = new DateTime($sesh[time]);
		echo $sesh[user]."  ".$sesh[host]."  ".$dt->format("M  j G:i")."\n";
	}
}
?>
