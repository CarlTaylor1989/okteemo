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
						<canvas id="myChart" width="400" height="400"></canvas>
					<?php
					//if($champ_name){
					//foreach($champ_name as $champ_id => $stat_value) {
					//	foreach ($stat_value as $cn => $cs) { ?>
						<?php //if($champ_id != 0) { ?>
							<!-- <div class="pull-left game-match-info"><?php echo $cn; ?>: Played <?php echo $cs['TOTAL_SESSIONS_PLAYED']; ?> times</div> -->
							<?php //} ?>
						<?php //} ?>
					<?php //} }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/Chart.js"></script>
<script type="text/javascript">
var options = {
}
var barChartData = {
	labels : [<?php foreach($champ_name as $champ_id => $stat_value) {
						foreach ($stat_value as $cn => $cs) {
							if($champ_id != 0) {
								echo '"'.$cn.'",';
							}
						} 
					} ?>],
	datasets : [
		{
			fillColor : "rgba(220,220,220,0.5)",
			strokeColor : "rgba(220,220,220,1)",
			data : [<?php foreach($champ_name as $champ_id => $stat_value) {
						foreach ($stat_value as $cn => $cs) {
							if($champ_id != 0) {
								echo $cs['TOTAL_SESSIONS_PLAYED'].',';
							}
						} 
					} ?>]
		}
	]

}

var myLine = new Chart(document.getElementById("myChart").getContext("2d")).Bar(barChartData,options);
</script>