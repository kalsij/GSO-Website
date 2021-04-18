<?php
    $index = $_REQUEST["index"];

    $product = "";
    $product .= "Media/" . $_POST["image"] . ";";
    $product .= $_POST["title"] . ";";
    $product .= $_POST["category"] . ";";
    $product .= $_POST["quantity"] . ";";
    $product .= $_POST["supplier"] . ";";
    $product .= $_POST["price"] . ";";
    $product .= $_POST["description"] . ";";
    $product .= $_POST["unit"] . "\n";

    editProduct($index-1 . "--" . $product);
    
    // navigates back to the store list
    header("Location: BackstoreProductList.php");
    exit;

    function editProduct($product) {
        $myfile = fopen("../Data/productList.txt", "r") or die("Unable to open file!");

        $productArray = explode("--", $product, 2) ;
        $productIndex = $productArray[0];
        $productData = $productArray[1];

        $linesToKeep = array();
        // Output one line until end-of-file
        $found = false;
        $index = 0;
        while(!feof($myfile)) {
            $line = fgets($myfile);  
            if ($index == $productIndex){
                array_push($linesToKeep, ($index+1) . ";" . $productData); 
                $found = true; 
            }
            else {
                if (strlen($line) > 5) {
                    array_push($linesToKeep, $line); 
                }
            }
            if (strlen($line) > 5)
            {
                $index++;
            }
        }
        if (!$found) {
            array_push($linesToKeep, ($index+1) . ";" . $productData); 
        }
        fclose($myfile);
        writeArray($linesToKeep);
    }

    function writeArray($linesToKeep) {
        $myfile = fopen("../Data/productList.txt", "w") or die("Unable to open file!");
    
        foreach ($linesToKeep as $value) {
            fwrite($myfile, $value);
        }
        
        fclose($myfile);
    }
?>