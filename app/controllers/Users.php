<?php
    class Users extends Controller {
        public function __construct() {
            $this->userModel = $this->model('UserModel');
        }

        function fetch_state() {
            if(isset($_POST['country_id']))
            {
                echo $this->userModel->fetch_state($_POST['country_id']);
            } 
        }
        
        function fetch_city() {
            if(isset($_POST['state_id']))
            {
                echo $this->userModel->fetch_city($_POST['state_id']);
            }
            if(isset($_POST['city_id'])) {
                $this->userModel->updateCity($_SESSION['user_id'], $_POST['city_id']);
                $_SESSION['city_id'] = $_POST['city_id'];
            }
        }

        function fetch_job() {
            if(isset($_POST['job'])) {
                $this->userModel->updateJob($_SESSION['user_id'], $_POST['job']);
                $_SESSION['job'] = $_POST['job'];
            }
        }

        function fetch_income() {
            if(isset($_POST['income'])) {
                $this->userModel->updateIncome($_SESSION['user_id'], $_POST['income']);
                $_SESSION['income'] = $_POST['income'];
            }
        }

        function fetch_status() {
            if(isset($_POST['status'])) {
                $this->userModel->updateStatus($_SESSION['user_id'], $_POST['status']);
                $_SESSION['status'] = $_POST['status'];
            }
        }

        function fetch_get_married() {
            if(isset($_POST['getMarried'])) {
                $this->userModel->updateGetMarried($_SESSION['user_id'], $_POST['getMarried']);
                $_SESSION['getmarried'] = $_POST['getMarried'];
            }
        }

        function fetch_stimulants() {
            if(isset($_POST['alcohol']) || isset($_POST['cigarettes'])) {
                $this->userModel->updateStimulants($_SESSION['user_id'], $_POST['alcohol'], $_POST['cigarettes']);
                $_SESSION['alcohol'] = $_POST['alcohol'];
                $_SESSION['cigarettes'] = $_POST['cigarettes'];
            }
        }

        function fetch_dayoff() {
            if(isset($_POST['dayoff'])) {
                $this->userModel->updateDayOff($_SESSION['user_id'], $_POST['dayoff']);
                $_SESSION['dayoff'] = $_POST['dayoff'];
            }
        }

        function fetch_about() {
            if(isset($_POST['user_about'])) {
                $this->userModel->updateAbout($_SESSION['user_id'], $_POST['user_about']);
                $_SESSION['user_about'] = $_POST['user_about'];
            }
        }

        function fetch_character() {
            if(isset($_POST['user_character'])) {
                $this->userModel->updateCharacter($_SESSION['user_id'], $_POST['user_character']);
                $_SESSION['user_character'] = $_POST['user_character'];
            }
        }




        
        public function login_google() {
            $data = [
                'title' => 'Set up page'
            ];

            $this->view('users/login_google', $data);
        }

        public function createUserSession($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['gender'] = $user['gender'];
            $_SESSION['birthday'] = $user['birthday'];
            $_SESSION['city_id'] = $user['city_id'];
            $_SESSION['status'] = $user['status'];
            $_SESSION['job'] = $user['job'];
            $_SESSION['income'] = $user['income'];
            $_SESSION['getmarried'] = $user['getmarried'];
            $_SESSION['alcohol'] = $user['alcohol'];
            $_SESSION['cigarettes'] = $user['cigarettes'];
            $_SESSION['dayoff'] = $user['dayoff'];
            $_SESSION['user_about'] = $user['user_about'];
            $_SESSION['user_character'] = $user['user_character'];
            $_SESSION['avatar'] = $user['avatar'];
        }

        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['firstname']);
            unset($_SESSION['lastname']);
            unset($_SESSION['email']);
            unset($_SESSION['gender']);
            unset($_SESSION['birthday']);
            unset($_SESSION['city_id']);
            unset($_SESSION['status']);
            unset($_SESSION['job']);
            unset($_SESSION['income']);
            unset($_SESSION['getmarried']);
            unset($_SESSION['alcohol']);
            unset($_SESSION['cigarettes']);
            unset($_SESSION['dayoff']);
            unset($_SESSION['user_about']);
            unset($_SESSION['user_character']);
            unset($_SESSION['avatar']);
            header('location:' . URLROOT . '/home');
        }


    }
?>
