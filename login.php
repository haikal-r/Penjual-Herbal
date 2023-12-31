

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css" />

    <!-- Style External -->
    <link rel="stylesheet" href="./assets/css/login-styles.css">
</head>

<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 h-auto d-flex align-items-center" style="width: 450px;">
            <form class="d-flex flex-column w-100" method="POST" action="./config/auth-login.php">
                <div class="text-center mb-3">
                    <img src="./assets/HerbaPluss.svg" class="pt-3 pb-4 " />
                </div>
                <div class="py-3">
                    <h1>Username</h1>
                    <input type="text" class="form-control" name="username" required/>
                </div>
                <div class="pb-3">
                    <h1>Password</h1>
                    <input type="password" class="form-control" name="password" required/>
                </div>
                <div class="py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="./register.php" class="create-account me-5">Create account?</a>
                        <button type="submit" name="login" class="btn btn-primary border-0">Login</button>
                    </div>
                </div>
            </form>
        </div>
</body>

</html>