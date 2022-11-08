<?php

function get_top_spec_joust(){
	global $wpdb;
	$sql = "SELECT `id`, `name`, `real_name`, `elo_joust`, `rank_joust`, `valid` FROM `".SMFR_TOPLAYER_DB_PREFIX."player` WHERE `valid` = 1 ORDER BY rank_joust DESC , elo_joust DESC ";
	$a_results = $wpdb->get_results($sql, ARRAY_A);
//	echo $wpdb->last_query;
	return $a_results;
}
function get_top_spec_conquest(){
	global $wpdb;
	$sql = "SELECT `id`, `name`, `real_name`, `elo_conquest`, `rank_conquest`, `valid` FROM `".SMFR_TOPLAYER_DB_PREFIX."player` WHERE `valid` = 1 ORDER BY rank_conquest DESC , elo_conquest DESC ";
	$a_results = $wpdb->get_results($sql, ARRAY_A);
//	echo $wpdb->last_query;
	return $a_results;
}

function get_top_spec($name , $limit = null) {
	global $wpdb;
	$sql = "";
	$a_results = array() ;
	if(is_array($name)){
		$sql = "SELECT ";
		foreach($name as $key => $value){
			$sql .= " ".$value." ,";
		}
		$sql = substr($sql,0,-1);
		$sql .= " FROM ".SMFR_TOPLAYER_DB_PREFIX.'player ';
	}else {
		$sql = "SELECT ".$name." FROM ".SMFR_TOPLAYER_DB_PREFIX.'player ';
	}
	$sql .= "WHERE valid = 1 ;";

//	pr($sql);

	$a_results = $wpdb->get_results($sql, ARRAY_A);
	return $a_results;
}

function get_top_spec_name($name){
    global $wpdb;
    $sql = "";
    $a_results = array() ;
    $sql = "SELECT * FROM ".SMFR_TOPLAYER_DB_PREFIX."player  WHERE name = '".$name."'; ";

	//pr($sql);

    $a_results = $wpdb->get_results($sql, ARRAY_A);
    return $a_results;
}

function set_top_spec($id , $name , $value) {
	global $wpdb;
	$bool = false;
	$array = array();
	if($id != 0) {
		if (is_array($name) && is_array($value)) {
			// build temp array !
			for ($i = 0; $i < count($name); $i++) {
				$array[$name[$i]] = $value[$i];
			}
		} else {
			$array = array(
				$name => $value,
			);
		}
		$bool = $wpdb->update(
            SMFR_TOPLAYER_DB_PREFIX.'player',
			$array,
			array('id' => $id)
		);
	}
	return $bool;
}

function add_top_spec($name , $value){
	global $wpdb;
	if (is_array($name) && is_array($value)) {
		// build temp array !
		for ($i = 0; $i < count($name); $i++) {
			$array[$name[$i]] = $value[$i];
		}
	} else {
		$array = array(
			$name => $value,
		);
	}
	$wpdb->insert(
        SMFR_TOPLAYER_DB_PREFIX.'player',
		$array,
		array()
	);
	return $wpdb->insert_id;
}