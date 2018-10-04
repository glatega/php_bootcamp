#!/usr/bin/php
<?PHP
if ($argc > 1)
{
	$array = array_values(array_filter(explode(" ", $argv[1])));
	array_push($array, array_shift($array));
	echo implode(" ", $array),"\n";
}
?>
