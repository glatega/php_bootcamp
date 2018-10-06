<?php
	session_start();
	if ($_POST["submit"] === "OK" && strlen($_POST["login"]) > 0 && strlen($_POST["passwd"]) > 0)
	{
		$user = array("login" => $_POST["login"], "passwd" => hash("whirlpool", $_POST["passwd"]));
		if (file_exists("accounts/accounts.txt"))
		{
			$accounts = unserialize(file_get_contents("accounts/accounts.txt"));
			foreach ($accounts as $account)
			{
				if ($account["login"] == $user["login"])
				{
					echo "ERROR\n";
					exit;
				}
			}
			$accounts[] = $user;
			file_put_contents("accounts/accounts.txt", serialize($accounts));
			echo "OK\n";
		}
		else
		{
			$accounts[] = $user;
			mkdir("accounts");
			file_put_contents("accounts/accounts.txt", serialize($accounts));
			echo "OK\n";
		}
	}
	else
		echo "ERROR\n";
?>
