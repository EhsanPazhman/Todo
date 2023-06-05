<?php
/* تابع جستجوی تسکها */
function searchTask($taskTitle){
    global $conn;
    $userId = getCurrentUserId();
    $sql = "SELECT * FROM `tasks` WHERE user_id = $userId AND title LIKE '%$taskTitle%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);

}
/* پایان تابع */