<?php 
    class Setup extends Controller {
        public function __construct()
        {
            $this->userModel = $this->model("UserModel");
        }

        public function index() {
            $data['country'] = $this->userModel->fetch_country();
            $this->view('users/setup', $data);
        }

        function fetch_state() {
            if(isset($_POST['country_id']))
            {
                echo $this->userModel->fetch_state($_POST['country_id']);
            } 
        }
    }
?>