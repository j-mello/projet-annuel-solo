<?php

namespace secretshop\models;

class Role extends Model
{
    protected $id;
    protected $role;

    /* Setters */

    public function setId($id)
    {
        $this->id=$id;
    }

    public function setRole($role)
    {
        $this->role=$role;
    }

    /* Getters */

    public function getId()
    {
        return $this->id;
    }

    public function getRole()
    {
        return $this->role;
    }

    public static function showRoleTable($roles)
    {

        $tabRoles = [];
        foreach($roles as $role)
        {
            $tabRoles[] = [
                "id" => $role->getId(),
                "role" => $role->getRole()
            ];
        }

        $tab = [
            "colonnes"=>[
                "Id",
                "Role"
            ],

            "fields"=>[
                "Role"=>[]
            ]
        ];

        $tab["fields"]["Role"] = $tabRoles;

        return $tab;
    }
}