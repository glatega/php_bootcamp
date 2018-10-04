#!/usr/bin/php
<?php
if ($argc == 2)
{
	if (preg_match("/(?<=https:\/\/).*$/", $argv[1], $match))
		$dir = $match[0];
	elseif (preg_match("/(?<=http:\/\/).*$/", $argv[1], $match))
		$dir = $match[0];
	echo $dir;
	if (strlen($dir))
	{
		if (!file_exists($dir))
		{
			mkdir($dir, 0777, true);
		}
	}
}
?>
