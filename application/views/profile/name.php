<div class="bg">
	<div class="container">
		<div class="row">
			<div class="span12">
				<h1><?php echo $summoner_name; ?></h1>
				<h4><?php echo $summoner_platform; ?> - Level <?php echo $summoner_level; ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12 well">
				<div class="span4">
					Navigation here
				</div>
				<div class="span8">
					<h2>Last Game Played</h2>
					<?php foreach($temp as $date => $value) { ?>
						<div class="game-match">
							<img src="<?php echo base_url(); ?>assets/img/lol_assets/icons/<?php echo $statistics[$date]['championId'] ?>.jpg" class="pull-left" />
							<div class="pull-left game-match-info">
								<h4><?php date_default_timezone_set("GMT"); echo date("F j, Y, g:i a", $date); ?> <?php if($statistics[$date]['ranked'] == 1) echo '- Ranked Match'; ?> <?php if(isset($value['LOSE'])) echo 'LOST'; else echo 'WON'; ?></h4>
								<p>K/D/A: <strong><?php if(isset($value['CHAMPIONS_KILLED'])) echo $value['CHAMPIONS_KILLED']; else echo '0'; ?></strong>/<strong><?php echo $value['NUM_DEATHS']; ?></strong>/<strong><?php echo $value['ASSISTS']; ?></strong></p>
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