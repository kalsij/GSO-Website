function save()
{
    var title= document.getElementById("title").value;
    var supplier= document.getElementById("supplier").value;
    var quantity= document.getElementById("quantity").value;
    var price= document.getElementById("price").value;
    var unit= document.getElementById("unit").value;
    var file = document.getElementById("picture");
    var description= document.getElementById("formGroupExampleInput").value;

    var p1=document.getElementById("fruits");
    var p2=document.getElementById("dairy");
    var p3=document.getElementById("meats");
    var p4=document.getElementById("bread");
    var p5=document.getElementById("drinks");
    var p6=document.getElementById("pasta");

    var incorrect = document.getElementById('correctionInfo');

    if(title==""){
        incorrect.innerHTML = "*Please enter title*";
        incorrect.style.color = "red";
        // window.alert("Please enter title!")
    } else if(supplier==""){
        incorrect.innerHTML = "*Please enter supplier*";
        incorrect.style.color = "red";
        //window.alert("Please enter Supplier!")
    } else if(quantity==""){
        incorrect.innerHTML = "*Please enter quantity*";
        incorrect.style.color = "red";
        //window.alert("Please enter Quantity!")
    } else if(unit==""){
        incorrect.innerHTML = "*Please enter unit*";
        incorrect.style.color = "red";
        //window.alert("Please enter Unit Size!")
    }else if(price==""){
        incorrect.innerHTML = "*Please enter price*";
        incorrect.style.color = "red";
        //window.alert("Please enter Price!")
    } else if(description==""){
        incorrect.innerHTML = "*Please enter description*";
        incorrect.style.color = "red";
        //window.alert("Please enter Description!")
    } else if(file.files.length==0){
        incorrect.innerHTML = "*Please select an image*";
        incorrect.style.color = "red";
        //window.alert("Please select image.")
    } else if(!(p1.checked) && !(p2.checked) && !(p3.checked) && !(p4.checked) && !(p5.checked) && !(p6.checked)){
        incorrect.innerHTML = "*Please choose a category*";
        incorrect.style.color = "red";
        //window.alert("Choose a category!")
    } else if(title.search(/^[a-zA-z]+/)) {
        incorrect.innerHTML = "*Title mismatch*";
        incorrect.style.color = "red";
        //window.alert("Title mismatch!")
    }else if(supplier.search(/^[a-zA-z]+/)) {
        incorrect.innerHTML = "*Supplier mismatch*";
        incorrect.style.color = "red";
        //window.alert("Supplier mismatch!")
    }else if(quantity.search(/^\d+/)) {
        incorrect.innerHTML = "*Quantity mismatch*";
        incorrect.style.color = "red";
        //window.alert("Quantity mismatch!")
    }else if(price.search(/^\d+\.\d\d/)) {
        incorrect.innerHTML = "*Price mismatch*";
        incorrect.style.color = "red";
        //window.alert("Price mismatch!")
    } else{
        incorrect.innerHTML = "*Product ready to be saved*";
        incorrect.style.color = "green";
        var save= document.getElementById("saveInfo");
        save.style.visibility="visible";

        // var validate= document.getElementById("validateInfo");
        // validate.style.visibility="hidden";

        // var validate= document.getElementById("validateInfo");
        // save.style.visibility="hidden";
    }
}

function resetForm()
{
    var answer= confirm("Are you sure? Your information will not be saved.");
    if(answer){
        document.getElementById("myform").reset();
        var incorrect = document.getElementById('correctionInfo');
        incorrect.innerHTML = "";
    } 
}
