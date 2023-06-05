<?php
include "../bootstrap/init.php";

// بررسی نوع درخواست ارسال شده
if (!ajaxRequest()) {
    diePage('درخواست نامعتبر!');
}

// اعتبار سنجی درخواست ارسال شده
if (!isset($_POST['action']) || empty($_POST['action'])) {
    diePage('اکشن نامعتبر');
}

/*---------------- بررسی اضافه نمودن نوع داده و انجام ان -----------*/
switch ($_POST['action']) {
    case 'addFolder':
        if (!isset($_POST['folderName']) || strlen($_POST['folderName']) < 3) {
            echo 'نام پوشه باید بزرگتر از 3 حرف باشد';
            die();
        }
        addFolder($_POST['folderName']);
        break;
    case 'updateFolder':
        $folderId = $_POST['folderId'];
        $folderName = $_POST['folderName'];
        updateFolder($folderId, $folderName);
        break;
    case 'addTask':
        $folderId = $_POST['folderId'];
        $taskTitle = $_POST['taskTitle'];
        if (!isset($folderId) || empty($folderId)) {
            echo "لطفا یک پوشه انتخاب نمایید!";
            die();
        }
        if (!isset($taskTitle) || strlen($taskTitle) < 3) {
            echo "نام تسک باید بزرگتر از سه حرف باشد!";
            die();
        }
        addTask($taskTitle, $folderId);
        break;
    case 'updateTask':
        $taskId = $_POST['taskId'];
        $taskTitle = $_POST['taskTitle'];
        updateTask($taskId, $taskTitle);
        break;
    case 'doneSwitch':
        $taskId = $_POST['taskId'];
        if (!isset($taskId) or !is_numeric($taskId)) {
            diePage('آیدی تسک معتبر نیست!');
        }
        doneSwitch($taskId);
        break;
    default:
        diePage('اکشن نامعتبر!');
}
