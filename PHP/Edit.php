<?php
    
//Obtain the index of checked user
$UserSelected = $_REQUEST["index"];
    
    $user = $_POST["firstName"] . " ";
    $user .= $_POST["lastName"] . " ";
    $user .= $_POST["gender"] . " ";
    $user .= $_POST["postal"] . " ";
    $user .= $_POST["email"] . " ";
    $user .= $_POST["password"] . "\n";
    
    

    editUser( $UserSelected, $user);
    
    // navigates back to the store list
    header("Location:BackstoreUserList.php");
    exit;

    function editUser($UserSelected, $user) {
        
        $myfile = fopen("../Data/users.txt", "r") or die("Unable to open file!");

        $userArray = explode(" ", $user) ;
        // $productIndex = $productArray[0];
        // $productData = $productArray[1];

        $linesToKeep = array();
        // Output one line until end-of-file
        $found = false;
        $lineNumber = 1;

        while(!feof($myfile)) {
            $line = fgets($myfile); 
            
            $lineArray =  explode(" ", $line);
    
             if ($UserSelected == $lineNumber){
                
                array_push($linesToKeep,  $userArray); 
                $found = true; 
             }

             else {
                if (strlen($line) > 7) {
                   
                    array_push($linesToKeep, $line); 
                }
 
            }
             
                $lineNumber++;
                                              
          }

          if (!$found) {
            array_push($linesToKeep,  $userArray); 
        }
        fclose($myfile);
        writeArray($linesToKeep);
  
        }
  
    function writeArray($linesToKeep) {
        $myfile = fopen("../Data/users.txt", "w") or die("Unable to open file!");
    
        foreach ($linesToKeep as $value) {
            fwrite($myfile, $value);
        }
        
        fclose($myfile);
    }
?>
