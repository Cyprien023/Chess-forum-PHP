<?php

class Subject
{
    private $id;
    private $subjectTitle;
    private int $author_id;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $cle => $valeur) {
            $methode = 'set' . ucfirst($cle); // setSubjectTitle, setAuthor_id
            if (method_exists($this, $methode)) {
                $this->$methode($valeur);
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSubjectTitle()
    {
        return $this->subjectTitle;
    }


    public function getAuthor_id()
    {
        return $this->author_id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }


    public function setSubjectTitle($subjectTitle): self
    {
        $this->subjectTitle = $subjectTitle;

        return $this;
    }


    public function setAuthor_id($author_id): self
    {
        $this->author_id = $author_id;

        return $this;
    }
}
