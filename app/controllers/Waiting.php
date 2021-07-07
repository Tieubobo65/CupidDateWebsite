<?php 
    class Waiting extends Controller {
        public function __construct()
        {
            $this->MembersModel = $this->model("MembersModel");
        }
        
    public function index() {
        $data = $this->MembersModel->getAllUsers();
        foreach($data as $k => $value) {
            //remove members that haven't like user yet
            if(!$this->MembersModel->isLike($value["id"], $_SESSION["user_id"])) {
                unset($data[$k]);
            }
            //remove members that user already liked
            if($this->MembersModel->isLike($_SESSION["user_id"], $value["id"])) {
                unset($data[$k]);
            }
        }
        $this->view('pages/waiting', $data);
    }
}