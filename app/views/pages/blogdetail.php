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
        <div class="row">
            <div class="col l-12 blog_detail__content">
                <div class="blog_detail__header">
                    <h2><?php echo $post['title'] ?></h2>
                    <p><?php echo date("d/m/Y" , strtotime($post['created_at'])) ?></p>
                    <p><?php echo $post['firstname'] . " " . $post['lastname'] ?></p>
                </div>
                
                <div class="blog_detail__body">
                    <p>
                        <?php echo $post['content'] ?>
                    </p>
                </div>
                <div class="blog_detail__comment">
                    <div class="">Comment</div>
                    <div class="row">
                        <div class="col l-6">
                            <p>0 Comment</p>
                            <div class="sort">
                                <p>Sort by</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End blog detail -->

<?php
    require APPROOT . '/views/includes/footer.php';
?>