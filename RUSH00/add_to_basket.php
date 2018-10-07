<?php
	session_start();
	$basket = $_SESSION["basket"];
	if (isset($_SESSION["user"]))
	{
		$baskets = unserialize(@file_get_contents("./private/baskets"));
		if (array_key_exists($_SESSION["user"], $baskets))
		{
			$basket = $baskets[$_SESSION["user"]];
			if (array_key_exists($_POST["item"], $basket))
				$basket[$_POST["item"]]++;
			else
				$basket[$_POST["item"]] = 1;
			$baskets[$_SESSION["user"]] = $basket;
		}
		else
			$baskets[$_SESSION["user"]] = array($_POST["item"] => "1");
		$save = serialize($baskets);
		file_put_contents("./private/baskets", $save);
		$_SESSION["basket"] = $baskets[$_SESSION["user"]];
		header('Location: item_details.phtml?item='.$_POST["item"].'&success=yes');
		exit;
	}
	else
	{
		if (array_key_exists($_POST["item"], $basket))
			$basket[$_POST["item"]]++;
		else
			$basket[$_POST["item"]] = 1;
		$_SESSION["basket"] = $basket;
		header('Location: item_details.phtml?item='.$_POST["item"].'&success=yes');
		exit;
	}
	header('Location: item_details.phtml?item='.$_POST["item"].'&success=no');
?>
