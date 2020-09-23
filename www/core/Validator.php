<?php

namespace secretshop\core;
use function Sodium\compare;

class Validator
{
    public function checkForm($configForm, $data)
    {
        $errosMsg = [];

        if (count($configForm["fields"]) == count($data)) {
            foreach ($configForm["fields"] as $key => $config) {
                $this->$key = $data[$key];
                //Vérifie que l'on a bien les champs attendus
                //Vérifier les required
                if (!array_key_exists($key, $data) || ($config["required"] && empty($data[$key]))) {
                    return ["Tentative de hack !!!"];
                }
                if ($config["type"] == "select") {
                    $found = false;
                    foreach($config["elements"] as $element) {
                        if ($element["id"] == $data[$key]) {
                            $found = true;
                            break;
                        }
                    }
                    if (!$found) {
                        $errosMsg[$key] = $config["errorMsg"];
                    }
                } else {
                    $method = 'check' . ucfirst($key);
                    //echo "method => ".$method."<br/>";
                    if (method_exists(get_called_class(), $method)) {
                        if (!$this->$method($data[$key], $config)) {
                            echo "return false<br/>";
                            $errosMsg[$key] = $config["errorMsg"];
                            print_r($errosMsg);
                        }
                    }
                }
            }
        }
        return $errosMsg;
    }

    private function checkFirstname($firstname)
    {
        if (!preg_match("#^[\p{Latin}' -]+$#u", $firstname) || strlen($firstname) > 50)
            return false;
        return true;
    }

    private function checkName($name)
    {
        if (!preg_match("#^[\p{Latin}' -]+$#u", $name) || strlen($name) > 100)
            return false;
        return true;
    }

    private function checkEmail($email, $config)
    {
        if(array_key_exists("uniq",$config))
            if(!$this->uniq($email,$config["uniq"]))
                return false;

        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private function checkPassword($password)
    {
        return preg_match('#(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{4,50}$#', $password);
    }

    private function checkPasswordConfirm($passwordConfirm)
    {
        return $this->password == $passwordConfirm;
    }

    private function checkCaptcha($captcha)
    {
        return strtolower($captcha) == $_SESSION["captcha"];
    }

    private function checkBirthdate($birthdate)
    {
        $birthdate = new \DateTime($birthdate);
        $date = new \DateTime("now");
        $date->modify('-18 years');
        return $date >= $birthdate;
    }

    private function checkFormerPrice($formerPrice)
    {
        return (is_numeric($formerPrice));
    }

    private function checkPrice($price)
    {
        return (is_numeric($price));
    }

    private function checkCategory($category)
    {
        return preg_match('#^[A-Z][a-zA-Z\s]{3,30}#',$category);
    }

    private function checkProductImage($productImage)
    {
        $imageFileType = strtolower(pathinfo($productImage,PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
            return false;
        else return true;
    }

    private function uniq($data,$table)
    {
        $requete = new QueryBuilder(User::class, $table["table"]);
        $requete->querySelect($table["column"]);
        $requete->queryWhere($table["column"], "=", $data);
        $result = $requete->queryGget();
        if($result == $data)
            return false;
        return true;
    }

}