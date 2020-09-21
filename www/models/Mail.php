<?php

namespace secretshop\models;

class Mail extends Model
{
    protected $id;
    protected $email;

    /* Setters */

    public function setId($id)
    {
        $this->id=$id;
    }

    public function setMail($email)
    {
        $this->email=htmlspecialchars($email);
    }

    /* Getters */

    public function getId()
    {
        return $this->id;
    }

    public function getMail()
    {
        return $this->mail;
    }
}