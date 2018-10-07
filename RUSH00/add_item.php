<?php
    $data = @file_get_contents('./private/items');
    $data = unserialize($data);
    if (!$data[$_POST['name']]){
        $data[$_POST['name']] = ['cost'=>$_POST['cost'], 'desc'=> $_POST['desc'], 'flav'=> $_POST['flav'], 'img'=>$_POST['img'], 'cats'=>$_POST['cats']];
        file_put_contents('./private/items', serialize($data));
        header('Location: add_item.phtml?success=yes');
    }
    else
		header('Location: add_item.phtml?success=no');
?>
