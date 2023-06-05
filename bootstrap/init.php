<?php

/** فراخوانی تمامی فایلهای استفاده شده در پروژه **/
session_start();
include "constants.php";
include BASE_PATH . "bootstrap/config.php";
include BASE_PATH . "vendor/autoload.php";
include BASE_PATH . "libs/helpers.php";

/** کد اتصال به دیتابیس **/
try {
    $conn = new PDO("mysql:host=$database->host;dbname=$database->db", $database->user, $database->pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";

} catch (PDOException $e) {
    diePage('Connection failed: ') . $e->getMessage();
}
include BASE_PATH . "libs/libs-folders.php";
include BASE_PATH . "libs/libs-tasks.php";
include BASE_PATH . "libs/libs-categories.php";
