<?php
class Article {
    private $conn;
    private $table_name = "Article";

    public $id;
    public $title;
    public $content;
    public $image_url;
    public $published_at;
    public $user_id;
    public $category_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (titre, contenu, image_url, date_publication, utilisateur_id, categorie_id) VALUES (:title, :content, :image_url, :published_at, :user_id, :category_id)";
        $stmt = $this->conn->prepare($query);

        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->content=htmlspecialchars(strip_tags($this->content));
        $this->image_url=htmlspecialchars(strip_tags($this->image_url));
        $this->published_at=htmlspecialchars(strip_tags($this->published_at));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->category_id=htmlspecialchars(strip_tags($this->category_id));

        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":image_url", $this->image_url);
        $stmt->bindParam(":published_at", $this->published_at);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":category_id", $this->category_id);

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

}
?>
