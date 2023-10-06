<?php

class Post
{
    private $id;
    // private $title;
    private $content;
    // private $created_at;
    private $author_id;
    private $subject_id;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $cle => $valeur) {
            $methode = 'set' . ucfirst($cle); // setContent, setCreatedAt, setAuthorId
            if (method_exists($this, $methode)) {
                $this->$methode($valeur);
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }


    // public function getTitle()
    // {
    //     return $this->title;
    // }


    public function getContent()
    {
        return $this->content;
    }


    // public function getCreatedAt()
    // {
    //     return $this->created_at;
    // }


    public function getAuthorId()
    {
        return $this->author_id;
    }




    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }


    // public function setTitle(string $title): self
    // {
    //     $this->title = $title;

    //     return $this;
    // }


    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }


    // public function setCreatedAt($created_at): self
    // {
    //     $this->created_at = $created_at;

    //     return $this;
    // }


    public function setAuthorId($author_id): self
    {
        $this->author_id = $author_id;

        return $this;
    }




    /**
     * Get the value of subject_id
     */
    public function getSubjectId()
    {
        return $this->subject_id;
    }

    /**
     * Set the value of subject_id
     */
    public function setSubject_id($subject_id): self
    {
        $this->subject_id = $subject_id;

        return $this;
    }
}

?>
