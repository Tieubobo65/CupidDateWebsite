<?php
    require APPROOT . '/views/includes/head.php';
?>

<div id="section-landing">
    <?php
        require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div id="members-container" class="members-container show">
    <div class="members__head">
        <div class="breadcrumb">
                <div class="page-title">
                    <img src="../public/img/t-left-img.png" alt="">
                    <h1 style="font-size: 50px;">Members</h1>
                    <img src="../public/img/t-right-img.png" alt="">
                </div>
                <span>
                    <a href="<?php echo URLROOT; ?>/users/home">Home</a>
                </span>
                 » Community » 
                <span>
                    <a href="#">Members</a>
                </span>
        </div>
    </div>

    <div class="members-list">
        <div class="members__step" id="slider">
            <input type="radio" name="slider" id="slide1" checked>
            <input type="radio" name="slider" id="slide2">
            <input type="radio" name="slider" id="slide3">
            <input type="radio" name="slider" id="slide4">

            <div id="slides">
                <div id="overflow">
                    <div class="inner">
                        <div class="slide slide_1">
                            <div class="slide-content">
                                <h2>Want To Find Your Lover?</h2>
                                <p class="step">Actively Click Like!</p>
                            </div>
                        </div>

                        <div class="slide slide_2">
                            <div class="slide-content">
                                <h2>Want To Find Your Lover?</h2>
                                <p class="step">Click like back to people who already like you</p>
                            </div>
                        </div>

                        <div class="slide slide_3">
                            <div class="slide-content">
                                <h2>Want To Find Your Lover?</h2>
                                <p class="step">Wait for the person you like to respond</p>
                            </div>
                        </div>

                        <div class="slide slide_4">
                            <div class="slide-content">
                                <h2>Want To Find Your Lover?</h2>
                                <p class="step">Chat with them!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            <div id="controls">
                <label for="slide1"></label>
                <label for="slide2"></label>
                <label for="slide3"></label>
                <label for="slide4"></label>
            </div>

            <div id="bullets">
                <label for="slide1"></label>
                <label for="slide2"></label>
                <label for="slide3"></label>
                <label for="slide4"></label>
            </div>
        </div>

                <div class="online-members grid wide">
                    <div class="row">
                        <?php foreach($data['waiting'] as $value) { ?>
                            <div class="col l-3 m-4 c-12">
                            <div class="member-item">
                                <a href="#">
                                    <div class="member__img">
                                        <img id="img_<?php echo $value['id'];?>" src="<?php echo URLROOT; ?>/public/img/<?= $value['avatar']?>" alt="">
                                        <form id="<?php echo $value['id'];?>" class="like-form" action="<?php echo URLROOT;?>/pages/like" method="POST">
                                            <button id="button_<?php echo $value['id'];?>" type="submit" class="like">   
                                                <div class="member__action">
                                                    <i class="fas fa-heart"></i>
                                                    Like
                                                </div>
                                            </button>
                                    </form>  

                                    </div>
                                </a>
                                <div class="member__info">
                                    <div class="member__name">
                                        <?php echo $value['firstname'];?>
                                        <?php echo " ";?>
                                        <?php echo $value['lastname'];?>
                                    </div>
                                    <div class="member__age">
                                        <?php
                                        // Create a datetime object using date of birth
                                        $dob = new DateTime($value['birthday']);
                                     
                                        // Get today's date
                                        $now = new DateTime();
                                     
                                        // Calculate the time difference between the two dates
                                        $diff = $now->diff($dob);
                                     
                                        // Get the age in years, months and days
                                        echo $diff->y." years old";
                                        ?>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
    </div>
</div>

<?php
    require APPROOT . '/views/includes/footer.php';
?>