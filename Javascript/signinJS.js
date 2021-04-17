function setPasswordVisible() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    }
    else {
        x.type = "password";
    }
}

//reset password email verification
function sendEmail() {
    var node = document.getElementById("aFeed");
    node.innerHTML = "";
    var br1 = document.createElement("br");
    var email = document.getElementById("email2");
    var pass1 = document.getElementById("pass2");
    var pass2 = document.getElementById("pass3");
    var feedback = document.createElement("p");
    feedback.style.color = "red";
    feedback.style.textAlign = "center";
    var feedback2 = document.createElement("p");
    feedback2.style.color = "red";
    feedback2.style.textAlign = "center";
    var feedback3 = document.createElement("p");
    feedback3.style.color = "red";
    feedback3.style.textAlign = "center";

    if (email.value.search(/^[0-9A-Za-z.]+\@[a-z]+\.[a-z]{2,3}$/) == -1) {
        feedback.textContent = "The email you entered is invalid.";
        node.appendChild(feedback);
    }

    if (pass1.value.length < 8) {

        feedback2.textContent = "Your password is too short.";
        node.appendChild(feedback2);
    }

    if (pass2.value.length < 8 || pass2.value !== pass1.value) {

        feedback3.textContent = "Your confirm password entry is wrong.";
        node.appendChild(feedback3);
    }


}

//clearing reset password elements and unbluring the sign in
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

//creating the reset password elements and bluring the sign in
function forgot() {
    var nodeP = document.getElementById("aForg");
    var space = document.getElementById("space");
    var initial = document.getElementById("blur");
    var br5 = document.createElement("br");
    var br6 = document.createElement("br");
    var br7 = document.createElement("br");
    var br8 = document.createElement("br");
    var br9 = document.createElement("br");
    var br10 = document.createElement("br");

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
    text.textContent = "Please enter your email address and your new password in the boxes below to reset your password.";
    text.style.textAlign = "center";
    var labelE = document.createElement("p");
    labelE.style.display = "inline";
    labelE.textContent = "Email: ";
    var labelP1 = document.createElement("p");
    labelP1.style.display = "inline";
    labelP1.textContent = "New Password: ";
    var labelP2 = document.createElement("p");
    labelP2.style.display = "inline";
    labelP2.textContent = "Confirm New Password: ";
    var inEmail = document.createElement("input");
    inEmail.type = "text";
    inEmail.placeholder = "Your email";
    inEmail.id = "email2";
    inEmail.name = "resetEmail";
    var newPass = document.createElement("input");
    newPass.type = "password";
    newPass.placeholder = "Your new password";
    newPass.id = "pass2";
    newPass.name = "resetPassword";
    var newPass2 = document.createElement("input");
    newPass2.type = "password";
    newPass2.placeholder = "Your new password";
    newPass2.id = "pass3";
    newPass2.name = "resetPassword2";
    var but = document.createElement("input");
    but.type = "submit";
    but.value = "Reset Password";
    but.name = "submit";
    var centered = document.createElement("div");
    centered.style.textAlign = "center";
    centered.appendChild(labelE);
    centered.appendChild(inEmail);
    centered.appendChild(br5);
    centered.appendChild(br6);
    centered.appendChild(labelP1);
    centered.appendChild(newPass);
    centered.appendChild(br7);
    centered.appendChild(br8);
    centered.appendChild(labelP2);
    centered.appendChild(newPass2);
    centered.appendChild(br9);
    centered.appendChild(br10);
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

//verification of email and password entered
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

    if (email.value.search(/^[0-9A-Za-z.]+\@[a-z]+\.[a-z]{2,3}$/) == -1) {
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


}