<?php
    require APPROOT . '/views/includes/head.php';
    $info = $data['info'];
?>

<div id="section-landing">
    <?php
        require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div id="chat-container">
    <div class="wide grid">
        <div class="row">
            <div class="col l-12">
                <div class="chat-item">
                    <div class="chat-title">
                        <div class="chat-title__content">
                            <img src="<?php echo URLROOT; ?>/public/img/member-1.jpg" alt="">
                            <div class="chat-title__detail">
                                <span>
                                    <?php echo $info['firstname'] . " " . $info['lastname'] ?>
                                </span>
                                <p>Active now<?php echo $info['user_id'] ?></p>
                            </div>
                            <div class="chat-title__more">
                                <i class="fas fa-ellipsis-v"></i>
                            </div>
                        </div>
                    </div>

                    <div id="chat-box">
                        
                    </div>
                    <form action="" method="POST" class="typing-area" autocomplete="off">
                        <input type="text" name="message" id="message-textbox" class="input-field" placeholder="Type a chat here...">
                        <input type="text" name="outgoing_id" value="<?php echo $_SESSION['user_id'] ?>" hidden>
                        <input type="text" name="incoming_id" value="<?php echo $info['id'] ?>" hidden>
                        <button><i class="fab fa-telegram-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo URLROOT ?>/public/js/chat.js"></script>
<?php
    require APPROOT . '/views/includes/footer.php';
?>