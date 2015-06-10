<?php
header('Content-type: application/json');
echo file_get_contents("roman_books.json", "r");
?>