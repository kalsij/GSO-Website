function deleteOrder(){
    var checkboxes = document.getElementsByName("checkbox");
    for(var i = 0; i < checkboxes.length; i++){
      if(checkboxes[i].checked){
      checkboxes[i].parentNode.parentNode.remove();
      var checkboxes = document.getElementsByName("checkbox");
      i--;
      }
    }
}

function ship1(){
    var status = document.getElementsByName("status");
    if (status[0].innerHTML=="Completed")
         alert("This order has already been shipped and completed");
    else 
    alert("The order has now shipped")
   return true;
}
function ship2(){
    var status = document.getElementsByName("status");
    if (status[1].innerHTML=="Completed")
         alert("This order has already been shipped and completed");
    else 
    alert("The order has now shipped")
   return true;
}
function ship3(){
    var status = document.getElementsByName("status");
    if (status[2].innerHTML=="Completed")
         alert("This order has already been shipped and completed");
    else 
    alert("The order has now shipped")
   return true;
}
function ship4(){
    var status = document.getElementsByName("status");
    if (status[3].innerHTML=="Completed")
         alert("This order has already been shipped and completed");
    else 
        alert("The order has now shipped")
   return true;
}