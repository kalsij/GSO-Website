function seePassword() {
    var pass1 = document.getElementById("password1");
    var pass2 = document.getElementById("password2");
    if (pass1.type == "password") {
        pass1.type = "text";
        pass2.type = "text";
    }
    else if (pass1.type == "text") {
        pass1.type = "password";
        pass2.type = "password";
    }
}

function verif() {
    var prob = false;

    //identifying all necessary variables for verification
    var fName = document.getElementById("firstName");
    var lName = document.getElementById("lastName");
    var male = document.getElementById("male");
    var female = document.getElementById("female");
    var post = document.getElementById("postalCode");
    var email1 = document.getElementById("email1");
    var email2 = document.getElementById("email2");
    var pass1 = document.getElementById("password1");
    var pass2 = document.getElementById("password2");
    var cond = document.getElementById("conditions");
    var nodeAnnounce = document.getElementById("aAnnounce");
    var nodeFN = document.getElementById("aFName");
    var nodeLN = document.getElementById("aLName");
    var nodeG = document.getElementById("aGender");
    var nodePC = document.getElementById("aPost");
    var nodeE1 = document.getElementById("aEmail1");
    var nodeE2 = document.getElementById("aEmail2");
    var nodeP1 = document.getElementById("aPass1");
    var nodeP2 = document.getElementById("aPass2");
    var nodeCond = document.getElementById("aCond");
    var nodeS = document.getElementById("aSubmitted");

    //clearing the areas where tags will be inserted
    nodeAnnounce.innerHTML = "";
    nodeFN.innerHTML = "";
    nodeLN.innerHTML = "";
    nodeG.innerHTML = "";
    nodePC.innerHTML = "";
    nodeE1.innerHTML = "";
    nodeE2.innerHTML = "";
    nodeP1.innerHTML = "";
    nodeP2.innerHTML = "";
    nodeCond.innerHTML = "";
    nodeS.innerHTML = "";

    //first name verif
    if (fName.value.search(/^[A-Za-z]+$/) == -1) {
        var elem1 = document.createElement("p");
        elem1.style.color = "red";
        elem1.style.display = "inline";
        elem1.textContent = "*";
        nodeFN.appendChild(elem1);
        prob = true;
    }

    //last name verif
    if (lName.value.search(/^[A-Za-z]+$/) == -1) {
        var elem2 = document.createElement("p");
        elem2.style.color = "red";
        elem2.style.display = "inline";
        elem2.textContent = "*";
        nodeLN.appendChild(elem2);
        prob = true;
    }

    //gender verif
    if (!male.checked && !female.checked) {
        var elem9 = document.createElement("p");
        elem9.style.color = "red";
        elem9.style.display = "inline";
        elem9.textContent = "*";
        nodeG.appendChild(elem9);
        prob = true;
    }

    //postal code verif
    if (post.value.search(/^[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]\d$/) == -1) {
        var elem3 = document.createElement("p");
        elem3.style.color = "red";
        elem3.style.display = "inline";
        elem3.textContent = "*";
        nodePC.appendChild(elem3);
        prob = true;
    }

    //email1 verif
    if (email1.value.search(/^[0-9A-Za-z.]+\@[a-z]+\.[a-z]{2,3}$/) == -1) {
        var elem4 = document.createElement("p");
        elem4.style.color = "red";
        elem4.style.display = "inline";
        elem4.textContent = "*";
        nodeE1.appendChild(elem4);
        prob = true;
    }

    //email2 verif
    if (email2.value !== email1.value || email2.value.search(/^[0-9A-Za-z.]+\@[a-z]+\.[a-z]{2,3}$/) == -1) {
        var elem5 = document.createElement("p");
        elem5.style.color = "red";
        elem5.style.display = "inline";
        elem5.textContent = "*";
        nodeE2.appendChild(elem5);
        prob = true;
    }

    //password1 verif
    if (pass1.value.length < 8) {
        var elem6 = document.createElement("p");
        elem6.style.color = "red";
        elem6.style.display = "inline";
        elem6.textContent = "*";
        nodeP1.appendChild(elem6);
        prob = true;
    }

    //password2 verif
    if (pass2.value.length < 8 || pass2.value !== pass1.value) {
        var elem7 = document.createElement("p");
        elem7.style.color = "red";
        elem7.style.display = "inline";
        elem7.textContent = "*";
        nodeP2.appendChild(elem7);
        prob = true;
    }

    //conditions accepted verif
    if (!cond.checked) {
        var elem8 = document.createElement("p");
        elem8.style.color = "red";
        elem8.style.display = "inline";
        elem8.textContent = "*";
        nodeCond.appendChild(elem8);
        prob = true;
    }

    //general message in case of errors from the user
    if (prob === true) {
        var elem0 = document.createElement("p");
        elem0.style.color = "red";
        elem0.style.display = "inline";
        elem0.textContent = "Your form needs to be revised, it contains errors";
        nodeAnnounce.appendChild(elem0);
    }

    //general message if all inputs are correct
    else {
        var elemF = document.createElement("p");
        elemF.style.color = "black";
        elemF.style.textAlign = "center";
        nodeS.appendChild(elemF);

    }

}