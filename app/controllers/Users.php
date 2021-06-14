<?php
    class Users extends Controller {
        public function __construct() {
            $this->userModel = $this->model('UserModel');
        }

        public function register() {
            $email = $firstname = $lastname = $password = $confirmPassword = $gender = $birthday = '';
            $error = [
                'emailError' => '',
                'firstnameError' => '',
                'lastnameError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'genderError' => '',
                'birthdayError' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $email = trim($_POST['email']);
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $password = trim($_POST['password']);
                $confirmPassword = trim($_POST['confirmPassword']);
                $gender = trim($_POST['gender']);
                $birthday = trim($_POST['birthday']);
                $data = [
                    'emailError' => '',
                    'firstnameError' => '',
                    'lastnameError' => '',
                    'passwordError' => '',
                    'confirmPasswordError' => '',
                    'genderError' => '',
                    'birthdayError' => ''
                ];


                $nameValidation = "/^[a-z ,.'-]+$/i";
                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
                
                //validate firstname
                if (empty($firstname)) {
                    $data['firstnameError'] = 'Please enter your first name!';
                } elseif (!preg_match($nameValidation, $firstname)) {
                    $data['firstnameError'] = 'Name can only contain letters!';
                }

                //validate lastname
                if (empty($lastname)) {
                    $data['lastnameError'] = 'Please enter your last name!';
                } elseif (!preg_match($nameValidation, $lastname)) {
                    $data['lastnameError'] = 'Name can only contain letters!';
                }

                //validate email
                if (empty($email)) { 
                    $data['emailError'] = 'Please enter your email!';
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $data['emailError'] = 'Please enter an valid email!';
                } else {
                    //check if email exists
                    if ($this->userModel->findUserByEmail($email)) {
                        $data['emailError'] = 'Email is already taken!';
                    }
                }

                //validate password 
                if(empty($password)) {
                    $data['passwordError'] = 'Please enter your password!';
                } elseif(strlen($password) < 8) {
                    $data['passwordError'] = 'Password must contain letters and numbers and be at least 8 characters!';
                } elseif(preg_match($passwordValidation, $password)) {
                    $data['passwordError'] = 'Password must contain letters and numbers and be at least 8 characters!';
                }

                //validate confirm password
                if (empty($confirmPassword)) {
                    $data['confirmPasswordError'] = 'Please confirm your password!';
                } else {
                    if ($password != $confirmPassword) {
                    $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                    }
                }

                //validate gender 
                if(empty($gender)) {
                    $data['genderError'] = 'Please choose your gender!';
                }

                //validate birthday 
                if(empty($birthday)) {
                    $data['birthdayError'] = 'Please enter your date of birth!';
                }

                //make sure that errors are empty
                if(empty($data['firstnameError']) && empty($data['lastnameError']) && empty($data['emailError']) &&
                empty($data['passwordError']) && empty($data['confirmPasswordError']) &&
                empty($data['genderError']) && empty($data['birthdayError'])) {
                    //hash password
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    //register user from model function
                    if($this->userModel->register($email, $firstname, $lastname, $password, $gender, $birthday)) {
                        //close form and redirect to the login page
                        header('location: ' . URLROOT . '/users/login');
                    } else {
                        die("Something went wrong.");
                    }
                } 
            }

            $this->view('/users/register', $data);
        }


        public function login() {
            $email = $password = '';
            $data = [
                'emailError' => '',
                'passwordError' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {            

                $email = trim($_POST['email']);
                $password = trim($_POST['password']);
                $data = [
                    'emailError' => '',
                    'passwordError' => ''
                ];

                //validate email 
                if(empty($email)) {
                    $data['emailError'] = 'Please enter your email!';
                }

                //validate password
                if(empty($password)) {
                    $data['passwordError'] = 'Please enter your password!';
                }

                //make sure all errors are empty
                if(empty($data['emailError']) && empty($data['passwordError'])) {
                    $loggedInUser = $this->userModel->login($email, $password);

                    if($loggedInUser) {
                        $this->createUserSession($loggedInUser);
                        header('location: ' . URLROOT . '/users/setup');
                    } else {
                        $data['passwordError'] = 'Password or email is incorrect. Please try again!';

                        $this->view('/users/login', $data);
                    }
                }
                
            } else {
                $email = $password = '';
                $data = [
                    'emailError' => '',
                    'passwordError' => ''
                ];
            }

            $this->view('/users/login', $data);
        }

        public function setup() {
            $data = [
                'title' => 'Set up page'
            ];

            $this->view('users/setup', $data);
        }
        
        public function createUserSession($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['gender'] = $user['gender'];
            $_SESSION['birthday'] = $user['birthday'];
        }

        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['firstname']);
            unset($_SESSION['lastname']);
            unset($_SESSION['email']);
            unset($_SESSION['gender']);
            unset($_SESSION['birthday']);
            header('location:' . URLROOT . '/home');
        }
    }
?>
