function ValidateNic(text, error) {
    let len = document.getElementById(text).value.length;
    if (len == 0) {
        document.getElementById(error).innerHTML = "NIC field is required!";
        document.getElementById(error).style.display = "block";
        return false;
    }
    else if (len == 10) {
        //pattern1
        let rgx = /^\d{9}[vxVX]{1}$/
        if (document.getElementById(text).value.match(rgx)) {
            document.getElementById(error).style.display = "none";
            return true;
        }
        else {
            document.getElementById(error).innerHTML = "Invalid NIC number";
            document.getElementById(error).style.display = "block";
            return false;
        }

    }

    else if (len == 12) {
        //pattern 2
        var rgx = /^\d{12}$/;
        if (document.getElementById(text).value.match(rgx)) {

            document.getElementById(error).style.display = "none";
            return true;
        }
        else {
            document.getElementById(error).innerHTML = "Invalid NIC number";
            document.getElementById(error).style.display = "block";
            return false;
        }

    }
    else {
        //empty
        document.getElementById(error).innerHTML = "Invalid NIC number";
        document.getElementById(error).style.display = "block";
        return false;
    }

}


function ValidateText(text, error, message) {
    if (document.getElementById(text).value.length > 0) {

        let rgx = /^[a-zA-Z\s.]+$/
        if (document.getElementById(text).value.match(rgx)) {
            document.getElementById(error).style.display = "none";
            return true;
        }
        else {
            document.getElementById(error).innerHTML = message + "field is invalid!";
            document.getElementById(error).style.display = "block";
            return false;
        }
    }
    else {
        document.getElementById(error).innerHTML = message + "field is required!";
        document.getElementById(error).style.display = "block";
        return false;
    }

}
function ValidateStaffID(text, error, message) {
    if (document.getElementById(text).value.length > 0) {

        let rgx = /^[a-zA-Z0-9\s.]+$/
        if (document.getElementById(text).value.match(rgx)) {
            document.getElementById(error).style.display = "none";
            return true;
        }
        else {
            document.getElementById(error).innerHTML = message + "field is invalid!";
            document.getElementById(error).style.display = "block";
            return false;
        }
    }
    else {
        document.getElementById(error).innerHTML = message + "field is required!";
        document.getElementById(error).style.display = "block";
        return false;
    }

}

function ValidateDob(dob, error) {

    if (document.getElementById(dob).value.length > 0) {
        document.getElementById(error).style.display = "none";
        return true;
    }
    else {
        document.getElementById(error).innerHTML ="Insert Date of Birth";
        document.getElementById(error).style.display = "block";
        return false;
    }

}
function ValidateDate(dob, error) {

    if (document.getElementById(dob).value.length > 0) {
        document.getElementById(error).style.display = "none";
        return true;
    }
    else {
        document.getElementById(error).innerHTML ="Insert Date ";
        document.getElementById(error).style.display = "block";
        return false;
    }

}

function ValidatePassword(password, error) {

    if (document.getElementById(password).value.length > 0) {
        document.getElementById(error).style.display = "none";
        return true;
    }
    else {
        document.getElementById(error).innerHTML ="Insert password ";
        document.getElementById(error).style.display = "block";
        return false;
    }

}

function ValidateUnits(salary, error) {
    if (document.getElementById(salary).value.length > 0) {
        let rgx = /^[0-9.]+$/
        if (document.getElementById(salary).value.match(rgx)) {
            document.getElementById(error).style.display = "none";
            return true;
        }
        else {
            document.getElementById(error).innerHTML ="Unit value is invalid!";
            document.getElementById(error).style.display = "block";
            return false;
        }
    } 
    else {

        document.getElementById(error).innerHTML ="Unit is required!";
        document.getElementById(error).style.display = "block";
        return false;

    }

}
function ValidateUnits2(salary, error) {
        let rgx = /^[0-9.]+$/
        if (document.getElementById(salary).value.match(rgx)|| document.getElementById(salary).value.length==0 ) {
            document.getElementById(error).style.display = "none";
            return true;
        }
        else {
            document.getElementById(error).innerHTML ="Unit value is invalid!";
            document.getElementById(error).style.display = "block";
            return false;
        }
    
}

function ValidateGender(field, error) {
    if (document.getElementById(field).value == "Select Gender") {
        document.getElementById(error).style.display = "block";
        return false;
    }
    else {
        document.getElementById(error).style.display = "none";
        return true;
    }
}

function ValidateSelection(field, error) {
    if (document.getElementById(field).value == "Select Donation Type") {
        document.getElementById(error).style.display = "block";
        return false;
    }
    else {
        document.getElementById(error).style.display = "none";
        return true;
    }
}

function ValidatePost(field, error) {
    if (document.getElementById(field).value == "Select Post") {
        document.getElementById(error).style.display = "block";
        return false;
    }
    else {
        document.getElementById(error).style.display = "none";
        return true;
    }
}


function ValidateEmail(email, error) {
    if (document.getElementById(email).value.length > 0) {
        rgx = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/
        if (document.getElementById(email).value.match(rgx)) {
            document.getElementById(error).style.display = "none";
            return true;
        }
        else {
            document.getElementById(error).innerHTML = "Email is invalid!";
            document.getElementById(error).style.display = "block";
            return false;
        }

    }
    else {
        document.getElementById(error).innerHTML = "Email is required!";
        document.getElementById(error).style.display = "block";
        return false;
    }

}

function ValidateAddress(address, error, message) {
    if (document.getElementById(address).value.length > 0) {

        rgx = /^[a-zA-Z0-9\/\s,.]+$/
        if (document.getElementById(address).value.match(rgx)) {
            document.getElementById(error).style.display = "none";
            return true;
        }
        else {
            document.getElementById(error).innerHTML = message + "field is invalid!";
            document.getElementById(error).style.display = "block";
            return false;
        }
    }
    else {
        document.getElementById(error).innerHTML = message + "field is required!";
        document.getElementById(error).style.display = "block";
        return false;
    }

}

function ValidatePhoneNo(phoneNo, error, message) {
    if (document.getElementById(phoneNo).value.length > 0) {
        let rgx = /^\d{10}$/
        if (document.getElementById(phoneNo).value.match(rgx)) {
            document.getElementById(error).style.display = "none";
            return true;
        }
        else {
            document.getElementById(error).innerHTML = message + "field is invalid!";
            document.getElementById(error).style.display = "block";
            return false;
        }
    }
    else {
        document.getElementById(error).innerHTML = message + "field is required!";
        document.getElementById(error).style.display = "block";
        return false;
    }
}
function validateDropdown(id1,error){
    if(document.getElementById(id1).selectedIndex==-1){
        document.getElementById(error).innerHTML = "Please select the blood Group!";
        document.getElementById(error).style.display = "block";
        return false;
    }
    else{
        document.getElementById(error).style.display = "none";
        return true;
    }
}
function validateRadio(id1,id2,id3,error){
    if(document.getElementById(id1).checked|| document.getElementById(id2).checked || document.getElementById(id3).checked ){
        document.getElementById(error).style.display = "none";
        return true;
    }
    else{
        document.getElementById(error).innerHTML = "Please select the Gender!";
        document.getElementById(error).style.display = "block";
        return false;
    }
    
}
function validateRadio2(id1,id2,error){
    if(document.getElementById(id1).checked|| document.getElementById(id2).checked ){
        document.getElementById(error).style.display = "none";
        return true;
    }
    else{
        document.getElementById(error).innerHTML = "Please select the Type!";
        document.getElementById(error).style.display = "block";
        return false;
    }
    
}
function validateCheckbox(id,error){
    if(document.getElementById(id).checked){
        document.getElementById(error).style.display = "none";
        return true;
    }
    else{
        document.getElementById(error).innerHTML = "Please check the checkbox!";
        document.getElementById(error).style.display = "block";
        return false;
    }
} 