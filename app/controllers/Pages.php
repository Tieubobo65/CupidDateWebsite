
<?php 
    class Pages extends Controller {
    public function __construct() {
        $this->userModel = $this->model('UserModel');
    }

    public function index() {
        //if delete account
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_SESSION["user_id"];
            unset($_SESSION['user_id']);
            unset($_SESSION['firstname']);
            unset($_SESSION['lastname']);
            unset($_SESSION['email']);
            unset($_SESSION['gender']);
            unset($_SESSION['birthday']);
            unset($_SESSION['city_id']);
            unset($_SESSION['status']);
            unset($_SESSION['job']);
            unset($_SESSION['income']);
            unset($_SESSION['getmarried']);
            unset($_SESSION['alcohol']);
            unset($_SESSION['cigarettes']);
            unset($_SESSION['dayoff']);
            unset($_SESSION['user_about']);
            unset($_SESSION['user_character']);
            unset($_SESSION['avatar']);
            $this->userModel->deleteAccount($user_id);
        }
        $data = [
            'title' => 'Home page'
        ];

        $this->view('pages/index', $data);
    }

    public function contact() {
        $this->view('pages/contact');
    }

    //click like
    function like() {
        if(isset($_POST['like'])) {
            $user_2 = $_POST['user_2'];
            $user_1 = $_SESSION['user_id'];
            if(!$this->userModel->isLike($user_1, $user_2)) {
                $this->userModel->addRelationship($user_1, $user_2);
            }

            if($this->userModel->isLike($user_2, $user_1)) {
                $this->userModel->updateRelationship($user_2, $user_1, '1');
            }
        }
    }

    //click unlike
    function unlike() {
        if(isset($_POST['like'])) {
            $user_2 = $_POST['user_2'];
            $user_1 = $_SESSION['user_id'];
            $this->userModel->removeRelationship($user_1, $user_2);
        }
    }

    //show member profile
    public function member_profile() {
        $member_id = $_GET['user_id'];
        $user_detail = $this->userModel->getUserDetail($member_id);
        $photos =  $this->userModel->getAllPhotos($member_id);
        $address = $this->userModel->getCurrentAddress($member_id);
        if($this->userModel->isLike($_SESSION["user_id"], $member_id)) {
            $like = 1;
        } else {
            $like = 0;
        }
        $data = [
            "user_detail" => $user_detail,
            "photos" => $photos,
            "address" => $address,
            "like" => $like
        ];
        $this->view('pages/member_profile', $data);
    }

    //members page: all members that user haven't like yet
    public function members() {
        //seeking members
        if($_POST['seeking_gender'] != NULL && $_POST['from_age'] != NULL & $_POST['to_age'] != NULL
            && $_POST['city'] != NULL) {
                $data = $this->userModel->seekingUsers($_POST['seeking_gender'], $_POST['from_age'], $_POST['to_age'], $_POST['city']);
            } elseif($_POST['seeking_gender'] != NULL && $_POST['from_age'] != NULL & $_POST['to_age'] != NULL
            && $_POST['state'] != NULL) {
                $data = $this->userModel->seekingUsersByGenderAndAge($_POST['seeking_gender'], $_POST['from_age'], $_POST['to_age']);
                foreach($data as $k => $value) {
                    $address = $this->userModel->getCurrentAddress($value["id"]);
                    if($address["state_id"] != $_POST['state']) {
                        unset($data[$k]);
                    }
                }
            } elseif($_POST['seeking_gender'] != NULL && $_POST['from_age'] != NULL & $_POST['to_age'] != NULL
            && $_POST['country'] != NULL) {
                $data = $this->userModel->seekingUsersByGenderAndAge($_POST['seeking_gender'], $_POST['from_age'], $_POST['to_age']);
                foreach($data as $k => $value) {
                    $address = $this->userModel->getCurrentAddress($value["id"]);
                    if($address["country_id"] != $_POST['country']) {
                        unset($data[$k]);
                    }
                }
            } elseif($_POST['seeking_gender'] != NULL && $_POST['from_age'] != NULL && $_POST['to_age'] != NULL) {
                $data = $this->userModel->seekingUsersByGenderAndAge($_POST['seeking_gender'], $_POST['from_age'], $_POST['to_age']);
            } elseif($_POST['seeking_gender'] != NULL && $_POST['from_age'] != NULL) {
                $data = $this->userModel->seekingUsersByGenderAndFromAge($_POST['seeking_gender'], $_POST['from_age']);
            } elseif($_POST['seeking_gender'] != NULL && $_POST['to_age'] != NULL) {
                $data = $this->userModel->seekingUsersByGenderAndToAge($_POST['seeking_gender'], $_POST['to_age']);
            } elseif($_POST['from_age'] != NULL && $_POST['to_age'] != NULL) {
                $data = $this->userModel->seekingUsersByAge($_POST['from_age'], $_POST['to_age']);
            } elseif($_POST['seeking_gender'] != NULL) {
                $data = $this->userModel->seekingUsersByGender($_POST['seeking_gender']);
            } elseif($_POST['from_age'] != NULL) {
                $data = $this->userModel->seekingUsersFromAge($_POST['from_age']);
            } elseif($_POST['to_age'] != NULL) {
                $data = $this->userModel->seekingUsersToAge($_POST['to_age']);
            } elseif($_POST['city'] != NULL) {
                $data = $this->userModel->getAllUsers();
                foreach($data as $k => $value) {
                    $address = $this->userModel->getCurrentAddress($value["id"]);
                    if($address["city_id"] != $_POST['city']) {
                        unset($data[$k]);
                    }
                }
            } elseif($_POST['state'] != NULL) {
                $data = $this->userModel->getAllUsers();
                foreach($data as $k => $value) {
                    $address = $this->userModel->getCurrentAddress($value["id"]);
                    if($address["state_id"] != $_POST['state']) {
                        unset($data[$k]);
                    }
                }
            } elseif($_POST['country'] != NULL) {
                $data = $this->userModel->getAllUsers();
                foreach($data as $k => $value) {
                    $address = $this->userModel->getCurrentAddress($value["id"]);
                    if($address["country_id"] != $_POST['country']) {
                        unset($data[$k]);
                    }
                }
            } else {
                $data = $this->userModel->getAllUsers();
            }

            foreach($data as $k => $value) {
                //remove members that user has already liked
                if($this->userModel->isLike($_SESSION["user_id"], $value["id"]) || $_SESSION["user_id"] == $value["id"]) {
                    unset($data[$k]);
                }
            }
        $data['country'] = $this->userModel->fetch_country();
        $this->view('pages/members', $data);
    }
    //waiting members page: all members already liked current user but haven't been like back
    public function waiting() {
        $data = $this->userModel->getAllUsers();
        foreach($data as $k => $value) {
            //remove members that haven't like user yet
            if(!$this->userModel->isLike($value["id"], $_SESSION["user_id"])) {
                unset($data[$k]);
            }
            //remove members that user already liked
            if($this->userModel->isLike($_SESSION["user_id"], $value["id"])) {
                unset($data[$k]);
            }
        }
        $this->view('pages/waiting', $data);
    }

    //liked members: all members user already liked, also include matched members
    public function liked() {
        $data = $this->userModel->getAllUsers();
        foreach($data as $k => $value) {
            //remove members that user not liked 
            if(!$this->userModel->isLike($_SESSION["user_id"], $value["id"])) {
                unset($data[$k]);
            }
        }
        $this->view('pages/liked_members', $data);
    }

    //matches: all matched members
    public function matches() {
        $data = $this->userModel->getAllUsers();
        foreach($data as $k => $value) {
            //remove unmatched members
            if(!$this->userModel->isLike($_SESSION["user_id"], $value["id"]) || 
            !$this->userModel->isLike($value["id"], $_SESSION["user_id"])) {
                unset($data[$k]);
            }
        }
        $this->view('pages/matches', $data);
    }
}

?>
