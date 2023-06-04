<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ثبت نام کاربر</title>
    <link rel="stylesheet" href="assets/css/auth.css">
</head>

<body>
    <!-- partial:index.partial.html -->
    <div id="background">
        <div id="panel-box">
            <div class="panel">
                <div class="auth-form on" id="login">
                    <div id="form-title">ورود</div>
                    <form action="#action=login" method="POST">
                        <input name="email" type="text" required="required" placeholder="ایمیل" />
                        <input name="password" type="password" required="required" placeholder="رمز عبور" />
                        <button type="Submit">ورود</button>
                    </form>
                </div>
                <div class="auth-form" id="signup">
                    <div id="form-title">ثبت نام</div>
                    <form action="#?action=register" method="POST">
                        <input name="name" type="text" required="required" placeholder="نام کاربری" />
                        <input name="email" type="text" required="required" placeholder="ایمیل" />
                        <input name="password" type="password" required="required" placeholder="رمز عبور" />
                        <button type="Submit">ثبت نام</button>
                    </form>
                </div>
            </div>
            <div class="panel">
                <div id="switch">ثبت نام</div>
                <div id="image-overlay"></div>
                <div id="image-side"></div>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
    <script>
        $('#switch').click(function() {
            $(this).text(function(i, text) {
                return text === "Sign Up" ? "Log In" : "Sign Up";
            });
            $('#login').toggleClass("on");
            $('#signup').toggleClass("on");
            $(this).toggleClass("two");
            $('#background').toggleClass("two");
            $('#image-overlay').toggleClass("two");
        })
    </script>

</body>

</html>