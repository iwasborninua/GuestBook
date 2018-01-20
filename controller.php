<?php

require_once "model.php";

if (!empty($_REQUEST['add'] && $_REQUEST['title'] && $_REQUEST['content']))
{
    $temp_title = htmlspecialchars(trim($_REQUEST['title']));
    $temp_content = htmlspecialchars(trim($_REQUEST['content']));
    setNotes($temp_title, $temp_content);
    header('Location:/controller.php');
    exit();
}

$notes = getNotes();
include "view.php";