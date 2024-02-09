<?php 
    require_once 'register.class.php';
    if(isset($_POST['submit'])) {
        $username = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new RegisterUser($username, $surname, $email, $password);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styles/login.css">
    <link rel="stylesheet" href="../assets/styles/media.css">
    <title>Login Page</title>
</head>
<body>
    <div class="wrapper" style="background-image: url(../assets/images/slide-02.jpg);">
    <header>
            <a href="../index.php"><img src="../assets/images/logo.png" alt="Mexant"></a>
            <nav>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="login.php">Sign In</a></li>
                </ul>
            </nav>
            <a href="Action/login.php" class="hidden btn btn-success">Contact Support</a>
        </header>
        <h1 class="Register text-center">Sign Up Page</h1>
        <main class="mt-5">
            <form method="post" class="form" enctype="multipart/form-data" autocomplete="off">
                <div class="form">
                <div class="form-handler">
                        <label for="name">Name</label>
                        <input value="<?= isset($username) ? $username : null ?>" class="form-control" type="text" name="name" id="name" placeholder="name">
                    </div>
                    <div class="form-handler">
                        <label for="surname">Surname</label>
                        <input value="<?= isset($surname) ? $surname : null ?>" class="form-control" type="text" name="surname" id="surname" placeholder="surname">
                    </div>
                    <div class="form-handler">
                        <label for="email">Email:</label>
                        <input value="<?= isset($email) ? $email : null ?>" class="form-control" type="email" name="email" id="email" placeholder="email">
                    </div>
                    <div class="form-handler">
                        <label for="password">Password:</label>
                        <input value="<?= isset($password) ? $password : null ?>" class="form-control" type="password" name="password" id="password" placeholder="password">
                    </div>
                </div>
                <div class="form-handler">
                    <button type="submit" name="submit" class="btn btn-danger">Create Account</button>
                </div>
            </form>
            <span class="error"><?= isset($user->error) ? $user->error : null ?></span>
            <span class="success"><?= isset($user->success) ? $user->success : null ?></span>
        </main>
        </div>
</body>
</html>