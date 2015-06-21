<?php
header('Content-type: application/json');

/**
 * Simple helper to debug to the console
 * @param  Array , String $data
 * @return String
 */
function debug_to_console($data)
{

    if (is_array($data))
        $output = "<script>console.log( 'Debug Objects: " . implode(',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}

$genre = '';

$sql = "";
$sql_horror = "SELECT book_author, book_title, book_chapters, book_type, book_isbn, book_yearOfPublish, book_run FROM tl_books WHERE book_genre='horror'";
$sql_other = "SELECT book_author, book_title, book_chapters, book_type, book_isbn, book_yearOfPublish, book_run FROM tl_books WHERE book_genre!='horror'";

if (!isset($_REQUEST['genre'])) {
    $sql = $sql_horror;
} else {
    $url = $_REQUEST['genre'];
    if ($url == "other") {
        $sql = $sql_other;
    } else if ($url == "horror") {
        $sql = $sql_horror;
    }
}


//MySQL
// Login in Data
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "mybooks";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $result = $conn->query($sql);

    $return_arr = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $row_array['book_author'] = $row['book_author'];
        $row_array['book_title'] = $row['book_title'];
        $row_array['book_chapters'] = $row['book_chapters'];
        $row_array['book_type'] = $row['book_type'];
        $row_array['book_isbn'] = $row['book_isbn'];
        $row_array['book_yearOfPublish'] = $row['book_yearOfPublish'];
        $row_array['book_run'] = $row['book_run'];
        array_push($return_arr, $row_array);
    }


    echo json_encode($return_arr, true);
}

    $conn->close();



