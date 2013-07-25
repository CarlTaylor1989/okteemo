<div class="bg">
	<div class="container">
		<div class="row">
			<div class="span12">
				<h1><?php echo $summoner_name; ?></h1>
				<h4><?php echo $summoner_platform; ?> - Level <?php echo $summoner_level; ?> - <?php echo $ranked_solo_league['tier'].' '.$ranked_solo_league['requestorsRank'].' '.$ranked_solo_league['name']; ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<div class="span4">
					<ul class="nav nav-pills nav-stacked nav-profile">
						<li><a href="">Profile</a></li>
						<li><a href="">League</a></li>
						<li><a href="">Ranked Stats</a></li>
						<li><a href="">Matches</a></li>
					</ul>
				</div>
				<div class="span8 well">
					<h2>League Standing</h2>
					<table>
					<?php foreach ($ranked_solo_league['entries']['array'] as $solo_league_key => $solo_league_value) {
						$league_points = $solo_league_value['leaguePoints'];
						$player = $solo_league_value['playerOrTeamName'];
						$data_by_points[$player] = $solo_league_value;
						$test[$player] = $data_by_points[$player][$league_points];
						krsort($test);
					} exit; ?>
						<?php
						//foreach ($data_by_points[$player][$league_points] as $l_key => $l_value) { ?>
							<?php //if($l_value['rank'] == $ranked_solo_league['requestorsRank']) { ?>
							<tr>
								<td><?php //echo $l_value['playerOrTeamName']; ?></td>
								<td><?php //echo $l_value['leaguePoints']; ?></td>
							</tr>
							<?php //} ?>
					<?php //} ?>
					</table>
					<h2>Last Game Played</h2>
					<?php foreach($temp as $date => $value) { ?>
						<div class="game-match">
							<img src="<?php echo base_url(); ?>assets/img/lol_assets/icons/<?php echo $statistics[$date]['championId'] ?>.jpg" class="pull-left" />
							<div class="pull-left game-match-info">
								<h4><?php date_default_timezone_set("GMT"); echo date("F j, Y, g:i a", $date); ?> <?php if($statistics[$date]['ranked'] == 1) echo '- Ranked Match'; else if($statistics[$date]['gameMode'] == 'ARAM') echo ' - ARAM'; ?> <?php if(isset($value['LOSE'])) echo 'LOST'; else echo 'WON'; ?></h4>
								<p>K/D/A: <strong><?php if(isset($value['CHAMPIONS_KILLED'])) echo $value['CHAMPIONS_KILLED']; else echo '0'; ?></strong>/<strong><?php if(isset($value['NUM_DEATHS'])) echo $value['NUM_DEATHS']; else echo '0'; ?></strong>/<strong><?php if(isset($value['ASSISTS'])) echo $value['ASSISTS']; else echo '0'; ?></strong></p>
								<p>Total minions killed: <?php echo $value['MINIONS_KILLED']; ?></p>
							</div>
						</div>
					<?php } ?>
					<div class="game-match" style="clear: both;">
						<h2>Latest Season Stats</h2>
						<div id="stats_chart" style="width: 400px; height:300px;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
// Getting champion name for season stats
foreach($champ_name as $champ_id => $stat_value) {
	foreach ($stat_value as $cn => $cs) {
		if($champ_id != 0) {
			$json_cn[] = $cn;
		}
	} 
}
// Getting champion total games played stats
foreach($champ_name as $champ_id => $stat_value) {
	foreach ($stat_value as $cn => $cs) {
		if($champ_id != 0) {
			$json_cs[] = $cs['TOTAL_SESSIONS_PLAYED'];
		}
	} 
}
?>
<script src="<?php echo base_url(); ?>assets/js/Chart.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var chart_data = <?php echo json_encode($json_cn); ?>;
	$('#stats_chart').highcharts({
        chart: {
            type: 'column',
            backgroundColor: "#F5F5F5",
        },
        title: {
            text: ' '
        },
        xAxis: {
            categories: chart_data
        },
        yAxis: {
            title: {
                text: 'Matches Played'
            }
        },
        tooltip: {
            formatter: function() {
                return '<b>'+ this.x +'</b><br/>'+
                    this.series.name +': '+ this.y +'<br/>';
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Games Played',
            data: <?php echo json_encode($json_cs); ?>

        }]
    });
});
</script>