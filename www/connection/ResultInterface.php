<?php

namespace secretshop\connection;

interface ResultInterface 
{
    public function getArrayResult();
    public function getOneOrNullResult();
    public function getValueResult();
}