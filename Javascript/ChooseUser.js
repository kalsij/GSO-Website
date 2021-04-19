// edit or add element based on the selection in the item list
function edit()
{ 
    var products=document.getElementsByTagName("tr");
    var index = -1;
    for(var i=0;i<products.length;i++){
        var product = products[i];
        if(product.cells[0].firstChild.checked) {
            index = i;
            break;
        }
    }

    window.location.replace("BackstoreEditUser.php?index="+index);
}