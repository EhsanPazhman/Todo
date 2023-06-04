<?php

function getCurrentUserId() {
    return  1;
}

// تابع گرفتن همه ای پوشه های امروز از دیتابیس
function getFolders(){
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