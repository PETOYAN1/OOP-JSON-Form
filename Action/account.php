<?php 
    session_start();
    if (!isset($_SESSION['user'])) {
        header('location: login.php');
        exit();
    }
    if (isset($_GET['logout'])) {
        unset($_SESSION['user']);
        header('location: login.php');
        exit();
    }

    class GetUsers {

        private $stored_users;
        private $storage = 'data.json';

        public function __construct() {
            $this->stored_users = json_decode(file_get_contents("../" . $this->storage), true);
            $this->showUsers();
        }
        private function showUsers() {
            foreach($this->stored_users as $user) {
                $name = $user['name'];
                $surname = $user['surname'];
                $email = $user['email'];
                echo "<tr>
                            <td>$name</td>
                            <td>$surname</td>
                            <td>$email</td>
                        </tr>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <title>User Page</title>
</head>
<body>
<div class="wrapper">
        <header>
            <img src="../assets/images/logo.png" alt="Mexant">
            <nav>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="login.php">Services</a></li>
                    <li><a href="login.php">Contact</a></li>
                    <li><a href="login.php">About</a></li>
                    <li><a href="login.php">Pages</a></li>
                </ul>
            </nav>
            <a href="?logout" class="hidden btn btn-success">Log Out</a>
        </header>
        <main class="text-center text-white">
            <h2 class="text-center">Welcome <b><?= $_SESSION['user'] ?></b></h2>
            <h3>Table of all users</h3>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">surname</th>
                        <th scope="col">email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $user = new GetUsers(); ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>