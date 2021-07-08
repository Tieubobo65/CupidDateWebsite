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
                    FROM relationships r
                    INNER JOIN users u ON r.user_2 = u.id
                    WHERE r.status = '1'
                    AND (r.user_2 != $user_id
                    AND r.user_1 = $user_id)";
            return mysqli_query($this->conn, $sql);
        }

        public function searchConversation($search) {
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT *
                    FROM relationships r
                    INNER JOIN users u ON r.user_2 = u.id
                    WHERE r.status = '1'
                    AND r.user_2 != $user_id
                    AND r.user_1 = $user_id
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
                    FROM messages m
                    INNER JOIN users u ON m.from_user_id = u.id
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

        public function block($user_id, $block_user_id) {
            $sql = "INSERT INTO blocks (user_id, block_user_id) VALUES($user_id, $block_user_id)";
            if($this->db->execute($sql)) {
                return true;
            } else {
                return false;
            }
        }

        public function checkBlock($user_id, $block_user_id) {
            $sql = "SELECT *
                    FROM blocks
                    WHERE (user_id = $user_id AND block_user_id = $block_user_id)
                    OR (user_id = $block_user_id AND block_user_id = $user_id)";
            return mysqli_query($this->conn, $sql);
        }

        public function unblock($user_id, $block_user_id) {
            $sql = "DELETE FROM blocks WHERE user_id = $user_id AND block_user_id = $block_user_id";
            if($this->db->execute($sql)) {
                return true;
            } else {
                return false;
            }
        }

    }
?>