<?php

/** تمامی توابع مربوط به ثبت نام و ورود کاربر **/

/* تابع گرفتن اطلاعات کاربر فعلی */
function getCurrentUserId()
{
    return  getLoggedInUser()->id ?? 0;
}

/* تابع بررسی لاگین بودن کاربر */
function isLoggedIn()
{
    return isset($_SESSION['login']) ? true : false;
}

/* تابع دریافت اطلاعات کاربر وارد شده در سایت */
function getLoggedInUser()
{
    return $_SESSION['login'] ?? null;
}

/* تابع ثبت نام کاربر */
function register($userData)
{
    global $conn;
    $params  = $_POST;
    $password = $userData['password'];
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (name ,email,password) VALUES (:name,:email,:password)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':name' => $userData['name'], ':email' => $userData['email'], ':password' => $password]);
    login($params['email'], $params['password']);
    return $stmt->rowCount() ? true : false;
}

/* تابع گرفتن اطلاعات کاربر با ایمیل از پایگاه داده */
function getUserByEmail($email)
{
    global $conn;
    $sql = "SELECT * FROM users  WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':email' => $email]);
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records[0] ?? null;
}

/* تابع ورود کاربر به سایت */
function login($email, $password)
{
    $user = getUserByEmail($email);
    if (is_null($user)) {
        return false;
    }
    /* شرط چک کردن رمز وارد شده کاربر با رمز ذخیره شده آن در پایگاه داده */
    if (password_verify($password, $user->password)) {
        $_SESSION['login'] = $user;
        return true;
    }
    return false;
}

/* تابع خروج کاربر از سایت */
function logout()
{
    unset($_SESSION['login']);
}
