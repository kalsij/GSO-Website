<?php
    // $orderSelected = $_REQUEST["index"];
$UserSelected = $_REQUEST["index"];
    
    $product = $_POST["firstName"] . " ";
    $product .= $_POST["lastName"] . " ";
    $product .= $_POST["gender"] . " ";
    $product .= $_POST["postal"] . " ";
    $product .= $_POST["email"] . " ";
    $product .= $_POST["password"] . "\n";
    
    

    editProduct( $UserSelected, $product);
    
    // navigates back to the store list
    header("Location:BackstoreUserList.php");
    exit;

    function editProduct($UserSelected, $product) {
        
        $myfile = fopen("../Data/users.txt", "r") or die("Unable to open file!");

        $productArray = explode(" ", $product) ;
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
                
                array_push($linesToKeep,  $productArray); 
                $found = true; 
             }

             else {
                if (strlen($line) > 5) {
                   
                    array_push($linesToKeep, $line); 
                }

                
            }
             
                $lineNumber++;
            
                
              
                                                        
          }

          if (!$found) {
            array_push($linesToKeep,  $productArray); 
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