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
                            <img src="<?php echo URLROOT; ?>/public/img/<?=$info['avatar']?>" alt="">
                            <div class="chat-title__detail">
                                <span>
                                    <?php echo $info['firstname'] . " " . $info['lastname'] ?>
                                </span>
                                <p>Active now<?php echo $info['user_id'] ?></p>
                            </div>
                            <div class="chat-title__more">
                                <button class="dropbtn" onclick="myFunction()">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div class="chat-title__option" id="myDropdown">
                                    <form action="">
                                    
                                    </form>
                                    <?php if ($data['check']) { ?>
                                        <button class="chat-title__unblock">Unblock</button>
                                    <?php } else { ?>
                                        <button class="chat-title__block" onclick="showBlock()">Block</button>
                                    <?php } ?>
                                    <button class="chat-title__report">Report</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($data['check']) {?>
                        <div class="chat-warning">
                            <i class="fas fa-heart-broken"></i>
                            The chat is not available!
                            <i class="fas fa-heart-broken"></i>
                        </div>
                    <?php } else { ?>
                        <div id="chat-box">
                        </div>

                        <form action="" method="POST" class="typing-area" autocomplete="off">
                            <input type="text" name="message" id="message-textbox" class="input-field" placeholder="Type a chat here...">
                            <input type="text" name="outgoing_id" value="<?php echo $_SESSION['user_id'] ?>" hidden>
                            <input type="text" name="incoming_id" value="<?php echo $info['id'] ?>" hidden>
                            <button><i class="fab fa-telegram-plane"></i></button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fullscreen" id="warning-show">
    <div class="warning">
        <h2 class="warning-title">
            Block?
        </h2>
        <p class="warning-body">
            Is this person bothering you? Blocking hides you from them and prevents further messages from being exchanged.
        </p>
        <p class="warning-body">
        If you’re being harassed by this person, please report them.
        </p>
        <button class="warning-btn__confirm">
            YES, PLEASE
        </button>
        <button class="warning-btn__cancel" >
            Cancel
        </button>
    </div>
</div>
<script src="<?php echo URLROOT ?>/public/js/chat.js"></script>
<script>
    var blockConfirm = document.querySelector(".warning-btn__confirm");
    blockConfirm.onclick = () => {
        $.post("../../messages/block/<?php echo $info['id'] ?>", function() {
            window.location.reload();
        });
    }

    var unblock = document.querySelector(".chat-title__unblock");
    unblock.onclick = () => {
        $.post("../../messages/unblock/<?php echo $info['id'] ?>", function() {
            window.location.reload();
        });
    }
</script>
<?php
    require APPROOT . '/views/includes/footer.php';
?>