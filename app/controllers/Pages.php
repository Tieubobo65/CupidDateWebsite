
<?php 
    class Pages extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
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



    public function members() {
        $data = $this->userModel->getAllUsers();
        $this->view('pages/members', $data);
    }

    public function waiting() {
        $data = $this->userModel->getAllUsers();
        $this->view('pages/waiting', $data);
    }


}

?>
