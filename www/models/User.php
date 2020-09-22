<?php

namespace secretshop\models;

use secretshop\managers\RoleManager;

class User extends Model
{
    protected $id;
    protected $email;
    protected $password;
    protected $prenom;
    protected $creationDate;
    protected $idRole;
    protected $token;

    /* Setters */

    public function setId($id)
    {
        $this->id=strip_tags($id);
    }

    public function setEmail($email)
    {
        $this->email=strip_tags($email);
    }

    public function setPassword($password)
    {
        $this->password=strip_tags(sha1($password));
    }

    public function setPrenom($prenom)
    {
        $this->name=strtoupper(strip_tags($prenom));
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate=$creationDate;
    }

    public function setIdRole($idRole)
    {
        $this->idRole=$idRole;
    }

    public function setToken($token)
    {
        $this->token=$token;
    }

    /* Getters */

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function getIdRole()
    {
        return $this->idRole;
    }

    public function getToken()
    {
        return $this->token;
    }

    public static function showUserTable($users)
    {
        $roleManager = new RoleManager();

        $tabUsers = [];
        foreach($users as $user)
        {
            $role = $roleManager->find($user->getIdRole());

            $tabUsers[] = [
                "id" => $user->getId(),
                "email" => $user->getEmail(),
                "prenom" => $user->getPrenom(),
                "creationDate" => $user->getCreationDate(),
                "idRole" => $role->getId()
            ];
        }

        $tab = [
            "colonnes"=>[
                "Id",
                "Prénom",
                "Email",
                "Date de création",
                "Role"
            ],

            "fields"=>[
                "User"=>[]
            ]
        ];

        $tab["fields"]["User"] = $tabUsers;


        return $tab;
    }

}