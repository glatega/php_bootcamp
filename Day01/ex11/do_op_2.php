#!/usr/bin/php
<?php

function validate_op($s)
{
	for ($i = 0; $i < strlen($s); $i++)
	{
		$c = $s[$i];
		if ($c == '+' || $c == '-' || $c == '*' || $c == '/' || $c == '%')
		{
			$count++;
			$op = $c;
		}
	}
	if ($count == 1)
	{
		$array = explode($op, $s);
		if (count($array) == 2)
		{
			if (strlen($array[0]) == 0 || strlen($array[1]) == 0)
				return 0;
			if (is_numeric(trim($array[0])))
				$expr[] = trim($array[0]);
			$expr[] = $op;
			if (is_numeric(trim($array[1])))
				$expr[] = trim($array[1]);
			if (count($expr) == 3)
				return $expr;
			else
				return 0;
		}
		else
			return 0;
	}
	else
		return 0;
}

if ($argc == 2)
{
	$input = trim($argv[1]);
	$expr = validate_op($input);
	if ($expr == 0)
		echo "Syntax Error\n";
	else
	{
		$c = $expr[1][0];
		if ($c == '+')
			echo $expr[0] + $expr[2];
		elseif ($c == '-')
			echo $expr[0] - $expr[2];
		elseif ($c == '*')
			echo $expr[0] * $expr[2];
		elseif ($c == '/')
			echo $expr[0] / $expr[2];
		elseif ($c == '%')
			echo $expr[0] % $expr[2];
		echo "\n";
	}
}
else
	echo "Incorrect Parameters\n";
?>
