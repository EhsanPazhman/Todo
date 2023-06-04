<?php
/** تمامی توابع کمکی پروژه در این فایل قرار دارند **/

/** تابع مسیر دهی به فایلهای فولدر assets **/
function assets($uri){
    return BASE_URL . "assets/{$uri}";
}
/** تابع آدرس روت سایت با دریافت مسیر مورد نظر در ورودی **/
function siteUrl($uri = ''){
    return BASE_URL . $uri;
}
/** تابع بررسی نوع درخواست که آیا ایجکس است یا خیر **/
function ajaxRequest(){
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
        return true;
    }
    return false;
}
/** تابع بستن اجرای اسکریپت با استایل خطا! **/
function diePage($msg){
    echo "<div style='direction: rtl; padding: 30px; width: 80%; margin: 50px auto; background: #f9dede; border: 1px solid #cca4a4; color: #521717; border-radius: 5px; font-family: sans-serif;'>$msg</div>";
    die();
}
/** تابع نمایش پیام به کاربر با نوع کلاس دریافتی که تعیین کننده خطا یا درست بودن پیام میباشد **/
function message($msg,$cssClass = 'info'){
    echo "<div class='$cssClass'style='direction: rtl; padding: 20px; width: 80%; margin: 10px auto; background: #f9dede; border: 1px solid #cca4a4; color: #521717; border-radius: 5px; font-family: sans-serif;'>$msg</div>";
}
/** تابع وردامپ ورودی با استایل و ظاهر واضح **/
function dd($var){
    echo '<pre style= "color: #9c4100; background: #fff; z-index: 99999; position: relative; padding: 10px; margin: 10px; border-radius: 5px; border-left: 3px solid #c56705;">';
    var_dump($var);
    echo '<pre>';
}
