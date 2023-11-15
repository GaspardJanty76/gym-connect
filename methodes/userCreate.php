<?php
require_once 'dbConnect.php';

$pdoManager = new DBManager('gymconnect');
$pdo = $pdoManager->getPDO();

class UserManagement
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addUserAsAdmin($login, $email, $password)
    {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO oauth (pseudo, email, mdp) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(1, $login, PDO::PARAM_STR);
        $stmt->bindValue(2, $email, PDO::PARAM_STR);
        $stmt->bindValue(3, $passwordHash, PDO::PARAM_STR);

        return $stmt->execute();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = isset($_POST["pseudo"]) ? trim($_POST["pseudo"]) : "";
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    if (!empty($login) && !empty($email) && !empty($password)) {
        $userManager = new UserManagement($pdo);
        $result = $userManager->addUserAsAdmin($login, $email, $password);

        if ($result) {
            echo "L'utilisateur a été ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout de l'utilisateur.";
        }
    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }
}
?>
