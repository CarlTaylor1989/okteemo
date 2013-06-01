<!doctype html>  

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --> 
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">

<title>OKteemo | <?php echo $title; ?></title>
<meta name="author" content="OkTeemo">
<meta name="description" content="">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
<link rel="stylesheet" href="assets/css/bootstrap.css" />
<link rel="stylesheet" href="assets/css/bootstrap.icon-large.min.css">
<link rel="stylesheet" href="assets/css/validationEngine.jquery.css" />
<link rel="stylesheet" href="assets/css/bootstrap-select.css" />
<link rel="stylesheet" href="assets/css/default.css" />
</head>

<body id="<?php echo $body; ?>">

<div id="container">
	<div class="container">
		<div class="row">
			<header class="span12">
				<?php $this->load->view('assets/_navigation'); ?>
			</header>
		</div>
	</div>
	<div id="main">
		<?php echo $yield; ?>
	</div>
	<div id="footer" class="container">
		<div class="row">
			<div class="span12">
				<ul>
					<li><a href="">Home</a></li>
					<li><a href="">Find a team</a></li>
					<li><a href="">Find a player</a></li>
					<li><a href="">About OkTeemo</a></li>
				</ul>
			</div>
		</div>
	</div>
</div> <!--! end of #container -->

<!-- Javascript at the bottom for fast page loading -->
<script src="assets/js/jquery-1.10.0.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/libs/modernizr-2.5.3.js"></script>
<script src="assets/js/languages/jquery.validationEngine-en.js"></script>
<script src="assets/js/jquery.validationEngine.js"></script>
<script src="assets/js/bootstrap-select.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#home_reg_form").validationEngine({
		scroll: false
	});
	$('.selectpicker').selectpicker();
	$('.carousel').carousel({
		interval: 6000
	});
});
</script>
</body>
</html>