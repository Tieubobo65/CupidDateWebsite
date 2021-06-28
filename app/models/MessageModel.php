<?php
    class MessageModel {
        private $db;
        public $conn;
        public function __construct()
        {
            $this->db = new Database();
            $this->conn = $this->db->connect();
        }

        public function getAllConversationById($user_id) {
            $sql = "SELECT *
                    FROM liked l
                    INNER JOIN users u ON l.user_id_2 = u.id
                    WHERE l.liked_status = 1
                    AND l.user_id_2 != $user_id
                    AND l.user_id_1 = $user_id";
            return mysqli_query($this->conn, $sql);
        }

        public function searchConversation($search) {
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT *
                    FROM liked l
                    INNER JOIN users u ON l.user_id_2 = u.id
                    WHERE l.liked_status = 1
                    AND l.user_id_2 != $user_id
                    AND l.user_id_1 = $user_id
                    AND (u.firstname LIKE '%{$search}%'
                    OR u.lastname LIKE '%{$search}%')";
            return mysqli_query($this->conn, $sql);
        }

        public function addMessage($from_user_id, $to_user_id, $message_content) {
            $sql = "INSERT INTO messages (from_user_id, to_user_id, message_content)
                    VALUE ($from_user_id, $to_user_id, '$message_content');
                    ";
            if($this->db->execute($sql)) {
                return true;
            } else {
                return false;
            }
        }

        public function getChat($outgoing_id, $incoming_id) {
            $sql = "SELECT *
                    FROM messages
                    WHERE (from_user_id = $outgoing_id AND to_user_id = $incoming_id)
                    OR (from_user_id = $incoming_id AND to_user_id = $outgoing_id)
                    ORDER BY message_id ASC
                    ";
            return mysqli_query($this->conn, $sql);
        }

        public function getLastChat($outgoing_id, $incoming_id) {
            $sql = "SELECT *
                    FROM messages
                    WHERE (to_user_id = $incoming_id OR from_user_id = $incoming_id)
                    AND (from_user_id = $outgoing_id OR to_user_id = $outgoing_id)
                    ORDER BY message_id DESC LIMIT 1
                    ";
            return mysqli_query($this->conn, $sql);
        }

    }
?>