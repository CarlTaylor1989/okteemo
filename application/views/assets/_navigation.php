<div id="logoutModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3 id="myModalLabel">Are you sure you want to logout?</h3>
  	</div>
  	<div class="modal-footer">
    	<a href="<?php echo base_url(); ?>logout" class="btn btn-primary">Yes</a>
    	<a class="btn" data-dismiss="modal" aria-hidden="true">Cancel</a>
  	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo.png" class="logo" border="0" /></a>
			<ul class="nav navbar-nav">
				<li><a href="#">Home</a></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Find <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">Summoner</a></li>
					<li><a href="#">Teams</a></li>
					<li><a href="#">Tournaments</a></li>
					<li><a href="#">Etc</a></li>
				</ul></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
			<?php if($this->ion_auth->logged_in()) { ?>
			<ul class="nav pull-right">
		    	<li class="dropdown">
		        	<a class="dropdown-toggle" href="#" data-toggle="dropdown">Welcome, <strong><?php echo $this->session->userdata('username'); ?></strong>! <b class="caret"></b></a>
		            <ul class="dropdown-menu">
						<li><a href="#">My account</a></li>
						<li><a href="<?php echo base_url(); ?>account/edit-profile">Edit my profile</a></li>
						<li><a href="#logoutModal" data-toggle="modal">Log out</a></li>
					</ul>
		    	</li>
			</ul>
			<?php } else { ?>
			<ul class="nav pull-right sign-in">
		    	<li class="dropdown">
		        	<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign in <b class="caret"></b></a>
		            <div class="dropdown-menu">
			            <form action="<?php echo base_url(); ?>" method="post">
			            	<input name="login_form" type="hidden" value="true" />
							<input id="login_email" type="text" name="login_email" placeholder="Email address" size="30" />
							<input id="login_password" type="password" name="login_password" placeholder="Password" size="30" />
							<input id="login_remember" type="checkbox" name="login_remember" value="0" />
							<label for="login_remember">Remember me</label>								
							<input class="btn btn-danger" type="submit" name="commit" value="Sign In" />
						</form>
		            </div>
		    	</li>
			</ul>
			<?php } ?>
		</div>
	</div>
</div>

<!-- <div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo.png" class="logo" border="0" /></a>
			<div class="nav-collapse">
				<ul class="nav">
					<li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Find <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Summoner</a></li>
							<li><a href="#">Teams</a></li>
							<li><a href="#">Tournaments</a></li>
							<li><a href="#">Etc</a></li>
						</ul>
					</li>
					<li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<?php if($this->ion_auth->logged_in()) { ?>
				<ul class="nav pull-right">
		        	<li class="dropdown">
		            	<a class="dropdown-toggle" href="#" data-toggle="dropdown">Welcome, <strong><?php echo $this->session->userdata('username'); ?></strong>! <b class="caret"></b></a>
			            <ul class="dropdown-menu">
							<li><a href="#">My account</a></li>
							<li><a href="<?php echo base_url(); ?>account/edit-profile">Edit my profile</a></li>
							<li><a href="#logoutModal" data-toggle="modal">Log out</a></li>
						</ul>
		        	</li>
				</ul>
				<?php } else { ?>
				<ul class="nav pull-right sign-in">
		        	<li class="dropdown">
		            	<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign in <b class="caret"></b></a>
			            <div class="dropdown-menu">
				            <form action="<?php echo base_url(); ?>" method="post">
				            	<input name="login_form" type="hidden" value="true" />
								<input id="login_email" type="text" name="login_email" placeholder="Email address" size="30" />
								<input id="login_password" type="password" name="login_password" placeholder="Password" size="30" />
								<input id="login_remember" type="checkbox" name="login_remember" value="0" />
								<label for="login_remember">Remember me</label>								
								<input class="btn btn-danger" type="submit" name="commit" value="Sign In" />
							</form>
			            </div>
		        	</li>
				</ul>
				<?php } ?>
			</div>
		</div>
	</div>
</div> -->