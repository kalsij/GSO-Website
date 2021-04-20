// function that deletes all checked products with button "delete"
function deleteElement()
{ 
    var products=document.getElementsByTagName("tr");

    var toRemove = [];
    var itemsToRemove = "";
    
    for(var i=0;i<products.length;i++){
        var chk=products[i].cells[0].firstChild;
        if(chk.checked){
            toRemove.push(products[i]);
            itemsToRemove += i.toString() + ',';
        }
    }
    for(var i=0;i<toRemove.length;i++){
        toRemove[i].parentElement.removeChild(toRemove[i]);
    }
    deleteProducts(itemsToRemove.substr(0, itemsToRemove.length-1));
}

function deleteProducts(itemsToRemove) {
    var xmlhttp = new XMLHttpRequest();
    console.log(itemsToRemove);
    xmlhttp.open("POST", "deleteProduct.php?delete=" + itemsToRemove, true);
    xmlhttp.send(); 
}

// edit or add element based on the selection in the item list
function editOrAdd()
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

    window.location.replace("BackstoreEditProduct.php?index="+index);
}

