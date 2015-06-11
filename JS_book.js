/*
 * Weder die PHP noch die JSON funktionieren beim Einlesen. Nahezu egal was ich mache. Es muss
 * am Server liegen, dass mir was fehlt (wobei sie sagten XAMPP hat alles benötigte drin) oder es liegt an meinem
 * PHP-Befehl.
 *
 *
var roman = new XMLHttpRequest();
var url = "http://localhost:62030/getBooks.php?type=horror";
roman.open("GET", 'http://localhost:62030/getBooks.php',false);
roman.send(null);

var horror = new XMLHttpRequest();
horror.open("GET", 'horror_books.json',false);
horror.send(null);

function did(xmlhttp) {
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            tab(xmlhttp.responseText);
        }
    }
}

function test1(wert){
    if(wert == 1){
        tab(horror, "id01");
    }else if(wert == 2){
        tab(roman, "id01");
    }

}*/
var request = new XMLHttpRequest();
var url = "horror_books.json";
m();



function awT(wert){
    if (wert == 1){

        url ="horror_books.json";
    } else if (wert == 2){

        url ="roman_books.json";
    }
    m();
}

function m() {
    request.open("GET",url, true);
    request.onreadystatechange =callbackHandler;
    request.send();
}
function callbackHandler(){
    if ((request.readyState == 4) && ( request.status == 200)&& (request.responseText != null)){
        tab(request.responseText);
    }
}

function tab(datei) {
    var  toProof = datei.toString();

    if((toProof.indexOf('horrordata'))>0){
        var arr = JSON.parse(datei).horrordata;
    }else if((toProof.indexOf('romandata'))>0){
        var arr = JSON.parse(datei).romandata;
    }

    var i;
    var out = "<table class='generatedTable'>";
    out += "<tr><th>" +
    "Autor" +
    "</th><th>" +
    "Titel" +
    "</th><th>" +
    "Kapitel" +
    "</th><th>" +
    "Buchart" +
    "</th><th>" +
    "ISBN" +
    "</th><th>" +
    "Erscheinungsjahr" +
    "</th><th>" +
    "Auflage" +
    "</th></tr>";
    for (i = 0; i < arr.length; i++) {
        out += "<tr><td>" +
        arr[i].autor +
        "</td><td>" +
        arr[i].titel +
        "</td><td>" +
        arr[i].kapitel +
        "</td><td>" +
        arr[i].buchart +
        "</td><td>" +
        arr[i].ISBN +
        "</td><td>" +
        arr[i].erscheinungsjahr +
        "</td><td>" +
        arr[i].auflage +
        "</td></tr>";
    }
    out += "</table>";
    document.getElementById("id01").innerHTML = out;
}
