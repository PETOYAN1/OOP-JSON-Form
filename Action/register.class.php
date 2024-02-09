<?php 
    class RegisterUser {

        // Class properties
        private $username;

        private $userSurname;
        private $email;
        private $raw_password;
        private $encrypted_password;
        public $error;
        public $success;
        private $storage = 'data.json';
        private $stored_users;
        private $new_user;

        public function __construct($username, $surname, $email, $password) {

            $this->username = trim($username);
            $this->username = filter_var($username);

            $this->userSurname = trim($surname);
            $this->userSurname = htmlspecialchars($surname);

            $this->email = trim($email);
            $this->email = htmlspecialchars($email);

            $password = trim($password);
            $password = htmlspecialchars($password);

            $this->raw_password = filter_var($password);
            $this->encrypted_password = password_hash($this->raw_password,PASSWORD_DEFAULT);
            
            $this->stored_users = json_decode(file_get_contents('../' . $this->storage), true);
        
            $this->new_user = [
                'name' => $this->username,
                'surname' => $this->userSurname,
                'email' => $this->email,
                'password' => $this->encrypted_password
            ];

            if($this->checkFieldValues()) {
                $this->insertUser();
            }
        }
        private function checkFieldValues() 
        {
            if(empty($this->username) || empty($this->raw_password) || empty($this->userSurname) || empty($this->email)) {
                $this->error = "Both fields can not be empty";
                return false;
            } else if(strlen($this->username) < 5) {
                $this->error = "Name can not be small 5";
                return false;
            } else if(strlen($this->raw_password) < 5) {
                $this->error = "Password can not be small 5";
                return false;
            } else if(strlen($this->userSurname) < 5) {
                $this->error = "Surname can not be small 5";
                return false;
            } else {
                return true;
            }
        }
        private function usernameExists() 
        {
            foreach($this->stored_users as $user) {
                if($this->username == $user['name']) {
                    $this->error = "Username already taken, please choose a different one. ";
                    return true;
                }
            }
            return false;
        }
        private function insertUser() 
        {
            if($this->usernameExists() == false) {
                array_push($this->stored_users, $this->new_user);
                if(file_put_contents('../' . $this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))) {
                    $this->success = "Your registration was successful";
                    return header("location: login.php?msg=" . $this->success);
                } else {
                    $this->error = "Something is gone wrong, please try again";
                }
            }
        }
    }
?>