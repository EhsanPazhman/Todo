<?php
// تابع گرفتن کتگوری ها از دیتابیس
function getCategories(){
    global $conn;
    $sql = "SELECT * FROM catagories";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}
$categories = getCategories();