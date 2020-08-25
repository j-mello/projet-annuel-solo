<?php

namespace secretshop\managers;

use secretshop\core\Manager;
use secretshop\models\User;

class UserManager extends Manager
{
    public function __construct()
    {
        parent::__construct(User::class, 'user');
    }

    public function manageUserToken($id,$token,$values = null)
    {
        $user = new User();
        // Utilisation de l'hydrate si on veut passer d'autres attributs en plus que l'id et le token
        if(!empty($values))
        {
            $user = $user->hydrate($values);
        }
        // Initialisation du token dans la db pour l'id indiqué
        $user->setId($id);
        $user->setToken($token);
        $this->save($user);
    }
}