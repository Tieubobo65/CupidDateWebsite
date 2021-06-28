<?php
    require APPROOT . '/views/includes/head.php';
?>

<div id="section-landing">
    <?php
        require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div id="contact-container" class="contact-container">
    <div class="contact__head">
        <div class="breadcrumb">
            <div class="page-title">
                <img src="<?php echo URLROOT; ?>/public/img/t-left-img.png" alt="">
                <h1 style="font-size: 50px;">Contact us</h1>
                <img src="<?php echo URLROOT; ?>/public/img/t-right-img.png" alt="">
            </div>
            <span>
                <a onclick="openHomePage()" href="#">Home</a>
            </span>
                » 
            <span>
                <a href="#">Contact us</a>
            </span>
        </div>
    </div>

    <div class="grid wide">
        <div class="contact__info row">
            <div class="col l-12 m-12 c-12">
                <div class="contact__title">
                    <p class="title">Our Contact Infomation</p>
                    <img class="under-title" src="<?php echo URLROOT; ?>/public/img/line-vertical.png" alt="">
                </div>
            </div>

            <div class="col l-4 m-4 c-12">
                <div class="contact-item">
                    <img class="contact-item__img" src="<?php echo URLROOT; ?>/public/img/address-1.png" alt="">
                    <p class="contact-item__title">Address</p>
                    <p class="contact-item__desc">University of Information Technology</p>
                    <p class="contact-item__desc">VNU-HCM</p>
                    <p class="contact-item__desc">Linh Trung, Thu Duc, Ho Chi Minh city</p>
                </div>
            </div>

            <div class="col l-4 m-4 c-12">
                <div class="contact-item">
                    <img class="contact-item__img" src="<?php echo URLROOT; ?>/public/img/address-2.png" alt="">
                    <p class="contact-item__title">Phone</p>
                    <p class="contact-item__desc">(+84) 866 918 767</p>
                    <p class="contact-item__desc">(+84) 866 918 767</p>
                </div>
            </div>

            <div class="col l-4 m-4 c-12">
                <div class="contact-item">
                    <img class="contact-item__img" src="<?php echo URLROOT; ?>/public/img/address-3.png" alt="">
                    <p class="contact-item__title">Email</p>
                    <p class="contact-item__desc">18521428@gm.uit.edu.vn</p>
                    <p class="contact-item__desc">18521477@gm.uit.edu.vn</p>
                </div>
            </div>

        </div>
    </div>
    <div id="map">
        <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0YV5g7u8n16wKIlu3BqKARPjqXfU50Yw&callback=initMap&libraries=&v=weekly"
    defer
        ></script>
    </div>

    <div class="grid wide">
        <div class="contact-form row">
            <div class="col l-12 m-12 c-12">
                <div class="contact__title">
                    <p class="title">Get in Touch with us</p>
                    <img class="under-title" src="<?php echo URLROOT; ?>/public/img/line-vertical.png" alt="">
                </div>

                <form action="" novalidate>
                    <div class="row">
                        <div class="col l-6 m-6 c-12">
                            <input class="form__input" type="text" name="contact-form__name" id="contact-form__name" placeholder="Name">
                            <span class="invalidFeedback">

                            </span>
                            <input class="form__input" type="text" name="contact-form__email" id="contact-form__email" placeholder="Email">
                            <span class="invalidFeedback">

                            </span>
                        </div>
    
                        <div class="col l-6 m-6 c-12">
                            <textarea class="form__input" name="message" id="contact-form__message" rows="1" placeholder="Message"></textarea>
                            <span class="invalidFeedback">

                            </span>
                        </div>

                        <div class="col l-12 m-12 c-12 contact-form__submit">
                            <button type="submit" class="button">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
            
        </div>
    </div>
</div>
<?php
    require APPROOT . '/views/includes/footer.php';
?>
