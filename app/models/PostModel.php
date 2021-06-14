<?php
    class PostModel {
        private $db;
        public $conn;
        public function __construct()
        {
            $this->db = new Database();
            $this->conn = $this->db->connect();
        }

        // Get all posts
        public function findAllPosts() {
            $sql = "SELECT * FROM posts p LEFT JOIN users u ON p.user_id = u.id  ORDER BY created_at ASC";
            return mysqli_query($this->conn, $sql);
        }
        
        // Get post by plug
        public function findPostByPlug($plug) {
            $sql = "SELECT * FROM posts p LEFT JOIN users u ON p.user_id = u.id WHERE p.plug = '$plug'";
            return mysqli_query($this->conn, $sql)->fetch_assoc();
        }
    }
?>