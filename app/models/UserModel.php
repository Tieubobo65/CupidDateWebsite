<?php
    class UserModel {
        private $db;
        public $conn;
        public function __construct() {
            $this->db = new Database;
            $this->conn = $this->db->connect();
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

        // Get all members 
        public function getNumberMembers() {
            $sql = "SELECT COUNT(*) total FROM users";
            $result = mysqli_query($this->conn, $sql);
            return mysqli_fetch_assoc($result);
        }
        
        // Get all men 
        public function getNumberMen() {
            $sql = "SELECT COUNT(gender) as total FROM users WHERE gender = '1'";
            $result = mysqli_query($this->conn, $sql);
            return mysqli_fetch_assoc($result);
        }

        // Get all women
        public function getNumberWomen() {
            $sql = "SELECT COUNT(gender) as total FROM users WHERE gender = '2'";
            $result = mysqli_query($this->conn, $sql);
            return mysqli_fetch_assoc($result);
        }
    }
