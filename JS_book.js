horrorTable();

var roman = new XMLHttpRequest();
roman.open("GET", '../roman_books.json',false);
roman.send(null);

var horror = new XMLHttpRequest();
horror.open("GET", '../horror_books.json',false);
horror.send(null);

function horrorTable() {
    var horrorData = JSON.parse(horror.responseText);
    tabelleErstellen(horrorData, "id01");
}

function romanTable() {
    var romanData = JSON.parse(roman.responseText);
    tabelleErstellen(romanData, "id01");
}

function tabelleErstellen(datei, id) {
    var arr = datei;
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
    document.getElementById(id).innerHTML = out;
}
