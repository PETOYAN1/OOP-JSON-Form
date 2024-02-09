<?php
    class LoginUser {
        private $email;
        private $password;
        public $error;
        public $success;
        private $storage = "data.json";
        private $stored_users;

        // Class Methods
        public function __construct($email, $password) 
        {
            $this->email = htmlspecialchars($email);
            $this->password = htmlspecialchars($password);
            $this->stored_users = json_decode(file_get_contents("../".$this->storage), true);
            $this->login();
        }
        private function login() {
            foreach ($this->stored_users as $user) {
                if ($user['email'] == $this->email) {
                    if(password_verify($this->password, $user['password'])) {
                        session_start();
                        $_SESSION['user'] = $this->email;
                        header('location: account.php');
                        exit();
                    }
                }
            }
            return $this->error = "Wrong email or password";
        }
    }
?>