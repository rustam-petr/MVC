<?php

include "../vendor/autoload.php";

$config = include 'config.php';

use W1020\Table;
use W1020\HTML\Table as HtmlTable;
use W1020\HTML\Pagination;

$table = new Table($config);
$table->setPageSize(3)->setIdName("id");
$page = (int)($_GET['page'] ?? 1);

if (isset($_GET['del'])) {
    $table->del($_GET["del"]);
    header("Location:?page=" . min($_GET["page"], $table->pageCount()));
}

if (isset($_GET['ins'])) {
    $table->ins($_POST);
    header("Location:?");
}

if (isset($_GET['edit'])) {
    $table->upd($_GET["edit"], $_POST);
    header("Location:?page=" . $_GET["page"]);
}

//<!--//$htmlTable = new htmlTable();-->
//<!--//$pagination = new Pagination();-->

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
<?= (new htmlTable())
    ->setData($table->getPage($page))
    ->addColumn(fn($v) => "<a href='?del=$v[id]&page=$page'>Delete</a>")
    ->addColumn(fn($v) => "<a href='edit.php?edit=$v[id]&page=$page'>Edit</a>")
    ->setClass("table table-success table-striped")
    ->html() ?>
<?= (new Pagination())
    ->setPageCount($table->pageCount())
    ->setActivePage($page)
    ->html() ?>
<a href="insert.php" class="btn btn-danger">Add</a>
</body>
</html>
