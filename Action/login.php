<?php 
    require_once "login.class.php";
    if(isset($_POST['submit'])) 
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = new LoginUser($email, $password);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styles/media.css">
    <link rel="stylesheet" href="../assets/styles/login.css">
    <title>Login Page</title>
</head>
<body>
    <div class="wrapper">
        <header class="forLogin">
            <a href="../index.php"><img src="../assets/images/logo.png" alt="Mexant"></a>
            <nav>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="register.php">Sign Up</a></li>
                </ul>
            </nav>
            <a href="Action/login.php" class="hidden btn btn-success">Contact Support</a>
        </header>
        <h1 class="forForm text-center">Login Account</h1>
        <main class="logRegister mt-5">
            <form method="post" class="form" enctype="multipart/form-data" autocomplete="off">
                <div>
                    <label for="email">E-mail</label><br>
                    <input class="form-control" type="email" id="email" name="email" placeholder="Email">
                </div>
                <div>
                    <label for="password">Password</label><br>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                </div>
                <div>
                <button type="submit" name="submit" class="btn btn-danger">Sing In</button>
                </div>
            </form>
            <span class="error"><?= isset($user->error) ? $user->error : null ?></span>
            <span class="success"><?= isset($user->success) ? $user->success : null ?></span>
        </main>
        <?php if(isset($_GET['msg'])) :?>
            <div class="center-content">
                <span class="success"><?= $_GET['msg'] ?></span>
            </div>
        <?php endif ?>
    </div>
</body>
</html>