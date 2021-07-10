<?php class Home extends Controller {
    public function __construct() {
        $this->userModel = $this->model("UserModel");
    }

    public function index() {
        $totalMembers = $this->userModel->getNumberMembers();
        $totalMen = $this->userModel->getNumberMen();
        $totalWomen = $this->userModel->getNumberWomen();
        $data = [
            'title' => 'Home page',
            'totalMembers' => $totalMembers['total'],
            'totalMen' => $totalMen['total'],
            'totalWomen' => $totalWomen['total'],
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($_FILES['avatar']['name'] != '') {
                $avatar = time() . '_' . $_FILES['avatar']['name'];
                $this->userModel->updateAvatar($_SESSION['user_id'], $avatar);
                $this->userModel->addPhoto($_SESSION['user_id'], $avatar);
                $target = "../public/img/" . $avatar;
                move_uploaded_file($_FILES['avatar']['tmp_name'], $target);
                $_SESSION['avatar'] = $avatar;
            } else {
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
                if($this->userModel->deleteAccount($user_id)) {
                    echo "XOA";
                } 
            }
        }
        $this->view('pages/home', $data);
    }

    public function about() {
        $this->view('pages/about');
    }
}
?>