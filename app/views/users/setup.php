<?php
    require APPROOT . '/views/includes/head.php';
?>

<div id="section-landing">
    <?php
        require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="main">
    <div class="setup-container">
        <div id="setup__step-0" class="setup__step show">
            <h1>Let's start with the basics</h1>
            <img style="margin-bottom: 20px" class="under-title" src="<?php echo URLROOT; ?>/public/img/line-vertical.png" alt="">
            <h4>Set up your profile to meet new people!</h4>
            <img src="<?php echo URLROOT; ?>/public/img/setup.png" alt="setup-img">
            <br>
            <button id="setup__next-0" class="button" onclick="openFirstStep()";>NEXT</button>
        </div>

        <div id="setup__step-1" class="setup__step">
            <h1>Where do you live?</h1>
            <img style="margin-bottom: 20px" class="under-title" src="<?php echo URLROOT; ?>/public/img/line-vertical.png" alt="">
            <br>            
            <select class="form__input setup__input" name="country" id="country">
                    <option value="" disable selected hidden>Select Country *</option>
                    <?php
                    foreach($data["country"] as $row)
                        {
                            echo '<option value="'.$row["country_id"].'">'.$row["country_name"].'</option>';
                        }
                    ?>
            </select>
            <span class="invalidFeedback" id='countryError'>
                *Please select your country!
            </span>

            <select class="form__input setup__input" name="state" id="state">
                    <option value="" disable selected hidden>Select State *</option>
            </select>
            <span class="invalidFeedback" id='stateError'>
                *Please select your state!
            </span>

            <select class="form__input setup__input" name="city" id="city">
                    <option value="" disable selected hidden>Select City *</option>
            </select>
            <span class="invalidFeedback" id='cityError'>
                *Please select your city!
            </span>

            <div class="setup__note">
                <i class="fas fa-eye"></i>
                <p>This info will be visible to others</p>
            </div>
            <div class="setup__button">
                <button id="setup_next-1" class="button" onclick="openSetup()";>PREVIOUS</button>
                <button id="setup_next-1" class="button" onclick="openSecondStep()";>NEXT</button>
            </div>
        </div>

        <div id="setup__step-2" class="setup__step">
            <h1>What is your occupation?</h1>
            <img style="margin-bottom: 20px" class="under-title" src="<?php echo URLROOT; ?>/public/img/line-vertical.png" alt="">
            <br>
            <form class="job-form" action="<?php echo URLROOT;?>/users/fetch_job" method="POST">
                <div>
                    <input style="max-width: 30%; margin-bottom:20px" name="job" id="job" class="form__input" type="text" placeholder="Occupation">
                </div>

                <div class="setup__note">
                    <i class="fas fa-eye"></i>
                    <p>This info will be visible to others</p>
                </div>

                <div class="setup__button">
                    <button class="button" onclick="openFirstStep()";>PREVIOUS</button>
                    <button class="button" type="submit" onclick="openThirdStep()";>NEXT</button>
                </div>
            </form>
        </div>

        <div id="setup__step-3" class="setup__step">
            <h1>What is your monthly income?</h1>
            <img style="margin-bottom: 20px" class="under-title" src="<?php echo URLROOT; ?>/public/img/line-vertical.png" alt="">
            <br>
            <form class="income-form" action="<?php echo URLROOT;?>/users/fetch_income" method="POST">
                <select class="form__input setup__input" name="income" id="income">
                    <option value="" disable selected hidden>Choose income level</option>
                    <option value="0">No income</option>
                    <option value="1">Less than $500</option>
                    <option value="2">From $500 to $1000</option>
                    <option value="3">From $1001 to $2000</option>
                    <option value="4">From $2001 to $3000</option>
                    <option value="5">More than $3000</option>
                </select>
                
                <div class="setup__note">
                    <i class="fas fa-eye"></i>
                    <p>This info will be visible to others</p>
                </div>

                <div class="setup__button">
                    <button class="button" onclick="openSecondStep()";>PREVIOUS</button>
                    <button type="submit" class="button" onclick="openFourthStep()";>NEXT</button>
                </div>
            </form>
        </div>

        <div id="setup__step-4" class="setup__step">
            <h1>What is your marital status?</h1>
            <img style="margin-bottom: 20px" class="under-title" src="<?php echo URLROOT; ?>/public/img/line-vertical.png" alt="">
            <br>
            <form class="status-form" action="<?php echo URLROOT;?>/users/fetch_status" method="POST">
                <select class="form__input setup__input" name="status" id="status">
                    <option value="" disable selected hidden>Marital status</option>
                    <option value="0">Single</option>
                    <option value="1">Single (Divorced)</option>
                    <option value="2">Single (Deceased spouse)</option>
                </select>
                
                <div class="setup__note">
                    <i class="fas fa-eye"></i>
                    <p>This info will be visible to others</p>
                </div>

                <div class="setup__button">
                    <button class="button" onclick="openThirdStep()";>PREVIOUS</button>
                    <button type="submit" class="button" onclick="openFifthStep()";>NEXT</button>
                </div>
            </form>
        </div>

        <div id="setup__step-5" class="setup__step">
            <h1>When do you want to get married?</h1>
            <img style="margin-bottom: 20px" class="under-title" src="<?php echo URLROOT; ?>/public/img/line-vertical.png" alt="">
            <br>
            <form class="get-married-form" action="<?php echo URLROOT;?>/users/fetch_get_married" method="POST">
                <select class="form__input setup__input" name="getMarried" id="getMarried">
                    <option value="" disable selected hidden>Select here</option>
                    <option value="0">Want to get married soon</option>
                    <option value="1">Within the next few years</option>
                    <option value="2">When meeting the right person</option>
                    <option value="3">Not want to get married</option>
                </select>
                
                <div class="setup__note">
                    <i class="fas fa-eye"></i>
                    <p>This info will be visible to others</p>
                </div>

                <div class="setup__button">
                    <button class="button" onclick="openFourthStep()";>PREVIOUS</button>
                    <button type="submit" class="button" onclick="openSixStep()";>NEXT</button>
                </div>
            </form>
        </div>

        <div id="setup__step-6" class="setup__step">
            <h1>Do you often use stimulants?</h1>
            <img style="margin-bottom: 20px" class="under-title" src="<?php echo URLROOT; ?>/public/img/line-vertical.png" alt="">
            <br>
            <form class="stimulants-form" action="<?php echo URLROOT;?>/users/fetch_stimulants" method="POST">
                <select class="form__input setup__input" name="alcohol" id="alcohol">
                    <option value="" disable selected hidden>Alcohol</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    <option value="2">Sometimes</option>
                </select>
                <br>
                <select class="form__input setup__input" name="cigarettes" id="cigarettes">
                    <option value="" disable selected hidden>Cigarettes</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    <option value="2">Sometimes</option>
                </select>
                <div class="setup__note">
                    <i class="fas fa-eye"></i>
                    <p>This info will be visible to others</p>
                </div>

                <div class="setup__button">
                    <button class="button" onclick="openFifthStep()";>PREVIOUS</button>
                    <button type="submit" class="button" onclick="openSevenStep()";>NEXT</button>
                </div>
            </form>
        </div>

        <div id="setup__step-7" class="setup__step">
            <h1>What days off do you have each week?</h1>
            <img style="margin-bottom: 20px" class="under-title" src="<?php echo URLROOT; ?>/public/img/line-vertical.png" alt="">
            <br>
            <form class="dayoff-form" action="<?php echo URLROOT;?>/users/fetch_dayoff" method="POST">
                <select class="form__input setup__input" name="dayoff" id="dayoff">
                    <option value="" disable selected hidden>Day offs</option>
                    <option value="0">Saturday and Sunday</option>
                    <option value="1">Weekdays</option>
                    <option value="2">Depending on each week</option>
                </select>
                <div class="setup__note">
                    <i class="fas fa-eye"></i>
                    <p>This info will be visible to others</p>
                </div>

                <div class="setup__button">
                    <button class="button" onclick="openSixStep()";>PREVIOUS</button>
                    <button type="submit" class="button" onclick="openEightStep()";>NEXT</button>
                </div>
            </form>
        </div>

        <div id="setup__step-8" class="setup__step">
            <h1>Say something about yourself!</h1>
            <img style="margin-bottom: 20px" class="under-title" src="<?php echo URLROOT; ?>/public/img/line-vertical.png" alt="">
            <br>
            <p style="text-align: justify; max-width: 40%; margin: auto">Example: Hello! Nice to have the opportunity to get to know you on Cupid. I'm also quite busy and sometimes a bit engrossed in career development, but still have free time to do the things I love. I love learning about cars and technology. In addition, I also love to travel, so I sometimes pick up my motorbike and go :D If you have any common interests, please "Like" me to share and chat more with me. I really hope to have someone to accompany and share everything with me in life.</p>
            <br>
            <form class="about-form" action="<?php echo URLROOT;?>/users/fetch_about" method="POST">
                <textarea style="max-width: 40%" class="form__input" name="user_about" id="user_about" cols="" rows="6">
                </textarea>

                <div class="setup__note">
                    <i class="fas fa-eye"></i>
                    <p>This info will be visible to others</p>
                </div>

                <div class="setup__button">
                    <button class="button" onclick="openSevenStep()";>PREVIOUS</button>
                    <button type="submit" class="button" onclick="openNineStep()";>NEXT</button>
                </div>
            </form>
        </div>

        <div id="setup__step-9" class="setup__step">
            <h1>How would you describe yourself?</h1>
            <img style="margin-bottom: 20px" class="under-title" src="<?php echo URLROOT; ?>/public/img/line-vertical.png" alt="">
            <br>
            <p style="text-align: justify; max-width: 40%; margin: auto">Example: I am always ready to try new things. Tends to be outgoing, cheerful, energetic. Being emotional but not good at expressing it to others. At work, I am organized and reliable. I am quite sensitive when it comes to love and is easy to act on emotions.</p>
            <br>
            <form class="character-form" action="<?php echo URLROOT;?>/users/fetch_character" method="POST">
                <textarea style="max-width: 40%" class="form__input" name="user_character" id="user_character" cols="" rows="6">
                </textarea>

                <div class="setup__note">
                    <i class="fas fa-eye"></i>
                    <p>This info will be visible to others</p>
                </div>

                <div class="setup__button">
                    <button class="button" onclick="openEightStep()";>PREVIOUS</button>
                    <button type="submit" class="button" onclick="openTenStep()";>NEXT</button>
                </div>
            </form>
        </div>

        <div id="setup__step-10" class="setup__step">
            <h1>Set your new avatar!</h1>
            <img style="margin-bottom: 20px" class="under-title" src="<?php echo URLROOT; ?>/public/img/line-vertical.png" alt="">
            <br>
            <h4>Upload a photo of your face for a better experience!</h4>
            <br>
            <form class="avatar-form" action="<?php echo URLROOT;?>/users/home" method="POST" enctype="multipart/form-data">
                    <img src="../public/img/add_picture.png" alt="" onclick="triggerClick()" id="profileDisplay">
                    <input type="file" name="avatar" id="avatar" onChange="displayImage(this)" style="display: none">
                    <div class="setup__button">
                        <button class="button" onclick="openNineStep()";>PREVIOUS</button>
                        <button type="submit" name="save_avatar" class="button" onclick="open11Step()" style="padding: 10px 20px">SAVE AND GO TO HOME PAGE</button>
                    </div>
            </form>
        </div>
    </div>
</div>