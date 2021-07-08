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
<div id="post-container">
    <div class="wide grid">
        <div class="post__list">
            <div class="row">
                <div class="col l-8 m-12 c-12 pad-20">
                    <!-- Begin show post content -->
                    <div class="post-item">
                        <div class="post__header">
                            <div class="post-item__img">
                                <img src="<?php echo URLROOT; ?>/public/img/blog-1.jpg" alt="image">
                            </div>
                            <div class="post__title">
                                <h2><?php echo $post['title'] ?></h2>
                            </div>
    
                            <div class="post__info">
                                <div class="post__category">
                                    <?php echo $post['cat_title'] ?>
                                </div>
                                <div class="post__author">
                                    <span>
                                        By 
                                    </span>
                                    <a href="
                                        <?php if ($_SESSION['user_id'] == $post['author_id']) {
                                            echo URLROOT . "/user_profile";
                                        } else {
                                            echo URLROOT . "/profile?id=" . $post['author_id'];
                                        }?>">
                                        <?php echo $post['firstname'] . " " . $post['lastname'] ?></a>
                                    •
                                    <?php echo date("d/m/Y" , strtotime($post['created_at'])) ?>
                                </div>
                            </div>
                        </div>
    
                        <div class="post__body">
                            <?php echo $post['content'] ?>
                        </div>
    
                        <div class="post__more">
                            <div class="post__author">
                                <span>By </span>
                                <a href="#">
                                    <span><?php echo $post['firstname'] . " " . $post['lastname'] ?></span>
                                </a>
                            </div>
                            <div class="post__share">
                                <span>SHARE:</span>
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
                            </div>
                        </div>
                    </div>
                    <!-- End show post content -->
    
                    <!-- Begin related latedPosts -->
                    <div class="related-posts">
                        <h3>Related Posts</h3>
                        <div class="related-posts-list">
                            <div class="row mg-auto">
                                <?php 
                                    $length = 2;
                                    $i = 0;
                                    while (($relatedPost = mysqli_fetch_array($data['relatedPosts'])) && ($i < $length)) { 
                                        $i = $i + 1;
                                        if ($relatedPost['post_id'] != $post['post_id']) {
                                ?>
                                    <div class="col l-6">
                                        <div class="related-posts-item">
                                            <div class="related-posts__img">
                                                <a href="#">
                                                    <img src="<?php echo URLROOT; ?>/public/img/blog-1.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="related-posts__content">
                                                <div class="related-posts__category">
                                                    <?php echo $relatedPost['cat_title'] ?>
                                                </div>
                                                <h2><a href="#"><?php echo $relatedPost['title'] ?></a></h2>
                                                <div class="related-posts__info">
                                                    <div>
                                                        <a href="#">
                                                            <?php echo $relatedPost['firstname'] . " " . $relatedPost['lastname'] ?>
                                                        </a>
                                                        <?php echo date("d/m/Y" , strtotime($relatedPost['created_at'])) ?>
                                                    </div>
                                                    <a href="#"><i class="fas fa-share-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } } ?>
                            </div>
                        </div>
                    </div>
                    <!-- End related posts -->
    
                    <!-- Begin comments -->
                    <div class="comments-container">
                        <h3>Comments</h3>
                        <div class="row">
                            <div class="col l-12 m-12 c-12">
                                <?php if(isset($_SESSION['user_id'])) : ?>
                                    <div class="row comments-form">
                                        <div class="col l-12">
                                            <form action="" method="POST" id="addcomment" action="">
                                                <textarea name="comment-content" id="comment-textbox" cols="30" rows="10" placeholder="Add a comment..."></textarea>
                                                <div id="text-danger" style="color: #fb5252;"></div>
                                                <input type="hidden" name="post-id" value="<?php echo $post['post_id'] ?>">
                                                <input type="hidden" name="user-id" value="<?php echo $_SESSION['user_id'] ?>">
                                                <input type="submit" value="SEND" class="submit-btn" name="send" id="send-btn">
                                            </form>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="comments-login">
                                        <p>
                                            Create an account to write a comment.
                                            <a href="<?php echo URLROOT; ?>/users/register" class="signup-btn">Sign up</a>
                                        </p>
                                        <p>
                                            Already have an account?
                                            <a href="<?php echo URLROOT; ?>/users/login" class="signin-btn">Sign in</a>
                                        </p>
                                    </div>
                                <?php endif ?>
                            </div>
                            <div class="row comments-list" id="comment-list">
                            </div>
                        </div>
                    </div>
                    <!-- End comments -->
                </div>
    
                <!-- Begin right sidebar -->
                <div class="col l-4 blog_detail__sidebar">  
                    <h3>Latest Posts</h3>
                    <?php 
                        $length = 3;
                        $i = 0;
                        while (($lastedPost = mysqli_fetch_array($data['lastedPosts'])) && ($i < $length)) { 
                            $i = $i + 1;
                            if ($lastedPost['post_id'] != $post['post_id']) {
                    ?>
                        <div class="sidebar-list">
                            <div class="row sidebar-item">
                                <div class="col l-5 sidebar__img">
                                    <img src="<?php echo URLROOT; ?>/public/img/blog-1.jpg" alt="">
                                </div>
                                <div class="col l-7 sidebar-item__content">
                                    <div class="sidebar__author">
                                        <a href="#">
                                            <?php echo $lastedPost['firstname'] . " " . $lastedPost['lastname'] ?>
                                        </a>
                                    </div>
                                    <div class="sidebar__title">
                                        <a href="<?php echo URLROOT . "/blog/detailBlog/" . $lastedPost['slug'] ?>">
                                            <?php echo $lastedPost['title'] ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }} ?>
                <!-- End right sidebar -->
            </div>
        </div>
    </div>
</div>
<!-- End blog detail -->
<script>
    getCommentList(<?php echo $post['post_id'] ?>);
    ajaxSubmitBlog('addcomment', <?php echo $post['post_id'] ?>)
</script>

<?php
    require APPROOT . '/views/includes/footer.php';
?>