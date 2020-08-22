<?php

namespace secretshop\mails;

class ConfirmAccountMail 
{
    public static function getMail($email, $prenom, $url)
    {
        return [
            "sender"=>[
                "email"=>"ne-pas-repondre@secretshop.com",
                "pseudo"=>"Administrateur Secret Shop"
            ],

            "addressee"=>[
                "email"=>$email,
                "pseudo"=>$prenom
            ],

            "body"=>[
                "html" => "true",
                "subject" => "Confirmation de votre compte",
                "body" => "Bonjour et bienvenue $prenom! </br> 
                Afin de valider votre compte, veuillez <a href=\"$url\">cliquer-ici</a> ou le copiez le lien dans un nouvel onglet : 
                </br>$url<br/>
                À bientôt sur Secret Shop !",
                "altBody" => "Bonjour et bienvenue $prenom! </br>
                Afin de valider votre compte, veuillez <a href=\"$url\">cliquer-ici</a> ou le copier dans un nouvel onglet :
                </br>$url<br/>
                À bientôt sur Secret Shop !"
            ]
        ];
    }
}