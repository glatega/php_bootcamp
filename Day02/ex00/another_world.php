#!/usr/bin/php
<?php
if ($argc > 1)
{
	preg_match_all("/\S+/", $argv[1], $words);
	$sentence = implode(" ", $words[0]);
	echo $sentence."\n";
}
?>
