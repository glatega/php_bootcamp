<?php
    if ($_POST['submit'] != 'OK' || empty($_POST['login']) || empty($_POST['passwd'])) 
        echo ("ERROR\n");
    else{
            $data = @file_get_contents('./private/accounts');
            if (!file_exists("./private"))
                echo "User does not exist";
            else{
                $data = unserialize($data);
                $hashedpw = hash('whirlpool', $_POST['passwd']);
                if (($data[$_POST['login']]) && ($hashedpw == $data[$_POST['login']]['passwd'])){
					session_start();
					$_SESSION = array();
					$_SESSION["user"] = $_POST['login'];
					$admin = trim(@file_get_contents('./private/admin'));
					if ((hash('whirlpool', $_POST['login'])) == $admin)
						header('Location: admin.phtml?axe=axe');
					else
						header('Location: shop.phtml');
                }
                else
                    echo "INCORRECT USERNAME/PASSWORD";
            }
       } 
?>
