<?php
function deleteOrder(){
     $checkboxes = document.getElementsByName("checkbox");
     $file = file("orders.txt");
    for( $i = 0; i < sizeof($checkboxes); $i++){
      if($checkboxes[i]==1){
          
        
      }
      $checkboxes = document.getElementsByName("checkbox");
      $i--;
      }
    }

?>




<?php
if ($_POST["delete"]) {
    $file = file("UserStorage.txt");
    $filesize = sizeof($file);
    for ($i = 0; $i < $filesize; $i++) {
        $filearr = explode(" ", $file[$i]);
        if ($filearr[1] == $_POST["delete"]) {
            unset($file[$i]);
            break;
        }
    }
    $file = array_values($file);
    file_put_contents("UserStorage.txt", implode($file));
    header("Location: UserList.php");