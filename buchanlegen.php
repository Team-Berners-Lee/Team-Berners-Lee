<?php
$servername = "localhost";
$username = "myBooks";
$password = "myBooks";
$dbaName = "myBooks";

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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbaName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {

    echo "Connected successfully";
    echo "\r\n";

    $sql = "INSERT INTO tl_books (book_title, book_author, book_chapters, book_type, book_isbn, book_yearOfPublish, book_run, book_forename, book_surname, book_genre)
            VALUES ( '$book_title', '$book_author', '$book_chapters', '$book_type', '$book_isbn', '$book_yearOfPublish', '$book_run', '$book_forename', '$book_surname', '$book_genre')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        echo "\r\n";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "\r\n";
    }

}


// Close connection
$conn->close();

?>