<?php

require_once "db_connection.php";

function getNotes()
{
    global $db;

    $query = "SELECT *
          FROM notes";

    $result = $db->query($query);
    $result = $result->fetchAll();
    return $result;
}

function setNotes($title, $content)
{
    global $db;

    $query = "INSERT INTO notes VALUES(NULL, ?, ?)";
    $arr = $db->prepare($query);
    $arr ->execute([$title, $content]);
}