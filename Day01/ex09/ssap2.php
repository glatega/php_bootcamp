#!/usr/bin/php
<?PHP
if ($argc > 1)
{
	array_shift($argv);
	$array = array_values(array_filter(explode(" ", implode(" ", $argv))));
	natcasesort($array);
	$array = array_values($array);
	for ($i = 0; $array[$i]; $i++)
		if (preg_match("/^[a-zA-Z]$/", $array[$i][0]))
		{
			$new_array[] = $array[$i];
			unset($array[$i]);
		}
	sort($array, SORT_STRING);
	for ($i = 0; $array[$i]; $i++)
		if (preg_match("/^[0-9]$/", $array[$i][0]))
		{
			$new_array[] = $array[$i];
			unset($array[$i]);
		}
	foreach ($array as $word)
		$new_array[] = $word;
	$array = implode("\n", $new_array);
	printf("%s\n", $array);
}
?>
