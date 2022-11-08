<?php

global $wpdb;
$mode = $_GET['mode'];
switch($mode){
    case 'joust':
	    $all_player = get_top_spec_joust();
        echo "<h2>Top des joueurs francophone JOUST</h2><br class='clear'>";
        echo "<a href='?mode=home' ><button>Retour</button></a>";
        echo '<table id="example" class=" display compact" cellspacing="0" width="100%" style="text-align: center;">';
        ?>
        <thead>
        <tr>
			<th>Rang</th>
            <th>Nom</th>
            <th>ELO</th>
            <th>Division</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
			<th>Rang</th>
            <th>Nom</th>
            <th>ELO</th>
            <th>Division</th>
        </tr>
        </tfoot>
        <?php
		$cpt = 1;
        foreach($all_player as $k => $player) {
			if(!empty($player['real_name'])){
				echo "<tr>";
				echo "<td>";
				echo $cpt;
				echo "</td>";
				echo "<td>";
				echo $player['real_name'];
				echo "</td>";
				echo "<td>";
				echo round($player['elo_joust']);
				echo "</td>";
				echo "<td>";
				echo "<div style='display: none;'>" . $player['rank_joust'] . "</div>";
				switch ($player['rank_joust']) {
					case 0 :
						echo '<a href="#" class="tooltip" title="En classement"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/qualif.png"></a>';
						break;
					case 1 :
						echo '<a href="#" class="tooltip" title="Bronze 5"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_bronze.png"></a>';
						break;
					case 2 :
						echo '<a href="#" class="tooltip" title="Bronze 4"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_bronze.png"></a>';
						break;
					case 3 :
						echo '<a href="#" class="tooltip" title="Bronze 3"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_bronze.png"></a>';
						break;
					case 4 :
						echo '<a href="#" class="tooltip" title="Bronze 2"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_bronze.png"></a>';
						break;
					case 5 :
						echo '<a href="#" class="tooltip" title="Bronze 1"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_bronze.png"></a>';
						break;
					case 6 :
						echo '<a href="#" class="tooltip" title="Argent 5"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_silver.png"></a>';
						break;
					case 7 :
						echo '<a href="#" class="tooltip" title="Argent 4"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_silver.png"></a>';
						break;
					case 8 :
						echo '<a href="#" class="tooltip" title="Argent 3"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_silver.png"></a>';
						break;
					case 9 :
						echo '<a href="#" class="tooltip" title="Argent 2"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_silver.png"></a>';
						break;
					case 10 :
						echo '<a href="#" class="tooltip" title="Argent 1"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_silver.png"></a>';
						break;
					case 11 :
						echo '<a href="#" class="tooltip" title="Or 5"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_gold.png"></a>';
						break;
					case 12 :
						echo '<a href="#" class="tooltip" title="Or 4"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_gold.png"></a>';
						break;
					case 13 :
						echo '<a href="#" class="tooltip" title="Or 3"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_gold.png"></a>';
						break;
					case 14 :
						echo '<a href="#" class="tooltip" title="Or 2"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_gold.png"></a>';
						break;
					case 15 :
						echo '<a href="#" class="tooltip" title="Or 1"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_gold.png"></a>';
						break;
					case 16 :
						echo '<a href="#" class="tooltip" title="Platine 5"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_plati.png"></a>';
						break;
					case 17 :
						echo '<a href="#" class="tooltip" title="Platine 4"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_plati.png"></a>';
						break;
					case 18 :
						echo '<a href="#" class="tooltip" title="Platine 3"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_plati.png"></a>';
						break;
					case 19 :
						echo '<a href="#" class="tooltip" title="Platine 2"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_plati.png"></a>';
						break;
					case 20 :
						echo '<a href="#" class="tooltip" title="Platine 1"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_plati.png"></a>';
						break;
					case 21 :
						echo '<a href="#" class="tooltip" title="Diamant 5"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_diamond.png"></a>';
						break;
					case 22 :
						echo '<a href="#" class="tooltip" title="Diamant 4"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_diamond.png"></a>';
						break;
					case 23 :
						echo '<a href="#" class="tooltip" title="Diamant 3"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_diamond.png"></a>';
						break;
					case 24 :
						echo '<a href="#" class="tooltip" title="Diamant 2"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_diamond.png"></a>';
						break;
					case 25 :
						echo '<a href="#" class="tooltip" title="Diamant 1"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_diamond.png"></a>';
						break;
					case 26 :
						echo '<a href="#" class="tooltip" title="Maître"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/j_master.png"></a>';
						break;
				}
            echo "</td>";
            echo "</tr>";
			$cpt++;
			}
        }
        echo "</tbody>";
        echo "</table>";
        break;
    case 'conquest':
	    $all_player = get_top_spec_conquest();
        echo "<h2>Top des joueurs francophone CONQUEST</h2><br class='clear'>";
        echo "<a href='?mode=home' ><button>Retour</button></a>";
        echo '<table id="example" class=" display compact" cellspacing="0" width="100%" style="text-align: center;">';
        ?>
        <thead>
        <tr>
			<th>Rang</th>
            <th>Nom</th>
            <th>ELO</th>
            <th>Division</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
			<th>Rang</th>
            <th>Nom</th>
            <th>ELO</th>
            <th>Division</th>
        </tr>
        </tfoot>
        <?php
		$cpt = 1;
        foreach($all_player as $k => $player) {
			if(!empty($player['real_name'])){
            echo "<tr>";
			echo "<td>";
            echo $cpt;
            echo "</td>";
            echo "<td>";
            echo $player['real_name'];
            echo "</td>";
            echo "<td>";
            echo round($player['elo_conquest']);
            echo "</td>";
            echo "<td>";
            echo "<div style='display: none;'>" . $player['rank_conquest'] . "</div>";
            switch ($player['rank_conquest']) {
                case 0 :
                    echo '<a href="#" class="tooltip" title="En classement"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/qualif.png"></a>';
                    break;
                case 1 :
                    echo '<a href="#" class="tooltip" title="Bronze 5"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_bronze.png"></a>';
                    break;
                case 2 :
                    echo '<a href="#" class="tooltip" title="Bronze 4"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_bronze.png"></a>';
                    break;
                case 3 :
                    echo '<a href="#" class="tooltip" title="Bronze 3"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_bronze.png"></a>';
                    break;
                case 4 :
                    echo '<a href="#" class="tooltip" title="Bronze 2"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_bronze.png"></a>';
                    break;
                case 5 :
                    echo '<a href="#" class="tooltip" title="Bronze 1"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_bronze.png"></a>';
                    break;
                case 6 :
                    echo '<a href="#" class="tooltip" title="Argent 5"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_silver.png"></a>';
                    break;
                case 7 :
                    echo '<a href="#" class="tooltip" title="Argent 4"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_silver.png"></a>';
                    break;
                case 8 :
                    echo '<a href="#" class="tooltip" title="Argent 3"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_silver.png"></a>';
                    break;
                case 9 :
                    echo '<a href="#" class="tooltip" title="Argent 2"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_silver.png"></a>';
                    break;
                case 10 :
                    echo '<a href="#" class="tooltip" title="Argent 1"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_silver.png"></a>';
                    break;
                case 11 :
                    echo '<a href="#" class="tooltip" title="Or 5"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_gold.png"></a>';
                    break;
                case 12 :
                    echo '<a href="#" class="tooltip" title="Or 4"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_gold.png"></a>';
                    break;
                case 13 :
                    echo '<a href="#" class="tooltip" title="Or 3"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_gold.png"></a>';
                    break;
                case 14 :
                    echo '<a href="#" class="tooltip" title="Or 2"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_gold.png"></a>';
                    break;
                case 15 :
                    echo '<a href="#" class="tooltip" title="Or 1"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_gold.png"></a>';
                    break;
                case 16 :
                    echo '<a href="#" class="tooltip" title="Platine 5"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_plati.png"></a>';
                    break;
                case 17 :
                    echo '<a href="#" class="tooltip" title="Platine 4"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_plati.png"></a>';
                    break;
                case 18 :
                    echo '<a href="#" class="tooltip" title="Platine 3"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_plati.png"></a>';
                    break;
                case 19 :
                    echo '<a href="#" class="tooltip" title="Platine 2"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_plati.png"></a>';
                    break;
                case 20 :
                    echo '<a href="#" class="tooltip" title="Platine 1"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_plati.png"></a>';
                    break;
                case 21 :
                    echo '<a href="#" class="tooltip" title="Diamant 5"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_diamond.png"></a>';
                    break;
                case 22 :
                    echo '<a href="#" class="tooltip" title="Diamant 4"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_diamond.png"></a>';
                    break;
                case 23 :
                    echo '<a href="#" class="tooltip" title="Diamant 3"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_diamond.png"></a>';
                    break;
                case 24 :
                    echo '<a href="#" class="tooltip" title="Diamant 2"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_diamond.png"></a>';
                    break;
                case 25 :
                    echo '<a href="#" class="tooltip" title="Diamant 1"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_diamond.png"></a>';
                    break;
                case 26 :
                    echo '<a href="#" class="tooltip" title="Maître"><img src="' . SMFR_TOPLAYER_URL . '/front/img/rank/c_master.png"></a>';
                    break;
            }
            echo "</td>";
            echo "</tr>";
			$cpt++;
			}
        }
        echo "</tbody>";
        echo "</table>";

        break;
    case 'add':
        echo "<h2>Se rajouter au top des joueurs francophone</h2><br class='clear'>";
        $valid = 0;
        if(!empty($_POST)){
            if(!empty($_POST['pseudo'])){
                // insert IN DB
                $is_here = get_top_spec_name($_POST['pseudo']);
                if(empty($is_here)){
                    add_top_spec('name',$_POST['pseudo']);
                    $valid = 1;
                    echo "Vous étes maintenant enregistré !<br> Un admin acceptera votre demande de classement !<br><a href='?mode=home' ><button>Retour</button></a>";
                }
                else{
                    echo "Pseudo deja enregistré !<br>";
                }
            }else{
                echo "il faut remplir le champs pseudo :'(<br>";
                $valid = 0;
            }
        }
        if($valid == 0){
            echo "<a href='?mode=home' ><button>Retour</button></a>";
            echo "<form action='' method='post'>";
            echo "<table>";
            echo "<tr>";
            echo "<td>";
            echo "<label for='pseudo'>Votre pseudo IG : </label>";
            echo "</td>";
            echo "<td>";
            echo "<input type='text' name='pseudo' id='pseudo' ";
            if(isset($_POST['pseudo'])){
                echo "value='".$_POST['pseudo']."'";
            }
            echo ">";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td colspan='2'>";
            echo "<input type='submit' value='Envoyer'>";
            echo "</td>";
            echo "</tr>";
            echo "</table>";
            echo "</form>";
        }
        break;
    default:
        echo "<br class='clear'>";
        if(isset($erreur)&& !empty($erreur)){
            echo $erreur;
        }
		
		
        echo "<table width='100%'>";
        echo "<tr>";
        echo "<th>";
        echo "<h3>Top player Conquest</h3>";
        echo "<a href='?mode=conquest' ><button>Classement de conquest</button></a>";
        echo "</th>";
        echo "<th>";
        echo "<h3>Top player Joust</h3>";
        echo "<a href='?mode=joust' ><button>Classement de joust</button></a>";
        echo "</th>";
        echo "</tr>";
        echo "</table>";
		echo "<table width='100%'>";
        echo "<tr>";
        echo "<th>";
        echo "<h3>Je suis pas encore inscrit :O</h3>";
        echo "<a href='?mode=add' ><button>S'inscrire</button></a>";
        echo "</th>";
        echo "</tr>";
        echo "</table>";
		
        break;
}


