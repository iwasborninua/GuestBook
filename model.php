<?php

require_once "db_connection.php";

function setNotes($title, $content)
{
    $db = DBConnection::getConnection();

    $query = "INSERT INTO notes VALUES(NULL, ?, ?, NOW())";
    $arr = $db->prepare($query);
    $arr ->execute([$title, $content]);
}

function dateFormat($date)
{
    $format_date = new DateTime($date);
    return $format_date->format("H:i:s d-m-Y");
}

function getNotesCount()
{
    $db = DBConnection::getConnection();

    $query = 'SELECT COUNT(*) AS count FROM notes';
    $result  = $db->query($query);
    $result = $result->fetch();
    return $result['count'];
}

function getPagesCount($all_notes, $per_page = 5)
{
    return ceil($all_notes/$per_page);
}

function getOffset($current_page, $per_page = 5)
{
    return ($current_page - 1) * $per_page;
}

function getNotes($limit, $offset)
{
    $db = DBConnection::getConnection();

    $query = 'SELECT * FROM notes LIMIT :limit OFFSET :offset';
    $result = $db->prepare($query);
    $result->bindParam(':limit', $limit, PDO::PARAM_INT);
    $result->bindParam(':offset', $offset, PDO::PARAM_INT);
    $result->execute();
    return $result->fetchAll();
}