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
				<pre><?php print_r($match_array); ?></pre>
				<?php for ($i=0; $i < count($match_array); $i++) { ?>
					<p><?php echo $match_array[$i][0]['statType'].' - '.$match_array[$i][0]['value']; ?></p>
				<?php } ?>
				<!-- <p><strong>Ranked Match:</strong> <?php if($ranked == 1) echo 'Yes'; else 'No'; ?></p>
				<p><strong>Champion:</strong> <?php echo $champion_used; ?></p>
				<p><strong>Champions killed:</strong> <?php echo $champions_killed; ?></p>
				<p><strong>Total minions killed:</strong> <?php echo $minions_killed; ?></p>
				<p><strong>Largest kill spree:</strong> <?php echo $largest_kill_spree; ?></p>
				<p><strong>Largest multi kill:</strong> <?php echo $largest_multi_kill; ?></p> -->
			</div>
		</div>
	</div>
</div>