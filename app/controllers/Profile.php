<?php 
    class Profile extends Controller {
        public function __construct()
        {
            $this->userModel = $this->model("UserModel");
            $this->MembersModel = $this->model("MembersModel");
        }

    public function index() {
        $member_id = $_GET['id'];
        //get user infor
        $user_detail = $this->userModel->getUserDetail($member_id);
        $photos =  $this->userModel->getAllPhotos($member_id);
        $address = $this->userModel->getCurrentAddress($member_id);
        if($this->MembersModel->isLike($_SESSION["user_id"], $member_id)) {
            $like = 1;
        } else {
            $like = 0;
        }
        $data = [
            "user_detail" => $user_detail,
            "photos" => $photos,
            "address" => $address,
            "like" => $like
        ];
        $this->view('pages/profile', $data);
        }
    }
?>