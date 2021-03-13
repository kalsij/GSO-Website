//Description button (40175335 <Julie Trinh>)
//-----------------------------------------------
var coll = document.getElementsByClassName("dropbtn");
var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }
    });
}

//MILK PAGE (40170728 <Dzmitry Fiodarau>)
//-----------------------------------------------
var nbrMilk = 1;

function getNbrMilk() {
    return nbrMilk;
}

function setNbrMilk(someNbr) {
    nbrMilk = someNbr;
}

function incrementNbrMilk() {
    var nbr = getNbrMilk();
    var nb = document.getElementById("nb");
    setNbrMilk(nbr + 1);
    nb.textContent = getNbrMilk().toString();
}

function decrementNbrMilk() {
    var nbr = getNbrMilk();
    var nb = document.getElementById("nb");
    if (nbr > 1)
        setNbrMilk(nbr - 1);
    nb.textContent = getNbrMilk().toString();
}

function milkAddToCart() {
    var aSum = document.getElementById("aSummary");
    aSum.innerHTML = "";
    var total = getNbrMilk() * 4.00;
    var text = document.createElement("p");
    text.innerHTML = `The product has been added to your shopping cart.<br /><div style='font-weight: bold; display: inline;'>Total: </div>${total}$`;
    aSum.appendChild(text);
}

function milkDescrip() {
    var aDescrip = document.getElementById("aDescrip");
    if (aDescrip.textContent == "") {
        var descrip = document.createElement("p");
        descrip.textContent = "Fresh milk delivered directly from the local farms where cows are treated with respect and are fed with hormone-free food.";
        aDescrip.appendChild(descrip);
    }
    else {
        aDescrip.innerHTML = "";
    }
}

//YOGURT PAGE (40170728 <Dzmitry Fiodarau>)
//-----------------------------------------------
var nbrYog = 1;

function getNbrYog() {
    return nbrYog;
}

function setNbrYog(someNbr) {
    nbrYog = someNbr;
}

function incrementNbrYog() {
    var nbr = getNbrYog();
    var nb = document.getElementById("nb");
    setNbrYog(nbr + 1);
    nb.textContent = getNbrYog().toString();
}

function decrementNbrYog() {
    var nbr = getNbrYog();
    var nb = document.getElementById("nb");
    if (nbr > 1)
        setNbrYog(nbr - 1);
    nb.textContent = getNbrYog().toString();
}

function yogAddToCart() {
    var aSum = document.getElementById("aSummary");
    aSum.innerHTML = "";
    var total = getNbrYog() * 5.00;
    var text = document.createElement("p");
    text.innerHTML = `The product has been added to your shopping cart.<br /><div style='font-weight: bold; display: inline;'>Total: </div>${total}$`;
    aSum.appendChild(text);
}

function yogDescrip() {
    var aDescrip = document.getElementById("aDescrip");
    if (aDescrip.textContent == "") {
        var descrip = document.createElement("p");
        descrip.textContent = "Natural yogurt made with locally produced milk. It is a healthy option for your breakfast that would allow you to start your day the best way.";
        aDescrip.appendChild(descrip);
    }
    else {
        aDescrip.innerHTML = "";
    }
}

//CHEESE PAGE (40170728 <Dzmitry Fiodarau>)
//-----------------------------------------------
var nbrCheese = 1;

function getNbrCheese() {
    return nbrCheese;
}

function setNbrCheese(someNbr) {
    nbrCheese = someNbr;
}

function incrementNbrCheese() {
    var nbr = getNbrCheese();
    var nb = document.getElementById("nb");
    setNbrCheese(nbr + 1);
    nb.textContent = getNbrCheese().toString();
}

function decrementNbrCheese() {
    var nbr = getNbrCheese();
    var nb = document.getElementById("nb");
    if (nbr > 1)
        setNbrCheese(nbr - 1);
    nb.textContent = getNbrCheese().toString();
}

function cheeseAddToCart() {
    var aSum = document.getElementById("aSummary");
    aSum.innerHTML = "";
    var total = getNbrCheese() * 10.50;
    var text = document.createElement("p");
    text.innerHTML = `The product has been added to your shopping cart.<br /><div style='font-weight: bold; display: inline;'>Total: </div>${total}$`;
    aSum.appendChild(text);
}

function cheeseDescrip() {
    var aDescrip = document.getElementById("aDescrip");
    if (aDescrip.textContent == "") {
        var descrip = document.createElement("p");
        descrip.textContent = "Local cheese of the greatest quality. It is perfect to accompany a glass of white wine whether it is for a big reception or for a romantic dinner.";
        aDescrip.appendChild(descrip);
    }
    else {
        aDescrip.innerHTML = "";
    }
}
//STEAK PAGE (40173635 <Jasmit Kalsi>)
//-----------------------------------------------
var steak = 1;
function incrSteak(){
    var p = document.getElementById("steakamount");
    p.textContent = (parseInt(p.textContent, 10)+1).toString();
    steak+=1
}
function decrSteak(){
    var p = document.getElementById("steakamount");
    var newAmt = parseInt(p.textContent, 10)-1;
    if(newAmt > 0)
  p.textContent = (newAmt).toString();
}
function steakAdder(){
    var d = document.getElementById("steaktotal");
    var p = document.getElementById("steakamount");
    var newAmt = parseInt(p.textContent, 10);
    var total = (newAmt*20.00);
    d.innerHTML =  "Thank you! This product has been added to your shopping cart. <br/> <strong> Total: </strong> $" + total.toString();
}

//CHICKEN PAGE (40173635 <Jasmit Kalsi>)
//-----------------------------------------------
var chicken = 1;
function incrChicken(){
    var p = document.getElementById("chickenamount");
    p.textContent = (parseInt(p.textContent, 10)+1).toString();
    steak+=1
}
function decrChicken(){
    var p = document.getElementById("chickenamount");
    var newAmt = parseInt(p.textContent, 10)-1;
    if(newAmt > 0)
  p.textContent = (newAmt).toString();
}
function chickenAdder(){
    var d = document.getElementById("chickentotal");
    var p = document.getElementById("chickenamount");
    var newAmt = parseInt(p.textContent, 10);
    var total = (newAmt*12.50);
    d.innerHTML =  "Thank you! This product has been added to your shopping cart. <br/> <strong> Total: </strong> $" + total.toString();
}

//RACKOFLAMB PAGE (40173635 <Jasmit Kalsi>)
//-----------------------------------------------
var rackoflamb = 1;
function incrRackoflamb(){
    var p = document.getElementById("rackoflambamount");
    p.textContent = (parseInt(p.textContent, 10)+1).toString();
    steak+=1
}
function decrRackoflamb(){
    var p = document.getElementById("rackoflambamount");
    var newAmt = parseInt(p.textContent, 10)-1;
    if(newAmt > 0)
  p.textContent = (newAmt).toString();
}
function rackoflambAdder(){
    var d = document.getElementById("rackoflambtotal");
    var p = document.getElementById("rackoflambamount");
    var newAmt = parseInt(p.textContent, 10);
    var total = (newAmt*55.00);
    d.innerHTML =  "Thank you! This product has been added to your shopping cart. <br/> <strong> Total: </strong> $" + total.toString();
}

//BACON PAGE (40173635 <Jasmit Kalsi>)
//-----------------------------------------------
var rackoflamb = 1;
function incrBacon(){
    var p = document.getElementById("baconamount");
    p.textContent = (parseInt(p.textContent, 10)+1).toString();
    steak+=1
}
function decrBacon(){
    var p = document.getElementById("baconamount");
    var newAmt = parseInt(p.textContent, 10)-1;
    if(newAmt > 0)
  p.textContent = (newAmt).toString();
}
function baconAdder(){
    var d = document.getElementById("bacontotal");
    var p = document.getElementById("baconamount");
    var newAmt = parseInt(p.textContent, 10);
    var total = (newAmt*5.50);
    d.innerHTML =  "Thank you! This product has been added to your shopping cart. <br/> <strong> Total: </strong> $" + total.toString();
}

//TOMATO PAGE (40175335 <Julie Trinh>)
//-----------------------------------------------
var tomato = 1;

function incrementTomato() {
    
    tomato++;
    document.getElementById('quantity').innerHTML = tomato;
}

function decrementTomato(){

    if(tomato>1){
        tomato--;
    }
        document.getElementById('quantity').innerHTML = tomato;
}

function addTomatoCart(){
    var total = 0;
    total = tomato*1.5;
    total = total.toFixed(2);
    document.getElementById("tomatoPrice").innerHTML = "<br />Item has been added to your shopping cart. Thank you!";
    document.getElementById("totalTomato").innerHTML = "<strong>Total: </strong>$"+ total ;
}

//LEMON PAGE (40175335 <Julie Trinh>)
//-----------------------------------------------

var lemon = 1;

function incrementLemon() {
    
    lemon++;
    document.getElementById('quantity').innerHTML = lemon;
}

function decrementLemon(){

    if(lemon>1){
        lemon--;
    }
        document.getElementById('quantity').innerHTML = lemon;
}

function addLemonCart(){
    var total = 0;
    total = lemon*1;
    total = total.toFixed(2);
    document.getElementById("lemonPrice").innerHTML = "<br />Item has been added to your shopping cart. Thank you!";
    document.getElementById("totalLemon").innerHTML = "<strong>Total: </strong>$"+ total ;
}

//BLUEBERRIES PAGE (40175335 <Julie Trinh>)
//-----------------------------------------------

var berry = 1;

function incrementBerry() {
    
    berry++;
    document.getElementById('quantity').innerHTML = berry;
}

function decrementBerry(){

    if(berry>1){
        berry--;
    }
        document.getElementById('quantity').innerHTML = berry;
}

function addBerryCart(){
    var total = 0;
    total = berry*5.5;
    total = total.toFixed(2);
    document.getElementById("berryPrice").innerHTML = "<br />Item has been added to your shopping cart. Thank you!";
    document.getElementById("totalBerry").innerHTML = "<strong>Total: </strong>$"+ total ;
}

//ORANGE PAGE (40175335 <Julie Trinh>)
//-----------------------------------------------

var orange = 1;

function incrementOrange() {
    
    orange++;
    document.getElementById('quantity').innerHTML = orange;
}

function decrementOrange(){

    if(orange>1){
        orange--;
    }
        document.getElementById('quantity').innerHTML = orange;
}

function addOrangeCart(){
    var total = 0;
    total = orange*5.5;
    total = total.toFixed(2);
    document.getElementById("orangePrice").innerHTML = "<br />Item has been added to your shopping cart. Thank you!";
    document.getElementById("totalOrange").innerHTML = "<strong>Total: </strong>$"+ total ;
}
