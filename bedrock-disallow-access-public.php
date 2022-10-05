<?php
/*
Plugin Name:  Disallow access public
Plugin URI:   https://github.com/david-bzh/bedrock-disallow-access-public
Description:  This plugin will prevent access to the site for non-logged in users when `WP_ENV` is set to `staging`.
Version:      1.0.0
Author:       David
Text Domain:  plugin-disallow-access-public
*/

add_action(
	'template_redirect',
	function () {

		if ( 'staging' === getenv( 'WP_ENV' ) && $_REQUEST['q'] !== 'wp-login.php' && ! is_user_logged_in() ) {

			wp_safe_redirect( site_url() . '/wp-login.php?redirect_to=' . home_url( $_SERVER['REQUEST_URI'] ) );
		}
	}
);
