<?php

require 'paypal/autoload.php';

define("URL_SITIO","http://localhost:8081/GDLWebcam/");

$apiContext = new \PayPal\Rest\ApiContext (
    new \PayPal\Auth\OAuthTokenCredential (
    'Aap3_vHpIrsyFDD0XghDAd0X8_dmirHsBMc1lA6PNra3Joif1Kn-ekfF_xJLf-fJvSSA_boD9o5djJpB', // ClienteID
    'EOlDCtl9IlqWHk0zGz2HoYlBYMSBXCyn_OjgPM3svcRrLAbRmqgJQfWTR8np1OxJjFR7FHMwCPAq3E9X' // Secret
    )
    );
    
    
    ?>
  