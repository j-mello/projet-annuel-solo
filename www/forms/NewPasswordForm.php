<?php

namespace secretshop\forms;

use secretshop\core\Helper;

class NewPasswordForm
{
    public static function getForm()
    {
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>Helper::getUrl("USer","newPassword"),
                "class"=>"User",
                "id"=>"formForgotPassword",
                "submit"=>"Valider"
            ],
            "fields"=>[
                "password"=>[
                    "type"=>"passsword",
                    "placeholder"=>"Votre mot de passe",
                    "class"=>"form-control form-control-user",
                    "id"=>"",
                    "required"=>true,
                    "errorMsg"=>"Votre mot de passe doit faire entre 8 et 20 caractères avec un chiffre, une minuscule et une majuscule."
                ],
                "passwordConfirm"=>[
                    "type"=>"password",
                    "placeholder"=>"Confirmation",
                    "class"=>"form-control form-control-user",
                    "id"=>"",
                    "required"=>true,
                    "confirmWith"=>"pwd",
                    "errorMsg"=>'Le mot de passe ne correspond pas'
                ],
            ]
        ];
    }
}