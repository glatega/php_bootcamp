#!/usr/bin/php
<?PHP
if ($argc > 1)
{
	array_shift($argv);
	$array = array_values(array_filter(explode(" ", implode(" ", $argv))));
	sort($array);
	$array = implode("\n", $array);
	printf("%s\n", $array);
}
?>
