<?php
    class Chat extends Controller {
        public function __construct()
        {
            
        }

        public function index() {
            $data = [

            ];
            $this->view("", $data);
        }
    }
?>