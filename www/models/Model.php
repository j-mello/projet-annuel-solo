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
        $className = get_class($this);
        $articleObj = new $className;

        foreach ($data as $key => $value)
        {
            $method = 'set'.$key;
            $method = 'set'.ucfirst($key);
            if (method_exists($articleObj, $method))
            {
                $articleObj->$method($value);
            }
        }
        return $articleObj;
    }
}