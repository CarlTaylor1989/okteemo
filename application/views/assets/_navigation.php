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
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Find <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Summoner</a></li>
							<li><a href="#">Teams</a></li>
							<li><a href="#">Tournoments</a></li>
							<li><a href="#">Etc</a></li>
						</ul>
					</li>
					<li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<ul class="nav pull-right sign-in">
		        	<li class="dropdown">
		            	<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign in <b class="caret"></b></a>
			            <div class="dropdown-menu">
				            <form action="submit" method="post">
								<input id="user_username" type="text" name="user[username]" placeholder="Username" size="30" />
								<input id="user_password" type="password" name="user[password]" placeholder="Password" size="30" />
								<input id="user_remember_me" type="checkbox" name="user[remember_me]" value="1" />
								<label for="user_remember_me">Remember me</label>								
								<input class="btn btn-danger" type="submit" name="commit" value="Sign In" />
							</form>
			            </div>
		        	</li>
				</ul>
			</div><!-- /.nav-collapse -->
		</div>
	</div><!-- /navbar-inner -->
</div>