<?php 
    class Liked extends Controller {
        public function __construct()
        {
            $this->MembersModel = $this->model("MembersModel");
        }

        public function index() {
            $data = $this->MembersModel->getAllUsers();
            foreach($data as $k => $value) {
                //remove members that user not liked 
                if(!$this->MembersModel->isLike($_SESSION["user_id"], $value["id"])) {
                    unset($data[$k]);
                }
            }
            $this->view('pages/liked_members', $data);
        }
    }
?>