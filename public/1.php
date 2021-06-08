<?php
include "../vendor/autoload.php";

$config = [
    "servername" => "localhost",
    "username" => "root",
    "password" => "root",
    "dbname" => "guestbook",
    "table" => "gb"
];

use W1020\Table;

$table = new Table($config);

$table->ins($_POST);

header("Location: index.php");