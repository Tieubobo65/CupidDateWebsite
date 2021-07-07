<div class="heading">
            <div class="grid wide heading-container ">
                <div id="heading__logo" class="heading__logo">
                    <?php if(isset($_SESSION['user_id'])) { ?>
                        <a href="<?php echo URLROOT; ?>/users/home" id="home-page">
                            <span style="color: #e74c3c">Cupid</span> Date
                        </a>
                    <?php } else { ?>
                        <a href="<?php echo URLROOT; ?>/pages/index" id="home-page">
                            <span style="color: #e74c3c">Cupid</span> Date
                        </a>
                    <?php } ?>
                        <div id="heading__menubar">
                            <i class="fas fa-bars"></i>
                        </div>
                </div>
                <nav id="heading__nav" class="heading__nav">
                    <div>
                        <ul class="list heading__nav-list">
                        <li class="heading__nav-item">
                            <a id="blog-page" style="cursor: pointer;" href="<?php echo URLROOT; ?>/blog">Blog</a>
                        </li>
                            <li class="heading__nav-item">
                                <a id="community-page" href="#">Community</a>
                                <ul class="list sub-heading__nav">
                                    <li>
                                        <a href="<?php echo URLROOT; ?>/members">Members</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo URLROOT; ?>/waiting">Waiting You</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo URLROOT; ?>/liked">Liked Members</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo URLROOT; ?>/matches">Matches</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="heading__nav-item">
                                <a id="shop-page" onclick="openShopPage()" href="#">Shop</a>
                            </li>
                            <li class="heading__nav-item">
                                <a href="">Pages</a>
                            </li>
                            <li class="heading__nav-item">
                                <a href="<?php echo URLROOT; ?>/contact">Contact us</a>
                            </li>
                        </ul>
                    </div>

                    <div class="vertical-line">
                    </div>

                    <div>
                        <ul class="list heading__nav-list">
                        <?php if(isset($_SESSION['user_id'])) : ?>
                            <li class="heading__nav-item">
                                <?php if($_SESSION['avatar']) { ?>
                                    <a href="#">
                                        <img src="<?php echo URLROOT; ?>/public/img/<?php echo $_SESSION['avatar']?>" alt="">
                                        <?php echo $_SESSION['firstname']; echo ' '; echo $_SESSION['lastname']; ?>
                                    </a>
                                <?php } else { ?>
                                    <a href="#">
                                        <img src="../public/img/avt_placeholder.svg" alt="">
                                        <?php echo $_SESSION['firstname']; echo ' '; echo $_SESSION['lastname']; ?>
                                    </a>
                                <?php } ?>

                                <ul class="list sub-heading__nav">
                                <?php if($_SESSION['city_id']) { ?>
                                    <li>
                                        <a href="<?php echo URLROOT; ?>/user_profile">Your profile</a>
                                    </li>
                                <?php } ?>
                                    <li>
                                        <a href="<?php echo URLROOT; ?>/messages">
                                            <i class="fas fa-comment-dots"></i>
                                            Messages
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo URLROOT; ?>/users/logout">Log out</a>
                                    </li>
                                </ul>
                            </li>

                            <?php else: ?>

                                <li class="heading__nav-item">
                                <a href="<?php echo URLROOT; ?>/users/login">
                                    <i class="fas fa-key"></i>
                                    Login
                                </a>
                            </li>
                            <li class="heading__nav-item">
                                <a href="<?php echo URLROOT; ?>/users/register">
                                    <i class="fas fa-user-plus"></i>
                                    Registration
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
            <div class="vertical-line">
            </div>

            <div id="heading__language">
                <ul class="heading__nav-list">
                    <li class="heading__nav-item">
                        <a href="">
                            <i class="fas fa-globe"></i>
                            English 
                            <i class="fas fa-chevron-down"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!--Nav Mobile-->
        <nav id="heading__nav-mobile" class="heading__nav-mobile">
            <div class="heading__nav-list">
                <ul>
                    <li class="heading__nav-mobile-item">
                        <a onclick="openBlogPage()" href="#">Blog</a>
                    </li>
                    <li class="heading__nav-mobile-item">
                        <a onclick="openMembersPage()" href="#">Members</a>
                    </li>
                    <li class="heading__nav-mobile-item">
                        <a onclick="openContactPage()" href="#">Contact us</a>
                    </li>
                </ul>
            </div>

            <div class="heading__nav-list">
                <ul>
                    <li class="heading__nav-mobile-item">
                        <a onclick="openLoginForm()" href="#">
                            <i class="fas fa-key"></i>
                            Login
                        </a>
                    </li>
                    <li class="heading__nav-mobile-item">
                        <a onclick="openRegistrationForm()" href="#">
                            <i class="fas fa-user-plus"></i>
                            Registration
                        </a>
                    </li>
                </ul>
            </div>

        </nav>
    </div>
</div>