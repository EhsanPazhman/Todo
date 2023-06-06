<?php
include "bootstrap/init.php";

/* شرط خارج شدن کاربر از سایت در صورت کلیک روی لاگ اوت */
if (isset($_GET['logout'])) {
    logout();
}

/* شرط بررسی لاگین بودن کاربر */
if (!isLoggedIn()) {
    header("Location:" . siteUrl('auth.php'));
}

include "views/view-index.php";
