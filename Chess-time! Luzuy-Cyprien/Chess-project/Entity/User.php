<?php

class User
{
    private $id;
    private $userName;
    private $password;
    private $elo;

    
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $cle => $valeur) {
            $methode = 'set' . ucfirst($cle); // setUserName, setPassword, setElo
            if (method_exists($this, $methode)) {
                $this->$methode($valeur);
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }


    public function getUserName()
    {
        return $this->userName;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function getElo()
    {
        return $this->elo;
    }




    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }


    public function setUserName($userName): self
    {
        $this->userName = $userName;

        return $this;
    }


    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }


    public function setElo($elo): self
    {
        $this->elo = $elo;

        return $this;
    }

    
}




?>
