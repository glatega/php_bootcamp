#!/usr/bin/php
<?php
if ($argc > 2)
{
	array_shift($argv);
	$unlock = array_shift($argv);
	foreach ($argv as $string)
	{
		$couple = explode(":", $string);
		if (!(strlen($couple[0]) == 0 || strlen($couple[1]) == 0))
			$ass_arr[$couple[0]] = $couple[1];
	}
	foreach ($ass_arr as $key => $value)
		if ((string)$key === $unlock)
			echo $value."\n";
}
?>
