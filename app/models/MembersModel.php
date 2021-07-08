<?php
    class MembersModel {
        private $db;
        public $conn;
        public function __construct()
        {
            $this->db = new Database();
            $this->conn = $this->db->connect();
        }

        public function getAllUsers() {
            return $this->db->getAllData('users');
        }

        //check if user 1 liked user 2 yet
        public function isLike($user_1, $user_2) {
            $sql = "SELECT * FROM relationships WHERE user_1 = $user_1 AND user_2 = $user_2";
            if($this->db->execute($sql)) {
                $row = mysqli_num_rows($this->db->execute($sql));
            }
            if($row) {
                if($row != 0) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        public function fetch_country()
        {
            $sql = "SELECT country_name FROM countries";
            $country = $this->db->getAllData("countries");
            return $country;
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

        //seeking members
        public function seekingUsersByGenderAndAge($gender, $from_age, $to_age) {
            $sql = "SELECT * FROM users WHERE 
            gender = '$gender' AND
            DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(birthday, '%Y') >= $from_age AND
            DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(birthday, '%Y') <= $to_age";
            $this->db->execute($sql);
            if(mysqli_num_rows($this->db->execute($sql))==0) {
                $data = NULL;
            } else {
                while($datas = $this->db->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function seekingUsersByGenderAndFromAge($gender, $from_age) {
            $sql = "SELECT * FROM users WHERE 
            gender = '$gender' AND
            DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(birthday, '%Y') >= $from_age";
            $this->db->execute($sql);
            if(mysqli_num_rows($this->db->execute($sql))==0) {
                $data = NULL;
            } else {
                while($datas = $this->db->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function seekingUsersByGenderAndToAge($gender, $to_age) {
            $sql = "SELECT * FROM users WHERE 
            gender = '$gender' AND
            DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(birthday, '%Y') <= $to_age";
            $this->db->execute($sql);
            $this->db->execute($sql);
            if(mysqli_num_rows($this->db->execute($sql))==0) {
                $data = NULL;
            } else {
                while($datas = $this->db->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function seekingUsersByAge($from_age, $to_age) {
            $sql = "SELECT * FROM users WHERE 
            DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(birthday, '%Y') >= $from_age AND
            DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(birthday, '%Y') <= $to_age";
            $this->db->execute($sql);
            if(mysqli_num_rows($this->db->execute($sql))==0) {
                $data = NULL;
            } else {
                while($datas = $this->db->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function seekingUsersByGender($gender) {
            return $this->db->getAllDataBy('users', 'gender', $gender);
        }

        public function seekingUsersFromAge($age) {
            $sql = "SELECT * FROM users WHERE DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(birthday, '%Y') >= $age";
            $this->db->execute($sql);
            if(mysqli_num_rows($this->db->execute($sql))==0) {
                $data = NULL;
            } else {
                while($datas = $this->db->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function seekingUsersToAge($age) {
            $sql = "SELECT * FROM users WHERE DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(birthday, '%Y') <= $age";
            $this->db->execute($sql);
            if(mysqli_num_rows($this->db->execute($sql))==0) {
                $data = NULL;
            } else {
                while($datas = $this->db->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        //get user address
        public function getCurrentAddress($member_id) {
            $city_id = $this->db->getSingleData('city_id', 'users', 'id', $member_id);
            $state_id = $this->db->getSingleData('state_id', 'cities', 'city_id', $city_id);
            $country_id = $this->db->getSingleData('country_id', 'states', 'state_id', $state_id);
            $address = [
                'city_id' => $city_id,
                'state_id' => $state_id,
                'country_id' => $country_id,
                'city' => $this->db->getSingleData('city_name', 'cities', 'city_id', $city_id),
                'state' => $this->db->getSingleData('state_name', 'states', 'state_id', $state_id),
                'country' => $this->db->getSingleData('country_name', 'countries', 'country_id', $country_id)
            ];
            return $address;
        }

        //add relationship when click like
        public function addRelationship($user_1, $user_2) {
            if(!$this->isLike($user_2, $user_1)) {
                $sql = "INSERT INTO relationships(user_1, user_2, status, created) VALUES($user_1, $user_2, '0', now())";
            } else {
                $sql = "INSERT INTO relationships(user_1, user_2, status, created) VALUES($user_1, $user_2, '1', now())";
            }
            echo $sql;
            $this->db->execute($sql);
        }

        public function updateRelationship($user_1, $user_2, $status) {
            $sql = "UPDATE relationships SET status = '$status' WHERE user_1 = $user_1 AND user_2 = $user_2";
            echo $sql;
            $this->db->execute($sql);
        }

        //remove relationship when user click unlike
        public function removeRelationship($user_1, $user_2) {
            $sql = "DELETE FROM relationships WHERE user_1 = $user_1 AND user_2 = $user_2";
            echo $sql;
            $this->db->execute($sql);
        }
    }