#!/usr/bin/php
<?php
if ($argc == 2)
{
	$data = stream_get_contents(STDIN);
	$array = explode("\n", $data);
	$i = 0;
	$users = array();
	foreach ($array as $user)
	{
		$col = explode(";", $user);
		if ($col[2] != "moulinette")
		{
			if ($users[$col[0]])
			{
				$marks = $users[$col[0]];
				array_push($marks, $col[1]);
				$users[$col[0]] = $marks;
			}
			else
				$users[$col[0]] = array($col[1]);
		}
		else
			$moulinette[$col[0]] = $col[1];
	}
	array_shift($users);
	array_pop($users);
	foreach ($users as $key => $value)
	{
		foreach ($users[$key] as $score)
		{
			$average += strlen($score) == 0 ? 0 : $score;
		}
		$average /= count($users[$key]);
		$user_ave[$key] = $average;
	}
	ksort($user_ave);
	if ($argv[1] == "average")
	{
		foreach ($user_ave as $k => $p)
		{
			$total += $p;
		}
		$total /= count($users);
		echo $total."\n";
	}
	elseif ($argv[1] == "average_user")
	{
		foreach ($user_ave as $user => $average)
			echo $user.":".$average."\n";
	}
	elseif ($argv[1] == "moulinette_variance")
	{
		foreach ($user_ave as $user => $average)
		{
			echo $user.":".(($average + $moulinette[$user]) / 2)."\n";
		}
	}
}
?>
