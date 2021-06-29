<?php

    class UserModel {
        private $db;
        public $conn;
        public function __construct() {
            $this->db = new Database;
            $this->conn = $this->db->connect();
        }

        public function register($email, $firstname, $lastname, $password, $gender, $birthday) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $sql = "INSERT INTO users (email, firstname, lastname, password, gender, birthday) VALUES('$email', '$firstname', '$lastname', '$password', '$gender', '$birthday')";
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

        public function loginWithGoogle($email) {
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $row = mysqli_fetch_array($this->db->execute($sql));
            return $row;
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

        public function fetch_country()
        {
            $sql = "SELECT country_name FROM countries";
            $country = $this->db->getAllData("countries");
            return $country;
        }

        public function getCurrentAddress($city_id) {
            $state_id = $this->db->getSingleData('state_id', 'cities', 'city_id', $city_id);
            $country_id = $this->db->getSingleData('country_id', 'states', 'state_id', $state_id);
            $address = [
                'city' => $this->db->getSingleData('city_name', 'cities', 'city_id', $city_id),
                'state' => $this->db->getSingleData('state_name', 'states', 'state_id', $state_id),
                'country' => $this->db->getSingleData('country_name', 'countries', 'country_id', $country_id)
            ];
            return $address;
        }



        public function fetch_state($country_id) {
            $query = $this->db->getAllDataBy('states', 'country_id', $country_id);
            $output = '<option value="" disable selected hidden>Select State</option>';
            foreach($query as $row)
            {
                $output .= '<option value="'.$row["state_id"].'">'.$row["state_name"].'</option>';
            }
            echo $output;
        }

        public function fetch_city($state_id) {
            $query = $this->db->getAllDataBy('cities', 'state_id', $state_id);
            $output = '<option value="" disable selected hidden>Select City</option>';
            foreach($query as $row)
            {
                $output .= '<option value="'.$row["city_id"].'">'.$row["city_name"].'</option>';
            }
            echo $output;
        }

        public function updateCity($user_id, $city_id) {
            $query = $this->db->updateUser('city_id', $city_id, $user_id);
            return $query;
        }


        public function updateJob($user_id, $job) {
            $query = $this->db->updateUser('job', $job, $user_id);
            return $query;
        }

        public function updateIncome($user_id, $income) {
            $query = $this->db->updateUser('income', $income, $user_id);
            return $query;
        }

        public function updateStatus($user_id, $status) {
            $query = $this->db->updateUser('status', $status, $user_id);
            return $query;
        }

        public function updateGetMarried($user_id, $getMarried) {
            $query = $this->db->updateUser('getmarried', $getMarried, $user_id);
            return $query;
        }

        public function updateStimulants($user_id, $alcohol, $cigarettes) {
            $query = $this->db->updateUser('alcohol', $alcohol, $user_id);
            $query = $this->db->updateUser('cigarettes', $cigarettes, $user_id);
            return $query;
        }

        public function updateDayOff($user_id, $dayoff) {
            $query = $this->db->updateUser('daysoff', $dayoff, $user_id);
            return $query;
        }

        public function updateAbout($user_id, $user_about) {
            $query = $this->db->updateUser('user_about', $user_about, $user_id);
            return $query;
        }

        public function updateCharacter($user_id, $user_character) {
            $query = $this->db->updateUser('user_character', $user_character, $user_id);
            return $query;
        }

        public function updateAvatar($user_id, $avatar) {
            $query = $this->db->updateUser('avatar', $avatar, $user_id);
            return $query;
        }

        public function getAllUsers() {
            return $this->db->getAllData('users');
        }

        public function addPhoto($user_id, $photo_name) {
            $sql = "INSERT INTO photos (photo_id, user_id, photo_name) VALUES(NULL, '$user_id', '$photo_name')";
            $this->db->execute($sql);
        }

        public function getAllPhotos($user_id) {
            return $this->db->getAllDataBy('photos', 'user_id', $user_id);
        }

        public function addRelationship($user_1, $user_2) {
            $sql = "INSERT INTO relationships(user_1, user_2, status) VALUES($user_1, $user_2, '0', now())";
            echo $sql;
            $this->db->execute($sql);
        }

        public function confirmRelationship($user_1, $user_2) {
            $sql = "INSERT INTO relationships(user_1, user_2, status) VALUES($user_1, $user_2, '1', now())";
            $sql2 = "UPDATE relationships SET status = '1' WHERE user_1 = $user_2 AND user_2 = $user_1 ";
            $this->db->execute($sql);
            $this->db->execute($sql2);
        }
        
        public function checkRelationship($user_1, $user_2) {
            $sql = "SELECT status FROM relationships WHERE (user_1 = $user_1 AND user_2 = $user_2) OR (user_1 = $user_2 AND user_2 = $user_1)";
            $row = mysqli_fetch_array($this->db->execute($sql));
            return $row['status'];
        }
        // Get waiting member
        public function getWaitingMembers($user_1) {
            $sql = "SELECT *
                    FROM relationships r
                    INNER JOIN users u ON r.user_1 = u.id
                    WHERE user_2 = $user_1
                    AND status = '0'
                    ";
            return mysqli_query($this->conn, $sql);
        }


        // Get hint user
        public function getHintMember() {
            $sql = "SELECT *
                    FROM 
                    ";
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

        public function getUserById($user_id) {
            $sql = "SELECT *
                    FROM users
                    WHERE id = $user_id
                    ";
            $result = mysqli_query($this->conn, $sql);
            return mysqli_fetch_assoc($result);
        }
    }
