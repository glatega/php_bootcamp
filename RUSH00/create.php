<?php
    if ($_POST['submit'] != 'OK' || empty($_POST['login']) || empty($_POST['passwd'])) 
        echo ("ERROR\n");
    else{
        $data = @file_get_contents('./private/accounts');
        if (!file_exists("./private"))
            mkdir('./private');
        else
            $data = unserialize($data);
        if (!$data[$_POST['login']]){
            $psw = hash("whirlpool", $_POST['passwd']);
            $data[$_POST['login']] = ['login'=>$_POST['login'], 'passwd'=> $psw];
			file_put_contents('./private/accounts', serialize($data));
			session_start();
			$_SESSION = array();
			$_SESSION["user"] = $_POST['login'];
            header( 'Location: shop.phtml' ) ;
        }
        else
            echo("ERROR <br> User already exists");     
    }
?>
