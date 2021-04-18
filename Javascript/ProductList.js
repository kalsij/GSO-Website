// function that deletes all checked items with button "delete"
function deleteElement()
{ 
    var products=document.getElementsByTagName("tr");

    var toRemove = [];
    var itemsToRemove = "";
    for(var i=0;i<products.length;i++){
        var chk=products[i].cells[0].firstChild;
        if(chk.checked){
            toRemove.push(products[i]);
            itemsToRemove += (i-1).toString() + ',';
        }
    }
    for(var i=0;i<toRemove.length;i++){
        toRemove[i].parentElement.removeChild(toRemove[i]);
    }
    deleteProducts(itemsToRemove.substr(0, itemsToRemove.length-1));
}

// function that is called by the edit button
function editElements()
{
    var products=document.getElementsByTagName("tr");
    console.log(products.length);
    for(var i=0;i<products.length;i++){
        var product = products[i];
        if(product.cells[0].firstChild.checked) {
            makeEditableProduct(i, product);
        }
    }
}

// function that makes each text column editable as well as the picture selection
function makeEditableProduct(index, product) {
    var row;
    if (index == -1) {
        row = product.parentElement.insertRow(-1);
    }
    else {
        row = product.parentElement.insertRow(index);
    }
    row.innerHTML = '<td colspan="4"><input type="text" style="width:300px;"' + 'value=description'+'>' +"</td>";

    if(index == -1) {
        row.cells[0].firstChild.value = "product description";
    }
    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //console.log(this.responseText);
                row.cells[0].firstChild.value = this.responseText;
            }
        };
        xmlhttp.open("GET", "modifyProduct.php?q=" + (index-1).toString(), true);
        //console.log((index-1-count).toString());
        xmlhttp.send();
    }
        
    for(var y=0;y<product.cells.length;y++) {
        var element = product.cells[y];
        var value = element.firstChild.data;
        
        if (element.firstChild.nodeName == "INPUT"){
           // removing checkbox and adding "Done" button instead
            element.removeChild(element.firstChild);
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
                        window.alert("Please enter Price!");
                    } else if(title.search(/[a-zA-z]+/)) {
                        window.alert("Title mismatch!");
                    }else if(category!="Fruits & Vegetables" && category!="Pasta" && category!="Drinks" && category!="Bread" && category!="Dairy" && category!="Meat") {
                        window.alert("Category mismatch!");
                    }else if(supplier.search(/[a-zA-z]+/)) {
                        window.alert("Supplier mismatch!");
                    }else if(quantity.search(/\d+/)) {
                        window.alert("Quantity mismatch!");
                    }else if(price.search(/\d+\.\d\d\$/)) {
                        window.alert("Price mismatch!");
                    } else{
                        var answer= confirm("Do you want to make the changes?");
                        if(answer){
                            const p = element.parentElement;
                            cleanItem(p);
                            changeElement(p, image, title, category, supplier, quantity, price);
                            var desc = row.cells[0].firstChild.value;
                            //console.log(desc);
                            row.parentNode.removeChild(row);
                            
                            var product = "Media/" + image + ";" + title + ";" + category + ";" + quantity + ";" + supplier + ";" + price + ";" + desc + "\n";
                            editProduct(index-1, product)


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
            element.removeChild(element.firstChild);
            element.innerHTML = '<input type="text" style="width:80px;"' + 'value='+value+'>';
        }

    }
}

function deleteProducts(itemsToRemove) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "modifyProduct.php?delete=" + itemsToRemove, true);
    xmlhttp.send(); 
}

function editProduct(index, product){
    var xmlhttp = new XMLHttpRequest();
    var p = index.toString() + "--" + product;
    console.log(p);
    xmlhttp.open("POST", "modifyProduct.php?edit="+btoa(p), true);
    xmlhttp.send();
}

// removes the edit part of the item
function cleanItem(item)
{ 
    var toRemove = [];
    for(var i=0;i<item.cells.length;i++){
        toRemove.push(item.cells[i]);
    }
    for(var i=0;i<toRemove.length;i++){
        toRemove[i].parentElement.removeChild(toRemove[i]);
    }
}
// saves the new built product in the table as a new row
function changeElement(tr, image, title, category, supplier, quantity, price)
{
    var td1=document.createElement("td");
    var td2=document.createElement("td");
    var td3=document.createElement("td");
    var td4=document.createElement("td");
    var td5=document.createElement("td");
    var td6=document.createElement("td");
    var td7=document.createElement("td");

    var img1= document.createElement("img");
    img1.setAttribute("src", "../Media/"+image);
    img1.setAttribute("width", 90);
    img1.setAttribute("height", 75);

    td1.innerHTML="<input type=\"checkbox\" name=\"newProduct\"/>";
    td2.appendChild(img1);
    td3.innerHTML=title;
    td4.innerHTML=category;
    td5.innerHTML=quantity;
    td6.innerHTML=supplier;
    td7.innerHTML=price;
    
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);
    tr.appendChild(td7);
}


// function called by the Add button at the bottom adds a row with each section
function addElement()
{  
    var table=document.getElementById("productTable");
   
    var td1=document.createElement("td");
    var td2=document.createElement("td");
    var td3=document.createElement("td");
    var td4=document.createElement("td");
    var td5=document.createElement("td");
    var td6=document.createElement("td");
    var td7=document.createElement("td");

    var img1= document.createElement("img");
    img1.setAttribute("width", 90);
    img1.setAttribute("height", 75);

    td1.innerHTML="<input type=\"checkbox\" name=\"newProduct\"/>";
    td2.appendChild(img1);
    td3.innerHTML="title";
    td4.innerHTML="category";
    td5.innerHTML="1";
    td6.innerHTML="supplier";
    td7.innerHTML="1.00$";

    var tr=document.createElement("tr");
    
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);
    tr.appendChild(td7);

    table.appendChild(tr);

    makeEditableProduct(-1, tr);
}

