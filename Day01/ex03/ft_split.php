<?PHP
function ft_split($string)
{
	$array = explode(" ", $string);
	sort($array);
	return (array_values(array_filter($array, "strlen")));
}
?>
