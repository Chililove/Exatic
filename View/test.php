<?php

$rootPath = "";
while (!file_exists($rootPath . "index.php")) {
    $rootPath = "../$rootPath";
}

require $rootPath . "Model/test.php";
require $rootPath . "Controller/test.php";
?>


<html>

<div>
    <h1>HIIIIII</h1>
    <?php
    print_r($data); ?>
</div>

</html>