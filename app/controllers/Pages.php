
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
}
?>
