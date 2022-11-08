<?php
add_action('admin_menu', 'smfr_toplayer_admin_menu');
add_action('admin_print_scripts', 'smfr_toplayer_admin_scripts');
add_action('admin_print_styles', 'smfr_toplayer_admin_styles');

function smfr_toplayer_admin_menu() {
    add_menu_page('Top player' , 'Top player', 'smfr_toplayer', 'smfr_toplayer', 'smfr_toplayer_admin_page');
}

function smfr_toplayer_admin_scripts() {
    if (isset($_GET['page']) && $_GET['page'] == 'smfr_toplayer')
    {

        wp_register_script(
	        SMFR_TOPLAYER_DB_PREFIX.'datatable',
	        SMFR_TOPLAYER_URL.'admin/js/jquery.datatables.js'
        );

        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script(SMFR_TOPLAYER_DB_PREFIX.'datatable');

    }
}

function smfr_toplayer_admin_styles() {
    if (isset($_GET['page']) && $_GET['page'] == 'smfr_toplayer')
    {
        wp_register_style(
	        SMFR_TOPLAYER_DB_PREFIX.'style',
	        SMFR_TOPLAYER_URL.'admin/css/style.css'
        );

        wp_register_style(
	        SMFR_TOPLAYER_DB_PREFIX.'datatable',
	        SMFR_TOPLAYER_URL.'admin/css/jquery.datatables.css'
        );

        wp_register_style(
	        SMFR_TOPLAYER_DB_PREFIX.'datatable-theme',
	        SMFR_TOPLAYER_URL.'admin/css/jquery.datatables_themeroller.css'
        );

        wp_enqueue_style(SMFR_TOPLAYER_DB_PREFIX.'style');
        wp_enqueue_style(SMFR_TOPLAYER_DB_PREFIX.'datatable');
        wp_enqueue_style(SMFR_TOPLAYER_DB_PREFIX.'datatable-theme');
    }
}

function smfr_toplayer_admin_page() {
    /* INCLUDE ALL FUNCTIONS WE NEED ! */
    include('fnc/fnc_debug.php');
    include('fnc/fnc_toplayer.php');
    /* FIN */
    echo '<div class="wrap">';
    echo '<h1>Gestion du top player</h1>';
    if(!isset($_GET['a']) || $_GET['a'] == ''){
        $_GET['a'] = 'aa';
    }
    switch($_GET['a']){
        case 'add' :
            //include 'page/smfr_toplayer_update.php';
            break;
        default:
            include 'page/datatable_script.php';
            include 'page/smfr_toplayer.php';
            break;
    }
    echo "<hr>";
    echo "Pour Smite France de la part de Tilican &copy;";
    echo "</div>";
}

/* AJAX  */
add_action( 'wp_ajax_smfr_toplayer_status', 'smfr_toplayer_status_callback' );

function smfr_toplayer_status_callback() {
    global $wpdb; // this is how you get access to the database
    include('fnc/fnc_player.php');
	if(is_array($_POST['id'])){
		foreach($_POST['id'] as $key => $data){
			status_player_spec($data,$_POST['status']);
		}

	}else{
		status_player_spec($_POST['id'],$_POST['status']);
	}

    wp_die(); // this is required to terminate immediately and return a proper response
}
