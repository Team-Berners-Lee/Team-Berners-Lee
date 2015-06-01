<?php
/**
 * Created by PhpStorm.
 * User: Philip
 * Date: 29.05.2015
 * Time: 19:38
 */

// File öffnen und in File schreiben
if($_GET['Buchtitel'] <> "") {
    $my_file = 'books.txt';
    $handle = fopen($my_file, 'w') or die ('Cannot open file: '.$my_file);

    fwrite($handle, $_GET['Buchtitel']);
    fwrite($handle, $_GET[", "]);
    fwrite($handle, $_GET['Buchautor']);
    fwrite($handle, $_GET[", "]);
    fwrite($handle, $_GET['Kapitel']);
    fwrite($handle, $_GET[", "]);
    fwrite($handle, $_GET['Buchart']);
    fwrite($handle, $_GET[", "]);
    fwrite($handle, $_GET['ISBN']);
    fwrite($handle, $_GET["\n"]);
    fwrite($handle, $_GET[", "]);
    fwrite($handle, $_GET['Erscheinungsjahr']);
    fwrite($handle, $_GET[", "]);
    fwrite($handle, $_GET['Auflage']);
    fwrite($handle, $_GET[";"]);
    fwrite($handle, $_GET["\n"]);
    fwrite($handle, $_GET["\n"]);

    fclose($handle);
    exit;
}
?>