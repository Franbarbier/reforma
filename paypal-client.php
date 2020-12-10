<?php
namespace Sample;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient
{
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    public static function environment()
    {
        $clientId = "AcSOQzXrlRL_ERTh5svonn3GXR-HYzxEsdGqsjNczLmJUueoLS96o6byOgYsPEGWtc4MzMQ-KfPyXLv4";
        $clientSecret = "EKp4xCZmFzcVdoTqCgMCcC_amwSs4YnZEL8WzVy-s-ndKsr8sqeJvUclu-3yELJpanCIz0IZ-g_vtzYx";
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}

?>