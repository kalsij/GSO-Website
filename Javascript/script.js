//Description button (40175335 <Julie Trinh>)
//-----------------------------------------------
var coll = document.getElementsByClassName("dropbtn");
var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function () {

        var content = this.nextElementSibling;
        if (content.style.display === "block") { //if it is displaying
            content.style.display = "none"; //does not display
        } else {
            content.style.display = "block"; //display the content
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
    total = total.toFixed(2);
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
    total = total.toFixed(2);
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
    total = total.toFixed(2);
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
function incrSteak() {
    var p = document.getElementById("steakamount");
    p.textContent = (parseInt(p.textContent, 10) + 1).toString();
    steak += 1
}
function decrSteak() {
    var p = document.getElementById("steakamount");
    var newAmt = parseInt(p.textContent, 10) - 1;
    if (newAmt > 0)
        p.textContent = (newAmt).toString();
}
function steakAdder() {
    var d = document.getElementById("steaktotal");
    var p = document.getElementById("steakamount");
    var newAmt = parseInt(p.textContent, 10);
    var total = (newAmt * 20.00);
    total = total.toFixed(2);
    d.innerHTML = "Thank you! This product has been added to your shopping cart. <br/> <strong> Total: </strong> $" + total.toString();
}

//CHICKEN PAGE (40173635 <Jasmit Kalsi>)
//-----------------------------------------------
var chicken = 1;
function incrChicken() {
    var p = document.getElementById("chickenamount");
    p.textContent = (parseInt(p.textContent, 10) + 1).toString();
    steak += 1
}
function decrChicken() {
    var p = document.getElementById("chickenamount");
    var newAmt = parseInt(p.textContent, 10) - 1;
    if (newAmt > 0)
        p.textContent = (newAmt).toString();
}
function chickenAdder() {
    var d = document.getElementById("chickentotal");
    var p = document.getElementById("chickenamount");
    var newAmt = parseInt(p.textContent, 10);
    var total = (newAmt * 12.50);
    total = total.toFixed(2);
    d.innerHTML = "Thank you! This product has been added to your shopping cart. <br/> <strong> Total: </strong> $" + total.toString();
}

//RACKOFLAMB PAGE (40173635 <Jasmit Kalsi>)
//-----------------------------------------------
var rackoflamb = 1;
function incrRackoflamb() {
    var p = document.getElementById("rackoflambamount");
    p.textContent = (parseInt(p.textContent, 10) + 1).toString();
    steak += 1
}
function decrRackoflamb() {
    var p = document.getElementById("rackoflambamount");
    var newAmt = parseInt(p.textContent, 10) - 1;
    if (newAmt > 0)
        p.textContent = (newAmt).toString();
}
function rackoflambAdder() {
    var d = document.getElementById("rackoflambtotal");
    var p = document.getElementById("rackoflambamount");
    var newAmt = parseInt(p.textContent, 10);
    var total = (newAmt * 55.00);
    total = total.toFixed(2);
    d.innerHTML = "Thank you! This product has been added to your shopping cart. <br/> <strong> Total: </strong> $" + total.toString();
}

//BACON PAGE (40173635 <Jasmit Kalsi>)
//-----------------------------------------------
var rackoflamb = 1;
function incrBacon() {
    var p = document.getElementById("baconamount");
    p.textContent = (parseInt(p.textContent, 10) + 1).toString();
    steak += 1
}
function decrBacon() {
    var p = document.getElementById("baconamount");
    var newAmt = parseInt(p.textContent, 10) - 1;
    if (newAmt > 0)
        p.textContent = (newAmt).toString();
}
function baconAdder() {
    var d = document.getElementById("bacontotal");
    var p = document.getElementById("baconamount");
    var newAmt = parseInt(p.textContent, 10);
    var total = (newAmt * 5.50);
    total = total.toFixed(2);
    d.innerHTML = "Thank you! This product has been added to your shopping cart. <br/> <strong> Total: </strong> $" + total.toString();
}

//TOMATO PAGE (40175335 <Julie Trinh>)
//-----------------------------------------------
var tomato = 1;

function incrementTomato() {

    tomato++;
    document.getElementById('quantity').innerHTML = tomato;
}

function decrementTomato() {

    if (tomato > 1) {
        tomato--;
    }
    document.getElementById('quantity').innerHTML = tomato;
}

function addTomatoCart() {
    var total = 0;
    total = tomato * 1.5;
    total = total.toFixed(2);
    document.getElementById("tomatoPrice").innerHTML = "<br />Item has been added to your shopping cart. Thank you!";
    document.getElementById("totalTomato").innerHTML = "<strong>Total: </strong>$" + total;
}

//LEMON PAGE (40175335 <Julie Trinh>)
//-----------------------------------------------

var lemon = 1;

function incrementLemon() {

    lemon++;
    document.getElementById('quantity').innerHTML = lemon;
}

function decrementLemon() {

    if (lemon > 1) {
        lemon--;
    }
    document.getElementById('quantity').innerHTML = lemon;
}

function addLemonCart() {
    var total = 0;
    total = lemon * 1;
    total = total.toFixed(2);
    document.getElementById("lemonPrice").innerHTML = "<br />Item has been added to your shopping cart. Thank you!";
    document.getElementById("totalLemon").innerHTML = "<strong>Total: </strong>$" + total;
}

//BLUEBERRIES PAGE (40175335 <Julie Trinh>)
//-----------------------------------------------

var berry = 1;

function incrementBerry() {

    berry++;
    document.getElementById('quantity').innerHTML = berry;
}

function decrementBerry() {

    if (berry > 1) {
        berry--;
    }
    document.getElementById('quantity').innerHTML = berry;
}

function addBerryCart() {
    var total = 0;
    total = berry * 5.5;
    total = total.toFixed(2);
    document.getElementById("berryPrice").innerHTML = "<br />Item has been added to your shopping cart. Thank you!";
    document.getElementById("totalBerry").innerHTML = "<strong>Total: </strong>$" + total;
}

//ORANGE PAGE (40175335 <Julie Trinh>)
//-----------------------------------------------

var orange = 1;

function incrementOrange() {

    orange++;
    document.getElementById('quantity').innerHTML = orange;
}

function decrementOrange() {

    if (orange > 1) {
        orange--;
    }
    document.getElementById('quantity').innerHTML = orange;
}

function addOrangeCart() {
    var total = 0;
    total = orange * 5.5;
    total = total.toFixed(2);
    document.getElementById("orangePrice").innerHTML = "<br />Item has been added to your shopping cart. Thank you!";
    document.getElementById("totalOrange").innerHTML = "<strong>Total: </strong>$" + total;
}

//SPAGHETTI PAGE (40175335 <Julie Trinh>)
//-----------------------------------------------

var spaghetti = 1;

function incrementSpaghetti() {

    spaghetti++;
    document.getElementById('quantity').innerHTML = spaghetti;
}

function decrementSpaghetti() {

    if (spaghetti > 1) {
        spaghetti--;
    }
    document.getElementById('quantity').innerHTML = spaghetti;
}

function addSpaghettiCart() {
    var total = 0;
    total = spaghetti * 1.66;
    total = total.toFixed(2);
    document.getElementById("spaghettiPrice").innerHTML = "<br />Item has been added to your shopping cart. Thank you!";
    document.getElementById("totalSpaghetti").innerHTML = "<strong>Total: </strong>$" + total;
}
// email checking frontpage (40177866 <fatema akther>)
//-----------------------------------------
function checkSub() {
    if (document.getElementById('emailSub').value.search(/^[0-9A-Za-z.]+\@[a-z]+\.[a-z]{3}$/) == 0)
        return true;
    else
        return false;
}
//bread aisle descriptions (40177866 <fatema akther>)
//------------pita-------------------------
var pita = 1;
function addPita() {
    pita++;
    document.getElementById('amountPita').innerHTML = pita;
}

function minusPita() {
    if (pita > 1) {
        pita--;
    }
    document.getElementById('amountPita').innerHTML = pita;
}

function addCartPita() {
    var total = pita * 3.5;
    total = total.toFixed(2);
    document.getElementById("pitatotal").innerHTML = "This item had been added to your cart.";
    document.getElementById("pitaprice").innerHTML = "<strong>Total: </strong>$" + total;
}
//------------ciabatta-------------------------
var ciabatta = 1;
function addCiabatta() {
    ciabatta++;
    document.getElementById('amountCiabatta').innerHTML = ciabatta;
}

function minusCiabatta() {
    if (ciabatta > 1) {
        ciabatta--;
    }
    document.getElementById('amountCiabatta').innerHTML = ciabatta;
}

function addCartCiabatta() {
    var total = ciabatta * 5.5;
    total = total.toFixed(2);
    document.getElementById("ciabattaTotal").innerHTML = "This item had been added to your cart.";
    document.getElementById("ciabattaPrice").innerHTML = "<strong>Total: </strong>$" + total;
}
//------------brown bread------------------------
var BB = 1;
function addBB() {
    BB++;
    document.getElementById('amountBB').innerHTML = BB;
}

function minusBB() {
    if (BB > 1) {
        BB--;
    }
    document.getElementById('amountBB').innerHTML = BB;
}

function addCartBB() {
    var total = BB * 5.0;
    total = total.toFixed(2);
    document.getElementById("totalBB").innerHTML = "This item had been added to your cart.";
    document.getElementById("priceBB").innerHTML = "<strong>Total: </strong>$" + total;
}
//------------white bread------------------------
var WB = 1;
function addWB() {
    WB++;
    document.getElementById('amountWB').innerHTML = WB;
}

function minusWB() {
    if (WB > 1) {
        WB--;
    }
    document.getElementById('amountWB').innerHTML = WB;
}

function addCartWB() {
    var total = WB * 4.5;
    total = total.toFixed(2);
    document.getElementById("totalWB").innerHTML = "This item had been added to your cart.";
    document.getElementById("priceWB").innerHTML = "<strong>Total: </strong>$" + total;
}
//---------description show---------------
function showBread() {
    var x = document.getElementById('contentbread');
    if (x.style.display == 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
//------user delete------
function deleteUser(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}
//--------end for (Fatema )-----------------------

// description pages for the drinks category

//REDBULL PAGE     40175034 <Georgia Pitic>
//-----------------------------------------
var redbull;
function incrementRedbull() {
    redbull = parseInt(document.getElementById("numOfRedbull").innerHTML);
    document.getElementById("numOfRedbull").innerHTML = redbull + 1;
    redbull = redbull + 1;
}
function decrementRedbull() {
    redbull = parseInt(document.getElementById("numOfRedbull").innerHTML);
    if (redbull > 0) {
        document.getElementById("numOfRedbull").innerHTML = --redbull;
    }
}
function showRedbullDescription() {
    redbull = parseInt(document.getElementById("numOfRedbull").innerHTML);
    redbullDesc = document.getElementById("redbullDescription").style;
    if (redbullDesc.visibility == "visible")
        redbullDesc.visibility = "hidden";
    else
        redbullDesc.visibility = "visible";
}
function addRedbullToCart() {
    redbull = parseInt(document.getElementById("numOfRedbull").innerHTML);
    var redbullString = "This item has been added to your shopping cart. Thank you for shopping at GSO!";
    var totalRedBull = "<b>Total:</b> " + "$" + redbull * 1.99;
    document.getElementById("addedRedBull").innerHTML = redbullString;
    document.getElementById("totalRedBull").innerHTML = totalRedBull;
}


// WATER PAGE      40175034 <Georgia Pitic>
//-----------------------------------------
var water;
function incrementWater() {
    water = parseInt(document.getElementById("numOfWater").innerHTML);
    document.getElementById("numOfWater").innerHTML = water + 1;
    water = water + 1;
}
function decrementWater() {
    water = parseInt(document.getElementById("numOfWater").innerHTML);
    if (water > 0) {
        document.getElementById("numOfWater").innerHTML = water - 1;
        water = water - 1;
    }
}
function showWaterDescription() {
    water = parseInt(document.getElementById("numOfWater").innerHTML);
    waterDesc = document.getElementById("waterDescription").style;
    if (waterDesc.visibility == "visible")
        waterDesc.visibility = "hidden";
    else
        waterDesc.visibility = "visible";
}
function addWaterToCart() {
    water = parseInt(document.getElementById("numOfWater").innerHTML);
    var waterString = "This item has been added to your shopping cart. Thank you for shopping at GSO!";
    var totalWater = "<b>Total:</b> " + "$" + water * 1.25;
    document.getElementById("addedWater").innerHTML = waterString;
    document.getElementById("totalWater").innerHTML = totalWater;
}


// COCA-COLA PAGE  40175034 <Georgia Pitic>
//-----------------------------------------
var cola;
function incrementCola() {
    cola = parseInt(document.getElementById("numOfCola").innerHTML);
    document.getElementById("numOfCola").innerHTML = cola + 1;
    cola = cola + 1;
}
function decrementCola() {
    cola = parseInt(document.getElementById("numOfCola").innerHTML);
    if (cola > 0) {
        document.getElementById("numOfCola").innerHTML = cola - 1;
        cola = cola - 1;
    }
}
function showColaDescription() {
    cola = parseInt(document.getElementById("numOfCola").innerHTML);
    colaDesc = document.getElementById("colaDescription").style;
    if (colaDesc.visibility == "visible")
        colaDesc.visibility = "hidden";
    else
        colaDesc.visibility = "visible";
}
function addColaToCart() {
    cola = parseInt(document.getElementById("numOfCola").innerHTML);
    var colaString = "This item has been added to your shopping cart. Thank you for shopping at GSO!";
    var totalCola = "<b>Total:</b> " + "$" + cola * 1.74;
    document.getElementById("addedCola").innerHTML = colaString;
    document.getElementById("totalCola").innerHTML = totalCola;
}


// PENNE PAGE  40176279 <Alice Chen>
//-----------------------------------------
var penne;

function incrementPenne() {
    penne = parseInt(document.getElementById("quantityPenne").innerText);
    penne += 1;
    document.getElementById("quantityPenne").innerText = penne;
}

function decrementPenne() {
    penne = parseInt(document.getElementById("quantityPenne").innerText);

    if (penne != '0') {
        penne -= 1;
        document.getElementById("quantityPenne").innerText = penne;
    }
}

function addPenneCart() {
    penne = parseInt(document.getElementById("quantityPenne").innerText);

    if (penne != '0') {
        document.getElementById("PennePrice").innerText = "This item has been added to your shopping cart. Thank you for shopping at GSO!";
        document.getElementById("totalPenne").innerHTML = "<b>Total:</b> " + "$" + (penne * 1.66).toFixed(2);
    }
    else if (document.getElementById("totalPenne") != 0) {
        document.getElementById("PennePrice").innerText = "";
        document.getElementById("totalPenne").innerHTML = "";
    }
}


// MACARONI PAGE  40176279 <Alice Chen>
//-----------------------------------------
var macaroni;

function incrementMacaroni() {
    macaroni = parseInt(document.getElementById("quantityMacaroni").innerText);
    macaroni += 1;
    document.getElementById("quantityMacaroni").innerText = macaroni;
}

function decrementMacaroni() {
    macaroni = parseInt(document.getElementById("quantityMacaroni").innerText);

    if (macaroni != '0') {
        macaroni -= 1;
        document.getElementById("quantityMacaroni").innerText = macaroni;
    }
}

function addMacaroniCart() {
    macaroni = parseInt(document.getElementById("quantityMacaroni").innerText);

    if (macaroni != '0') {
        document.getElementById("MacaroniPrice").innerText = "This item has been added to your shopping cart. Thank you for shopping at GSO!";
        document.getElementById("totalMacaroni").innerHTML = "<b>Total:</b> " + "$" + (macaroni * 1.66).toFixed(2);
    }
    else if (document.getElementById("totalMacaroni") != '0') {
        document.getElementById("MacaroniPrice").innerText = "";
        document.getElementById("totalMacaroni").innerHTML = "";
    }
}


// BUTTER PAGE  40176279 <Alice Chen>
//-----------------------------------------
var butter;

function incrementButter() {
    butter = parseInt(document.getElementById("quantityButter").innerText);
    butter += 1;
    document.getElementById("quantityButter").innerText = butter;
}

function decrementButter() {
    butter = parseInt(document.getElementById("quantityButter").innerText);

    if (butter != '0') {
        butter -= 1;
        document.getElementById("quantityButter").innerText = butter;
    }
}

function addButterCart() {
    butter = parseInt(document.getElementById("quantityButter").innerText);

    if (butter != '0') {
        document.getElementById("ButterPrice").innerText = "This item has been added to your shopping cart. Thank you for shopping at GSO!";
        document.getElementById("totalButter").innerHTML = "<b>Total:</b> " + "$" + (butter * 2.50).toFixed(2);
    }
    else if (document.getElementById("totalButter") != '0') {
        document.getElementById("ButterPrice").innerText = "";
        document.getElementById("totalButter").innerHTML = "";
    }
}
