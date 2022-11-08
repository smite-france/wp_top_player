<?php
$a_we_need = array(
    0 => 'id',
    1 => 'name',
    2 => 'valid',
);
$a_we_need_lang = array(
	'group_action' => '<input type="checkbox" id="checkall" name="checkall">',
    'real_name' => 'Nom',
    'validé' => 'Activé',
    'delete' => '',
);

?>

<script type="text/javascript">

        function modify_status(p_id, p_status) {
            jQuery.post(
                ajaxurl,
                {
                    'action': 'smfr_toplayer_status',
                    'id': p_id,
                    'status': p_status
                },
                function (response) {
                    location.reload();
                }
            );
        }

        jQuery(document).ready(function() {
            jQuery('input:checkbox').each(function () { //loop through each checkbox
                if(jQuery(this).is(':checked') == true){
                    jQuery(this).attr('checked', false);
                }
            });
            jQuery('#checkall').on("click", function () {
                if (jQuery(this).is(':checked')) { // check select status
                    jQuery('.checkbox_action').each(function () { //loop through each checkbox
                        this.checked = true;  //select all checkboxes with class "checkbox1"
                    });
                } else {
                    jQuery('.checkbox_action').each(function () { //loop through each checkbox
                        this.checked = false; //deselect all checkboxes with class "checkbox1"
                    });
                }
            });
	        jQuery('#btn_action').on('click', function (){
		        var taleaux_id = [];
		        $action = jQuery("#select_valid_btn").find(":selected").attr('value');
		        jQuery('.checkbox_action').each(function () { //loop through each checkbox
			        if(jQuery(this).is(':checked')){
				        taleaux_id.push(jQuery(this).attr('id'));
			        }
		        });
		        if(taleaux_id.length != 0 && $action != 0){
					console.log($action);
			        switch ($action){
				        case 'activate':
					        if(confirm("Voulez vous vraiment activer ?")){
						        modify_status(taleaux_id, 1);
					        }
					        break;
				        case 'desactivate':
					        if(confirm("Voulez vous vraiment desactiver ?")) {
						        modify_status(taleaux_id, 0);
					        }
					        break;
				        case 'delete':
					        if(confirm("Voulez vous vraiment supprimer ?")) {
						        modify_status(taleaux_id, -1);
					        }
					        break;
			        }
		        }

	        });
        });
</script>

<?php
echo "<p><a href='?page=".$_GET['page']."&a=add'>";
echo '<button class="button button-primary">Ajouter un joueur</button>';
echo "</a></p>";
$all_tournament = get_toplayer_spec(0,$a_we_need);
// netoyage !!
foreach($all_tournament as $k155 => $data55){
    foreach($data55 as $k155dd => $dadadada) {
        $all_tournament[$k155][$k155dd] = htmlspecialchars_decode(stripslashes($dadadada));
    }
}

//pr($all_tournament);

echo "<table id='table_tournament' class='widefat'>";
echo "<thead>";
echo "<tr>";
foreach($a_we_need_lang as $key => $value){
	if($key != 'group_action'){
		echo "<th>".$value."</th>";
	}else{
		echo "<td>".$value."</td>";
	}

}
echo "</tr>";
echo "</thead>";
echo "<tbody>";

foreach($all_tournament as $key => $a_data_tournament){
    // recuperation du nombre de gens qui inscript en attente !
    echo "<tr>";
	echo "<td><input type='checkbox' class='checkbox_action' id='".$a_data_tournament['id']."' name='check-".$a_data_tournament['id']."'></td>";
    echo "<td>".$a_data_tournament['name']."</td>";
    echo "<td>";
	switch ($a_data_tournament['valid']){
		case 0:
			echo "<a class='button' href='#' onclick='modify_status(".$a_data_tournament['id'].",1);'><span class='smfr_god_icon16  smfr_god_deactivate smfr_god_icon_center'></span></a><span style='display:none;' >0</span>";
			break;
		case 1:
			echo "<a class='button' href='#' onclick='modify_status(".$a_data_tournament['id'].",0);'><span class='smfr_god_icon16  smfr_god_activate smfr_god_icon_center'></span></a><span style='display:none;' >1</span>";
			break;
		case -1:
			echo "SUPPRIMER A LA PROCHAINE UPDATE ( une toute les 4 heures :) ) ";
			break;

	}
    echo "</td>";
    echo "<td><a class='button' href='#' onclick='modify_status(".$a_data_tournament['id'].",-1);'><span class='smfr_god_icon16 smfr_god_delete smfr_god_icon_center'></span></a></td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo 'Action : ';
echo "<select id='select_valid_btn' name='action'>";
echo "<option value='0'>Action ...</option>";
echo "<option value='activate'>Activer</option>";
echo "<option value='desactivate'>Desactiver</option>";
echo "<option value='delete'>Supprimer</option>";
echo "</select>";
echo "<input type='button' id='btn_action' class='button button-primary' value='Ok'>";