<?php
class User {
    private $conn;
    private $table_name = "Utilisateur";

    public $id;
    public $username;
    public $email;
    public $password;
    public $name;
    public $created;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nom_utilisateur, email, mot_de_passe, nom, date_creation) VALUES (:username, :email, :password, :name, :created)";
        $stmt = $this->conn->prepare($query);

        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->created=htmlspecialchars(strip_tags($this->created));

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":created", $this->created);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function login($email, $password) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['mot_de_passe'])) {
            $this->id = $user['id'];
            $this->username = $user['nom_utilisateur'];
            $this->email = $user['email'];
            $this->name = $user['nom'];
            $this->created = $user['date_creation'];

            return true;
        }
        return false;
    }

    // Other methods for update, etc.
}
?>
