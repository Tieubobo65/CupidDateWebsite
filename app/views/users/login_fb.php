<?php

    require APPROOT . "/views/includes/login_fb.php";

    $facebook_output = '';

    if(isset($_GET['code']))
    {

        if(isset($_SESSION['access_token']))
        {
            $access_token = $_SESSION['access_token'];
        } else {
            $access_token = $facebook_helper->getAccessToken();

            $_SESSION['access_token'] = $access_token;

            $facebook->setDefaultAccessToken($_SESSION['access_token']);
        }

        // $_SESSION['id'] = '';
        // $_SESSION['firstname'] = '';
        // $_SESSION['email'] = '';
        // $_SESSION['user_image'] = '';

        $graph_response = $facebook->get("/me?fields=name,email", $access_token);

        $facebook_user_info = $graph_response->getGraphUser();

        // if(!empty($facebook_user_info['id']))
        // {
        //     $_SESSION['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
        // }
        $email = $facebook_user_info['email'];
        
        $loggedInUser = $this->userModel->loginWithGoogle($email);
                    
        if($loggedInUser) {
            $this->createUserSession($loggedInUser);
            header('location: ' . URLROOT . '/users/setup');
        } else {
            $data['passwordError'] = 'Password or email is incorrect. Please try again!';

            $this->view('/users/login', $data);
        }

        if(!empty($facebook_user_info['name']))
        {
            $_SESSION['firstname'] = $facebook_user_info['name'];
        }

        if(!empty($facebook_user_info['email']))
        {
            $_SESSION['email'] = $facebook_user_info['email'];
        }
 
    } else {
        // Get login url
        $facebook_permissions = ['email']; // Optional permissions

        $facebook_login_url = $facebook_helper->getLoginUrl('http://localhost:8080/CupidDate/users/login', $facebook_permissions);
    
        // Render Facebook login button
        $facebook_login_url = '<div align="center"><a href="'.$facebook_login_url.'"><img src="php-login-with-facebook.gif" /></a></div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    HELLO WORLD
    <?php
if(isset($facebook_login_url))
{
 echo $facebook_login_url;
}
else
{
    echo "AHIHI";
}
    ?>
</body>
</html>