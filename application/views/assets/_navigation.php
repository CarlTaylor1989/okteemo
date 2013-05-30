<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<img src="assets/img/logo.png" class="logo">
			<div class="nav-collapse">
				<ul class="nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">Teams</a></li>
					<li><a href="#">Tournoments</a></li>
					<li><a href="#link-3">About</a></li>
				</ul>
				<ul class="nav pull-right">
		        	<li class="dropdown">
		            	<a class="dropdown-toggle" href="#" data-toggle="dropdown" style="color:#363636;">Sign In<strong class="caret"></strong></a>
			            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
				            <form action="submit" method="post">
								<input id="user_username" style="margin-bottom: 15px;" type="text" name="user[username]" placeholder="Username" size="30" />
								<input id="user_password" style="margin-bottom: 15px;" type="password" name="user[password]" placeholder="Password" size="30" />
								<input id="user_remember_me" style="float: left; margin-right: 10px;" type="checkbox" name="user[remember_me]" value="1" />
								<label style="color:#000;" for="user_remember_me">Remember me</label>								
								<input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
							</form>
			            </div>
		        	</li>
				</ul>
			</div><!-- /.nav-collapse -->
		</div>
	</div><!-- /navbar-inner -->
</div>