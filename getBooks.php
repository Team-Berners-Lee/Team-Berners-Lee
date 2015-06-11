<?php
header('Content-type: application/json');

$url=parse_url('getBooks.php?type=horror_books');
$url=parse_url('getBooks.php?type=roman_books');
$output;
if($url['query']['type'] == "horror_books"){
    $output= file_get_contents("horror_books.json", "r");
}else if($url['query']['type'] == "roman_books"){
    $output= file_get_contents("roman_books.json", "r");
}

echo $output;

function parse_url_detail($url){
    $parts = parse_url($url);
    if(isset($parts['query'])) {
        parse_str(urldecode($parts['query']), $parts['query']);
    }
    return $parts;
}

//header('Content-type: application/json');
//echo file_get_contents("http://localhost:62030/horror"-$_GET['horrorData'].".json");
?>