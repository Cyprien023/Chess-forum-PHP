<?php

class PostManager
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
        } catch (PDOException $error) {
            echo $error->getMessage(); // Message d'erreur si la connextion échoue
        }
    }

    public function setDb($db)
    {
        $this->db = $db;
    }

    public function add(Post $article)
    {
        $req = $this->db->prepare("INSERT INTO `post` (content, author_id, subject_id) VALUES (:content, :author_id, :subject_id)");
        $req->bindValue(":content", $article->getContent(), PDO::PARAM_LOB);
        // $req->bindValue(":created_at", $article->getCreatedAt(), PDO::PARAM_STR);
        $req->bindValue(":author_id", $_SESSION["id"], PDO::PARAM_INT);
        $req->bindValue(":subject_id", $article->getSubjectId(), PDO::PARAM_INT);

        $req->execute();
    }

    // retourne le post correspondant à "$id"
    public function get(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `post` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $donnees = $req->fetch();
        $post = new Post($donnees);
        return $post;
    }

    public function getAllBySubjectId(int $subjectId) {
        $posts = [];
        $req = $this->db->prepare("SELECT * FROM `post` WHERE id = :subject_id");
        $req->bindValue(':subject_id', $subjectId, PDO::PARAM_INT);
        $req->execute();
        $donnees = $req->fetchAll();
        foreach ($donnees as $donnee) {
            $post = new Post($donnee);
            $posts[] = $post;
        }
        return $posts;
    }

    // public function getBySubjectId(int $subjectId)
    // {

    //     $posts = [];

    //     $req = $this->db->prepare("SELECT * FROM post WHERE   subject_id = :subject_id");

    //     $req->bindValue(":subjectId", $subjectId, PDO::PARAM_INT);

    //     $req->execute();

    //     $donnees = $req->fetchAll();

    //     foreach ($donnees as $donnee) {

    //         $posts = new post($donnee);

    //         $posts[] = $posts;
    //     }

    //     return $posts;
    // }

    // Retourne tous les posts
    public function getAll()
    {
        $posts = [];
        $req = $this->db->prepare("SELECT * FROM `post` ORDER BY content");
        $req->execute();
        $donnees = $req->fetchAll();
        foreach ($donnees as $donnee) {
            $post = new Post($donnee);
            $posts[] = $post;
        }
        return $posts;
    }

    // Met à jour le post "$article"
    public function update(Post $article)
    {
        $req = $this->db->prepare("UPDATE `post` SET content = :content, author_id = :author_id WHERE id = :id");

        $req->bindValue(":id", $article->getId(), PDO::PARAM_INT);
        $req->bindValue(":content", $article->getContent(), PDO::PARAM_STR);
        // $req->bindValue(":created_at", $article->getCreatedAt(), PDO::PARAM_INT);
        $req->bindValue(":author_id", $article->getAuthorId(), PDO::PARAM_STR);

        $req->execute();
    }

    // Supprime le user correspondant à "$id"
    public function delete(int $id)
    {
        $req = $this->db->prepare("DELETE FROM `post` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}
