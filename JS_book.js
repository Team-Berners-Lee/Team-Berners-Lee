var request = new XMLHttpRequest();
//var url = "horror_books.json";
var url = "getBooks.php?type=horror";
m();

function awT(wert){
    if (wert == 1){

        url ="getBooks.php?type=horror";
    } else if (wert == 2){

        url ="getBooks.php?type=other";
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
 //   var toProof = datei.toString();
    var arr;
    // if((toProof.indexOf())>0){
    arr = JSON.parse(datei);
    // }
   // }else if((toProof.indexOf('romandata'))>0){
   //     arr = JSON.parse(datei).romandata;
   // }

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
