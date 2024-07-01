<?php
require_once 'models/User.php';
require_once 'config/database.php';

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->username = $_POST['username'];
            $this->user->email = $_POST['email'];
            $this->user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->user->name = $_POST['name'];
            $this->user->created = date('Y-m-d H:i:s');

            if ($this->user->create()) {
                header("Location: index.php?controller=user&action=login");
            } else {
                echo "Erreur lors de l'inscription.";
            }
        }

        include 'views/users/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->user->login($_POST['email'], $_POST['password'])) {
                $_SESSION['user_id'] = $this->user->id;
                $_SESSION['username'] = $this->user->username;
                header("Location: index.php?controller=article&action=index");
            } else {
                echo "Identifiants incorrects.";
            }
        }

        include 'views/users/login.php';
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php?controller=user&action=login");
    }


}
?>
