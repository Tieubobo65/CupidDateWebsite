<?php
    require APPROOT . '/views/includes/head.php';
?>

<div id="section-landing">
    <?php
        require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<a style="cursor: unset" href="<?php echo URLROOT ?>/pages/index">
    <div class="overlay"> </div>
</a>

<div class="main">
    <div id="home-container" class="home-container show">
        <div class="slider">
            <div class="wide grid">
                <div class="row">
                    <div class="col l-4 m-6 c-12">
                        <div class="slider__title">
                            <p>Are You <span style="color: #e74c3c;">Waiting</span></p>
                            <p>For <span style="color: #e74c3c;">Dating ?</span></p>
                            <a href="<?php echo URLROOT; ?>/register">
                                <button class="button" onclick="openRegistrationForm()">Registration</button>
                            </a>
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
                        <p class="title">1711</p>
                        <p class="welcome-item__text">Total Members</p>
                    </div>
                </div>

                <div class="col l-3 m-6 c-6">
                    <div class="welcome-item">
                        <img class="welcome-item__img" src="<?php echo URLROOT; ?>/public/img/online-member.png" alt="online-members">
                        <p class="title">500</p>
                        <p class="welcome-item__text">Members online</p>
                    </div>
                </div>
                    
                <div class="col l-3 m-6 c-6">
                    <div class="welcome-item">
                        <img class="welcome-item__img" src="<?php echo URLROOT; ?>/public/img/online-men.png" alt="online-men">
                        <p class="title">300</p>
                        <p class="welcome-item__text">Men online</p>
                    </div>
                </div>
                    
                <div class="col l-3 m-6 c-6">
                    <div class="welcome-item">
                        <img class="welcome-item__img" src="<?php echo URLROOT; ?>/public/img/online-woman.png" alt="online-women">
                        <p class="title">200</p>
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

    <div class="form-container">
        <div id="registration" class="form registration row">
            <div class="col l-6 m-0 c-0">
                <div class="registration__img">
                    <img src="<?php echo URLROOT ?>/public/img/registration-img.png" alt="registration">
                </div>
            </div>

            <div class="col l-6 m-12 c-12">
                <div class="registration-container">
                    <h1 class="form__title">Registration</h1>
                    <form id="registration-form" class="registration-form" action="<?php echo URLROOT;?>/register" method="POST" novalidate>
                        <input class="form__input" type="email" name="email" id="email" placeholder="Email">
                        <span class="invalidFeedback">
                            <?php echo $data['emailError'];?> 
                        </span>

                        <input class="form__input" type="text" name="firstname" id="firstname" placeholder="First name">
                        <span class="invalidFeedback">
                            <?php echo $data['firstnameError'];?>
                        </span>

                        <input class="form__input" type="text" name="lastname" id="lastname" placeholder="Last name">
                        <span class="invalidFeedback">
                            <?php echo $data['lastnameError'];?>
                        </span>

                        <input class="form__input" type="password" name="password" id="password" placeholder="Password">
                        <span class="invalidFeedback">
                            <?php echo $data['passwordError'];?>
                        </span>

                        <input class="form__input" type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm password">
                        <span class="invalidFeedback">
                            <?php echo $data['confirmPasswordError'];?>
                        </span>

                        <select class="form__input" name="gender" id="gender" style="height: 46px;">
                            <option value="" disabled selected hidden>Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="3">Other</option>
                        </select>
                        <span class="invalidFeedback">
                            <?php echo $data['genderError'];?>
                        </span>

                        <input class="form__input" type="text" name="birthday" id="birthday" placeholder="Birthday" onfocus="(this.type='date')">
                        <span class="invalidFeedback">
                            <?php echo $data['birthdayError'];?>
                        </span>

                        <div class="registration-form__submit">
                            <div class="form__check">
                                <input type="checkbox" name="not-robot" id="not-robot">
                                <label for="not-robot">I'm Not Robot</label>
                                <span class="invalidFeedback">
                                    <?php echo $data['robotError'];?>
                                </span>
                            </div>

                            <button name="register-button" id="register-button" type="submit" value="submit" class="button">Registration</button>                                
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <a href="<?php echo URLROOT ?>/home" id="form__close" class="form__close">
            <i class="fas fa-times"></i>
        </a>
    </div>
</div>

<?php
    require APPROOT . '/views/includes/footer.php';
?>
