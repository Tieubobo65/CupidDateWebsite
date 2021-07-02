
<?php 
    class Pages extends Controller {
    public function __construct() {
        $this->userModel = $this->model('UserModel');
    }

    public function index() {
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
        echo "<script>alert('LIKE')</script>";

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
        }
    }

    //click unlike
    function unlike() {
        if(isset($_POST['like'])) {
            $user_2 = $_POST['user_2'];
            $user_1 = $_SESSION['user_id'];
            $this->userModel->removeRelationship($user_1, $user_2);
            // if($this->userModel->isLike($user_2, $user_1)) {
            //     $this->userModel->updateRelationship($user_2, $user_1, '1');
            // }
        }
    }

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
        //get all members (users) from database
        $data = $this->userModel->getAllUsers();
        foreach($data as $k => $value) {
            //remove members that user has already liked
            if($this->userModel->isLike($_SESSION["user_id"], $value["id"])) {
                unset($data[$k]);
            }
        }
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

    public function seeking() {
        if(isset($_GET['seeking_gender'])) {
            $seeking_gender = $_GET['seeking_gender'];
            $from_age = $_GET['from_age'];
            $to_age = $_GET['to_age'];
            $output = "";

            if($seeking_gender == NULL && $from_age == NULL & $to_age == NULL) {
                $data = $this->userModel->getAllUsers();
                foreach($data as $value) { 
                    if($value['id'] == $_SESSION['user_id']) {
                        continue;
                    }
                    $output .='<div class="col l-3 m-4 c-12">
                                    <div class="member-item">
                                        <a href="'.URLROOT.'/pages/member_profile?user_id='.$value["id"].'">
                                        <div class="member__img">
                                            <img id="img_'.$value["id"].'" src="'.URLROOT.'/public/img/'.$value["avatar"].'" alt="ABC">
                                            <form id="'.$value['id'].'" class="like-form" action="'.URLROOT.'/pages/like" method="POST">
                                                button id = "button_'.$value['id'].'" type="submit" class="like">
                                                    <div class="member__action">
                                                        <i class="fas fa-heart"></i>
                                                        Like
                                                    </div>
                                                </button>
                                            </form>  
                                        </div>
                                        </a>
                                        <div class="member__info">
                                            <div class="member__name">'
                                                .$value["firstname"]. $value['lastname'].'
                                            </div>
                                            <div class="member__age">'
                                                .$diff = (new DateTime())->diff(new DateTime($value["birthday"]))->y
                                                .' years old
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                    
                }
                echo $output;
            }

            if($seeking_gender != NULL) {
                $data = $this->userModel->getAllUsersByGender($seeking_gender);
                foreach($data as $value) { 
                    if($value['id'] == $_SESSION['user_id']) {
                        continue;
                    }
                    $output .='<div class="col l-3 m-4 c-12">
                                    <div class="member-item">
                                        <a href="'.URLROOT.'/pages/member_profile?user_id='.$value["id"].'">
                                        <div class="member__img">
                                            <img id="img_'.$value["id"].'" src="'.URLROOT.'/public/img/'.$value["avatar"].'" alt="ABC">
                                            <form id="'.$value['id'].'" class="like-form" action="'.URLROOT.'/pages/like" method="POST">
                                                button id = "button_'.$value['id'].'" type="submit" class="like">
                                                    <div class="member__action">
                                                        <i class="fas fa-heart"></i>
                                                        Like
                                                    </div>
                                                </button>
                                            </form>  
                                        </div>
                                        </a>
                                        <div class="member__info">
                                            <div class="member__name">'
                                                .$value["firstname"]. $value['lastname'].'
                                            </div>
                                            <div class="member__age">'
                                                .$diff = (new DateTime())->diff(new DateTime($value["birthday"]))->y
                                                .' years old
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                    
                }
                echo $output;
            }

            if($from_age != NULL) {
                $data = $this->userModel->getAllUsersFromAge($from_age);
                foreach($data as $data1) {
                    foreach($data as $value1) {
                        foreach($value1 as $value) {
                            if($value['id'] == $_SESSION['user_id']) {
                                continue;
                            }
                            $output .='<div class="col l-3 m-4 c-12">
                                            <div class="member-item">
                                                <a href="'.URLROOT.'/pages/member_profile?user_id='.$value["id"].'">
                                                <div class="member__img">
                                                    <img id="img_'.$value["id"].'" src="'.URLROOT.'/public/img/'.$value["avatar"].'" alt="ABC">
                                                    <form id="'.$value['id'].'" class="like-form" action="'.URLROOT.'/pages/like" method="POST">
                                                        button id = "button_'.$value['id'].'" type="submit" class="like">
                                                            <div class="member__action">
                                                                <i class="fas fa-heart"></i>
                                                                Like
                                                            </div>
                                                        </button>
                                                    </form>  
                                                </div>
                                                </a>
                                                <div class="member__info">
                                                    <div class="member__name">'
                                                        .$value["firstname"]. $value['lastname'].'
                                                    </div>
                                                    <div class="member__age">'
                                                        .$diff = (new DateTime())->diff(new DateTime($value["birthday"]))->y
                                                        .' years old
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                        }
                    }
                }
            }
            echo $output;

        }
    }
}

?>
