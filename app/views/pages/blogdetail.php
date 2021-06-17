<?php
    require APPROOT . '/views/includes/head.php';
    $post = $data['post'];
?>

<div id="section-landing">
    <?php
        require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<!-- Begin blog detail -->
<div id="blog_detail-container">
    <div class="wide grid">
        <div class="row blog_detail__container">
            <div class="col l-8">
                <!-- Begin show post content -->
                <div class="blog_detail__list">
                    <div class="blog_detail-item">
                        <div class="blog_detail__img">
                            <img src="<?php echo URLROOT; ?>/public/img/blog-1.jpg" alt="image">
                        </div>
                        <div class="blog_detail__header">
                            <h2><?php echo $post['title'] ?></h2>
                            <div class="row blog_detail__info">
                                <div class="col l-8 blog_detail__topic">
                                    <span>Topic</span>
                                </div>
                                <div class="col l-4 blog_detail__author">
                                    <span>By </span>
                                    <a href="#">
                                        <span style="font-weight: bold; color: #374957;"><?php echo $post['firstname'] . " " . $post['lastname'] ?></span>
                                    </a>
                                    <span>•</span>
                                    <span><?php echo date("d/m/Y" , strtotime($post['created_at'])) ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="blog_detail__body">
                            <p>
                                <?php echo $post['content'] ?>
                            </p>
                        </div>
                        <div class="row blog_detail__more">
                            <div class="author">
                                <span>By </span>
                                <a href="#">
                                    <span style="font-weight: bold; color: #374957;"><?php echo $post['firstname'] . " " . $post['lastname'] ?></span>
                                </a>
                            </div>
                            <div class="share">
                                <span>SHARE:</span>
                                <span>
                                    <ul>
                                        <li>
                                            <a href=""><i class="fab fa-facebook-f" style="color: #3b5998;"></i></a>
                                        </li>
                                        <li>
                                            <a href=""><i class="fab fa-instagram" style="color: #E1306C;"></i></a>
                                        </li>
                                        <li>
                                            <a href=""><i class="fab fa-twitter" style="color: #00acee;"></i></a>
                                        </li>
                                    </ul>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End show post content -->

                <!-- Begin related posts -->
                <div class="related-posts">
                    <h3 style="margin: 20px 0;">Related Posts</h3>
                    <div class="row related-posts-list">
                        <div class="col l-6 related-posts-item">
                            <div class="container">
                                <div class="related-posts__img">
                                    <a href="#">
                                        <img src="<?php echo URLROOT; ?>/public/img/blog-1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="related-posts__content">
                                    <div class="related-posts__category">
                                        <a href="#">Category name</a>
                                    </div>
                                    <div class="related-posts__title">
                                        <h2><a href="#">Post title example</a></h2>
                                    </div>
                                    <div class="related-posts__info">
                                        <span><a href="#">Nguyen Thien</a></span>
                                        <span>2 days ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col l-6 related-posts-item">
                            <div class="container">
                                <div class="related-posts__img">
                                    <a href="#">
                                        <img src="<?php echo URLROOT; ?>/public/img/blog-1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="related-posts__content">
                                    <div class="related-posts__category">
                                        <a href="#">Category name</a>
                                    </div>
                                    <div class="related-posts__title">
                                        <h2><a href="#">Post title example</a></h2>
                                    </div>
                                    <div class="related-posts__info">
                                        <span><a href="#">Nguyen Thien</a></span>
                                        <span>2 days ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col l-6 related-posts-item">
                            <div class="container">
                                <div class="related-posts__img">
                                    <a href="#">
                                        <img src="<?php echo URLROOT; ?>/public/img/blog-1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="related-posts__content">
                                    <div class="related-posts__category">
                                        <a href="#">Category name</a>
                                    </div>
                                    <div class="related-posts__title">
                                        <h2><a href="#">Post title example</a></h2>
                                    </div>
                                    <div class="related-posts__info">
                                        <span><a href="#">Nguyen Thien</a></span>
                                        <span>2 days ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End related posts -->

                <!-- Begin comments -->
                <div class="comments-container">
                    <h3>Comments</h3>
                    <div class="row">
                        <div class="col l-12">
                            <div class="comments-login">
                                <p>
                                    Create an account to write a comment.
                                    <a href="#" class="signup-btn">Sign up</a>
                                </p>
                                <p>
                                    Already have an account?
                                    <a href="#" class="signin-btn">Sign in</a>
                                </p>
                            </div>
                            <div class="row comments-form">
                                <div class="col l-12">
                                    <form action="" class="">
                                        <textarea name="" id="" cols="30" rows="10" placeholder="Add a comment..."></textarea>
                                        <input type="submit" value="SEND" class="submit-btn">
                                    </form>
                                </div>
                            </div>
                            <div class="row comments-list">
                                <div class="col l-12">
                                    <div class="comments-item">
                                        <div class="comments-item__info">
                                            <a href="#">
                                                <img src="<?php echo URLROOT; ?>/public/img/member-1.jpg" alt="">
                                            </a>
                                            <div class="comments-item__more">
                                                <a href="#">
                                                    <?php echo $post['firstname'] . " " . $post['lastname'] ?>
                                                </a>
                                                <p>
                                                    1 day ago
                                                </p>
                                            </div>
                                        </div>
                                        <div class="comments-item__content">
                                            <p>
                                                It's great tips.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End comments -->
            </div>

            <!-- Begin right sidebar -->
            <div class="col l-4 blog_detail__sidebar">  
                <h3>Latest Posts</h3>
                <div class="sidebar-list">
                    <div class="row sidebar-item">
                        <div class="col l-5 sidebar__img">
                            <img src="<?php echo URLROOT; ?>/public/img/blog-1.jpg" alt="">
                        </div>
                        <div class="col l-7 sidebar-item__content">
                            <div class="sidebar__author">
                                <a href="#">Nguyen Thien</a>
                            </div>
                            <div class="sidebar__title">
                                <a href="#">Recommend blog in sidebar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-list">
                    <div class="row sidebar-item">
                        <div class="col l-5 sidebar__img">
                            <img src="<?php echo URLROOT; ?>/public/img/blog-1.jpg" alt="">
                        </div>
                        <div class="col l-7 sidebar-item__content">
                            <div class="sidebar__author">
                                <a href="#">Nguyen Thien</a>
                            </div>
                            <div class="sidebar__title">
                                <a href="#">Recommend blog in sidebar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-list">
                    <div class="row sidebar-item">
                        <div class="col l-5 sidebar__img">
                            <img src="<?php echo URLROOT; ?>/public/img/blog-1.jpg" alt="">
                        </div>
                        <div class="col l-7 sidebar-item__content">
                            <div class="sidebar__author">
                                <a href="#">Nguyen Thien</a>
                            </div>
                            <div class="sidebar__title">
                                <a href="#">Recommend blog in sidebar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End right sidebar -->
        </div>
    </div>
</div>
<!-- End blog detail -->

<?php
    require APPROOT . '/views/includes/footer.php';
?>