<?php

namespace secretshop\forms;
use secretshop\core\Helper;

class ProductAddForm {

    public static function getForm($categories)
    {
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>Helper::getUrl("Product", "add"),
                "class"=>"Product",
                "actionName"=> 'productAdd',
                "id"=>"",
                "submit"=>"Ajoutez le produit",
                "enctype"=>"multipart/form-data"
            ],

            "fields"=>[
                "name"=>[
                    "type"=>"text",
                    "placeholder"=>"Nom du produit :",
                    "class"=>"form-control dashbord-form",
                    "id"=>"",
                    "required"=>true,
                    "min-length"=>2,
                    "max-length"=>50,
                    "errorMsg"=>"Le nom du produit doit faire entre 1 et 50 caractères et ne doit pas contenir de caractères spéciaux."
                ],
                /*"slug"=>[
                    "type"=>"text",
                    "placeholder"=>"Nom de la page du produit : (aucun espace)",
                    "class"=>"form-control dashbord-form",
                    "id"=>"",
                    "requiered"=>true,
                    "min-length"=>2,
                    "max-length"=>50,
                    "errorMsg"=>"L'adresse ne doit pas comprendre d'espace et de caractères spéciaux."
                ],*/
                "formerPrice"=>[
                    "type"=>"number",
                    "placeholder"=>"Prix avant réduction :",
                    "class"=>"form-control dashbord-form",
                    "id"=>"",
                    "min"=>0,
                    "required"=>true,
                    "errorMsg"=>"Valeur incorrecte. Veuillez saisir un nombre positif"
                ],
                "price"=>[
                    "type"=>"number",
                    "placeholder"=>"Prix avec réduction :",
                    "class"=>"form-control dashbord-form",
                    "id"=>"",
                    "min"=>0,
                    "required"=>true,
                    "errorMsg"=>"Valeur incorrecte, veuillez saisir un nombre positif"
                ],
                "resume"=>[
                    "type"=>"text",
                    "placeholder"=>"Description courte du produit :",
                    "class"=>"form-control dashbord-form",
                    "id"=>"",
                    "required"=>false,
                    "min-length"=>3,
                    "max-length"=>255,
                    "errorMsg"=>"La description doit avoir 255 caractères maximum."
                ],/*
                "description"=>[
                    "type"=>"text",
                    "placeholder"=>"Description détaillé du produit :",
                    "class"=>"form-control dashbord-form",
                    "id"=>"",
                    "min-lenght"=>3,
                    "errorMsg"=>"Veuillez rééssayer, la description n'a pas pu être enregistrée"
                ],*/
                "idCategory"=>[
                    "type"=>"select",
                    "placeholder"=>"Sélectionnez la catégorie :",
                    "class"=>"form-control dashbord-form",
                    "required"=>false,
                    "elements"=>$categories,
                    "id"=>"",
                    "errorMsg"=>"Mauvaise catégorie sélectionnée"
                ],
                "productImage"=>[
                    "type"=>"file",
                    "placeholder"=>"Image du produit :",
                    "class"=>"form-control-file dashbord-form",
                    "id"=>"",
                    "accept"=>["image/jpeg","image/jpg","image/png"],
                    "required"=>true,
                    "errorMsg"=>"Le fichier ne correspond à une image de type jpeg ou png."
                ],
            ]
        ];
    }
}