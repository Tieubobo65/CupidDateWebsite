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
            'totalMan' => $totalMen['total'],
            'totalWoman' => $totalWomen['total'],
        ];

        $this->view('pages/home', $data);
    }

    public function about() {
        $this->view('pages/about');
    }

    
}

?>
