<?php
// Login in Data
$servername = "localhost";
$username = "myBooks";
$password = "myBooks";
$dbName = "myBooks";

// Values ( zur Übersichtlichtkeit )
$book_title = $_GET['Buchtitel'];
$book_author = $_GET['Buchautor'];
$book_chapters = $_GET['Kapitel'];
$book_type = $_GET['buchart'];
$book_isbn = $_GET['ISBN'];
$book_yearOfPublish = $_GET['Erscheinungsjahr'];
$book_run = $_GET['Auflage'];
$book_forename = $_GET['DeinVorname'];
$book_surname = $_GET['DeinNachname'];
$book_genre = $_GET['Genre'];

// Patterns for Validation
$name_pattern = '/^[a-zA-Z ]*$/';
$isbn_pattern = '([0-9]{13})';
$year_pattern = '([0-9]{4})';
$run_pattern = '([1-9]+)';

// Serverside Validation , ignore invalid Values or die if Booktitle is empty
if ($book_title == "") {
    die("Unable to write to Database, Primary Key 'Buchtitel' is empty");
} else {

    if (preg_match($name_pattern, $book_author) == false) {
        $book_author = "";
        echo "Ignored author";
    }
    if (preg_match($name_pattern, $book_forename) == false) {
        $book_forename = "";
        echo "Ignored forename";
    }
    if (preg_match($name_pattern, $book_surname) == false) {
        $book_surname = "";
        echo "Ignored surname";
    }
    if (preg_match($isbn_pattern, $book_isbn) == false) {
        $book_isbn = "";
        echo "Ignored isbn";
    }
    if (preg_match($run_pattern, $book_run) == false || $book_run < 1) {
        $book_run = "";
        echo "Ignored run";
    }
    if (preg_match($year_pattern, $book_yearOfPublish) == false || $book_yearOfPublish > date('Y')) {
        $book_yearOfPublish = "";
        echo "Ignored Year";
    }
    echo "</br>";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {

    echo "Connected successfully <br>";

    // Insert Data from Form into Database
    $sql = "INSERT INTO tl_books (book_title, book_author, book_chapters, book_type, book_isbn, book_yearOfPublish, book_run, book_forename, book_surname, book_genre)
            VALUES ( '$book_title', '$book_author', '$book_chapters', '$book_type', '$book_isbn', '$book_yearOfPublish', '$book_run', '$book_forename', '$book_surname', '$book_genre')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        echo "\r\n";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;

    }

}


// Close connection
$conn->close();

?>