//Description button 
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
