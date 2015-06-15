<?php
header('Content-type: application/json');

//json Files

$url=parse_url('getBooks.php?type=horror_books');
$url=parse_url('getBooks.php?type=roman_books');
$output = "";
if($url['query']['type'] == "horror_books"){
    $output = "horror";
    //   $output= file_get_contents("horror_books.json", "r");
}else if($url['query']['type'] == "roman_books"){
    $output = "other";
//    $output= file_get_contents("roman_books.json", "r");
}

//echo $output;

/*
function parse_url_detail($url){
    $parts = parse_url($url);
    if(isset($parts['query'])) {
        parse_str(urldecode($parts['query']), $parts['query']);
    }
    return $parts;
}
*/

//header('Content-type: application/json');
//echo file_get_contents("http://localhost:62030/horror"-$_GET['horrorData'].".json");

//MySQL
// Login in Data
$servername = "localhost";
$username = "myBooks";
$password = "myBooks";
$dbName = "myBooks";

$sql_horror = "SELECT book_author, book_title, book_chapters, book_type, book_isbn, book_yearOfPublish, book_run FROM tl_books WHERE book_genre='horror'";
$sql_other = "SELECT book_author, book_title, book_chapters, book_type, book_isbn, book_yearOfPublish, book_run FROM tl_books WHERE book_genre!='horror'";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    if ($output == "horror") {
        $sql = $sql_horror;
    } else if ($output == "other") {
        $sql = $sql_other;
    }

    $result = $conn->query($sql);

    $rows = array();
    while ($r = mysqli_fetch_array($result)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
    $conn->close();
}



?>