//Validate information entered in order to submit/save
function checkEditOrderFields() 
{     
    //Retrieve the infomation entered in Customer Contact & Shipping Address sections
    var fName = document.getElementById("fullName").value;
    var Email = document.getElementById("email").value;   
    var prodName = document.getElementById("orderProducts").value;

    //validation information
    var validName = /[a-zA-Z\-\_\w]+\s[a-zA-Z\-\_\w]+/;
    var validEmail = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z]+)\.([a-zA-Z]){2,8}$/;
    var validProducts = /^\d+\-[a-zA-Z\s]+\|\d+\-[a-zA-Z\s]+/;

    //validation information 
    var validQtyItems = /^\d+$/;
    var validPrice = /^\$\d+\.\d+/;

    //Retrieve the infomation entered in Summary section
    var quantityItems = document.getElementById("qtyItemsSummary").value;
    var Subtotal = document.getElementById("SubtotalSummary").value;
    var GST = document.getElementById("GSTSummary").value;
    var QST = document.getElementById("QSTSummary").value;
    var Total = document.getElementById("TotalSummary").value;

    //Retrieve the infomation entered in Income section
    var Income = document.getElementById("income").value;  

	// Check valid information for Customer Contact & Shipping Address sections
    if (fName == "" || Email == "" || prodName == "")
    {
        alert("One/Some of the field(s) is/are empty.\n" + "Please make sure to fill all cases in the Customer Contact section.");
        return false;
    }
    else if(fName.search(validName)) 
    {
        alert("Full Name entered is incorrect. Please re-enter a valid full name. (example: Gso)");
        return false;
    }

    else if (Email.search(validEmail)) 
    {
        alert("Email entered is incorrect. Please re-enter a valid email address. (example: gso@example.ca)");
        return false;
    }
    else if(prodName.search(validProducts)) 
    {
        alert("Product Name entered is incorrect. Please re-enter a valid item. (example: 1-apple|3-yogurt)");
        return false;
    }
    
    // Check valid information for Summary section
    else if (quantityItems == "" || Subtotal == "" || GST == "" || QST == "" || Total == "")
    {
        alert("One/Some of the field(s) is/are empty.\n" + "Please make sure to fill all cases in the Summary section.");
        return false;
    }
    else if(quantityItems.search(validQtyItems)) {
        alert("Quantity entered is incorrect. Please re-enter a valid quantity. (example: 1)");
        return false;
    }
    else if(Subtotal.search(validPrice)) {
        alert("Subototal entered is incorrect. Please re-enter a valid subtotal. (example: 1.23$)");
        return false;
    }
    else if (GST.search(validPrice)) {
        alert("GST is incorrect. Please re-enter a valid GST. (example: 1.23$)");
        return false;
    }
    else if(QST.search(validPrice)) {
        alert("QST is incorrect. Please re-enter a valid QST. (example: 1.23$)");
        return false;
    }
    else if (Total.search(validPrice)) {
        alert("Total entered is incorrect. Please re-enter a valid total. (example: 1.23$)");
        return false;
    }
    else if (Income.search(validPrice)) {
        alert("Income entered is incorrect. Please re-enter a valid income. (example: 1.23$)");
        return false;
    }
    else {
        alert("The order edits are saved and it's added to the order list!");  
        window.location.replace("../php/BackstoreOrderList.php");
    }
}

//Reset the Edit Order Profile 
function resetEditOrder()
{
    toReset= confirm("Cancelling edits. Please confirm.");
    if( toReset == true ){
        // document.getElementById("formOrderEdit").reset();
        // window.location.href="../php/BackstoreOrderList.php";
        window.location.replace("BackstoreOrderList.php"); 
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

