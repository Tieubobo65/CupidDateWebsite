<?php 
    class Login extends Controller {
        public function __construct()
        {
            $this->userModel = $this->model("UserModel");
        }


        public function index() {
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
                            header('location: ' . URLROOT . '/home');
                        } else {
                            header('location: ' . URLROOT . '/setup');
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
    }
?>