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
    default:
        diePage('اکشن نامعتبر!');
}
