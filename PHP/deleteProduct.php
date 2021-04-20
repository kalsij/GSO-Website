<?php
    $deleteArray = $_REQUEST["delete"];
    
    if (!empty($deleteArray) ) {
        deleteProducts($deleteArray);
    }
    
    function writeArray($linesToKeep) {
        $myfile = fopen("../Data/productList.txt", "w") or die("Unable to open file!");
    
        foreach ($linesToKeep as $value) {
            fwrite($myfile, $value);
        }
        
        fclose($myfile);
    }

    function deleteProducts($indexArray) {
        $myfile = fopen("../Data/productList.txt", "r") or die("Unable to open file!");

        $linesToKeep = array();
        // Output one line until end-of-file
        $index = 1;
        $count = 0;
        while(!feof($myfile)) {
            $line = fgets($myfile);  
            if (strlen($line) > 5 && !containsIndex($index, $indexArray ))
            {
                $restOfLine=substr($line, strpos($line, ";"));
                $line=strval($index - $count) . $restOfLine;
                array_push($linesToKeep, $line); 
            }
            else 
            {
                $count++;
            }
            $index++;
        }
        fclose($myfile);
        writeArray($linesToKeep);
    }
    
    function containsIndex($index, $indexArray) {
        $indexes = explode(",", $indexArray);
        foreach($indexes as $value) {
            if ( $index == intval($value) ) {
                return true;
            }
        }
        return false;
    }
?>
