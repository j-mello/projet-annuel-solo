<?php

namespace secretshop\middleware;

use secretshop\core\Request;

class RoleMiddleWare
{
    public function onRequest(Request $request)
    {
        // Si je n'ai pas le role user alors redirection
    }

    public function onController()
    {

    }

    public function onView(Request $request)
    {
        
    }
}