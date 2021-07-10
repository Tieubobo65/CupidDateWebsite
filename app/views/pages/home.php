<?php
    require APPROOT . '/views/includes/head.php';
?>

<div id="section-landing">
    <?php
        require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div id="home-container" class="home-container show">
    <div class="slider">
        <div class="wide grid">
            <div class="row">
                <div class="col l-4 m-6 c-12">
                    <div class="slider__title">
                        <p>Are You <span style="color: #e74c3c;">Waiting</span></p>
                        <p>For <span style="color: #e74c3c;">Dating ?</span></p>
                        <?php if($_SESSION["user_id"]) { ?>
                            <a href="<?php echo URLROOT; ?>/members">
                                    <button class="button">Start Seeking your Soulmate</button>
                                </a>
                        <?php } else {?>
                        <a href="<?php echo URLROOT; ?>/register">
                            <button class="button">Registration</button>
                        </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="welcome grid wide">
        <div class="welcome-container row">
            <div class="col l-12 m-12 c-12">
                <div class="welcome__title">
                    <p class="title">Welcome to <span style="color: #e74c3c;">Cupid</span>Date</p>
                    <img class="under-title" src="<?php echo URLROOT; ?>/public/img/line-vertical.png" alt="">
                </div>
            </div>

            <div class="col l-3 m-6 c-6">
                <div class="welcome-item">
                    <img class="welcome-item__img" src="<?php echo URLROOT; ?>/public/img/total-member.png" alt="total-members">
                    <p class="title">
                        <?php
                            if (empty($data['totalMembers'])) {
                                echo 0;
                            }
                            else {
                                echo $data['totalMembers'];
                            }
                        ?>
                    </p>
                    <p class="welcome-item__text">Total Members</p>
                </div>
            </div>

            <div class="col l-3 m-6 c-6">
                <div class="welcome-item">
                    <img class="welcome-item__img" src="<?php echo URLROOT; ?>/public/img/online-member.png" alt="online-members">
                    <p class="title">
                        <?php
                            if (empty($data['totalMembers'])) {
                                echo 0;
                            }
                            else {
                                echo $data['totalMembers'];
                            }
                        ?>
                    </p>
                    <p class="welcome-item__text">Members online</p>
                </div>
            </div>
                    
            <div class="col l-3 m-6 c-6">
                <div class="welcome-item">
                    <img class="welcome-item__img" src="<?php echo URLROOT; ?>/public/img/online-men.png" alt="online-men">
                    <p class="title">
                        <?php 
                            if (empty($data['totalMen'])) {
                                echo 0;
                            }
                            else {
                                echo $data['totalMen'];
                            }
                        ?>
                    </p>
                    <p class="welcome-item__text">Men online</p>
                </div>
            </div>
                    
            <div class="col l-3 m-6 c-6">
                <div class="welcome-item">
                    <img class="welcome-item__img" src="<?php echo URLROOT; ?>/public/img/online-woman.png" alt="online-women">
                    <p class="title">
                        <?php
                            if (empty($data['totalWomen'])) {
                                echo 0;
                            }
                            else {
                                echo $data['totalWomen'];
                            }
                        ?>
                    </p>
                    <p class="welcome-item__text">Women online</p>
                </div>
            </div>
                    
        </div>
    </div>

    <div class="download">
        <div class="download-container grid wide">
            <div class="row">
                <div class="col l-6 m-12 c-12">
                    <div class="download__img">
                        <img src="<?php echo URLROOT; ?>/public/img/app-img.png" alt="app">
                    </div>
                </div>
        
                <div class="col l-6 m-12 c-12">
                    <div class="download__desc">
                        <h1 class="download__title">Download <span style="font-weight: 700;"><span style="color: #F52222;">Cupid</span>Date</span> app</h1>
                        <p class="download__desc bold">Free Available in All Store PlayStore, AppStore & Microsoft Store</p>

                        <div class="download__os">
                            <div class="download-item">
                                <a class="download__icon" href="">
                                    <i class="fab fa-android"></i>
                                </a>
                            </div>
                            <div class="download-item">
                                <a class="download__icon" href="">
                                    <i class="fab fa-apple"></i>
                                </a>
                            </div>
                            <div class="download-item">
                                <a class="download__icon" href="">
                                    <i class="fab fa-windows"></i>
                                </a>
                            </div>
                        </div>

                        <div class="download__features">
                            <div id="download__features-item-1" class="download__features-item">
                                        <i class="download__icon fas fa-user-friends"></i>
                        <p>Make friends, get to know thousands of new members every day</p>
                            </div>
            
                            <div id="download__features-item-2" class="download__features-item">
                                        Automatically suggest people who best match your criteria
                            </div>
                            <div id="download__features-item-3" class="download__features-item">
                                        Commitment to find a successful lover after 3 months
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="step grid wide">
        <div class="step-container row">
            <div class="col l-12 m-12 c-12">
                <div class="step__title">
                    <p class="title">Step to Find Your Soul mate</p>
                    <img class="under-title" src="<?php echo URLROOT; ?>/public/img/line-vertical.png" alt="">
                </div>
            </div>

            <div class="col l-4 m-4 c-12">
                <div class="step-item">
                    <img class="step-item__img" src="<?php echo URLROOT; ?>/public/img/step-1.png" alt="step-1">
                    <p class="step-item__title">Create a profile</p>
                    <p class="step-item__desc">Register or log in to your account. Create your own profile by providing some pictures and describing your personality and opinion.</p>
                </div>
            </div>

            <div class="col l-4 m-4 c-12">
                <div class="step-item">
                    <img class="step-item__img" src="<?php echo URLROOT; ?>/public/img/step-2.png" alt="step-2">
                    <p class="step-item__title">Find Matches</p>
                    <p class="step-item__desc">If you want to match someone, click the like button on their profile. If they like you too, you'll be matched!</p>
                </div>
            </div>

            <div class="col l-4 m-4 c-12">
                <div class="step-item">
                    <img class="step-item__img" src="<?php echo URLROOT; ?>/public/img/step-3.png" alt="step-3">
                    <p class="step-item__title">Start Dating</p>
                    <p class="step-item__desc">Finally, create your online dating by chatting with each other. Hope you find the right person soon!</p>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
    require APPROOT . '/views/includes/footer.php';
?>