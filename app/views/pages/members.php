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

        <div class="seeking">
            <form action="<?php echo URLROOT; ?>/pages/members" class="seeking-form" id="seeking-form" method="POST">

                    <label for="seeking_gender">Seeking gender</label>
                    <select name="seeking_gender" id="seeking_gender" class="seeking-form__select">
                        <option value="">Any</option>
                        <option value="2">Woman</option>
                        <option value="1">Man</option>
                        <option value="3">Other</option>
                    </select>

                    <label for="from_age">From</label>
                    <select name="from_age" id="from_age" class="seeking-form__select">
                        <option value="">Any</option>
                        <?php for($i = 18; $i<71; $i++) { ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                        <?php } ?>
                    </select>

                    <label for="to_age">To</label>
                    <select name="to_age" id="to_age" class="seeking-form__select">
                        <option value="">Any</option>
                        <?php for($i = 18; $i<71; $i++) { ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                        <?php } ?>
                    </select>

                    <label for="country">Country</label>
                    <select name="country" id="country" class="seeking-form__select">
                        <option value="">Any</option>
                        <?php
                        foreach($data["country"] as $row)
                        {
                            echo '<option value="'.$row["country_id"].'">'.$row["country_name"].'</option>';
                        }
                    ?>
                    </select>

                    <label for="state">State</label>
                    <select name="state" id="state" class="seeking-form__select">
                        <option value="">Any</option>

                    </select>

                    <label for="state">City</label>
                    <select name="city" id="city" class="seeking-form__select">
                        <option value="">Any</option>

                    </select>
                    <button style="padding: 10px" type="submit" class="button">Search</button>
                </form>
        </div>

                <div  class="online-members grid wide">
                <?php if(count($data) > 1) { ?>
                    <div id="online-members" class="row">
                        <?php
                            foreach($data as $value) { 
                                if($value['id'] == NULL) {
                                    continue;
                                }
                                ?>
                            
                            <div class="col l-3 m-4 c-12">
                            <div class="member-item">
                                <a href="<?php echo URLROOT; ?>/pages/member_profile?user_id=<?php echo $value['id'];?>">
                                    <div class="member__img">
                                        <img id="img_<?php echo $value['id'];?>" src="<?php echo URLROOT; ?>/public/img/<?php echo $value['avatar']?>" alt="">
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
                                        echo ($diff->y + 1)." years old";
                                        ?>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <h3>No users available!</h3>
                    <br>        
                <?php } ?>
                </div>
    </div>
</div>

<?php
    require APPROOT . '/views/includes/footer.php';
?>