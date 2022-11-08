<?php

function get_toplayer_spec($id , $name) {
	global $wpdb;
	$sql = "";
	$a_results = array() ;
	if(is_array($name)){
		$sql = "SELECT ";
		foreach($name as $key => $value){
			$sql .= " ".$value." ,";
		}
		$sql = substr($sql,0,-1);
		$sql .= " FROM ".SMFR_TOPLAYER_DB_PREFIX."player ";
	}else {
		$sql = "SELECT ".$name." FROM ".SMFR_TOPLAYER_DB_PREFIX."player ";
	}
	if($id != 0 ){
		$sql .= "WHERE id = ".$id;
	}

//    pr($sql);

	$a_results = $wpdb->get_results($sql, ARRAY_A);
	return $a_results;
}

function add_toplayer_spec($name , $value){
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
	$array['created_at'] = current_time('mysql', false);
	$wpdb->insert(
		SMFR_TOURNAMENT_DB_PREFIX.'player',
		$array,
		array()
	);
	return $wpdb->insert_id;
}

function status_toplayer_spec($id,$status){
	global $wpdb;
	$bool = false;
	if($id > 0){
		$bool = $wpdb->update(
			SMFR_TOURNAMENT_DB_PREFIX.'player',
			array('status' => $status),
			array('id' => $id)
		);
	}
	return $bool;
}