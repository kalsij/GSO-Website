<?php
    
//Obtain the index of checked user
$UserSelected = $_REQUEST["index"];

    $user = "";
    $user = $_POST["firstName"] . " ";
    $user .= $_POST["lastName"] . " ";
    $user .= $_POST["gender"] . " ";
    $user .= $_POST["postal"] . " ";
    $user .= $_POST["email"] . " ";
    $user .= $_POST["password"] . "\r\n";
    
    

    addUser( $UserSelected-1 . "--" . $user);
    
    // navigates back to the store list
    header("Location:BackstoreUserList.php");
    exit;

    //function to add the user
    function addUser( $user) {
        
        $myfile = fopen("../Data/users.txt", "r") or die("Unable to open file!");

        $userArray = explode("--", $user, 2) ;
        $userIndex = $userArray[0];
        $userData = $userArray[1];

        $lines = array();
        
        $found = false;
        $index = 0;
        while(!feof($myfile)) {
            $line = fgets($myfile);  
            if ($index == $userIndex){
                array_push($lines, $userData); 
                $found = true; 
            }
            else {
                if (strlen($line) > 5) {
                    array_push($lines, $line); 
                }
            }
            if (strlen($line) > 5)
            {
                $index++;
            }
        }
        if (!$found) {
            array_push($lines, $userData); 
        }
        fclose($myfile);
        writeArray($lines);
  
        }
  
        //write to file
    function writeArray($linesToKeep) {
        $myfile = fopen("../Data/users.txt", "w") or die("Unable to open file!");
    
        foreach ($linesToKeep as $value) {
            fwrite($myfile, $value);
        }
        
        fclose($myfile);
       
    }
?>
