<?PHP
function ft_is_sort($array)
{
	$new = $array;
	sort($new);
	if ($new == $array)
		return 1;
	return 0;
}
?>
