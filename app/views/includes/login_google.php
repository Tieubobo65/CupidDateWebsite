<?php
    require_once ".././google-api/vendor/autoload.php";
    $gClient = new Google_Client();
    $gClient->setClientId("396263952500-ffv710c71804nfrcaqllb59g3rql7245.apps.googleusercontent.com");
    $gClient->setClientSecret("6F3Tf_oUTtBZBqCdthSXF1dk");
    $gClient->setApplicationName("Cupid Date");
    $gClient->setRedirectUri("http://localhost:8080/CupidDate/users/login_google");
    $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

    // login URL
    $login_url = $gClient->createAuthUrl();
?>