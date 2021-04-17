//Contact Page
function checkorder(){
    var ordername = document.getElementById('ordernumber');
    if (ordername.value.search(/^#{1}[0-9]{5}[A-Z]{2}$/)==-1){
         alert("Please enter a correct order number (Form: #12345AB)");
         return false;
    }
    else 
    return true;
    
}

function checkusername(){
    var username = document.getElementById('username');
    if (username.value.search(/^\w+[\w-\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/)==-1){
         alert("Please enter a correct user name (email)");
         return false;
    }
    else
    return true;
}

function checked(){
    if(checkusername() && checkorder() == 1){
        alert("Thank you, we wil get back to you within 3 days.")
        return true;
    }
    else return false;
}
