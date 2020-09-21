<?php

namespace secretshop\managers;

use secretshop\core\Manager;
use secretshop\models\Mail;

class MailManager extends Manager
{
    public function __construct()
    {
        parent::__construct(Mail::class, 'mail');
    }
}