function deleteUser(){
    var checkboxes = document.getElementsByName("checkbox");
    for(var i = 0; i < checkboxes.length; i++){
      if(checkboxes[i].checked){
      checkboxes[i].parentNode.parentNode.remove();
      var checkboxes = document.getElementsByName("checkbox");
      i--;
      }
    }
}
