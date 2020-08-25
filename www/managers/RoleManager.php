<?php

namespace secretshop\managers;

use secretshop\core\Manager;
use secretshop\models\Role;

class RoleManager extends Manager
{
    public function __construct()
    {
        parent::__construct(Role::class, 'role');
    }
}