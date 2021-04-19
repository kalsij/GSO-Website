<?php
if($_POST['DeleteUser']){
    $file = file('../Data/users.txt');
    $checked = $_POST['checkbox'];
    $i = 0;
    foreach ($file as $line){
        $info = explode(" ",$line);
        if($info[0] == $checked){
            unset($file[$i]);
            break;
        }
        $i++;
    }
    $file = array_values($file);
    file_put_contents('../Data/users.txt',implode($file));
    header('Location: BackstoreUserList.php');



}
?> 