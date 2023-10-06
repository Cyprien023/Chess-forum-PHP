<?php 

    class UserManager 
    {
        private $db;


        public function __construct()
        {
            // Connexion à la BDD MySQL game
            $dbName = "forum";
            $port = 8889;
            $userName = "root";
            $password = "root";
            try {
                $this->setDb(new PDO("mysql:host=localhost;dbname=$dbName;port=$port;charset=utf8mb4", $userName, $password));
            }catch(PDOException $error) {
                echo $error->getMessage(); // Message d'erreur si la connextion échoue
            }
        }
        
        public function setDb($db) {
            $this->db = $db;
        }

        // Ajoute le user "client" en BDD
        public function add(User $client) {
            $req = $this->db->prepare("INSERT INTO `user` (userName, password, elo) VALUES (:userName, :password, :elo)");

            $req->bindValue(":userName", $client->getUserName(), PDO::PARAM_STR);
            $req->bindValue(":password", password_hash($client->getpassword(), PASSWORD_DEFAULT), PDO::PARAM_STR);
            $req->bindValue(":elo", $client->getElo(), PDO::PARAM_STR);

            $req->execute();
        }


        // retourne le user correspondant à "$id"
        public function get(int $id) {
            $req = $this->db->prepare("SELECT * FROM `user` WHERE id = :id");
            $req->bindValue(":id", $id, PDO::PARAM_INT);
            $req->execute();
            $donnees = $req->fetch();
            $user = new User($donnees);
            return $user;
        }

        // retourne le dernier id enregistré dans la table
        public function getLastId() {
            $req = $this->db->query("SELECT id FROM `user` ORDER BY id DESC");
            $req->execute();
            $donnees = $req->fetch();
            return $donnees["id"];
        }

        // Retourne tous les users
        public function getAll() {
            $users = [];
            $req = $this->db->prepare("SELECT * FROM `user` ORDER BY userName");
            $req->execute();
            $donnees = $req->fetchAll();
            foreach ($donnees as $donnee) {
                $user = new User($donnee);
                $users[] = $user;
            }
            return $users;
        }

        // Met à jour le user "$client"
        public function update(User $client) {
            $req = $this->db->prepare("UPDATE `user` SET userName = :userName, password = :password, elo = :elo WHERE id = :id");

            $req->bindValue(":id", $client->getId(), PDO::PARAM_INT);
            $req->bindValue(":userName", $client->getUserName(), PDO::PARAM_STR);
            $req->bindValue(":password", $client->getPassword(), PDO::PARAM_STR);
            $req->bindValue(":elo", $client->getElo(), PDO::PARAM_INT);

            $req->execute();
        }

        // Supprime le user correspondant à "$id"
        public function delete(int $id) {
            $req = $this->db->prepare("DELETE FROM `user` WHERE id = :id");
            $req->bindParam(":id", $id, PDO::PARAM_INT);
            $req->execute();
        }




    }

?>