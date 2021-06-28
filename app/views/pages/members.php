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

        <div class="seeking">
            <form action="" class="seeking-form">
                    <label for="seeking__gender1">I am a</label>
                    <select name="seeking__gender1" id="seeking__gender1" class="seeking-form__select">
                        <option value="man">
                        Man
                        </option>
                        <option value="woman">Woman<i class="fas fa-caret-down"></i></option>

                    </select>

                    <label for="seeking__gender2">Seeking a</label>
                    <select name="seeking__gender2" id="seeking__gender2" class="seeking-form__select">
                        <option value="woman">Woman</option>
                        <option value="man">Man</option>
                    </select>

                    <label for="seeking__age-from">From</label>
                    <select name="seeking__age-from" id="seeking__age-from" class="seeking-form__select">
                        <option value="any">Any</option>
                        <option value="">18</option>
                        <option value="">19</option>
                        <option value="">21</option>
                        <option value="">22</option>
                        <option value="">23</option>
                        <option value="">24</option>
                        <option value="">25</option>
                        <option value="">26</option>
                        <option value="">27</option>
                        <option value="">28</option>
                        <option value="">29</option>
                        <option value="">30</option>
                        <option value="">31</option>
                        <option value="">32</option>
                        <option value="">33</option>
                        <option value="">34</option>
                        <option value="">35</option>
                        <option value="">36</option>
                        <option value="">37</option>
                        <option value="">38</option>
                        <option value="">39</option>
                        <option value="">40</option>
                        <option value="">41</option>
                        <option value="">42</option>
                        <option value="">43</option>
                        <option value="">44</option>
                        <option value="">45</option>
                        <option value="">46</option>
                        <option value="">47</option>
                        <option value="">48</option>
                        <option value="">49</option>
                        <option value="">50</option>
                        <option value="">51</option>
                        <option value="">52</option>
                        <option value="">53</option>
                        <option value="">54</option>
                        <option value="">55</option>
                        <option value="">56</option>
                        <option value="">57</option>
                        <option value="">58</option>
                        <option value="">59</option>
                        <option value="">60</option>
                        <option value="">61</option>
                        <option value="">62</option>
                        <option value="">63</option>
                        <option value="">64</option>
                        <option value="">65</option>
                        <option value="">66</option>
                        <option value="">67</option>
                        <option value="">68</option>
                        <option value="">69</option>
                        <option value="">70</option>
                    </select>

                    <label for="seeking__age-to">To</label>
                    <select name="seeking__age-to" id="seeking__age-to" class="seeking-form__select">
                        <option value="any">Any</option>
                        <option value="">18</option>
                        <option value="">19</option>
                        <option value="">21</option>
                        <option value="">22</option>
                        <option value="">23</option>
                        <option value="">24</option>
                        <option value="">25</option>
                        <option value="">26</option>
                        <option value="">27</option>
                        <option value="">28</option>
                        <option value="">29</option>
                        <option value="">30</option>
                        <option value="">31</option>
                        <option value="">32</option>
                        <option value="">33</option>
                        <option value="">34</option>
                        <option value="">35</option>
                        <option value="">36</option>
                        <option value="">37</option>
                        <option value="">38</option>
                        <option value="">39</option>
                        <option value="">40</option>
                        <option value="">41</option>
                        <option value="">42</option>
                        <option value="">43</option>
                        <option value="">44</option>
                        <option value="">45</option>
                        <option value="">46</option>
                        <option value="">47</option>
                        <option value="">48</option>
                        <option value="">49</option>
                        <option value="">50</option>
                        <option value="">51</option>
                        <option value="">52</option>
                        <option value="">53</option>
                        <option value="">54</option>
                        <option value="">55</option>
                        <option value="">56</option>
                        <option value="">57</option>
                        <option value="">58</option>
                        <option value="">59</option>
                        <option value="">60</option>
                        <option value="">61</option>
                        <option value="">62</option>
                        <option value="">63</option>
                        <option value="">64</option>
                    <option value="">65</option>
                        <option value="">66</option>
                        <option value="">67</option>
                        <option value="">68</option>
                        <option value="">69</option>
                        <option value="">70</option>
                    </select>
                    <button class="button">Search</button>
                </form>
        </div>
    </div>

    <div class="members-list">
        <div class="members__step" id="slider">
            <input type="radio" name="slider" id="slide1" checked>
            <input type="radio" name="slider" id="slide2">
            <input type="radio" name="slider" id="slide3">
            <input type="radio" name="slider" id="slide4">

            <div id="slides">
                <div id="overflow">
                    <div class="inner">
                        <div class="slide slide_1">
                            <div class="slide-content">
                                <h2>Want To Find Your Lover?</h2>
                                <p class="step">Actively Click Like!</p>
                            </div>
                        </div>

                        <div class="slide slide_2">
                            <div class="slide-content">
                                <h2>Want To Find Your Lover?</h2>
                                <p class="step">Click like back to people who already like you</p>
                            </div>
                        </div>

                        <div class="slide slide_3">
                            <div class="slide-content">
                                <h2>Want To Find Your Lover?</h2>
                                <p class="step">Wait for the person you like to respond</p>
                            </div>
                        </div>

                        <div class="slide slide_4">
                            <div class="slide-content">
                                <h2>Want To Find Your Lover?</h2>
                                <p class="step">Chat with them!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            <div id="controls">
                <label for="slide1"></label>
                <label for="slide2"></label>
                <label for="slide3"></label>
                <label for="slide4"></label>
            </div>

            <div id="bullets">
                <label for="slide1"></label>
                <label for="slide2"></label>
                <label for="slide3"></label>
                <label for="slide4"></label>
            </div>
        </div>

                <div class="online-members grid wide">
                    <div class="row">
                        <?php
                            foreach($data as $value) { 
                                if($value['id'] == $_SESSION['user_id']) {
                                    continue;
                                }
                                ?>
                            
                            <div class="col l-3 m-4 c-12">
                            <div class="member-item">
                                <a href="#">
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
                                        echo $diff->y." years old";
                                        ?>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
    </div>
</div>

<?php
    require APPROOT . '/views/includes/footer.php';
?>