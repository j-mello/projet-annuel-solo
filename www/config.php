<?php

require_once('./vendor/autoload.php');

$stripe = [
"secret_key" => 'sk_test_51H1Z9XA4txFW05KB8be30rFW09MFZzi0rgt0Hzcw54GapPnqSvCayCLnvuDdYGkq8r8fh6H9mkwudyMOE5HEbaOk00dpPHUd2F',
"public_key" => 'pk_test_51H1Z9XA4txFW05KBDkgEF4GHU7CVAovpIFXeGSex5F97uDlLtDxkhc7SSdxNJ6Au6jvxpS9vfpRp38NG4Kpb5Ldh00URrLJGQx'
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);