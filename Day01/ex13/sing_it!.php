#!/usr/bin/php
<?php
if ($argc == 2)
{
	if ($argv[1] == "Why this demo ?")
		echo "To avoid people noticing this while going over\nthe subject briefly\n";
	elseif ($argv[1] == "Why this song ?")
		echo "Because we're all children inside\n";
	elseif ($argv[1] == "really ?")
	{
		$option = rand(0, 1);
		if ($option == 0)
			echo "No it's because it's april's fool\n";
		elseif ($option == 1)
			echo "Yeah we really are all children inside\n";
	}
}
?>
