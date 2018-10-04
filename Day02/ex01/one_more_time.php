#!/usr/bin/php
<?php
if ($argc == 2)
{
	$stamps = array_values(array_filter(explode(" ", $argv[1])));
	if (count($stamps) == 5)
	{
		$ok = 1;
		if (preg_match("/(Lundi|Mardi|Mercredi|Jeudi|Vendredi|Samedi|Dimanche)/i", $stamps[0]) != 1)
			$ok = 0;
		if (preg_match("/\d{1,2}/", $stamps[1]) != 1)
			$ok = 0;
		if (preg_match("/(janvier|f[ée]vrier|mars|avril|mai|juin|juillet|ao[ûu]t|septembre|octobre|novembre|d[ée]cembre)/i", $stamps[2]) != 1)
			$ok = 0;
		if (preg_match("/\d{4}/", $stamps[3]) != 1)
			$ok = 0;
		if (preg_match("/\d{2}:\d{2}:\d{2}/", $stamps[4]) != 1)
			$ok = 0;
		if (preg_match("/(2[0-3]|[0-1][0-9]):([0-5][0-9]):([0-5][0-9])/", $stamps[4]) != 1)
			$ok = 0;
		if ($ok == 0)
			echo "Wrong Format\n";
		else
		{
			$time[day] = $stamps[1];
			if (!strcasecmp("janvier", $stamps[2]))
				$time[month] = "January";
			elseif (!strcasecmp("février", $stamps[2]))
				$time[month] = "February";
			elseif (!strcasecmp("fevrier", $stamps[2]))
				$time[month] = "February";
			elseif (!strcasecmp("mars", $stamps[2]))
				$time[month] = "March";
			elseif (!strcasecmp("avril", $stamps[2]))
				$time[month] = "April";
			elseif (!strcasecmp("mai", $stamps[2]))
				$time[month] = "May";
			elseif (!strcasecmp("juin", $stamps[2]))
				$time[month] = "June";
			elseif (!strcasecmp("juillet", $stamps[2]))
				$time[month] = "July";
			elseif (!strcasecmp("août", $stamps[2]))
				$time[month] = "August";
			elseif (!strcasecmp("aout", $stamps[2]))
				$time[month] = "August";
			elseif (!strcasecmp("septembre", $stamps[2]))
				$time[month] = "September";
			elseif (!strcasecmp("octobre", $stamps[2]))
				$time[month] = "October";
			elseif (!strcasecmp("novembre", $stamps[2]))
				$time[month] = "November";
			elseif (!strcasecmp("décembre", $stamps[2]))
				$time[month] = "December";
			elseif (!strcasecmp("decembre", $stamps[2]))
				$time[month] = "December";
			$time[year] = $stamps[3];
			$time[time] = $stamps[4];
			$date = implode(" ", $time);
			date_default_timezone_set('Europe/Paris');
			echo strtotime($date)."\n";
		}
	}
	else
	echo "Wrong Format\n";
}
?>
