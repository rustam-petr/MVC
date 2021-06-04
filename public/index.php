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
use W1020\HTML\Table as HtmlTable;
use W1020\HTML\Pagination;

$table = new Table($config);
$table->setPageSize(3);
$page = (int)($_GET['page'] ?? 1);
//if (isset($_GET['page'])) {
//    $page = $_GET['page'];
//} else {
//    $page = 1;
//}
$arrSQL = $table->getPage($page);

//$htmlTable = new htmlTable();
//$pagination = new Pagination();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Document</title>

</head>
<body>
<?= (new htmlTable())->setData($arrSQL)->setClass("table table-success table-striped")->html() ?>
<?= (new Pagination())->setPageCount($table->pageCount())->setActivePage($page)->html() ?>
</body>
</html>
