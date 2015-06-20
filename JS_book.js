var request = new XMLHttpRequest();

var url = "getBooks.php?name=genre";
m();

function awT(wert){
    if (wert == 1){

        url = "getBooks.php?genre=horror";
    } else if (wert == 2){

        url = "getBooks.php?genre=other";
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
        var jsonData = JSON.parse(request.responseText);
        //     alert(jsonData);
        tab(jsonData);
    }
}

function tab(datei) {
    var arr = datei;
    //   alert(arr);

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
    for (i = 0; i < datei.length; i++) {
        out += "<tr><td>" +
        datei[i].book_author +
        "</td><td>" +
        arr[i].book_title +
        "</td><td>" +
        arr[i].book_chapters +
        "</td><td>" +
        arr[i].book_type +
        "</td><td>" +
        arr[i].book_isbn +
        "</td><td>" +
        arr[i].book_yearOfPublish +
        "</td><td>" +
        arr[i].book_run +
        "</td></tr>";
    }
    out += "</table>";
    document.getElementById("id01").innerHTML = out;
}
