<?php 
    class Matches extends Controller {
        public function __construct()
        {
            $this->MembersModel = $this->model("MembersModel");
        }

        public function index() {
            $data = $this->MembersModel->getAllUsers();
            foreach($data as $k => $value) {
                //remove unmatched members
                if(!$this->MembersModel->isLike($_SESSION["user_id"], $value["id"]) || 
                !$this->MembersModel->isLike($value["id"], $_SESSION["user_id"])) {
                    unset($data[$k]);
                }
            }
            $this->view('pages/matches', $data);
        }
    }
?>