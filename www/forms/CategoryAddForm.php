<?php

namespace secretshop\forms;
use secretshop\core\Helper;

class CategoryAddForm
{
    public static function getForm()
    {
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>Helper::getUrl("Category", "add"),
                "class"=>"Category",
                "actionName"=>'categoryAdd',
                "id"=>"formRegisterProduct",
                "submit"=>"Ajoutez la catégorie",
            ],
            "fields"=>[
                "category"=>[
                    "type"=>"text",
                    "placeholder"=>"Nom de la catégorie :",
                    "class"=>"form-control",
                    "id"=>"",
                    "required"=>true,
                    "min-length"=>3,
                    "max-length"=>30,
                    "errorMsg"=>"Le nom de la catégorie doit faire entre 3 et 30 caractères et ne doit pas contenir de caractères spéciaux."
                    ]
            ]
        ];
    }
}