<?php
if($_POST['DeleteOrder']){
    $file = file('../Data/orders.txt');
    $checked = $_POST['checkbox'];
    $i = 0;
    foreach ($file as $line){
        $info = explode("\t",$line);
        if($info[0] == $checked){
            unset($file[$i]);
            break;
        }
        $i++;
    }
    $file = array_values($file);
    file_put_contents('../Data/orders.txt',implode($file));
    header('Location: BackstoreOrderList.php');



}
?>