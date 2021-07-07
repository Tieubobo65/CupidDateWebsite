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
                                <?php if($data['user_detail']['avatar']) { ?>
                                    <img src="<?php echo URLROOT; ?>/public/img/<?php echo $data['user_detail']['avatar'];?>" alt="" onclick="openAvt(this.src)" style="cursor: pointer">
                                <?php } else { ?>
                                    <img src="<?php echo URLROOT; ?>/public/img/avt.png" alt="avatar">
                                <?php } ?>
                            </div>

                            <div class="profile__user-info">
                                <div class="user__name" style="min-width: 500px">
                                    <h1>
                                        <?php echo $data['user_detail']['firstname'];
                                            echo " ";
                                            echo $data['user_detail']['lastname'];
                                        ?>
                                    </h1>
                                </div>
    
                                <div class="user__age">
                                    <?php
                                        // Create a datetime object using date of birth
                                        $dob = new DateTime($data['user_detail']['birthday']);
                                     
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
                                        echo $data['address']['country'];
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col l-6">
                        <div class="profile__banner-right">
                            <?php if($data["like"] == 1) { ?>
                                <form name="profile__unlike-form" id="<?php echo $data['user_detail']['id'];?>" class="profile__unlike-form" action="<?php echo URLROOT;?>/members/unlike" method="POST">
                                    <button class="button" type="submit" id="unlike_button">
                                        <i class="fas fa-heart"></i>
                                        Unlike
                                    </button>
                                </form>

                                <form style = "display: none" name="profile__like-form" id="<?php echo $data['user_detail']['id'];?>" class="profile__like-form" action="<?php echo URLROOT;?>/members/like" method="POST">
                                    <button class="button" type="submit" id="like_button">
                                        <i class="fas fa-heart"></i>
                                        Like
                                    </button>
                                </form>
                                <button class="button">
                                <i class="fas fa-comment"></i>
                                    Message
                                </button>
                            <?php } else {?>
                                <form name="profile__like-form" id="<?php echo $data['user_detail']['id'];?>" class="profile__like-form" action="<?php echo URLROOT;?>/members/like" method="POST">
                                    <button class="button" type="submit" id="like_button">
                                        <i class="fas fa-heart"></i>
                                        Like
                                    </button>
                                </form>

                                <form style = "display: none" name="profile__unlike-form" id="<?php echo $data['user_detail']['id'];?>" class="profile__unlike-form" action="<?php echo URLROOT;?>/members/unlike" method="POST">
                                    <button class="button" type="submit" id="unlike_button">
                                        <i class="fas fa-heart"></i>
                                        Unlike
                                    </button>
                                </form>

                                <button class="button">
                                <i class="fas fa-comment"></i>
                                    Message
                                </button>
                            <?php } ?>
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
                                                        <?php echo $data['user_detail']['firstname'];?>
                                                    </li>
                                                    <li>
                                                        <?php echo ($diff->y + 1)." years old";?>
                                                    </li>
                                                    <li>
                                                        <?php 
                                                        $timestamp = strtotime($data['user_detail']['birthday']);
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
                                                            switch($data['user_detail']['gender']) {
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
                                                        <?php echo $data['address']['country'];?>
                                                    </li>
                                                    <li>
                                                        <?php echo $data['address']['state'];?>
                                                    </li>
                                                    <li>
                                                        <?php echo $data['address']['city'];?>
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
                                                        switch($data['user_detail']['status']) {
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
                                                        <?php echo $data['user_detail']['job'];?>
                                                    </li>
                                                    <li>
                                                        <?php
                                                            switch($data['user_detail']['income']) {
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
                                                            switch($data['user_detail']['getmarried']) {
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
                                                        switch($data['user_detail']['alcohol']) {
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
                                                        switch($data['user_detail']['cigarettes']) {
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
                                                        switch($data['user_detail']['dayoff']) {
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
                                        </div>
                                        <?php
                                            echo $data['user_detail']['user_about'];
                                        ?>
                                    </div>
                                </div>

                                <div class="col l-12">
                                    <div class="profile__intro">
                                        <div class="profile-title">
                                            <h1>About me</h1>
                                        </div>
                                        <?php echo $data['user_detail']['user_character'];?>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a style="cursor: unset">
    <div id="overlay_invisible" onclick="closeAvt()"> </div>
    </a>

    <div class="form-container" id="open-photo">
        <div id="photo" class="row">
            <img id="open-photo__img" src="" alt="">
        </div>
    </div>

    <div class="form-container" id="open-avt">
        <div id="avt" class="row">
            <img id="open-avt__img" src="" alt="">
        </div>
    </div>
</div>


<?php
    require APPROOT . '/views/includes/footer.php';
?>