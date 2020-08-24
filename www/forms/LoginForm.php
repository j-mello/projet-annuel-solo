<?php

namespace secretshop\forms;

use secretshop\core\Helper;

class LoginForm
{
    public static function getForm()
    {
        return [
            "config" =>[
                'method'=>'POST',
                "action"=>Helper::getUrl("User",'login'),
                "class"=>'User',
                "id"=>"formLoginUser",
                "submit"=>"Se connecter",
            ],
            "fields"=>[
                "email"=>[
                    "type"=>"email",
                    "placeholder"=>"Votre email",
                    "class"=>"form-control form-control-user",
                    "id"=>"",
                    "required"=>true,
                    "errorMsg"=>"Email de connexion incorrect"
                ],
                "password"=>[
                    "type"=>"password",
                    "placeholder"=>"Votre mot de passe",
                    "class"=>"form-control form-control-user",
                    "id"=>"",
                    "required"=>true,
                    "errorMsg"=>"Mot de passe incorrect"
                ],
            ]
        ];
    }
}