<?php
    class Messages extends Controller {
        public function __construct()
        {
            $this->messageModel = $this->model("MessageModel");
            $this->usersModel = $this->model("UserModel");
        }

        public function index() {
            $conversations = $this->messageModel->getAllConversationById($_SESSION['user_id']);
            $data = [
                "conversation" => $conversations
            ];
            $this->view('pages/messages', $data);
        }

        // search conversation
        public function search() {
            $outgoing_id = $_SESSION['user_id'];
            $searchTerm = $_POST['searchTerm'];
            $search = $this->messageModel->searchConversation($searchTerm);
            $output = "";

            if (mysqli_num_rows($search) > 0) {
                while($rows = mysqli_fetch_assoc($search)) {
                    $last = $this->messageModel->getLastChat($outgoing_id, $rows['user_2']);
                    $rows2 = mysqli_fetch_assoc($last);
                    if (mysqli_num_rows($last) > 0) {
                        $result = $rows2['message_content'];
                    }
                    else {
                        $result = "No message available";
                    }

                    (strlen($result) > 28) ? $msg = substr($result, 0, 28) : $msg = $result;
                    $output .= '
                        <div class="conversation-item">
                            <a href="./messages/chat/' . $rows['user_2'] . '">
                            <div class="conversation-content">
                                <img src="./public/img/' . $rows['avatar'] . '" alt="">
                                <div class="conversation__detail">
                                    <span>' . $rows['firstname'] . ' ' . $rows['lastname'] .'</span>
                                    <p>' . $msg . '</p>
                                </div>
                            </div>
                        </a>
                    </div>';
                }
            } else {
                $output .= "<p>No conversation found related to your search term</p>";
            }
            echo $output;
        }

        public function chat($user_id) {
            $info = $this->usersModel->getUserById($user_id);
            $data = [
                "info" => $info
            ];

            $this->view("/pages/chat", $data);

        }

        public function insertChat() {
            $outgoing_id = $_POST['outgoing_id'];
            $incoming_id = $_POST['incoming_id'];
            $message = $_POST['message'];
            
            if (!empty($_POST['message'])) {
                $chat = $this->messageModel->addMessage($outgoing_id, $incoming_id, $message);
            }
        }

        public function getChat() {
            $outgoing_id = $_POST['outgoing_id'];
            $incoming_id = $_POST['incoming_id'];
            $output = "";
            $chat = $this->messageModel->getChat($outgoing_id, $incoming_id);
            if (mysqli_num_rows($chat) > 0) {
                while ($rows = mysqli_fetch_assoc($chat)) {
                    if ($rows['from_user_id'] === $outgoing_id) {
                        $output .= '
                                    <div class="chat outgoing">
                                        <div class="details">
                                            <p>' . $rows['message_content'] . '</p>
                                        </div>
                                    </div>
                                    ';
                    }
                    else {
                        $output .= '
                                    <div class="chat incoming">
                                        <img src="../../public/img/' . $rows['avatar'] . '" alt="">
                                        <div class="details">
                                            <p>' . $rows['message_content'] . '</p>
                                        </div>
                                    </div>
                                    ';
                    }
                }
            }
            echo $output;
        }

        public function getConversation() {
            $outgoing_id = $_SESSION['user_id'];
            $conversations = $this->messageModel->getAllConversationById($_SESSION['user_id']);
            $output = "";
            if (mysqli_num_rows($conversations) === 0) {
                $output .= "No users are availabel to chat";
            }
            elseif (mysqli_num_rows($conversations) > 0) {
                while($rows = mysqli_fetch_assoc($conversations)) {
                    $last = $this->messageModel->getLastChat($outgoing_id, $rows['user_2']);
                    $rows2 = mysqli_fetch_assoc($last);
                    if (mysqli_num_rows($last) > 0) {
                        $result = $rows2['message_content'];
                    }
                    else {
                        $result = "No message available";
                    }

                    (strlen($result) > 28) ? $msg = substr($result, 0, 28) : $msg = $result;
                    $output .= '
                        <div class="conversation-item">
                            <a href="./messages/chat/' . $rows['user_2'] . '">
                                <div class="conversation-content">
                                    <img src="./public/img/' . $rows['avatar'] . '" alt="">
                                    <div class="conversation__detail">
                                        <span>' . $rows['firstname'] . ' ' . $rows['lastname'] .'</span>
                                        <p>' . $msg . '</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    ';
                }
            }
            echo $output;
        }

        public function getChatList($user_id) {
            $result = $this->messageModel->getChatList($user_id);
            $output = "";

            foreach($result as $rows) {
                if ($rows['from_user_id'] == $_SESSION['user_id']) {
                    $output .= '
                                <div class="chat outgoing">
                                    <div class="details">
                                        <p>' . $rows['message_content'] . '</p>
                                    </div>
                                </div>
                                ';
                }
                else {
                    $output .= '
                                <div class="chat incoming">
                                    <img src="./public/img/' . $rows['avatar'] . '" alt="">
                                    <div class="details">
                                        <p>' . $rows['message_content'] . '</p>
                                    </div>
                                </div>
                                ';
                }
            }
            echo $output;
            return $output;
        }

        public function addMessage() {
            $success = "";
            $from_user_id = $_POST['from-user-id'];
            $to_user_id = $_POST['to-user_id'];
            if (!empty($_POST['chat-content'])) {
                $message_content = $_POST['chat-content'];
                if ($this->messageModel->addMessage($from_user_id, $to_user_id, $message_content)) {
                    $success = "Them thanh cong";
                }
                else {
                    $success = "Them that bai";
                }   
            }

            $data = array(
                'success' => $success,
                'from_user_id' => $from_user_id,
                'to_user_id' => $to_user_id,
                'message_content' => $message_content
            );

            echo json_encode($data);
        }
    }
?>