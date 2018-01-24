<?php

require_once "db_connection.php";

/**
 * Метод добавления новой заметки
 *
 * @param String $title заголовок заметки
 * @param String $content содержимое заметки
 * @return void
 */

function setNotes($title, $content)
{
    $db = DBConnection::getConnection();

    $query = "INSERT INTO notes VALUES(NULL, ?, ?, NOW())";
    $arr = $db->prepare($query);
    $arr ->execute([$title, $content]);
}

/**
 * Метод форматирования даты
 *
 * @param String $date формат даты по умолчанию
 * @return DateTime
 */

function dateFormat($date)
{
    $format_date = new DateTime($date);
    return $format_date->format("H:i:s d-m-Y");
}

/**
 * Метод считающий количество записей в базе данных
 *
 * @return int
 */

function getNotesCount()
{
    $db = DBConnection::getConnection();

    $query = 'SELECT COUNT(*) AS count FROM notes';
    $result  = $db->query($query);
    $result = $result->fetch();
    return $result['count'];
}

/**
 * Метод подсчета количества страниц пагинации
 *
 * @param Int $all_notes количество записей
 * @param Int $per_page количество записей на одну страницу вывода
 * @return Float
 */

function getPagesCount($all_notes, $per_page = 5)
{
    return ceil($all_notes/$per_page);
}

/**
 * Метод подсчета смещения для sql запроса
 *
 * @param Int $current_page позиция текущей страницы
 * @param Int $per_page количество записей на одну страницу вывода
 * @return int
 */

function getOffset($current_page, $per_page = 5)
{
    return ($current_page - 1) * $per_page;
}

/**
 * Метод возвращаюший с БД заданное количесво записей с определенной позиции
 *
 * @param Int $limit необходимое количество записей
 * @param Int $offset позиция с которой идет выборка
 * @return Array
 */

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