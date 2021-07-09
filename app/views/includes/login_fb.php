<?php
    require_once '.././vendor/autoload.php';
    
    if(!session_id()) {
        session_start();
    }

    $facebook = new \Facebook\Facebook([
        'app_id' => '477759133321533',
        'app_secret' => '50aec5c31859d6d5aa276072c2b8d845',
        'default_graph_version' => 'v2.10'
    ]);

    $facebook_helper = $facebook->getRedirectLoginHelper();
    $facebook_login_url = $facebook_helper->getLoginUrl('http://localhost/CupidDate/users/login');
    
    
?>