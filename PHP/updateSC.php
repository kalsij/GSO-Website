<?php
 session_start();
 // session_unset()

//Write in file to update
// print_r($_SESSION);
echo($_REQUEST["index"]); echo"\n\n";
echo"\n\n\n";
$lineIndex =$_REQUEST["index"]; //11,12,13...
$lineIndex = intdiv($lineIndex, 10);//line number
$buttonIndex = $_REQUEST["index"] % 10;
echo $lineIndex."\n";
echo "the line index div is: $lineIndex\n the buttonIndex modulo is: $buttonIndex \n";

$linearray = $_SESSION["cart"][$lineIndex-1];

$order .=  $linearray[0]. ";";
$order .= $linearray[1] . ";";
$order .= $linearray[2] . ";";
$order .= $linearray[3] . ";";
$order .= $linearray[4] . ";";
$order .= $linearray[5] . ";";
$order .= $linearray[6] . ";";
$order .= $linearray[7] . ";";
$order .= $linearray[8] . ";";
echo $buttonIndex;
if($buttonIndex == 1){
    $order .= $linearray[9]+1 . "\n";
    
}
else if ($buttonIndex == 2){
    $order .= $linearray[9]-1 . "\n";
    echo"helllllo im in - ----";
    
}
else if ($buttonIndex ==3){
    $order="";    //empty line -> delete
    $linearray[9]="";
    session_unset();
}



$myfile = fopen("../Data/cartProducts.txt", "r") or die("Unable to open file!");

$orderArray = explode("--", $order, 2) ;
$orderIndex = $orderArray[0];
$orderData = $orderArray[1];

$lines = array();
// Output one line until end-of-file
$found = false;
$index = 1;
while(!feof($myfile)) {
    $line = fgets($myfile);  
    if ($lineIndex == $index){
        array_push($lines, $order); 
        $found = true; 
    }
    else {
        // if (strlen($line) > 5) {
            array_push($lines, $line); 
        // }
    }
    $index++;
    // if (strlen($line) > 5)
    // {
    //     $index++;
    // }
}
if (!$found) {
    array_push($lines, $order); 
}
fclose($myfile);
// echo"THE LINES: \n";
// print_r( $lines);
writeArray($lines);
?>

<form methood="post" action="ShoppingCart.php">
    <input type="hidden" name="quan" value="<?php echo $linearray[9] ?>" type="submit">
</form>

<?php
header("Location: ShoppingCart.php");
exit;


function writeArray($lines) {
$myfile = fopen("../Data/cartProducts.txt", "w") or die("Unable to open file to write. Please check the name of file or the location of the file.");

foreach ($lines as $v) {
    fwrite($myfile, $v);
}

fclose($myfile);
}

// echo "<form id=\"myform\" action=\"bonjour.php?index=$button1\" method=\"post\" onsubmit=\" return checkEditOrderFields()\">";

?>