<?php

namespace secretshop\forms;

use secretshop\core\Helper;

class MailForm
{
    public static function getForm()
    {
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>Helper::getUrl('Home', 'email'),
                "class"=>"form-inline",
                "id"=>"formRegisterMail",
                "submit"=>"S'inscrire"
            ],
            "fields"=>[
                "email"=>[
                    "type"=>"email",
                    "placeholder"=>"Votre email",
                    "class"=>"form-control form-control-user",
                    "id"=>"",
                    "required"=>true,
                    "uniq"=>["table"=>"user","column"=>"email"],
                    "errorMsg"=>"Adresse mail invalide"
                ],
            ]
        ];
    }
}