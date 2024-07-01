<?php
require_once 'models/Comment.php';
require_once 'config/database.php';

class CommentController {
    private $db;
    private $comment;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->comment = new Comment($this->db);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->comment->content = $_POST['content'];
            $this->comment->published_at = date('Y-m-d H:i:s');
            $this->comment->user_id = $_SESSION['user_id'];
            $this->comment->article_id = $_POST['article_id'];

            if ($this->comment->create()) {
                header("Location: index.php?controller=article&action=show&id=" . $_POST['article_id']);
            } else {
                echo "Erreur lors de la création du commentaire.";
            }
        }
    }
}
?>
