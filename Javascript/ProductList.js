// function that deletes all checked items with button "delete"
function deleteElement()
{ 
    var products=document.getElementsByTagName("tr");

    var toRemove = [];
    for(var i=0;i<products.length;i++){
        var chk=products[i].cells[0].firstChild;
        if(chk.checked){
            toRemove.push(products[i])
        }
    }
    for(var i=0;i<toRemove.length;i++){
        toRemove[i].parentElement.removeChild(toRemove[i])
    }
}

// function that is called by the edit button
function editElements()
{
    var products=document.getElementsByTagName("tr");
    for(var i=0;i<products.length;i++){
        var product = products[i]
        if(product.cells[0].firstChild.checked) {
            makeEditableProduct(product)
        }
    }

}

// function that makes each text column editable as well as the picture selection
function makeEditableProduct(product) {
    
    for(var y=0;y<product.cells.length;y++) {
        var element = product.cells[y];
        var value = element.firstChild.data;
        
        if (element.firstChild.nodeName == "INPUT"){
           // removing checkbox and adding "Done" button instead
            element.removeChild(element.firstChild)
            element.innerHTML = '<input type="button" value="Done">';
           
            // function called when clicking on "done" which checks for pattern mismatch
            element.onclick = function() { 
                const x = document.getElementById('imageFile').files;
                // checks if image is selected
                if( x.length == 0)
                {
                    alert('Please select an image');
                }
                else {
                    // gets all the info from the user input of each column
                    const image = document.getElementById('imageFile').files[0].name;
                    const title = element.parentElement.cells[2].firstChild.value;
                    const category = element.parentElement.cells[3].firstChild.value;
                    const supplier = element.parentElement.cells[5].firstChild.value;
                    const quantity = element.parentElement.cells[4].firstChild.value;
                    const price = element.parentElement.cells[6].firstChild.value;
                    // verifies pattern
                    if(title==""){
                        window.alert("Please enter title!");
                    } else if(category==""){
                        window.alert("Please enter Category!");
                    }else if(supplier==""){
                        window.alert("Please enter Supplier!");
                    } else if(quantity==""){
                        window.alert("Please enter Quantity!");
                    } else if(price==""){
                        window.alert("Please enter Price!")
                    } else if(title.search(/[a-zA-z]+/)) {
                        window.alert("Title mismatch!");
                    }else if(category!="Fruits & Vegetables" && category!="Pasta" && category!="Drinks" && category!="Bread" && category!="Dairy" && category!="Meat") {
                        window.alert("Category mismatch!");
                    }else if(supplier.search(/[a-zA-z]+/)) {
                        window.alert("Supplier mismatch!")
                    }else if(quantity.search(/\d+/)) {
                        window.alert("Quantity mismatch!");
                    }else if(price.search(/\d+\.\d\d\$/)) {
                        window.alert("Price mismatch!");
                    } else{
                        var answer= confirm("Do you want to make the changes?");
                        if(answer){
                            window.location.replace("BackstoreProductList.html");
                        } else{
                            window.location.replace("BackstoreProductList.html");
                        }  
                    }
                }
                
            };
        } else if ( element.firstChild.nodeName == "IMG"){

            element.removeChild(element.firstChild);
            element.innerHTML = '<input type="file" id="imageFile" class="form-control-file"></input>';
        } else {
            element.removeChild(element.firstChild)
            element.innerHTML = '<input type="text" style="width:80px;"' + 'value='+value+'>';
        }
    }
}

// function called by the Add button at the bottom adds a row with each section
function addElement()
{   
    var title="   ";
    var category="   ";
    var supplier="   ";
    var quantity="   ";
    var price="   ";
    var description="   ";
    var image="   ";

    var table=document.getElementById("productTable");
   
    var td1=document.createElement("td");
    var td2=document.createElement("td");
    var td3=document.createElement("td");
    var td4=document.createElement("td");
    var td5=document.createElement("td");
    var td6=document.createElement("td");
    var td7=document.createElement("td");

    var img1= document.createElement("img");
    img1.setAttribute("src", "Media/"+image);
    img1.setAttribute("width", 90);
    img1.setAttribute("height", 75);

    td1.innerHTML="<input type=\"checkbox\" name=\"newProduct\"/>";
    td2.appendChild(img1);
    td3.innerHTML=title;
    td4.innerHTML=category;
    td5.innerHTML=quantity;
    td6.innerHTML=supplier;
    td7.innerHTML=price;

    var tr=document.createElement("tr");
    
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);
    tr.appendChild(td7);

    table.appendChild(tr);
    // calls method that will make each item in the row editable
    makeEditableProduct(tr);
}