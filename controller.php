<?php
require_once "model.php";

if (!empty($_REQUEST['add'] && !empty($_REQUEST['title']) && !empty($_REQUEST['content'])))
{
    $temp_title = htmlspecialchars(trim($_REQUEST['title']));
    $temp_content = htmlspecialchars(trim($_REQUEST['content']));
    setNotes($temp_title, $temp_content);
    header('Location:/controller.php');
    exit();
}

$pagination = getPagesCount(getNotesCount(), 5);
$current_page = isset($_GET['page']) && $_GET['page'] > 1 && $_GET['page'] <= $pagination ? $_GET['page'] : 1 ;
$notes = getNotes(5, getOffset($current_page, 5));


include "view.php";