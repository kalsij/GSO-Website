
//function to verify if the user entered the correct information and save
function userAdd() {

    fname = document.getElementById('firstname');
    lname = document.getElementById('lastname');
    postalCode = document.getElementById('postCode');
    email = document.getElementById('emailAddress');
    pass = document.getElementById('password');
    check = false;

    //Checks if there is an error in the input
    if (fname.value.search(/^[A-Za-z]+$/) == -1 || lname.value.search(/^[A-Za-z]+$/) == -1 || postalCode.value.search(/^[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]\d$/) == -1 || email.value.search(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/) == -1 || pass.value.search(/^[a-zA-Z0-9!@#$%^&*]{8,20}$/) == -1) {
        check = false;

        //checks if the first name is invalid and output an error
        if (fname.value.search(/^[A-Za-z]+$/) == -1) {
            var changeFirstName = document.getElementById('correctionFirst');
            changeFirstName.innerHTML = "*Invalid first name*";
            changeFirstName.style.color = "red";

        }
        //checks if the last name is invalid and output an error
        if (lname.value.search(/^[A-Za-z]+$/) == -1) {
            var changeLastName = document.getElementById('correctionLast');
            changeLastName.innerHTML = "*Invalid last name*";
            changeLastName.style.color = "red";

        }

        //checks if the postal code is invalid and output an error
        if (postalCode.value.search(/^[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]\d$/) == -1) {
            var changePostal = document.getElementById('correctionPostal');
            changePostal.innerHTML = "*Invalid postal code*";
            changePostal.style.color = "red";

        }

        //checks if the email address is invalid and output an error 
        if (email.value.search(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/) == -1) {
            var changeEmail = document.getElementById('correctionEmail');
            changeEmail.innerHTML = "*Invalid email address*";
            changeEmail.style.color = "red";

        }

        //checks if the password is invalid and output an error
        if (pass.value.search(/^[a-zA-Z0-9!@#$%^&*]{8,32}$/) == -1) {
            var changePostal = document.getElementById('correctionPassword');
            changePostal.innerHTML = "*Invalid password*";
            changePostal.style.color = "red";

        }

    }

    //checks if all the inputs are correctly entered 
    if (fname.value.search(/^[A-Za-z]+$/) == 0 && lname.value.search(/^[A-Za-z]+$/) == 0 && postalCode.value.search(/^[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]\d$/) == 0 && email.value.search(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/) == 0 && pass.value.search(/^[a-zA-Z0-9!@#$%^&*]{8,20}$/) == 0) {
        check = true;

    }

    //checks if the first name is correct and remove the error text
    if (fname.value.search(/^[A-Za-z]+$/) == 0) {
        var changeFirstName = document.getElementById('correctionFirst');
        changeFirstName.innerHTML = "";

    }

    //checks if the last name is correct and remove the error text
    if (lname.value.search(/^[A-Za-z]+$/) == 0) {
        var changeLastName = document.getElementById('correctionLast');
        changeLastName.innerHTML = "";


    }

    //checks if the postal code is correct and remove the error text
    if (postalCode.value.search(/^[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]\d$/) == 0) {
        var changePostal = document.getElementById('correctionPostal');
        changePostal.innerHTML = "";


    }

    //checks if the email address is correct and remove the error text
    if (email.value.search(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/) == 0) {
        var changeEmail = document.getElementById('correctionEmail');
        changeEmail.innerHTML = "";

    }

    //checks if the password is invalid and output an error
    if (pass.value.search(/^[a-zA-Z0-9!@#$%^&*]{8,20}$/) == 0) {
        var changePostal = document.getElementById('correctionPassword');
        changePostal.innerHTML = "";
        changePostal.style.color = "red";

    }

    //output an alert if everything is correct
    if (check) {

        alert("The user was added!");

    }
}
