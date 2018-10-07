<?php
    if ($_POST['submit'] != 'OK' || empty($_POST['login']) || empty($_POST['passwd'])) 
        echo ("ERROR\n");
    else{
            $data = @file_get_contents('./private/passwd');
            if (!file_exists("./private"))
                echo "User does not exist";
            else{
                $data = unserialize($data);
                $hashedpw = hash('whirlpool', $_POST['passwd']);
                if (($data[$_POST['login']]) && ($hashedpw == $data[$_POST['login']]['passwd'])){
                    unset($data[$_POST['login']]);
                    file_put_contents('./private/passwd', serialize($data));
                    echo "OK <br>".$_POST['login']." has been deleted";
                 }
                else
                    echo "User does not exist";
            }
       } 
?>