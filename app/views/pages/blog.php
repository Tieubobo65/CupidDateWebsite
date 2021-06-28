<?php
    require APPROOT . '/views/includes/head.php';
?>

<div id="section-landing">
    <?php
        require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<!-- Begin blog -->
<div id="blog-container">
    <div class="blog__head">
        <div class="breadcrumb">
            <div class="page-title">
                <img src="<?php echo URLROOT; ?>/public/img/t-left-img.png" alt="">
                <h1 style="font-size: 50px;">Blog</h1>
                <img src="<?php echo URLROOT; ?>/public/img/t-right-img.png" alt="">
            </div>
            <span>
                <a onclick="openHomePage()" href="#">Home</a>
            </span>
            » 
            <span>
                <a href="#">Blog</a>
            </span>
        </div>
    </div>
    <div class="blog__list">
        <div class="wide grid">
            <div class="row">
                <?php while ($post = mysqli_fetch_array($data['posts'])) { ?>
                    <div class="col l-4 m-6 c-12">
                            <div class="blog-item">
                                <div class="blog__img">
                                    <img src="<?php echo URLROOT; ?>/public/img/blog-1.jpg" alt="blog-img">
                                    <div class="blog__action">
                                        <ul class="list">
                                            <li>
                                                <a href="">
                                                    <i class="fas fa-heart"></i>
                                                    <span class="like">95</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fas fa-comment"></i>
                                                    <span class="comments">
                                                        <?php echo $post['post_comment_count']?>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <i class="fas fa-share-alt"></i>
                                                    Share
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog__title">
                                    <h2>
                                        <?php echo $post['title'] ?>
                                    </h2>
                                    <div class="blog__info">
                                        <div class="blog__author">
                                            <a href="#">
                                                <span>By</span>
                                                <span style="font-weight: 600;">
                                                    <?php echo $post['firstname'] . " " . $post['lastname'] ?>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="blog__time">
                                            <?php echo date("d/m/Y" , strtotime($post['created_at'])) ?>
                                        </div>
                                        <div class="blog__field">
                                            <?php echo $post['cat_title'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog__desc">
                                    <?php echo $post['content'] ?>
                                </div>
                                <a href="<?php echo URLROOT . "/blog/detailBlog/" . $post['slug'] ?>" class="blog__read">Read More >></a>
                            </div>
                        </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col l-12 blog__footer">
                    <nav arial-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="" class="page-link">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a href="" class="page-link">1</a></li>
                            <li class="page-item"><a href="" class="page-link">2</a></li>
                            <li class="page-item"><a href="" class="page-link">3</a></li>
                            <li class="page-item">
                                <a href="" class="page-link">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- <button class="blog__footer-previous">
                        Previous
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="blog__footer-next">
                        <i class="fas fa-chevron-right"></i>
                        Next
                    </button> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End blog -->

<?php
    require APPROOT . '/views/includes/footer.php';
?>