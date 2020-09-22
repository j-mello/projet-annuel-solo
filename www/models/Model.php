<?php

namespace secretshop\models;

class Model
{
    public function __toArray():array
    {
        $property = get_object_vars($this);
        return $property;
    }

    public function hydrate(array $data)
    {
        //print_r($data);
        $className = get_class($this);
        //echo '<br>'.$className.'<br>';
        $articleObj = new $className;
        //print_r($articleObj);
        //print_r($data);

        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            //echo '<br>'.$method;
            if (method_exists($articleObj, $method))
            {
                $articleObj->$method($value);
            }
        }
        return $articleObj;
    }
}