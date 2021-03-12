function setPasswordVisible() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    }
    else {
        x.type = "password";
    }
}

function sendEmail() {

    var node = document.getElementById("aFeed");
    node.innerHTML = "";
    var email = document.getElementById("email2");
    var feedback = document.createElement("p");
    feedback.style.color = "black";
    feedback.style.textAlign = "center";

    if (email.value.search(/^[0-9A-Za-z.]+\@[a-z]+\.[a-z]{3}$/) == -1) {

        feedback.style.color = "red";
        feedback.textContent = "The email you entered is invalid. Please try again.";
    }
    else {

        feedback.textContent = "The reset password email has been sent."
    }


    node.appendChild(feedback);
}

function unblur() {

    var node = document.getElementById("aForg");
    node.innerHTML = "";
    var initial = document.getElementById("blur");
    initial.style.filter = "blur(0px)";
    var node2 = document.getElementById("space");
    var br1 = document.createElement("br");
    var br2 = document.createElement("br");
    node2.appendChild(br1);
    node2.appendChild(br2);
}

function forgot() {
    var nodeP = document.getElementById("aForg");
    var space = document.getElementById("space");
    var initial = document.getElementById("blur");

    nodeP.innerHTML = "";
    space.innerHTML = "";
    initial.style.filter = "blur(5px)"

    var closeBut = document.createElement("input");
    closeBut.value = "X";
    closeBut.type = "button";
    closeBut.style.fontWeight = "bold";
    closeBut.addEventListener("click", unblur);
    var header1 = document.createElement("h1");
    header1.textContent = "Reset Your Password";
    var line = document.createElement("h2");
    line.textContent = "-----------------------------------------";
    var text = document.createElement("p");
    text.textContent = "Please enter your email address in the box below and we will send you all the details to reset your password.";
    text.style.textAlign = "center";
    var inEmail = document.createElement("input");
    inEmail.type = "text";
    inEmail.placeholder = "Your email";
    inEmail.id = "email2";
    var but = document.createElement("input");
    but.type = "button";
    but.value = "Send Email";
    but.addEventListener("click", sendEmail);
    var centered = document.createElement("div");
    centered.style.textAlign = "center";
    centered.appendChild(inEmail);
    centered.appendChild(but);
    var br1 = document.createElement("br");
    var br2 = document.createElement("br");
    var br3 = document.createElement("br");
    var br4 = document.createElement("br");
    var aFeedback = document.createElement("div");
    aFeedback.id = "aFeed";
    nodeP.appendChild(closeBut);
    nodeP.appendChild(header1);
    nodeP.appendChild(line);
    nodeP.appendChild(text);
    nodeP.appendChild(centered);
    nodeP.appendChild(br1);
    nodeP.appendChild(aFeedback);
    nodeP.appendChild(br2);
    nodeP.appendChild(br3);
    nodeP.appendChild(br4);
}

function verif() {
    var prob = false;

    var password = document.getElementById("password");
    var email = document.getElementById("email");
    var nodeAnn = document.getElementById("aAnnounce");
    var nodeP = document.getElementById("aP");
    var nodeE = document.getElementById("aE");
    var nodeSub = document.getElementById("sub");
    nodeAnn.innerHTML = "";
    nodeP.innerHTML = "";
    nodeE.innerHTML = "";
    nodeSub.innerHTML = "";

    if (email.value.search(/^[0-9A-Za-z.]+\@[a-z]+\.[a-z]{3}$/) == -1) {
        var elem1 = document.createElement("p");
        elem1.style.color = "red";
        elem1.textContent = "*";
        elem1.style.display = "inline";
        nodeE.appendChild(elem1);
        prob = true;
    }

    if (password.value.length < 8) {
        var elem2 = document.createElement("p");
        elem2.style.color = "red";
        elem2.style.display = "inline";
        elem2.textContent = "*";
        nodeP.appendChild(elem2);
        prob = true;
    }

    if (prob) {
        var elem0 = document.createElement("p");
        elem0.style.color = "red";
        elem0.textContent = "Your email or your password may be incorrect, please try again."
        nodeAnn.appendChild(elem0);
    }
    else {
        var elemF = document.createElement("p")
        elemF.style.textAlign = "center";
        elemF.textContent = "Your email and your password are valid. Wait a second while we are logging you in."
        elemF.style.color = "black";
        nodeSub.appendChild(elemF);
    }

}