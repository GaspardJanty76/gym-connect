<?php
require_once 'dbConnect.php';

class Authentification {
    private $pdo;

    public function __construct(DBManager $pdoManager) {
        $this->pdo = $pdoManager->getPDO();
    }

    public function verifierAuthentification($pseudo, $mot_de_passe) {
        $sql = "SELECT * FROM oauth WHERE email = :email";
        $requete = $this->pdo->prepare($sql);
        $requete->bindParam(':email', $pseudo);
        $requete->execute();
        $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mdp'])) {
            session_start();

            $session_duration = 3600;
            session_set_cookie_params($session_duration);

            $_SESSION['user_id'] = $utilisateur['id'];
            $_SESSION['username'] = $utilisateur['pseudo'];

            return true;
        }

        return false;
    }
}

$pdoManager = new DBManager("gymconnect");

$auth = new Authentification($pdoManager);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['password'];

    if ($auth->verifierAuthentification($email, $mot_de_passe)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "L'authentification a échoué. Veuillez réessayer.";
    }
}
?>
