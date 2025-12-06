<?php
define('APP_NAME', 'Arofic Bathware');
define('APP_URL', 'https://' . ($_SERVER['HTTP_HOST'] ?? 'localhost'));
define('APP_ROOT', dirname(__DIR__));
define('PUBLIC_PATH', APP_ROOT . '/public');
define('UPLOAD_PATH', PUBLIC_PATH . '/assets/uploads');

define('SITE_EMAIL', 'info@arofic.com');
define('SITE_PHONE', '+91 99961 00970');
define('SITE_ADDRESS', 'Near Jio-BP Petrol Pump, Dabwali Road, Sirsa-125055, Haryana, India');
define('FACEBOOK_URL', 'https://www.facebook.com/people/Arofic-Bathware/100063761630116/');
define('INSTAGRAM_URL', 'https://www.instagram.com/aroficbathware/');

define('ITEMS_PER_PAGE', 12);
define('ADMIN_EMAIL', 'admin@arofic.com');

date_default_timezone_set('Asia/Kolkata');
