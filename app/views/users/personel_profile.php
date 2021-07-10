<?php
    require APPROOT . '/views/includes/head.php';
?>

<div id="section-landing">
    <?php
        require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="main">
    <div id="profile-container" class="profile-container show">
        <div id="profile__banner" class="profile__banner">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-6">
                        <div class="profile__banner-left">
                            <div class="profile__avatar">
                                <?php if($_SESSION['avatar']) { ?>
                                    <img src="<?php echo URLROOT; ?>/public/img/<?php echo $_SESSION['avatar'];?>" alt="">
                                    <input type="file" name="avatar" id="avatar" onChange="displayImage(this)" style="display: none">
                                <?php } else { ?>
                                    <img src="<?php echo URLROOT; ?>/public/img/avt.png" alt="avatar">
                                <?php } ?>

                                <i class="fas fa-camera" onclick="openChangeAvatar()"></i>
                            </div>

                            <div class="profile__user-info">
                                <div class="user__name" style="min-width: 500px">
                                    <h1>
                                        <?php echo $_SESSION['firstname'];
                                            echo " ";
                                            echo $_SESSION['lastname'];
                                        ?>
                                    </h1>
                                </div>
    
                                <div class="user__age">
                                    <?php
                                        // Create a datetime object using date of birth
                                        $dob = new DateTime($_SESSION['birthday']);
                                     
                                        // Get today's date
                                        $now = new DateTime();
                                     
                                        // Calculate the time difference between the two dates
                                        $diff = $now->diff($dob);
                                     
                                        // Get the age in years, months and days
                                        echo ($diff->y + 1)." years old";
                                    ?>
                                </div>

                                <div class="user__address">
                                    <?php 
                                        echo $data['country_name'];
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col l-6">
                        <div class="profile__banner-right">
                                <button class="button" onclick = "openDeleteAccountForm()">
                                    <i class="fas fa-trash-alt"></i>
                                    Delete Account
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="profile__detail">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-9">
                        <div class="profile__info">
                            <div class="row">
                                <div class="col l-12">
                                    <div class="profile__basic-info">
                                        Basic Information
                                        <a class="profile-edit-button" style="color: #F08080" onclick="editBasicInfo()">Edit</a>
                                    </div>
                                </div>
    
                                <div class="col l-6">
                                    <div class="row">
                                        <div class="col l-4">
                                            <div>
                                                <ul class="list profile-list">
                                                    <li>Name</li>
                                                    <li>Age</li>
                                                    <li>Birthday</li>
                                                    <li>Gender</li>
                                                    <li>Country</li>
                                                    <li>State</li>
                                                    <li>City</li>
                                                </ul>
                                            </div>
                                        </div>
    
                                        <div class="col l-8">
                                            <div>
                                                <ul class="list profile-list" style="font-weight: 700;">
                                                    <li>
                                                        <?php echo $_SESSION['firstname'];?>
                                                    </li>
                                                    <li>
                                                        <?php echo ($diff->y + 1)." years old";?>
                                                    </li>
                                                    <li>
                                                        <?php 
                                                        $timestamp = strtotime($_SESSION['birthday']);
                                                        $day = date('d', $timestamp);
                                                        $year = date('Y', $timestamp);
                                                        $month = date('m', $timestamp);
                                                        // Create date object to store the DateTime format
                                                        $dateObj = DateTime::createFromFormat('!m', $month);
                                                        // Store the month name to variable
                                                        $monthName = $dateObj->format('F');
                                                        // Display output
                                                        echo $day;
                                                        echo " ";
                                                        echo $monthName;
                                                        echo " ";
                                                        echo $year;
                                                        ?>
                                                    </li>
                                                    <li>
                                                        <?php 
                                                            switch($_SESSION['gender']) {
                                                                case 1: {
                                                                    echo "Male";
                                                                    break;
                                                                }
                                                                    
                                                                case 2: {
                                                                    echo "Female";
                                                                    break;
                                                                }
                                                                    
                                                                case 3: {
                                                                    echo "Other";
                                                                    break;
                                                                }
                                                                    
                                                                default:
                                                                    echo "Unset";
                                                                    break;
                                                            }
                                                        ?>
                                                    </li>
                                                    <li>
                                                        <?php echo $data['country_name'];?>
                                                    </li>
                                                    <li>
                                                        <?php echo $data['state_name'];?>
                                                    </li>
                                                    <li>
                                                        <?php echo $data['city_name'];?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col l-6">
                                    <div class="row">
                                        <div class="col l-4">
                                            <div>
                                                <ul class="list profile-list">
                                                    <li>Marital Status</li>
                                                    <li>Work as</li>
                                                    <li>Monthly income</li>
                                                    <li>Get married</li>
                                                    <li>Drinking alcohol</li>
                                                    <li>Smoking</li>
                                                    <li>Day off</li>
                                                </ul>
                                            </div>
                                        </div>
    
                                        <div class="col l-8">
                                            <div>
                                                <ul class="list profile-list" style="font-weight: 700;">
                                                <li>
                                                        <?php
                                                        switch($_SESSION['status']) {
                                                            case 0: {
                                                                echo "Single";
                                                                break;
                                                            }
                                                            case 1: {
                                                                echo "Single (Divorced)";
                                                                break;
                                                            }
                                                            case 2: {
                                                                echo "Single (Deceased Spouse)";
                                                                break;
                                                            }
                                                            default:
                                                                echo "Unset";
                                                                break;
                                                        }
                                                        ?>
                                                    </li>
                                                    <li>
                                                        <?php echo $_SESSION['job'];?>
                                                    </li>
                                                    <li>
                                                        <?php
                                                            switch($_SESSION['income']) {
                                                                case 0:
                                                                    echo "No income";
                                                                    break;
                                                                case 1:
                                                                    echo "Less than $500";
                                                                    break;
                                                                case 2:
                                                                    echo "From $500 to $1000";
                                                                    break;
                                                                case 3:
                                                                    echo "From $1000 to $2000";
                                                                    break;
                                                                case 4:
                                                                    echo "From $2000 to $3000";
                                                                    break;
                                                                case 5:
                                                                    echo "More than $3000";
                                                                    break;
                                                                default:
                                                                    echo "Unset";
                                                                    break;
                                                            }
                                                            ?>
                                                    </li>
                                                    <li>
                                                        <?php
                                                            switch($_SESSION['getmarried']) {
                                                                case 0:
                                                                    echo "Want to get married soon";
                                                                    break;
                                                                case 1:
                                                                    echo "Within the next few years";
                                                                    break;
                                                                case 2:
                                                                    echo "When meeting the right person";
                                                                    break;
                                                                case 3: 
                                                                    echo "Not want to get married";
                                                                    break;
                                                                default:
                                                                    echo "Unset";
                                                                    break;
                                                            }
                                                        ?>
                                                    </li>
                                                    <li>
                                                        <?php
                                                        switch($_SESSION['alcohol']) {
                                                            case 0:
                                                                echo "No";
                                                                break;
                                                            case 1:
                                                                echo "Yes";
                                                                break;
                                                            case 2:
                                                                echo "Sometimes";
                                                                break;
                                                            default:
                                                                echo "Unset";
                                                                break;
                                                        }?>
                                                    </li>
                                                    <li>
                                                    <?php
                                                        switch($_SESSION['cigarettes']) {
                                                            case 0:
                                                                echo "No";
                                                                break;
                                                            case 1:
                                                                echo "Yes";
                                                                break;
                                                            case 2:
                                                                echo "Sometimes";
                                                                break;
                                                            default:
                                                                echo "Unset";
                                                                break;
                                                        }?>
                                                    </li>
                                                    <li>
                                                    <?php
                                                        switch($_SESSION['dayoff']) {
                                                            case 0:
                                                                echo "Saturday and Sunday";
                                                                break;
                                                            case 1:
                                                                echo "Weekdays";
                                                                break;
                                                            case 2:
                                                                echo "Depending on each week";
                                                                break;
                                                            default:
                                                                echo "Unset";
                                                                break;
                                                        }?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col l-12">
                                    <div class="profile__intro">
                                        <div class="profile-title">
                                            <h1>About me</h1>
                                            <a style="color: #F08080" class="profile-edit-button" onclick="editAbout()">Edit</a>
                                        </div>
                                        <?php
                                            echo $_SESSION['user_about'];
                                        ?>
                                    </div>
                                </div>

                                <div class="col l-12">
                                    <div class="profile__intro">
                                        <div class="profile-title">
                                            <h1>Characters</h1>
                                            <a style="color: #F08080" class="profile-edit-button" onclick="editCharacter()">Edit</a>
                                        </div>
                                        <?php echo $_SESSION['user_character'];?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col l-3">
                        <div class="profile__photos">
                            <div class="row">
                                <div class="col l-12">
                                    <h2>Photos</h2>
                                    <img src="<?php echo URLROOT; ?>/public/img/widget-title-border.png" alt="">
                                </div>
                                
                                <?php foreach($data['photos'] as $value) {?>
                                <div class="col l-6">
                                    <div class="profile__photo-item">
                                        <img src="<?php echo URLROOT; ?>/public/img/<?php echo $value['photo_name'] ;?>" alt="" onclick="openPhoto(this.src);">
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="col l-6">
                                    <div id="profile__photo-add" onclick="openAddPhotoForm()" class="profile__photo-item">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a style="cursor: unset">
    <div id="overlay_invisible" onclick="closeForm()"> </div>
    </a>

    <div class="form-container" id="form-container-photo">
        <div id="add_photo" class="form row">
            <div class="add_photo-container">
                <h1 class="form__title">Add some new photos!</h1>
                <form id="add_photo-form" class="add_photo-form" action="<?php echo URLROOT;?>/user_profile" method="POST" enctype="multipart/form-data">
                    <button id="add_photo-button" onclick="phototriggerClick()" class="button">Upload photo from your device</button>
                    <input type="file" name="photo" id="photo" onChange="displayPhoto(this)" style="display: none">
                    <div class="add_photo-form-submit">
                        <h3>Your photo here</h3>
                        <img id="photo_upload" src="" alt="">
                        <br>
                        <button type="submit" class="button">Save</button>
                    </div>
                </form>

                <div class="suggestion">
                    <h3>Suggestion from Cupid Date</h3>
                    <div class="row">
                        <div class="col l-4">
                            <div class="suggestion__item">
                                <i class="fas fa-check-circle"></i>
                                <img src="<?php echo URLROOT; ?>/public/img/suggest_1.jpg" alt="">
                                <p>Your own photo</p>
                            </div>
                        </div>

                        <div class="col l-4">
                            <div class="suggestion__item">
                                <i class="fas fa-check-circle"></i>
                                <img src="<?php echo URLROOT; ?>/public/img/suggest_2.jpg" alt="">
                                <p>Just be yourself</p>
                            </div>
                        </div>

                        <div class="col l-4">
                            <div class="suggestion__item">
                                <i class="fas fa-check-circle"></i>
                                <img src="<?php echo URLROOT; ?>/public/img/suggest_3.jpg" alt="">
                                <p>Real & clear images</p>
                            </div>
                        </div>
                    </div>
                    <a href="#">Refer for photo selection tips here</a>
                </div>


            </div>
        </div>
        <a onclick="closeForm()" id="form__close" class="form__close">
            <i class="fas fa-times"></i>
        </a>
    </div>

    <div class="form-container" id="open-photo">
        <div id="photo" class="row">
            <img id="open-photo__img" src="" alt="">
        </div>
    </div>

    <div class="form-container" id="change-avt">
        <div class="form row">
            <div class="change-avt-container">
                <h1 class="form__title">Set a new avatar!</h1>
                <form id="change-avt-form" class="change-avt-form" action="<?php echo URLROOT;?>/user_profile" method="POST" enctype="multipart/form-data">
                    <div class="change-avt__button">
                        <button id="upload-avt-button" onclick="avttriggerClick()" class="button">Upload photo from your device</button><br>
                        <input type="file" name="avt" id="avt" onChange="displayAvt(this)" style="display: none">

                        <div class="uploaded-photos">
                            <h3>Choose from your uploaded pictures</h3>
                            <div class="row">
                                <?php foreach($data['photos'] as $value) {?>
                                    <div class="col l-4">
                                        <div class="profile__photo-item">
                                            <img src="<?php echo URLROOT; ?>/public/img/<?php echo $value['photo_name'] ;?>" id="<?php echo $value['photo_name'] ;?>" alt="" onclick="chooseAvt(this.src, this.id)">
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
 
                        </div>
                        <input type="text" name="avt_url" id="avt_url" style="display: none">
                     </div>

                     <div class="change-avt-submit">
                        <img id="new-avt" src="<?php echo URLROOT; ?>/public/img/<?php echo $_SESSION['avatar'];?>" alt=""><br>
                        <button id="avt-cancel" type="button" class="button" onclick="cancelAvatar()">Cancel</button>
                        <button id="avt-submit" type="submit" class="button">Save</button><br>
                     </div>
                     
                </form>
            </div>
        </div>
        <a onclick="closeForm()" id="form__close" class="form__close">
            <i class="fas fa-times"></i>
        </a>
    </div>

    <div class="form-container" id="delete-account">
        <div class="form row">
            <div class="delete-account-container">
                <h3 class="form__title">Are you sure you want to delete your account?</h3>
                <p>☛ All images will be completely deleted</p>
                <p>☛ Your account will not show up in search results</p>
                <p>☛ Your account can no longer be viewed by others</p>
                <form id="<?php echo $_SESSION["user_id"];?>" class="delete-account-form" action="<?php echo URLROOT;?>/home" method="POST">
                    <button type="submit" class="button">I agree to delete my account</button>
                    <button type="button" class="button" onclick = "closeForm()">Cancel</button>
                </form>
            </div>
        </div>
        <a onclick="closeForm()" id="form__close" class="form__close">
            <i class="fas fa-times"></i>
        </a>
    </div>

    <div class="form-container" id="edit-basic-info">
        <div class="form row">
        <div class="edit-basic-info-container">
                <h1 class="form__title">Edit your information</h1>
                <form id="edit-basic-info-form" class="edit-basic-info-form" action="<?php echo URLROOT;?>/user_profile" method="POST">
                <div class="row">
                <div class="col l-6">
                    <div class="form-line">
                        <label for="new_firstname">First name: </label>
                        <input type="text" class="form__input form-edit-input" name="new_firstname" id="new_firstname" placeholder = "<?php echo $_SESSION['firstname'];?>">
                    </div>

                    <div class="form-line">
                        <label for="new_lastname">Last name: </label>
                        <input type="text" class="form__input form-edit-input" name="new_lastname" id="new_lastname" placeholder = "<?php echo $_SESSION['lastname'];?>">
                    </div>

                    <div class="form-line">
                        <label for="new_gender">Gender: </label>
                        <select class="form__input form-edit-input" name="new_gender" id="new_gender" style="height: 46px;">
                            <option value="" disabled selected hidden>
                                <?php 
                                    switch($_SESSION['gender']) {
                                        case 1: {
                                            echo "Male";
                                            break;
                                        }
                                                                    
                                        case 2: {
                                            echo "Female";
                                            break;
                                        }
                                                                    
                                        case 3: {
                                            echo "Other";
                                            break;
                                        }
                                                                    
                                        default:
                                            echo "Unset";
                                            break;
                                    }
                                ?>
                            </option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="3">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-line">
                        <label for="new_birthday">Birthday: </label>
                        <input class="form__input form-edit-input" type="text" name="new_birthday" id="new_birthday" placeholder="<?php echo $_SESSION['birthday'];?>" onfocus="(this.type='date')">
                    </div>

                    <div class="form-line">
                        <label for="edit_country">Country: </label>
                        <select class="form__input form-edit-input" name="edit_country" id="edit_country">
                            <option value="" disable selected hidden>
                                <?php echo $data['country_name'];?>
                            </option>
                            <?php
                            foreach($data["country"] as $row)
                            {
                                echo '<option value="'.$row["country_id"].'">'.$row["country_name"].'</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-line">
                        <label for="edit_state">State: </label>
                        <select class="form__input form-edit-input" name="edit_state" id="edit_state">
                            <option value="" disable selected hidden>
                                <?php echo $data['state_name'];?>
                            </option>
                        </select>
                    </div>

                    
                    <div class="form-line">
                        <label for="edit_city">City: </label>
                        <select class="form__input form-edit-input" name="edit_city" id="edit_city">
                            <option value="" disable selected hidden>
                                <?php echo $data['city_name'];?>
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col l-6">
                    <div class="form-line">
                        <label for="new_status">Marital status: </label>
                        <select class="form__input form-edit-input" name="new_status" id="new_status">
                            <option value="" disable selected hidden>
                            <?php
                                switch($_SESSION['status']) {
                                    case 0: {
                                        echo "Single";
                                        break;
                                    }
                                    case 1: {
                                        echo "Single (Divorced)";
                                        break;
                                    }
                                    case 2: {
                                        echo "Single (Deceased Spouse)";
                                        break;
                                    }
                                    default:
                                        echo "Unset";
                                        break;
                                }
                            ?>
                            </option>
                            <option value="0">Single</option>
                            <option value="1">Single (Divorced)</option>
                            <option value="2">Single (Deceased spouse)</option>
                        </select>
                    </div>

                    <div class="form-line">
                        <label for="new_job">Occupation: </label>
                        <input type="text" class="form__input form-edit-input" name="new_job" id="new_job" placeholder = "<?php echo $_SESSION['job'];?>">
                    </div>

                    <div class="form-line">
                        <label for="new_gender">Monthly income: </label>
                        <select class="form__input form-edit-input" name="new_income" id="new_income" style="height: 46px;">
                            <option value="" disabled selected hidden>
                            <?php
                                switch($_SESSION['income']) {
                                    case 0:
                                        echo "No income";
                                        break;
                                    case 1:
                                        echo "Less than $500";
                                        break;
                                    case 2:
                                        echo "From $500 to $1000";
                                        break;
                                    case 3:
                                        echo "From $1000 to $2000";
                                        break;
                                    case 4:
                                        echo "From $2000 to $3000";
                                        break;
                                    case 5:
                                        echo "More than $3000";
                                         break;
                                    default:
                                        echo "Unset";
                                        break;
                                }
                                ?>
                                                    
                            </option>
                            <option value="0">No income</option>
                            <option value="1">Less than $500</option>
                            <option value="2">From $500 to $1000</option>
                            <option value="3">From $1001 to $2000</option>
                            <option value="4">From $2001 to $3000</option>
                            <option value="5">More than $3000</option>
                        </select>
                    </div>
                    
                    <div class="form-line">
                        <label for="new_getmarried">Marital status: </label>
                        <select class="form__input form-edit-input" name="new_getmarried" id="new_getmarried">
                            <option value="" disable selected hidden>
                            <?php
                                switch($_SESSION['getmarried']) {
                                    case 0:
                                        echo "Want to get married soon";
                                        break;
                                    case 1:
                                        echo "Within the next few years";
                                        break;
                                case 2:
                                        echo "When meeting the right person";
                                        break;
                                     case 3: 
                                           echo "Not want to get married";
                                        break;
                                    default:
                                        echo "Unset";
                                        break;
                                }
                            ?>
                            </option>
                            <option value="0">Want to get married soon</option>
                            <option value="1">Within the next few years</option>
                            <option value="2">When meeting the right person</option>
                            <option value="3">Not want to get married</option>
                        </select>
                    </div>

                    <div class="form-line">
                        <label for="new_alcohol">Drinking alcohol: </label>
                        <select class="form__input form-edit-input" name="new_alcohol" id="new_alcohol">
                            <option value="" disable selected hidden>
                            <?php
                                switch($_SESSION['alcohol']) {
                                    case 0:
                                    echo "No";
                                    break;
                                case 1:
                                    echo "Yes";
                                    break;
                                case 2:
                                    echo "Sometimes";
                                    break;
                                default:
                                    echo "Unset";
                                break;
                            }?>
                            </option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            <option value="2">Sometimes</option>
                        </select>
                    </div>

                    <div class="form-line">
                        <label for="new_cigarettes">Cigarettes: </label>
                        <select class="form__input form-edit-input" name="new_cigarettes" id="new_cigarettes">
                            <option value="" disable selected hidden>
                            <?php
                                switch($_SESSION['cigarettes']) {
                                    case 0:
                                    echo "No";
                                    break;
                                case 1:
                                    echo "Yes";
                                    break;
                                case 2:
                                    echo "Sometimes";
                                    break;
                                default:
                                    echo "Unset";
                                break;
                            }?>
                            </option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            <option value="2">Sometimes</option>
                        </select>
                    </div>

                    
                    <div class="form-line">
                        <label for="new_dayoff">Day off: </label>
                        <select class="form__input form-edit-input" name="new_dayoff" id="new_dayoff">
                            <option value="" disable selected hidden>
                                <?php
                                    switch($_SESSION['dayoff']) {
                                        case 0:
                                            echo "Saturday and Sunday";
                                            break;
                                        case 1:
                                            echo "Weekdays";
                                            break;
                                        case 2:
                                            echo "Depending on each week";
                                            break;
                                        default:
                                            echo "Unset";
                                            break;}?>
                            </option>
                            <option value="0">Saturday and Sunday</option>
                            <option value="1">Weekdays</option>
                            <option value="2">Depending on each week</option>
                        </select>
                    </div>
                </div>
                </div>
                     <div class="edit-submit">
                        <button id="edit-cancel" type="button" class="button" onclick="closeForm()">Cancel</button>
                        <button id="edit-submit" type="submit" class="button">Save</button><br>
                     </div>
                     
                </form>
            </div>
    </div>
    <a onclick="closeForm()" id="form__close" class="form__close">
            <i class="fas fa-times"></i>
    </a>
    </div>

    <div class="form-container" id="edit-about">
        <div class="form row">
            <div class="edit-about-container">
                <h3 class="form__title">Say something new about yourself!</h3>
                <form id="<?php echo $_SESSION["user_id"];?>" class="edit-about-form" action="<?php echo URLROOT;?>/user_profile" method="POST">
                    <textarea class="form__input" name="new_about" rows="6" id="new_about"><?php echo $_SESSION['user_about'];?></textarea>
                    <div class="about-submit">
                        <button type="button" class="button" onclick = "closeForm()">Cancel</button>
                        <button type="submit" class="button">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <a onclick="closeForm()" id="form__close" class="form__close">
            <i class="fas fa-times"></i>
        </a>
    </div>

    <div class="form-container" id="edit-character">
        <div class="form row">
            <div class="edit-character-container">
                <h3 class="form__title">How would you describe yourself?</h3>
                <form id="<?php echo $_SESSION["user_id"];?>" class="edit-character-form" action="<?php echo URLROOT;?>/user_profile" method="POST">
                    <textarea class="form__input" name="new_character" rows="6" id="new_character"><?php echo $_SESSION['user_character'];?></textarea>
                    <div class="about-submit">
                        <button type="button" class="button" onclick = "closeForm()">Cancel</button>
                        <button type="submit" class="button">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <a onclick="closeForm()" id="form__close" class="form__close">
            <i class="fas fa-times"></i>
        </a>
    </div>
</div>


<?php
    require APPROOT . '/views/includes/footer.php';
?>