<?php
include "bootstrap/init.php";
// شرط بررسی نوع درخواست
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // متغییر دریافت مقدار اکشن
    $action = $_GET['action'];
    // متغییر پارامتر های فرستاده شده از فرم
    $params = $_POST;
    if ($action == 'register') {
        # اعتبار سنجی داده ها
        if (empty($params['name']) || empty($params['email']) || empty($params['password']))
            message('همه ای ورودی ها باید پر شوند!');
        if (!filter_var($params['email'], FILTER_VALIDATE_EMAIL))
            message('ایمیل معتبر نیست!');
        if (strlen($params['password']) < 8)
        diePage('رمز عبور باید بیشتر از 8 حرف باشد!');
        if (getUserByEmail($params['email']))
            diePage('شما با این ایمیل قبلا ثبت نام کرده اید!');

        #request data is ok
        if (register($params)) {
            header('location:' . siteUrl('index.php'));
        }
    }
    if ($action == 'login') {
        $result = login($params['email'], $params['password']);
        if (!$result) {
            message('رمز عبور یا ایمیل اشتباه است.');
        } else {
            message('باموفقیت وارد شدید');
            header('location:' . siteUrl('index.php'));
        }
    }
}
include "views/view-auth.php";
