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
            $sql = "SELECT * 
                    FROM posts p 
                    INNER JOIN users u ON p.author_id = u.id
                    INNER JOIN categories c ON p.cat_id = c.cat_id
                    ORDER BY created_at DESC";
            return mysqli_query($this->conn, $sql);
        }
        
        // Get post by slug
        public function findPostBySlug($post_id) {
            $sql = "SELECT * 
                    FROM posts p 
                    INNER JOIN users u ON p.author_id = u.id 
                    INNER JOIN categories c ON p.cat_id = c.cat_id
                    WHERE p.post_id = $post_id";
            return mysqli_query($this->conn, $sql)->fetch_assoc();
        }

        public function getRelatedPosts($cat_id) {
            $sql = "SELECT *
                    FROM posts p
                    INNER JOIN users u ON p.author_id = u.id
                    INNER JOIN categories c ON p.cat_id = c.cat_id
                    WHERE p.cat_id = $cat_id
                    ORDER BY p.created_at DESC";
            return mysqli_query($this->conn, $sql);
        }

        // Add comment
        public function addComment($post_id, $user_id, $comment_content) {
            $sql = "INSERT INTO comments (post_id, user_id, comment_content)
                    VALUE ($post_id, $user_id, '$comment_content')";
            if($this->db->execute($sql)) {
                return true;
            } else {
                return false;
            }
        }
        
        // Get comments
        public function getComments($post_id) {
            $sql = "SELECT p.post_id, user_id, firstname, lastname, avatar, comment_content, c.created_at
                    FROM comments c
                    INNER JOIN users u ON c.user_id = u.id
                    INNER JOIN posts p ON c.post_id = p.post_id
                    WHERE p.post_id = $post_id
                    ORDER BY c.created_at DESC";
            return mysqli_query($this->conn, $sql);
        }
    }
?>