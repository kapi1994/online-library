<?php
if (isset($_GET['type'])) {
    $type = $_GET['type'];
    if ($type == "excel") {

        require_once '../../config/connection.php';
        require_once '../function.php';
        $columnNames = getAuthorColumns();
        $authors = exportAuthors();

        $timestamp = time();
        $filename = 'autoriNJ' . $timestamp . '.xls';

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        foreach ($columnNames as $name) echo $name->COLUMN_NAME . "\t";
        echo "\n";
        foreach ($authors as $author) {
            echo $author->id . "\t" . $author->first_name . "\t" . $author->last_name . "\t" . $author->created_at . "\n";
        }
        exit();
    } else {
    }
}
