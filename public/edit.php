<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

use W1020\Table;

include "../vendor/autoload.php";

$config = include "config.php";

$table = new Table($config);
$comments = $table->columnComments();
$data = $table->getRow($_GET["edit"]);
?>
<form action="index.php?edit=<?= $_GET['edit'] ?>&page=<?=$_GET["page"]?>" method="post">
    <?php
    foreach ($table->columns() as $column) { ?>
        <span><?= $comments[$column] ?></span>
        <textarea rows="2" cols="40" class="form-control"
                  name="<?= $column ?>"><?= $data[$column] ?></textarea>
        <br><br>
        <?php
    }
    ?>
    <input type="submit" value="ok">
</form>
</body>
</html>
