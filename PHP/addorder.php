<?php
   $validOrder = "/^#{1}[0-9]{5}[A-Z]{2}$/";
    $validName = "/[a-zA-Z]+\s[a-zA-Z]+/";
    $validEmail = "/^([\.\_a-zA-Z0-9]+)@([a-zA-Z]+)\.([a-zA-Z]){2,8}$/";
    $validProduct = "/^\d{2}+\-+[a-zA-Z]+\|+\d+\-+[a-zA-Z]+$/";
    $validsubtotal = "/\$\d+/"; 
    $validincome = "/\$\d+/"; 
    $O = $_POST["orderNumber"];
    $D = $_POST["orderDate"];
    $N = $_POST["fullName"];
    $E = $_POST["email"];
    $S = $_POST['SubtotalSummary'];
    $I = $_POST['income'];
    $P = $_POST['products'];

    if(!preg_match($validOrder,$O) ){
        echo "order number invalid format.\n";
    }
    if(!preg_match($validName,$N)){
        echo "Name invalid format.\n";
    }
    if(!preg_match($validEmail,$E)){
        echo "email invalid format.\n";
    }
    if(!preg_match($validProduct,$P)){
        echo "products invalid format.\n";
    }
  else{
$file1 = fopen('../Data/orders.txt','a') or die("unable to open file.");
$file = file('../Data/orders.txt');
$found = false;
$O = $_POST["orderNumber"];
$D = $_POST["orderDate"];
$N = $_POST["fullName"];
$E = $_POST["email"];
$S = $_POST['SubtotalSummary'];
$I = $_POST['income'];
$P = $_POST['products'];
$lineprint = $O."\t".$D."\t".$N."\t".$E."\t".$S."\t".$I."\t".$P."\n";
echo $lineprint;
foreach ($file as $line) {
    if (strstr($line, $O)) {
        $found = true;
        echo "order number already exists";
    }
}
if (!$found){
fwrite($file1,$lineprint);
header('Location: BackstoreOrderList.php');
}
  }
?>