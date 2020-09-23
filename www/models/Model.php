<?php

namespace secretshop\models;

class Model
{
    public function __toArray():array
    {
        $property = get_object_vars($this);
        return $property;
    }

    public function hydrate($data, $files = [])
    {
        //echo "hydrate =>";
        //echo "<pre>";
        /*print_r($data);
        echo "</pre>";
        echo "<pre>";
        print_r($files);
        echo "</pre>";*/
        $className = get_class($this);
        //echo '<br>'.$className.'<br>';
        $articleObj = new $className;
        /*echo '<pre>';
        print_r($articleObj);
        echo '<br>';
        print_r($data);
        echo '</pre>';*/
        //die("HYDRATE");

        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            //echo '<br>'.$method.'<br>';
            if (method_exists($articleObj, $method))
            {
                $articleObj->$method($value);
            }
        }
        //die('test methode');
        foreach($files as $key => $config) {
            $path = "uploads/";
            $name = $_FILES[$key]["name"];
            $ext = ".".explode(".",$name)[count(explode(".",$name))-1];
            $fileName = explode(".",$name)[0];
            $nb = "";
            while (file_exists($path.$fileName.$nb.$ext)) {
                if ($nb == "") {
                    $nb = 2;
                } else {
                    $nb += 1;
                }
            }
            if (!move_uploaded_file($_FILES[$key]["tmp_name"], $path.$fileName.$nb.$ext)) {
                die ("Echec de l'upload");
            }
            $method = 'set'.ucfirst($key);
            //echo '<br>'.$method;
            if (method_exists($articleObj, $method))
            {
                $articleObj->$method("/".$path.$fileName.$nb.$ext);
            }
        }
        return $articleObj;
    }
}