<?php

//Stores settings groups, options and defaults for the plugin
class UTHSC_WPCAS_Options {

    function uthsc_wpcas_settings() {

        $settings = array(
                'uthsc-wpcas-configuration' => array (
                    'uthsc_wpcas_host'          => get_option('uthsc_wpcas_host') ? get_option('uthsc_wpcas_host') : 'auth.uthsc.edu',
                    'uthsc_wpcas_user_email'    => get_option('uthsc_wpcas_user_email') ? get_option('uthsc_wpcas_user_email') : 'email',
                    'uthsc_wpcas_first_name'    => get_option('uthsc_wpcas_first_name') ? get_option('uthsc_wpcas_first_name') : 'firstname',
                    'uthsc_wpcas_last_name'     => get_option('uthsc_wpcas_last_name') ? get_option('uthsc_wpcas_last_name') : 'lastname',
                    'uthsc_wpcas_context'       => get_option('uthsc_wpcas_context') ? get_option('uthsc_wpcas_context') : '',
                    'uthsc_wpcas_cert_path'     => get_option('uthsc_wpcas_cert_path') ? get_option('uthsc_wpcas_cert_path') : str_replace( 'admin/','',plugin_dir_path( __FILE__) )  . 'caskey/cacerts_auth.pem',
                    'uthsc_wpcas_port'          => get_option('uthsc_wpcas_port') ? get_option('uthsc_wpcas_port') : '443',
                    // redis connect
                    'uthsc_wpcas_redis_scheme'  => get_option('uthsc_wpcas_redis_scheme') ? get_option('uthsc_wpcas_redis_scheme') : 'tcp',
                    'uthsc_wpcas_redis_host'    => get_option('uthsc_wpcas_redis_host') ? get_option('uthsc_wpcas_redis_host') : '127.0.0.1',
                    'uthsc_wpcas_redis_port'    => get_option('uthsc_wpcas_redis_port') ? get_option('uthsc_wpcas_redis_port') : '6379',
                    // debug log
                    'uthsc_wpcas_debug_log'    => get_option('uthsc_wpcas_debug_log') ? get_option('uthsc_wpcas_debug_log') : '/var/www/html/cas_log.log',
                ),
                'uthsc-wpcas-plugin-options' => array (
                    'uthsc_wpcas_update_acct'           => get_option('uthsc_wpcas_update_acct') ? get_option('uthsc_wpcas_update_acct') : 'off',
                    'uthsc_wpcas_lockdown'              => get_option('uthsc_wpcas_lockdown') ? get_option('uthsc_wpcas_lockdown') : 'off',
                    'uthsc_wpcas_restrict_new_users'    => get_option('uthsc_wpcas_restrict_new_users') ? get_option('uthsc_wpcas_restrict_new_users') : 'off',
                    'uthsc_wpcas_redis'                 => get_option('uthsc_wpcas_redis') ? get_option('uthsc_wpcas_redis') : 'off',
                    'uthsc_wpcas_debug'                 => get_option('uthsc_wpcas_debug') ? get_option('uthsc_wpcas_debug') : 'off',
                )
            );

        return $settings;

    }

}