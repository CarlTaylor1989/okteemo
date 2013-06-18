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
				<h2>Last Game Played</h2>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12 well">
				<div class="span4">
					Navigation here
				</div>
				<div class="span8">
					<?php foreach($temp as $date => $value) { ?>
						<div class="game-match">
							<img src="<?php echo base_url(); ?>assets/img/lol_assets/icons/<?php echo $statistics[$date]['championId'] ?>.jpg" class="pull-left" />
							<div class="pull-left game-match-info">
								<h4><?php echo date("F j, Y, g:i a", $date); ?> <?php if($statistics[$date]['ranked'] == 1) echo '- Ranked Match'; ?> <?php if(isset($value['LOSE'])) echo 'LOST'; else echo 'WON'; ?></h4>
								<p>K/D/A: <strong><?php if(isset($value['CHAMPIONS_KILLED'])) echo $value['CHAMPIONS_KILLED']; else echo '0'; ?></strong>/<strong><?php echo $value['NUM_DEATHS']; ?></strong>/<strong><?php echo $value['ASSISTS']; ?></strong></p>
								<p>Total minions killed: <?php echo $value['MINIONS_KILLED']; ?></p>
							</div>
						</div>
					<?php } ?>
					<div class="game-match" style="clear: both;">
						<!-- <canvas id="myChart" width="400" height="400"></canvas> -->
					<?php foreach(array_slice($season_stats, 0, 5, true) as $champ_id => $stat_value) { ?>
						<?php if($champ_id != 0) { ?>
							<div class="pull-left game-match-info"><?php echo $champ_id; ?>: Sessions played - <?php echo $stat_value['TOTAL_SESSIONS_PLAYED']; ?><br /><br /></div>


						<?php } ?>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/Chart.js"></script>
<script type="text/javascript">
var barChartData = {
	labels : ["January","February","March","April","May","June","July"],
	datasets : [
		{
			fillColor : "rgba(220,220,220,0.5)",
			strokeColor : "rgba(220,220,220,1)",
			data : [65,59,90,81,56,55,40]
		}
	]

}

var myLine = new Chart(document.getElementById("myChart").getContext("2d")).Bar(barChartData);
</script>