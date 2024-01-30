<?php
namespace Model\Entities;

use App\Entity;

final class Post extends Entity
{
    private $id;
    private $creationDate;
    private $text;
    private $user; // Utilisateur associé
    private $topic; // Sujet associé

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    // ... autres méthodes ...

    public function getId()
    {
        return $this->id;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getTopic()
    {
        return $this->topic;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    public function setTopic($topic)
    {
        $this->topic = $topic;
        return $this;
    }
}


