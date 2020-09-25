<?php

namespace secretshop\forms;

use secretshop\core\Helper;

class ForgotPasswordForm
{
    public static function getForm()
    {
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>Helper::getUrl("User", "forgotPassword"),
                "class"=>"User",
                "actionName"=>'forgotPassword',
                "id"=>"formForgotpassword",
                "submit"=>"Valider"
            ],
            "fields"=>[
                "email"=>[
                    "type"=>"email",
                    "placeholder"=>"Votre email",
                    "class"=>"form-control form-control-user",
                    "id"=>"",
                    "required"=>true,
                    "errorMsg"=>"Adresse mail inconnue"
                ]
            ]
        ];
    }
}