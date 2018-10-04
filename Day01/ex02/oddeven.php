#!/usr/bin/php
<?PHP
while (1)
{
	echo "Enter a number: ";
	$input = trim(fgets(STDIN));
	if (feof(STDIN))
	{
		echo "\n";
		break ;
	}
	elseif (is_numeric($input))
	{
		if ($input % 2 == 0)
			echo "The number ".$input." is even\n";
		else
			echo "The number ".$input." is odd\n";
	}
	else
		echo "'".$input."' is not a number\n";
}
?>
