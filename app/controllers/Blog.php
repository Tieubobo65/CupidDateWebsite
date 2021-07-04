<?php 
    class Blog extends Controller {
        public function __construct()
        {
            $this->postsModel = $this->model("PostModel");
        }

        public function index() {
            $posts = $this->postsModel->findAllPosts();
            $data = [
                'title' => 'Blog page',
                'posts' => $posts,
            ];
            $this->view("pages/blog", $data);
        }

        // Show detail blog page
        public function t($post_id) {
            $post = $this->postsModel->findPostBySlug($post_id);
            $relatedPosts = $this->postsModel->getRelatedPosts($post['cat_id']);
            $lastedPosts = $this->postsModel->findAllPosts();
            $comments = $this->postsModel->getComments($post['post_id']);
            $data = [
                "post" => $post,
                "relatedPosts" => $relatedPosts,
                "lastedPosts" => $lastedPosts,
                "comments" => $comments,
            ];
            $this->view("/pages/blogdetail", $data);
        }

        public function addComment() {
            $error = "";
            $success = "";
            $post_id = $_POST['post-id'];
            $user_id = $_SESSION['user_id'];
            if (empty($_POST['comment-content'])) {
                $error .= '<p class="text-danger">Please fill out this field</p>';
            }
            else {
                $comment_content = $_POST['comment-content'];
                $this->postsModel->addComment($post_id, $user_id, $comment_content);
            }
            
            $data = array(
                'error' => $error,
                'success' => $success,
                'post' => $post_id,
                'user' => $user_id,
                'comment' => $comment_content
            );
            echo json_encode($data);
        }

        public function getComments($post_id) {
            $result = $this->postsModel->getComments($post_id);
            $output = "";

            foreach($result as $rows) {
                $output .= '
                    <div class="col l-12 m-12 c-12">
                        <div class="comments-item">
                            <div class="comments-item__info">
                                <a href="#">
                                    <img src="../../public/img/' . $rows['avatar'] . '" alt="">
                                </a>
                                <div class="comments-item__more">
                                    <a href="#">
                                        ' . $rows['firstname'] . ' ' . $rows['lastname'] .'
                                    </a>
                                    <p>
                                        '. $rows['created_at'] . '
                                    </p>
                                </div>
                            </div>
                            <div class="comments-item__content">
                                <p>
                                    ' . $rows['comment_content'] . '
                                </p>
                            </div>
                        </div>
                    </div>
                ';
            }
            echo $output;
            return $output;
        }
    }
?>