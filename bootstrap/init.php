<?php
/** فراخوانی تمامی فایلهای استفاده شده در پروژه **/
session_start();
include "constants.php";
include BASE_PATH . "bootstrap/config.php";

/** کد اتصال به دیتابیس **/
try {
    $conn = new PDO("mysql:host=$database->host;dbname=$database->db", $database->user, $database->pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";

} catch(PDOException $e) {
    die('Connection failed: ') . $e->getMessage();
}