<?php
    $data = @file_get_contents('./private/items');
    $data = unserialize($data);
    if ($data[$_POST['name']]){
		unset($data[$_POST['name']]);
        file_put_contents('./private/items', serialize($data));
        header('Location: delete_item.phtml?success=yes');
    }
    else
		header('Location: delete_item.phtml?success=no');
?>
