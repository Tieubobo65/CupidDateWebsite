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
                    $age = (new DateTime())->diff(new DateTime($birthday))->y;

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
                        if($loggedInUser['city_id']) {
                            header('location: ' . URLROOT . '/users/home');
                        } else {
                            header('location: ' . URLROOT . '/users/setup');
                        }
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
            $data['country'] = $this->userModel->fetch_country();
            $this->view('users/setup', $data);
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

        function home() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $avatar = time() . '_' . $_FILES['avatar']['name'];
                $this->userModel->updateAvatar($_SESSION['user_id'], $avatar);
                $this->userModel->addPhoto($_SESSION['user_id'], $avatar);
                $target = "../public/img/" . $avatar;
                move_uploaded_file($_FILES['avatar']['tmp_name'], $target);
                $_SESSION['avatar'] = $avatar;
            }

            $data = [
                'title' => 'Home'
            ];
            $this->view('users/home', $data);
        }
        function personel_profile() {
            if(isset($_FILES['photo'])) {
                $photo_name = time() . '_' . $_FILES['photo']['name'];
                $this->userModel->addPhoto($_SESSION['user_id'], $photo_name);
                $target = "../public/img/" . $photo_name;
                move_uploaded_file($_FILES['photo']['tmp_name'], $target);
            }

            if(isset($_FILES['avt'])) {
                if($_FILES['avt'] != '') {
                    $avatar = time() . '_' . $_FILES['avt']['name'];
                    $this->userModel->addPhoto($_SESSION['user_id'], $avatar);
                    $this->userModel->updateAvatar($_SESSION['user_id'], $avatar);
                    $target = "../public/img/" . $avatar;
                    move_uploaded_file($_FILES['avt']['tmp_name'], $target);
                    $_SESSION['avatar'] = $avatar;
                }
            }

            $address = $this->userModel->getCurrentAddress($_SESSION['city_id']);
            $photos =  $this->userModel->getAllPhotos($_SESSION['user_id']);
            $data = [
                'city_name' => $address['city'],
                'state_name' => $address['state'],
                'country_name' => $address['country'],
                'photos' => $photos
            ];
            $this->view('users/personel_profile', $data);
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
