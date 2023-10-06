<?php 

    class SubjectManager 
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

        // Ajoute le sujet "theme" en BDD
        public function add(Subject $theme) {
            $req = $this->db->prepare("INSERT INTO `subject` (subjectTitle, author_id) VALUES (:subjectTitle, :author_id)");

            $req->bindValue(":subjectTitle", $theme->getSubjectTitle(), PDO::PARAM_STR);
            $req->bindValue(":author_id", $_SESSION["id"], PDO::PARAM_INT); // TODO: Valeur à mettre à jour avec l'id de l'utilisateur connecté ($_SESSION['id'])

            $req->execute();
        }

        // retourne le sujet correspondant à "$id"
        public function get(int $id) {
            $req = $this->db->prepare("SELECT * FROM `subject` WHERE id = :id");
            $req->bindValue(":id", $id, PDO::PARAM_INT);
            $req->execute();
            $donnees = $req->fetch();
            $subject = new Subject($donnees);
            return $subject;
        }

        // Retourne tous les sujets
        public function getAll() {
            $subjects = [];
            $req = $this->db->prepare("SELECT * FROM `subject` ORDER BY subjectTitle");
            $req->execute();
            $donnees = $req->fetchAll();
            foreach ($donnees as $donnee) {
                $subject = new Subject($donnee);
                $subjects[] = $subject;
            }
            return $subjects;
        }

        // Met à jour le sujet "$theme"
        public function update(Subject $theme) {
            $req = $this->db->prepare("UPDATE `subject` SET subjectTitle = :subjectTitle, author_id = :author_id WHERE id = :id");

            $req->bindValue(":id", $theme->getId(), PDO::PARAM_INT);
            $req->bindValue(":subjectTitle", $theme->getSubjectTitle(), PDO::PARAM_STR);
            $req->bindValue(":author_id", 1, PDO::PARAM_INT); // TODO: Valeur à mettre à jour avec l'id de l'utilisateur connecté ($_SESSION['id'])

            $req->execute();
        }

        // Supprime le sujet correspondant à "$id"
        public function delete(int $id) {
            $req = $this->db->prepare("DELETE FROM `subject` WHERE id = :id");
            $req->bindParam(":id", $id, PDO::PARAM_INT);
            $req->execute();
        }




    }

?>