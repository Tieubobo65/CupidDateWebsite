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
        public function detailBlog($plug) {
            $post = $this->postsModel->findPostByPlug($plug);
            $data = [
                "post" => $post,
            ];
            $this->view("/pages/blogdetail", $data);
        }


    }
?>