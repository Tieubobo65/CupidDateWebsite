<?php
            require APPROOT . "/views/includes/login_google.php";

            $login_button = '';
        
            if (isset($_GET['code'])) {

                $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
                if(!isset($token['error'])) {
                    $gClient->setAccessToken($token['access_token']);
                    $_SESSION['access_token'] = $token['access_token'];
        
                    $google_service = new Google_Service_Oauth2($gClient);
        
                    $data = $google_service->userinfo->get();
        
                    //add user to database
                    $email = $data['email'];
                    $firstname = $data['given_name'];
                    $lastname = $data['family_name'];
                    $gender = $data['gender'];
                    $password = NULL;
                    if (!$this->userModel->findUserByEmail($email)) {
                        $this->userModel->register($email, $firstname, $lastname, $password, $gender, NULL, 1);
                    }
                    
                    $loggedInUser = $this->userModel->loginWithGoogle($email);
                    
                    if($loggedInUser) {
                        $this->createUserSession($loggedInUser);
                        header('location: ' . URLROOT . '/users/setup');
                    } else {
                        $data['passwordError'] = 'Password or email is incorrect. Please try again!';

                        $this->view('/users/login', $data);
                    }
                    
                    if(!empty($data['given_name'])) {
                        $_SESSION['firstname'] = $data['given_name'];
                    }
        
                    if(!empty($data['family_name'])) {
                        $_SESSION['lastname'] = $data['family_name'];
                    }
        
                    if(!empty($data['email'])) {
                        $_SESSION['email'] = $data['email'];
                    }
        
                    if(!empty($_SESSION['gender'])) {
                        $_SESSION['gender'] = $data['gender'];
                    }
        
                    // if(!empty($_SESSION['picture'])) {
                    //     $_SESSION['user_image'] = $data['picture'];
                    // }
                }
            }
        
            if(!isset($_SESSION['access_token'])) {
                $login_button = '<a href="'.$gClient->createAuthUrl().'"><img src=""/></a>';    
            }


            $this->view('users/setup', $data);
        
