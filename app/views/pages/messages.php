<?php
    require APPROOT . '/views/includes/head.php';
?>

<div id="section-landing">
    <?php
        require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div id="message-container">
    <div class="wide grid">
        <div class="row message-list">
            <div class="col l-12 message-conversation">
                <div class="message-item">
                    <div class="search-container">
                        <span>Select an user to start chat</span>
                        <input type="text" name="searchTerm" id="" placeholder="Search...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                    <div class="conversation-container">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo URLROOT ?>/public/js/message.js"></script>

<?php
    require APPROOT . '/views/includes/footer.php';
?>