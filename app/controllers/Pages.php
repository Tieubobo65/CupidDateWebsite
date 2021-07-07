
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
}
?>
