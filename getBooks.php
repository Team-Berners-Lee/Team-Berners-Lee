<?php
/**
 * Created by PhpStorm.
 * User: Philip
 * Date: 30.05.2015
 * Time: 10:19
 */
header('Content-type: application/json');
echo file_get_contents("http://localhost:62030/horror"-$_GET['mode'].".json");
?>