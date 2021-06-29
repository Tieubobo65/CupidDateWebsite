
<?php 
    class Pages extends Controller {
    public function __construct() {
        $this->userModel = $this->model('UserModel');
    }

    public function index() {

        $data = [
            'title' => 'Home page'
        ];

        $this->view('pages/index', $data);
    }

    public function contact() {
        echo "<script>alert('LIKE')</script>";

        $this->view('pages/contact');
    }

    function like() {
        if(isset($_POST['like'])) {
            $user_2 = $_POST['user_2'];
            $user_1 = $_SESSION['user_id'];
            $this->userModel->addRelationship($user_1, $user_2);
        }
    }


    public function member_profile() {
        $member_id = $_GET['user_id'];
        $user_detail = $this->userModel->getUserDetail($member_id);
        $photos =  $this->userModel->getAllPhotos($member_id);
        $address = $this->userModel->getCurrentAddress($member_id);
        $data = [
            "user_detail" => $user_detail,
            "photos" => $photos,
            "address" => $address
        ];
        $this->view('pages/member_profile', $data);
    }

    function liked($user_2) {
        if($this->userModel->checkRelationship($_SESSION['user_id'], $user_2) == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function members() {
        $data = $this->userModel->getAllUsers();
        $this->view('pages/members', $data);
    }

    public function waiting() {
        $data = $this->userModel->getAllUsers();
        $this->view('pages/waiting', $data);
    }

    public function seeking() {
        if(isset($_GET['seeking_gender'])) {
            $seeking_gender = $_GET['seeking_gender'];
            $from_age = $_GET['from_age'];
            $to_age = $_GET['to_age'];

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
