<?php
$rootPath = "";
while (!file_exists($rootPath . "index.php")) {
    $rootPath = "../$rootPath";
}
