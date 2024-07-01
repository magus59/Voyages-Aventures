<?php
class Comment {
    private $conn;
    private $table_name = "Commentaire";

    public $id;
    public $content;
    public $published_at;
    public $user_id;
    public $article_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (contenu, date_publication, utilisateur_id, article_id) VALUES (:content, :published_at, :user_id, :article_id)";
        $stmt = $this->conn->prepare($query);

        $this->content=htmlspecialchars(strip_tags($this->content));
        $this->published_at=htmlspecialchars(strip_tags($this->published_at));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->article_id=htmlspecialchars(strip_tags($this->article_id));

        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":published_at", $this->published_at);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":article_id", $this->article_id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Other methods for update, delete, etc.
}
?>
