// Get Current Year
var currentDate = new Date();
var currentYear = currentDate.getFullYear();

// Regular Expressions
var regex_buchstaben = /^[a-zA-Z ]*$/;
var regex_zahlen = /^[0-9]*$/;

function entryWarn(){
    alert( "Einige Eingaben sind fehlerhaft. Bitte überprüfen Sie ihre Eingaben");
}

function validateForm(){
    var validEntries = true;
    var focusSet = false;

    // Check if Buchtitel is not Empty
    if( document.Form.Buchtitel.value == "" ){
        document.getElementById('Buchtitel').style.borderColor = "red";
        if (focusSet == false) {
            document.Form.Buchtitel.focus();
            focusSet = true;
        }
        validEntries = false;
    }else{
        document.getElementById('Buchtitel').style.borderColor = "transparent";
    }
    // Check if Buchauthor only contain letters
    if (regex_buchstaben.test(document.Form.Buchautor.value) == false || document.Form.Buchautor.value == "") {
        document.getElementById('Buchautor').style.borderColor = "red";
        if (focusSet == false) {
            document.Form.Buchautor.focus();
            focusSet = true;
        }
        validEntries = false;
    }else{
        document.getElementById('Buchautor').style.borderColor = "transparent";
    }

    // Check if ISBN contains exactly 13 numbers
    if (document.Form.ISBN.value.length > 13 ||
        document.Form.ISBN.value.length < 13 ||
        regex_zahlen.test(document.Form.ISBN.value) == false) {
        document.getElementById('ISBN').style.borderColor = "red";
        if (focusSet == false) {
            document.Form.ISBN.focus();
            focusSet = true;
        }
        validEntries = false;
    } else {
        document.getElementById('ISBN').style.borderColor = "transparent";
    }

    /* Check if Erscheinungsjahr only contains numbers, is not empty and
     is not larger than the current year */
    if (document.Form.Erscheinungsjahr.value > currentYear ||
        document.Form.Erscheinungsjahr.value == "" ||
        document.Form.Erscheinungsjahr.length > 4 ||
        document.Form.Erscheinungsjahr.value < 0) {
        document.getElementById('Erscheinungsjahr').style.borderColor = "red";
        if (focusSet == false) {
            document.Form.Erscheinungsjahr.focus();
            focusSet = true;
        }
        validEntries = false;
    } else if (regex_zahlen.test(document.Form.Erscheinungsjahr.value) == false) {
        document.getElementById('Erscheinungsjahr').style.borderColor = "red";
        if (focusSet == false) {
            document.Form.Erscheinungsjahr.focus();
            focusSet = true;
        }
        validEntries = false;
    } else {
        document.getElementById('Erscheinungsjahr').style.borderColor = "transparent";
    }

    // Check if Auflage contains only numbers
    if (regex_zahlen.test(document.Form.Auflage.value) == false ||
        document.Form.Auflage.value == "") {
        document.getElementById('Auflage').style.borderColor = "red";
        if (focusSet == false) {
            document.Form.Auflage.focus();
            focusSet = true;
        }
        validEntries = false;
    } else {
        document.getElementById('Auflage').style.borderColor = "transparent";
    }

    // Check if DeinVorname only contain letters
    if (regex_buchstaben.test(document.Form.DeinVorname.value) == false) {
        document.getElementById('DeinVorname').style.borderColor = "red";
        if (focusSet == false) {
            document.Form.DeinVorname.focus();
            focusSet = true;
        }
        validEntries = false;
    } else {
        document.getElementById('DeinVorname').style.borderColor = "transparent";
    }

    // Check if DeinNachname only contain letters
    if (regex_buchstaben.test(document.Form.DeinNachname.value) == false) {
        document.getElementById('DeinNachname').style.borderColor = "red";
        if (focusSet == false) {
            document.Form.DeinNachname.focus();
            focusSet = true;
        }
        validEntries = false;
    }else{
        document.getElementById('DeinNachname').style.borderColor = "transparent";
    }

    // final check what to return and if to throw error popup
    if(validEntries == false){
        entryWarn();
        return false;
    }else{
        return true;
    }
}


function nurZahlen(value){
    if (value.length < 0) {
        return false;
    } else if(value.length > 0){
        var val = value;
        for (i = 0; i < val.length; i++) {
            if (val.charAt(i) < "0" || val.charAt(i) > "9") {
                return false;
            }
        }
    }
}

