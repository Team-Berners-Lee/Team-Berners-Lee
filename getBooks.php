<?php
header('Content-type: application/json');

//json Files
$url=parse_url('getBooks.php?type=horror');
$url=parse_url('getBooks.php?type=other');
$output = "";
$new_url = $url['query'];
if($new_url['type'] == "horror"){
    $output = "horror";
}else if($new_url['type'] == "other"){
    $output = "other";
}

//MySQL
// Login in Data
$servername = "localhost";
$username = "mybooks";
$password = "mybooks";
$dbName = "mybooks";

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


    $return_arr = array();
    while ($array = mysqli_fetch_row($result)) {
        $return_arr[] = $array;
    }

/*
    $return_arr = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $row_array['book_author'] = $row['book_author'];
            $row_array['book_title'] = $row['book_title'];
            $row_array['book_chapters'] = $row['book_chapters'];
            $row_array['book_type'] = $row['book_type'];
            $row_array['book_isbn'] = $row['book_isbn'];
            $row_array['book_yearOfPublish'] = $row['book_yearOfPublish'];
            $row_array['book_run'] = $row['book_run'];
            array_push($return_arr,$row_array);
        }
*/
    echo json_encode($return_arr, true);

    $conn->close();
}

?>