#!/usr/bin/php
<?php

function valid_op($array)
{
	$valid = 1;
	if (!is_numeric($array[0]) || !is_numeric($array[2]))
		$valid = 0;
	if (strlen($array[1]) == 1)
	{
		$c = $array[1][0];
		if (!($c == '+' || $c == '-' || $c == '*' || $c == '/' || $c == '%'))
			$valid = 0;
	}
	else
		$valid = 0;
	return $valid;
}

if ($argc == 4)
{
	$eq[0] = trim($argv[1]);
	$eq[1] = trim($argv[2]);
	$eq[2] = trim($argv[3]);
	if (!valid_op($eq))
		echo "Incorrect Parameters\n";
	else
	{
		$c = $eq[1][0];
		if ($c == '+')
			echo $eq[0] + $eq[2];
		elseif ($c == '-')
			echo $eq[0] - $eq[2];
		elseif ($c == '*')
			echo $eq[0] * $eq[2];
		elseif ($c == '/')
			echo $eq[0] / $eq[2];
		elseif ($c == '%')
			echo $eq[0] % $eq[2];
		echo "\n";
	}
}
else
	echo "Incorrect Parameters\n";
?>
