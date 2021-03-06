<?php

namespace secretshop\forms;
use secretshop\core\Helper;

class RegisterForm 
{

    public static function getForm()
    {
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>Helper::getUrl("User", "register"),
                "class"=>"justify-content-center",
                "actionName"=> 'register',
                "id"=>"formRegisterUser",
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
                    "errorMsg"=>"Adresse mail invalide ou déja utilisée"
                ],
                "password"=>[
                    "type"=>"password",
                    "placeholder"=>"Votre mot de passe (Au moins six lettres, dont une majuscule, un chiffre et un caractère spécial)",
                    "class"=>"form-control form-control-user",
                    "id"=>"",
                    "required"=>true,
                    "errorMsg"=>"Votre mot de passe doit faire entre 8 et 20 caractères avec une minuscule, une majuscule, un nombre et un caractère spécial"
                ],
                "passwordConfirm"=>[
                    "type"=>"password",
                    "placeholder"=>"Confirmation",
                    "class"=>"form-control form-control-user",
                    "id"=>"",
                    "required"=>true,
                    "confirmWith"=>"pwd",
                    "errorMsg"=>"Votre mot de passe de confirmation ne correspond pas"
                ],
                "prenom"=>[
                    "type"=>"text",
                    "placeholder"=>"Votre prénom",
                    "class"=>"form-control form-control-user",
                    "id"=>"",
                    "required"=>true,
                    "min-length"=>2,
                    "max-length"=>50,
                    "errorMsg"=>"Votre prénom doit faire entre 1 et 50 caractères et ne doit pas contenir de caractères spéciaux ni de nombres"
                ],
                "captcha"=>[
                    "type"=>"captcha",
                    "class"=>"form-control form-control-user",
                    "id"=>"",
                    "required"=>true,
                    "placeholder"=>"Veuillez saisir les caractères",
                    "errorMsg"=>"Captcha incorrect"
                ],
            ]
        ];
    }
}