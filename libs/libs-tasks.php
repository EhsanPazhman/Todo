<?php


/* تابع گرفتن تمامی تسک ها و تسک های یک پوشه که آیدی آن ارسال شده از دیتابیس */
function getTasks()
{
    global $conn;
    // شرط ارسال شدن آیدی فولدر که اگر ایدی فولدر در صفحه موجود بود تسک های همان فولدر نمایش داده شود
    $folder = $_GET['folderId'] ?? null;
    $folderCondition = '';
    if (isset($folder) and is_numeric($folder)) {
        $folderCondition = " and folder_id=$folder";
    }
    $userId = getCurrentUserId();
    $sql = "SELECT * FROM tasks WHERE user_id = $userId $folderCondition";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}
/* قرار دادن اطلاعات تابع گرفتن تسک ها داخل متغییر برای استفاده در حلقه foreac برای نمایش اطلاعات در صفحه */
$tasks = getTasks();
/* پایان تابع */

/* تابع گرفتن اطلاعات یک تسک با آیدی آن */
function getTask($taskId){
    global $conn;
    $sql = "SELECT * FROM `tasks` WHERE id = $taskId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
/* پایان تابع */

/* تابع افزودن یک تسک */
function addTask($taskTitle,$folderId){
    global $conn;
    $userId = getCurrentUserId();
    $sql = "INSERT INTO tasks (title, user_id , folder_id) VALUES (:taskTitle, :userId, :folder_id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':taskTitle' =>$taskTitle, ':userId' =>$userId , ':folder_id' =>$folderId]);
    return $stmt->rowCount();
}
/* پایان تابع */

/* تابع آپدیت یک تسک با آیدی آن */
function updateTask($taskId,$taskTitle){
    global $conn;
    $sql = "UPDATE `tasks` SET `title` = '$taskTitle' WHERE id = $taskId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}
/* پایان تابع */

/* تابع حذف یک تسک از دیتابیس */
function deleteTask($taskId){
    global $conn;
    $folderId = $_GET['folderId'] ?? null;
    $folderCondition = '';
    if (isset($folderId) and is_numeric($folderId)){
        $folderCondition = " and folder_id=$folderId";
    }
    $sql = "DELETE FROM tasks WHERE id = $taskId $folderCondition";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}
// شرط اعتبار سنجی آیدی تسکی که قراره حذف بشه که در صورت برقراری آن تسک مورد نظر حذف خواهد شد
if (isset($_GET['deleteTask']) and is_numeric($_GET['deleteTask'])){
    deleteTask($_GET['deleteTask']);
}
/* پایان تابع */

/* تابع تغییر وضعیت یک تسک از انجام شده به انجام نشده و برعکس */
function doneSwitch($taskId){
    global $conn;
    $userId = getCurrentUserId();
    $sql = "UPDATE tasks SET is_done = 1 - is_done WHERE user_id = :userId AND id = :taskId";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':taskId' => $taskId, ':userId' => $userId]);
    return $stmt->rowCount();
}
/* پایان تابع */
