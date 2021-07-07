<?php
    class Contact extends Controller {
        public function __construct() {}

        public function index() {
            //message to us
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $to      = 'tieubobocute@gmail.com';
                $subject = 'Messages From Member of CupidDate';
                $message = $_POST['message'];
                $headers = 'From: '.$_POST["email"];
                mail($to, $subject, $message, $headers);
                }

            $this->view('pages/contact');
        }
    }
?>