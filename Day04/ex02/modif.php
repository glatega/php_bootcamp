<?php
	session_start();
	if ($_POST["submit"] === "OK" && strlen($_POST["login"]) > 0 && strlen($_POST["oldpw"]) > 0 && strlen($_POST["newpw"]) > 0)
	{
		$accounts = unserialize(file_get_contents("../ex01/accounts/accounts.txt"));
		foreach ($accounts as &$account)
		{
			if ($account["login"] == $_POST["login"])
			{
				if ($account["passwd"] == hash("whirlpool", $_POST["oldpw"]))
				{
					$account["passwd"] = hash("whirlpool", $_POST["newpw"]);
					file_put_contents("../ex01/accounts/accounts.txt", serialize($accounts));
					echo "OK\n";
					exit;
				}
			}
		}
		echo "ERROR\n";
	}
	else
		echo "ERROR\n";
?>
