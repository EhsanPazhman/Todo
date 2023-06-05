<?php


/* تابع گرفتن تمامی تسک ها و تسک های یک پوشه که آیدی آن ارسال شده از دیتابیس*/
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
// قرار دادن اطلاعات تابع گرفتن تسک ها داخل متغییر برای استفاده در حلقه foreac برای نمایش اطلاعات در صفحه
$tasks = getTasks();
/* پایان تابع */