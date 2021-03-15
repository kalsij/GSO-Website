//Contact Page
function checkorder(){
    var ordername = document.getElementById('ordernumber');
    if (ordername.value.search(/^#{1}[0-9]{5}[A-Z]{2}$/)==-1)
         alert("Please enter a correct order number (Form: #12345AB)");
    else 
    return true
    
}