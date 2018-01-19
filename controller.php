<?php

require_once "model.php";

$notes = getNotes();

if (!empty($_REQUEST['add']))
{
    setNotes($_REQUEST['title'], $_REQUEST['content']);
}


include "view.php";