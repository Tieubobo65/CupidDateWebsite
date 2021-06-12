<?php
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
            $this->db->connect();
        }

        public function register($email, $firstname, $lastname, $password, $gender, $birthday) {
            $sql = "INSERT INTO users (email, firstname, lastname, password, gender, birthday) VALUES('$email', '$firstname', '$lastname', '$password', '$gender', '$birthday')";

            //execute function 
            if($this->db->execute($sql)) {
                return true;
            } else {
                return false;
            }
        }

        public function login($email, $password) {
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $row = mysqli_fetch_array($this->db->execute($sql));

            $hashedPassword = $row['password'];
            if(password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }

        }

        public function findUserByEmail($email){
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $this->db->execute($sql);
            if(mysqli_num_rows($this->db->execute($sql)) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
