<?php

require_once "db_connection.php";

function getNotes()
{

    $db = DBConnection::getConnection();

    $query = "SELECT *
          FROM notes";

    $result = $db->query($query);
    $result = $result->fetchAll();
    return $result;
}

function setNotes($title, $content)
{
    $db = DBConnection::getConnection();

    $query = "INSERT INTO notes VALUES(NULL, ?, ?)";
    $arr = $db->prepare($query);
    $arr ->execute([$title, $content]);
}