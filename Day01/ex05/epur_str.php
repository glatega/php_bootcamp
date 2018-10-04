#!/usr/bin/php
<?PHP
if ($argc == 2)
{
	$split = explode(" ", $argv[1]);
	$array = array_values(array_filter($split));
	$array = implode(" ", $array);
	echo $array."\n";
}
?>
