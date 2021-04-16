<?php
function approve(){
    $_fN = $_POST[firstName];
    $_lN = $_POST[lastName];
    $_g =$_POST[gender];
    $_pC = $_POST[postalCode];
    $_sE = $_POST[signupEmail];
    $_sE2 = $_POST[signupEmail2];
    $_sP = $_POST[signupPassword];
    $_sP2 = $_POST[signupPassword2];
    $_cond = $_POST[conditions];

    //firstName
    if (preg_match("/^[A-Za-z]+$/", $_fN) == 0) {
        return FALSE;
    }
    //lastName
    if (preg_match("/^[A-Za-z]+$/", $_lN) == 0) {
       return FALSE;
    }
    //gender
    if (empty($_g)) {
        return FALSE;
    }
    //postalCode
    if (preg_match("/^[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]\d$/", $_pC) == 0) {
        return FALSE;
    }
    //signupEmail
    if (preg_match("/^[0-9A-Za-z.]+\@[a-z]+\.[a-z]{2,3}$/", $_sE) == 0) {
        return FALSE;
    }
    //signupEmail2
    if (preg_match("/^[0-9A-Za-z.]+\@[a-z]+\.[a-z]{2,3}$/", $_sE2) == 0||$_sE !=$_sE2) {
        return FALSE;
    }
    //signupPassword
    if (strlen($_sP) < 8) {
        return FALSE;
    }
    //signupPassword2
    if (strlen($_sP2) < 8||$_sP!=$_sP2) {
        return FALSE;
    }
    //conditions
    if (!isset($_cond)) {
        return FALSE;
    }

    return TRUE;
}

?>