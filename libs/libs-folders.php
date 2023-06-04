<?php

function getCurrentUserId()
{
    return  1;
}

// تابع گرفتن همه ای پوشه های امروز از دیتابیس
function getFolders()
{
    global $conn;
    $userId = getCurrentUserId();
    $sql = "SELECT * FROM folders WHERE user_id = $userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}
$folders = getFolders();
/* پایان تابع */

// تابع اضافه نمودن پوشه در دیتابیس
function addFolder($folderName)
{
    global $conn;
    $userId = getCurrentUserId();
    $sql = "INSERT INTO folders (name, user_id) VALUES (:folderName, :userId)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':folderName' => $folderName, ':userId' => $userId]);
    return $stmt->rowCount();
}
/* پایان تابع */