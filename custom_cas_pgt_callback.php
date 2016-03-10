<?php

// CureForward custom CB handler for CAS Tickets
// 

// Load the CAS lib
require_once 'wp-content/plugins/uthsc-wpcas-cf/phpCAS-1.3-stable/CAS.php';

// Uncomment to enable debugging
// phpCAS::setDebug('/var/www/html/cas_log.log');

if (strstr($_SERVER['HTTP_HOST'], '-dev')) {
    // ************************************************* //
    // ********************** DEV ********************** //
    // ************************************************* //
    define('CF_CAS_HOST', 'cas-dev.xxxx.com');
    define('CF_REDIS_HOST', 'redis-dev.xxxx.com');
} elseif (strstr($_SERVER['HTTP_HOST'], '-stage')) {
    // ************************************************* //
    // ********************* STAGE ********************* //
    // ************************************************* //
    define('CF_CAS_HOST', 'cas-stage.xxxx.com');
    define('CF_REDIS_HOST', 'redis-stage.xxxx.com');
} else {
    // ************************************************* //
    // ********************* MASTER ******************** //
    // ************************************************* //
    define('CF_CAS_HOST', 'cas.xxxx.com');
    define('CF_REDIS_HOST', 'redis.xxxx.com');
}

// Initialize phpCAS
phpCAS::proxy(CAS_VERSION_2_0, CF_CAS_HOST, 443, '');
// For production use set the CA certificate that is the issuer of the cert
// on the CAS server and uncomment the line below
//  phpCAS::setCasServerCACert(get_option('uthsc_wpcas_cert_path'));

// For quick testing you can disable SSL validation of the CAS server.
// THIS SETTING IS NOT RECOMMENDED FOR PRODUCTION.
// VALIDATING THE CAS SERVER IS CRUCIAL TO THE SECURITY OF THE CAS PROTOCOL!
phpCAS::setNoCasServerValidation();

// Handle SAML logout requests that emanate from the CAS host exclusively.
// Failure to restrict SAML logout requests to authorized hosts could
// allow denial of service attacks where at the least the server is
// tied up parsing bogus XML messages.
phpCAS::handleLogoutRequests(false);

phpCAS::setNoClearTicketsFromUrl();

phpCAS::setFixedCallbackURL('https://' . $_SERVER['SERVER_NAME'] . '/custom_cas_pgt_callback.php');

phpCAS::setPGTStorageRedis('tcp', CF_REDIS_HOST, 6379);

phpCAS::checkAuthentication();

?>