<?php 
    class User_profile extends Controller {
        public function __construct()
        {
            $this->userModel = $this->model("UserModel");
        }

    public function index() {
        //add photos
        if(isset($_FILES['photo'])) {
            $photo_name = time() . '_' . $_FILES['photo']['name'];
            $this->userModel->addPhoto($_SESSION['user_id'], $photo_name);
            $target = "../public/img/" . $photo_name;
            move_uploaded_file($_FILES['photo']['tmp_name'], $target);
        }
        
        //change avatar
        if(isset($_FILES['avt'])) {
            if($_FILES['avt']['name'] != '') {
                $avatar = time() . '_' . $_FILES['avt']['name'];
                $this->userModel->addPhoto($_SESSION['user_id'], $avatar);
                $this->userModel->updateAvatar($_SESSION['user_id'], $avatar);
                $target = "../public/img/" . $avatar;
                move_uploaded_file($_FILES['avt']['tmp_name'], $target);
                $_SESSION['avatar'] = $avatar;
            } else if($_POST['avt_url'] != '') {
                $avatar = $_POST['avt_url'];
                $this->userModel->updateAvatar($_SESSION['user_id'], $avatar);
                $_SESSION['avatar'] = $avatar;
            } else {
                $avatar = "../public/img/avt.png";
            }
        }

        //get user's address
        $address = $this->userModel->getCurrentAddress($_SESSION['user_id']);
        //get user's photos
        $photos =  $this->userModel->getAllPhotos($_SESSION['user_id']);
        $data = [
            'city_name' => $address['city'],
            'state_name' => $address['state'],
            'country_name' => $address['country'],
            'photos' => $photos
        ];

        //edit profile
        //edit firstname
        if($_POST['new_firstname']) {
            $this->userModel->updateFirstname($_POST['new_firstname'], $_SESSION["user_id"]);
            $_SESSION["firstname"] = $_POST['new_firstname'];
        }

        //edit lastname
        if($_POST['new_lastname']) {
            $this->userModel->updateLastname($_POST['new_lastname'], $_SESSION["user_id"]);
            $_SESSION["lastname"] = $_POST['new_lastname'];
        }

        //edit gender
        if($_POST['new_gender']) {
            $this->userModel->updateGender($_POST['new_gender'], $_SESSION["user_id"]);
            $_SESSION["gender"] = $_POST['new_gender'];
        }

        //edit birthday
        if($_POST['new_birthday']) {
            $this->userModel->updateBirthday($_POST['new_birthday'], $_SESSION["user_id"]);
            $_SESSION["birthday"] = $_POST['new_birthday'];
        }

        //edit address
        if($_POST['edit_city']) {
            $this->userModel->updateCity($_SESSION["user_id"], $_POST['edit_city']);
            $_SESSION["city_id"] = $_POST['edit_city'];
            $address = $this->userModel->getCurrentAddress($_SESSION['user_id']);
            $data['city_name'] = $address['city'];
            $data['state_name'] = $address['state'];
            $data['country_name'] = $address['country'];
        }

        //edit marital status
        if($_POST['new_status']) {
            $this->userModel->updateStatus($_SESSION["user_id"], $_POST['new_status']);
            $_SESSION["status"] = $_POST['new_status'];
        }
        
        //edit job
        if($_POST['new_job']) {
            $this->userModel->updateJob($_SESSION["user_id"], $_POST['new_job']);
            $_SESSION["job"] = $_POST['new_job'];
        }

        //edit monthly income
        if($_POST['new_income']) {
            $this->userModel->updateJob($_SESSION["user_id"], $_POST['new_income']);
            $_SESSION["income"] = $_POST['new_income'];
        }

        //edit getmarried
        if($_POST['new_getmarried']) {
            $this->userModel->updateGetMarried($_SESSION["user_id"], $_POST['new_getmarried']);
            $_SESSION["getmarried"] = $_POST['new_getmarried'];
        }

        //edit stimulants
        if($_POST['new_alcohol'] || $_POST['new_cigarettes']) {
            $this->userModel->updateStimulants($_SESSION["user_id"], $_POST['new_alcohol'], $_POST['new_cigarettes']);
            $_SESSION["alcohol"] = $_POST['new_alcohol'];
            $_SESSION["cigarettes"] = $_POST['new_cigarettes'];
        }

        //edit dayoff
        if($_POST['new_dayoff']) {
            $this->userModel->updateDayoff($_SESSION["user_id"], $_POST['new_dayoff']);
            $_SESSION["dayoff"] = $_POST['new_dayoff'];
        }

        //edit describe
        if($_POST['new_about']) {
            $this->userModel->updateAbout($_SESSION["user_id"], $_POST['new_about']);
            $_SESSION["user_about"] = $_POST['new_about'];
        }

        //edit character
        if($_POST['new_character']) {
            $this->userModel->updateCharacter($_SESSION["user_id"], $_POST['new_character']);
            $_SESSION["user_character"] = $_POST['new_character'];
        }

        $data['country'] = $this->userModel->fetch_country();
        $this->view('users/personel_profile', $data);
    }
}