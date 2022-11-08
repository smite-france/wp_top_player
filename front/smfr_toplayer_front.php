<?php

//smfr_god_shortcode
add_shortcode('smfr_toplayer','smfr_toplayer_shortcode');


function smfr_toplayer_front_scripts() {
/*
    wp_register_script(
        SMFR_TOPLAYER_DB_PREFIX.'datatable_js',
        SMFR_TOPLAYER_URL.'front/js/jquery.dataTables.min.js'
    );

    wp_enqueue_script('jquery');
    wp_enqueue_script(SMFR_TOPLAYER_DB_PREFIX.'datatable_js');
*/
    wp_enqueue_script( 'datatable', '//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js', array('jquery'), " " , false);
}

function smfr_toplayer_front_styles() {
    wp_register_style(
        SMFR_TOPLAYER_DB_PREFIX.'style',
        SMFR_TOPLAYER_URL.'front/css/style.css'
    );

    wp_register_style(
        SMFR_TOPLAYER_DB_PREFIX.'datatable_css',
        SMFR_TOPLAYER_URL.'front/css/jquery.dataTables.css'
    );

    wp_enqueue_style(SMFR_TOPLAYER_DB_PREFIX.'style');
    wp_enqueue_style(SMFR_TOPLAYER_DB_PREFIX.'datatable_css');
}


function smfr_toplayer_shortcode(){
    smfr_toplayer_front_styles();
    smfr_toplayer_front_scripts();
    /* INCLUDE ALL FUNCTIONS WE NEED ! */
    include('fnc/fnc_debug.php');
    include('fnc/fnc_toplayer.php');
    /* FIN */
    include 'page/datatable_script.php';
    echo "<div class='smfr_toplayer'>";
    include 'page/smfr_toplayer_front_list.php';
    echo "</div>";

}