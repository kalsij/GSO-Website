//Validate information entered in order to submit/save
function checkEditOrderFields() 
{     
    //Retrieve the infomation entered in Customer Contact & Shipping Address sections
    var fName = document.getElementById("firstName").value;
    var LName = document.getElementById("lastName").value;
    var Email = document.getElementById("email").value;
    var Adr = document.getElementById("address").value;
    var PosCo = document.getElementById("postalCode").value;
    var City = document.getElementById("city").value;

    //validation information
    var validName = /[a-zA-Z]+/;
    var validEmail = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z]+)\.([a-zA-Z]){2,8}$/;
    var validAdr = /\d+[a-zA-Z\s]+/;
    var validPosCo = /^[a-zA-Z]\d[a-zA-Z]\s\d[a-zA-Z]\d$/;
  
    //Retrieve the infomation entered in Products section
    var prodName = document.getElementById("productName").value;
    var prodQty = document.getElementById("quantity").value;
    var prodPriceUnit = document.getElementById("priceUnit").value;
    var prodTotal = document.getElementById("total").value;

    //validation information 
    var validPriceUnit = /\d+\.\d+/;

    //Retrieve the infomation entered in Summary section
    var quantityItems = document.getElementById("qtyItemsSummary").value;
    var Subtotal = document.getElementById("SubtotalSummary").value;
    var GST = document.getElementById("GSTSummary").value;
    var QST = document.getElementById("QSTSummary").value;
    var Total = document.getElementById("TotalSummary").value;

    //validation information 
    var Completedbox = document.getElementById("Completed");
    var Pendingbox = document.getElementById("Pending");
    var Cancelledbox = document.getElementById("Cancelled");
    var validQtyItems = /^\d+$/;
    var validPrice = /\d+\.\d+/;

    //Retrieve the infomation entered in Income section
    var Income = document.getElementById("income").value;  

	// Check valid information for Customer Contact & Shipping Address sections
    if (fName == "" || LName == "" || Email == "" || Adr == "" || PosCo == "" || City == "")
    {
        alert("One/Some of the field(s) is/are empty.\n" + "Please make sure to fill all cases in the Customer Contact & Shipping Address sections.");
    }
    else if(fName.search(validName)) 
    {
        alert("First Name entered is incorrect. Please re-enter a valid first name. (example: Gso)");
    }
    else if(LName.search(validName)) 
    {
        alert("Last Name entered is incorrect. Please re-enter a valid last name. (example: Gso)");
    }
    else if (Email.search(validEmail)) 
    {
        alert("Email entered is incorrect. Please re-enter a valid email address. (example: gso@example.ca)");
    }
    else if(Adr.search(validAdr)) 
    {
        alert("Address entered is incorrect. Please re-enter a valid address. (example: 123 gso street)");
    }
    else if (PosCo.search(validPosCo)) 
    {
        alert("Postal Code entered is incorrect. Please re-enter a valid postal code. (example: G1S 2O3)");
    }
    else if(City.search(validName)) 
    {
        alert("City entered is incorrect. Please re-enter a valid city. (example: gso)");
    }

    // Check valid information for Products section
    else if (prodName == "" || prodName == null || prodQty == "" || prodQty == null || prodPriceUnit == "" || prodPriceUnit == null || prodTotal == "" || prodTotal == null)
    {
        alert("One/Some of the field(s) is/are empty.\n" + "Please make sure to fill all cases in the Products section.");
    }
    else if(prodName.search(validName)) 
    {
        alert("Product Name entered is incorrect. Please re-enter a valid item. (example: kiwi)");
    }
    else if(prodQty.search(validQtyItems)) 
    {
        alert("Product Quantity entered is incorrect. Please re-enter a valid quantity. (example: 1)");
    }
    else if (prodPriceUnit.search(validPriceUnit)) 
    {
        alert("Product Price/Unit is incorrect. Please re-enter a valid GST. (example: 1.23/10)");
    }
    else if(prodTotal.search(validPrice)) 
    {
        alert("Product total price is incorrect. Please re-enter a valid price. (example: 1.23$)");
    }
    
    // Check valid information for Summary section
    else if (quantityItems == "" || Subtotal == "" || GST == "" || QST == "" || Total == "")
    {
        alert("One/Some of the field(s) is/are empty.\n" + "Please make sure to fill all cases in the Summary section.");
    }
    else if(quantityItems.search(validQtyItems)) {
        alert("Quantity entered is incorrect. Please re-enter a valid quantity. (example: 1)")
    }
    else if(Subtotal.search(validPrice)) {
        alert("Subototal entered is incorrect. Please re-enter a valid subtotal. (example: 1.23$)")
    }
    else if (GST.search(validPrice)) {
        alert("GST is incorrect. Please re-enter a valid GST. (example: 1.23$)")
    }
    else if(QST.search(validPrice)) {
        alert("QST is incorrect. Please re-enter a valid QST. (example: 1.23$)")
    }
    else if (Total.search(validPrice)) {
        alert("Total entered is incorrect. Please re-enter a valid total. (example: 1.23$)")
    }
    else if(!(Completedbox.checked) && !(Pendingbox.checked) && !(Cancelledbox.checked)) {
        alert("Payment Status is not selected. Please choose the status by clicking on one the the status.")
    }
    else if (Income.search(validPrice)) {
        alert("Income entered is incorrect. Please re-enter a valid income. (example: 1.23$)")
    }
    else {
        alert("The order edits are saved and it's added to the order list!");  
        window.location.replace("BackstoreOrderList.html");
    }
}

//Reset the Edit Order Profile 
function resetEditOrder()
{
    var toReset= confirm("Please click OK to confirm reset.");
    if(toReset){
        document.getElementById("formOrderEdit").reset();
        window.location.replace("BackstoreEditOrderProfile.html")
    } 
}

//Remove items in order
function deleteItem(target) {
    var toDel = target.parentNode.parentNode;
    console.log(toDel);
    toDel.parentNode.removeChild(toDel);
            
}

//Remove extra items 
function deleteItem2(target) {
    var toDel = target.parentNode;
    console.log(toDel);
    toDel.parentNode.removeChild(toDel);
            
    }

//Add items
function addItem()
{   
    var nameDetails=" ";
    var price=" ";
    var quantity=" ";
    var totalAmount=" ";
    var img=" ";

    var table=document.getElementById("tableItem0");
    
    var td1=document.createElement("td");
    var td2=document.createElement("td");
    var td3=document.createElement("td");
    var td4=document.createElement("td");
    var td5=document.createElement("td");
    var td6=document.createElement("td");    

    var productImg= document.createElement("img");
    productImg.setAttribute("src", "Media/"+img);
    productImg.setAttribute("width", 45);
    productImg.setAttribute("height", 40);

    var delBtn= document.createElement("button");
    delBtn.setAttribute("type", "button");
    delBtn.setAttribute("Onclick", "deleteItem2(this)");
    delBtn.setAttribute("class", "btn btn-danger");

    var imgDelete= document.createElement("img");
    imgDelete.setAttribute("src", "Media/TrashCan(Flaticon).png");
    imgDelete.setAttribute("width", 14);
    imgDelete.setAttribute("height", 15); 
    delBtn.appendChild(imgDelete);

    td1.appendChild(productImg);
    td2.innerHTML=nameDetails;
    td3.innerHTML=quantity;
    td4.innerHTML=price;
    td5.innerHTML=totalAmount;
    td6=delBtn;

    var tr=document.createElement("tr");
    
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);

    table.appendChild(tr);
    
    addProductInfo(tr);
}

// Add information of product 
function addProductInfo(addInfoproduct) {
    
    for(var y=0;y<addInfoproduct.cells.length;y++) {
        var element = addInfoproduct.cells[y];
        
        if (element.firstChild.nodeName == "IMG")
        {
            element.innerHTML = '<input type="file" id="imageFile"  style="width:auto; height:auto;" class="form-control-file"></input>';
        }
            else {
            element.innerHTML = '<input type="text" style="width:auto; height:auto; border: 1px solid lightgray;">';
        }
    }
}

