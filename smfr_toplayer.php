<?php

/*
Plugin Name: SMITE FRANCE top player
Plugin URI:
Description:
Version: 0.1
Author: Tilican
Author Email:
License:

Copyright 2015 Tilican

*/

define( 'SMFR_TOPLAYER_URL', plugin_dir_url ( __FILE__ ) );
define( 'SMFR_TOPLAYER_URI', plugin_dir_path( __FILE__ ) );
define( 'SMFR_TOPLAYER_VERSION', '0.1a' );
define( 'SMFR_TOPLAYER_NAME', 'Smite France item view' );
define( 'SMFR_TOPLAYER_DB_PREFIX' , "smfr_toplayer_");

function smfr_toplayer_load(){

	$role = get_role('administrator');
	$role->add_cap('smfr_toplayer');

	if(is_admin()){
		//add back script !
		include_once(SMFR_TOPLAYER_URI.'admin/smfr_toplayer_admin.php');
	}else{
		//add front script !
		include_once(SMFR_TOPLAYER_URI.'front/smfr_toplayer_front.php');
	}



    // include functions activation / deactivation
    include_once(SMFR_TOPLAYER_URI.'install/activation.php');
    include_once(SMFR_TOPLAYER_URI.'install/deactivation.php');
}

smfr_toplayer_load();

// CREATE HOOK !
register_activation_hook(__FILE__, 'smfr_toplayer_activation');
register_deactivation_hook(__FILE__, 'smfr_toplayer_deactivation');