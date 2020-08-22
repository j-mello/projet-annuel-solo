<?php

namespace secretshop\core\tools;

class Message
{
    public static function InscriptionSucess()
    {
        return [
            "title" => "Inscription",

            "body" => [
                "Votre compte a bien été créé.",
                "Merci de consulter vos emails afin de valider votre compte."
            ]
        ];
    }

    public static function mailInscriptionSucess()
    {
        return [
            "title" => "Inscription",

            "body" => [
                "Votre email a été validé avec succès.",
                "Vous pouvez vous connecter pour accèder à nos offres."
            ]
        ];
    }

    public static function sendMailPasswordSucess()
    {
        return [
            "title" => "Mot de passe oublié",

            "body" => [
                "Le mot de passe a été enregistré.",
                "Veuillez vérifier vos emails afin de faire la validation."
            ]
        ];
    }

    public static function newPasswordSucess()
    {
        return [
            "title" => "Changement de mot de passe",

            "body" => [
                "Le mot de passe a été changé avec succès.",
                "Vous pouvez maintenant vous connecter avec celui-ci."
            ]
        ];
    }

    public static function linkNoValid()
    {
        return [
            "title" => "Validation",

            "body" => [
                "Le lien n'est pas valable"
            ]
        ];
    }
}