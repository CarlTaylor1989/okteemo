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
		<div class="row">
			<div class="span4">
				Navigation here
			</div>
			<div class="span8">
				<?php foreach ($temp as $date => $value) { ?>
					<div class="span3">
						<img src="<?php echo base_url(); ?>assets/img/lol_assets/icons/<?php echo $statistics[$date]['championId'] ?>.jpg" />
						<div class="pull-left">
							<h4><?php echo date("F j, Y, g:i a", $date); ?> <?php if($statistics[$date]['ranked'] == 1) echo '- Ranked Match'; ?> <?php if(isset($value['LOSE'])) echo 'LOST'; else echo 'WON'; ?></h4>
							<p>K/D/A: <strong><?php echo $value['CHAMPIONS_KILLED']; ?></strong>/<strong><?php echo $value['NUM_DEATHS']; ?></strong>/<strong><?php echo $value['ASSISTS']; ?></strong></p>
							<p>Total minions killed: <?php echo $value['MINIONS_KILLED']; ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>