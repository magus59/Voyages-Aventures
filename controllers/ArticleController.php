<?php
require_once 'models/Article.php';
require_once 'config/database.php';

class ArticleController {
    private $db;
    private $article;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->article = new Article($this->db);
    }

    public function index() {
        $articles = $this->article->read();
        include 'views/articles/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->article->title = $_POST['title'];
            $this->article->content = $_POST['content'];
            $this->article->image_url = $_POST['image_url'];
            $this->article->published_at = date('Y-m-d H:i:s');
            $this->article->user_id = $_SESSION['user_id'];
            $this->article->category_id = $_POST['category_id'];

            if ($this->article->create()) {
                header("Location: index.php?controller=article&action=index");
            } else {
                echo "Erreur lors de la création de l'article.";
            }
        }

        include 'views/articles/create.php';
    }

    public function show() {
        include 'views/articles/show.php';
    }

    public function edit() {
        include 'views/articles/edit.php';
    }
}
?>
