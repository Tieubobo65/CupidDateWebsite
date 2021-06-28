
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
            
        }
    }
}

?>
