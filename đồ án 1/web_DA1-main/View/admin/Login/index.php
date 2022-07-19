<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./Public/css/admin/login.css">
</head>

<body>
    <form action="?controller=login&action=login" method="POST" id="form-login">
        <div class="admin-login-wrap">
            <div class="admin-login">
                <h1 class="admin-login-heading">
                    Welcome Admin
                </h1>
                <div class="mb-12">
                    <div class="form-field">
                        <input type="text" class="admin-login-input" placeholder=" " name="login-email" autocomplete="off" id='name' />
                        <label for="name" class="admin-login-label">Email</label>
                    </div>
                    <span class="form-messages"></span>
                </div>
                <div>
                    <div class="form-field">
                        <input type="password" class="admin-login-input" placeholder=" " name="login-password" autocomplete="off" id='pass' />
                        <label for="name" class="admin-login-label">Mật khẩu</label>
                    </div>
                    <span class="form-messages"></span>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="checkbox-password" id="check-password" autocomplete="off">
                    <label for="check-password">Lưu mật khẩu</label>
                </div>
                <button class="btn btn-primary admin-login-btn" type="submit">Đăng nhập
                </button>


            </div>
        </div>
    </form>
    <script src="./Public/js/validator.js"></script>
    <script>
        validator({
            form: '#form-login',
            errorSelector: '.form-messages',
            rules: [
                // isRequired
                validator.isRequired('#name', 'Vui lòng nhập tên tài khoản'),
                validator.isEmail('#name', 'Vui lòng nhập email'),
                validator.isRequired('#pass', 'Vui lòng nhập mật khẩu'),
                validator.minLength('#pass', 6)
            ]
        });
    </script>
</body>

</html>