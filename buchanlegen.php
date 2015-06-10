<?php

// File öffnen und in File schreiben
if($_GET['Buchtitel'] <> "") {
    $my_file = 'books.txt';
    $handle = fopen($my_file, 'w') or die ('Cannot open file: '.$my_file);
    $trenner = ", ";
    $abschluss = "; ";
    $newLine = "\n";

    fwrite($handle, $_GET['Buchtitel']);
    fwrite($handle, $trenner);
    fwrite($handle, $_GET['Buchautor']);
    fwrite($handle, $trenner);
    fwrite($handle, $_GET['Kapitel']);
    fwrite($handle, $trenner);
    fwrite($handle, $_GET['buchart']);
    fwrite($handle, $trenner);
    fwrite($handle, $_GET['ISBN']);
    fwrite($handle, $newLine);
    fwrite($handle, $trenner);
    fwrite($handle, $_GET['Erscheinungsjahr']);
    fwrite($handle, $trenner);
    fwrite($handle, $_GET['Auflage']);
    fwrite($handle, $abschluss);
    fwrite($handle, $newLine);
    fwrite($handle, $newLine);

    fclose($handle);
    exit;
}

?>