<?php
    $index = $_REQUEST["index"];

    $order = "";
    $order .= $_POST["orderNumber"] . "\t";
    $order .= $_POST["orderDate"] . "\t";
    $order .= $_POST["fullName"] . "\t";
    $order .= $_POST["email"] . "\t";
    $order .= $_POST["SubtotalSummary"] . "\t";
    $order .= $_POST["income"] . "\t";
    $order .= $_POST["orderProducts"]."\t\n";

    //re-configurating the lines
    editOrder($index-1 . "--" . $order);
    
    //send email confirmation
    $msgTitle = "For Confirmation Order, Please check email.";
    $msg = "Order confirmation. Your order has been updated. Thank you for shopping at GSO. Hope to see you soon!";
    $msg = wordwrap($msg, 70);
    mail( $_POST["email"], "testing", $msg);
    echo'<script>alert("Confirmation Order Email has been sent! Thank you! Bye-bye.")</script>';
    
    // re-direct to order list
    header("Location: BackstoreOrderList.php");
    exit;

    //organize and put back the elements to form the line 
    function editOrder($order) {
        
        $myfile = fopen("../Data/orders.txt", "r") or die("Unable to open file!");

        $orderArray = explode("--", $order, 2) ;
        $orderIndex = $orderArray[0];
        $orderData = $orderArray[1];

        $lines = array();
        // Output one line until end-of-file
        $found = false;
        $index = 0;
        while(!feof($myfile)) {
            $line = fgets($myfile);  
            if ($index == $orderIndex){
                array_push($lines, $orderData); 
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
            array_push($lines, $orderData); 
        }
        fclose($myfile);
       
        writeArray($lines);
    }

    function writeArray($lines) {
        $myfile = fopen("../Data/orders.txt", "w") or die("Unable to open file to write. Please check the name of file or the location of the file.");
    
        foreach ($lines as $v) {
            fwrite($myfile, $v);
        }
        
        fclose($myfile);
    }
?>
