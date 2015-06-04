<?php
header('Content-type: application/json');
echo file_get_contents("http://localhost:62030/horror"-$_GET['horrorData'].".json");
?>