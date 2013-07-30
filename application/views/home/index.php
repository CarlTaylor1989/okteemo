<div class="bg">
	<div class="container content">
		<div class="row">
			<div class="col-lg-8">
				<div class="well intro-space">
					<div class="load-fade">
						<h2>Find your teams here at OkTeemo.</h2>
					</div>
				</div>
			</div>
			<div class="pull-right col-lg-4">
				<!-- Step 1 -->
				<div class="panel reg_up">
					<h3>REGISTER FOR FREE NOW!</h3>
					<div class="form_errors">
						<?php echo validation_errors(); ?>
					</div>
					<?php echo form_open('/', $form_attr); ?>
						<input name="register_form" type="hidden" value="true" />
						<div class="form-group">
			      			<label for="reg_username">Username</label>
			      			<div class="input-group">
				      			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
				      			<input class="form-control" id="reg_username" name="reg_username" type="text" placeholder="Username" value="<?php echo set_value('reg_username'); ?>" />
			      			</div>
					  	</div>
					  	<div class="form-group">
							<label for="reg_email">Email</label>
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
								<input type="text" class="form-control" id="reg_email" name="reg_email" type="text" placeholder="Email address" value="<?php echo set_value('reg_email'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="reg_password">Password</label>
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
								<input type="text" class="form-control" id="reg_password" name="reg_password" type="password" placeholder="Password" value="<?php echo set_value('reg_password'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="reg_conf_password">Confirm Password</label>
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
								<input type="text" class="form-control" id="reg_conf_password" name="reg_password" type="password" placeholder="Confirm Password" value="<?php echo set_value('reg_conf_password'); ?>">
							</div>
						</div>
					  	<div class="center">
					  		<button class="btn btn-large btn-primary">Let's go! <i class="icon-arrow-right icon-white"></i></a>
					  	</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<div class="looking-team">
				<h4>I'm looking for a<br /><span>TEAM</span></h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<div class="text-center">
					<a href="#" class="btn btn-green-custom">Button number 1</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="looking-team">
				<h4>I'm looking for a<br /><span>TEAM</span></h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<div class="text-center">
					<a href="#" class="btn btn-green-custom">Button number 1</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="looking-team">
				<h4>I'm looking for a<br /><span>TEAM</span></h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<div class="text-center">
					<a href="#" class="btn btn-green-custom">Button number 1</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row feedback-feature">
		<div class="col-lg-12">
			<h2>Hear what our members have to say!</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div id="myCarousel" class="carousel slide">
			  <ol class="carousel-indicators">
			    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			    <li data-target="#myCarousel" data-slide-to="1"></li>
			    <li data-target="#myCarousel" data-slide-to="2"></li>
			  </ol>
			  <!-- Carousel items -->
			  <div class="carousel-inner">
			    <div class="active item">
			    	<div class="col-lg-4 no-marg">
			    		<p class="feedback-comment">"Found a 5v5 within 20 minutes and managed to achieve platinum! Thank you Okteemo."</p>
			    		<p class="feedback-author">CarlTaylor1989 - EUW</p>
			    	</div>
			    	<div class="col-lg-4">
			    		<p class="feedback-comment">"Found a 5v5 within 20 minutes and managed to achieve platinum! Thank you Okteemo."</p>
			    		<p class="feedback-author">IRazorX - US</p>
			    	</div>
			    	<div class="col-lg-4">
			    		<p class="feedback-comment">"Found a 5v5 within 20 minutes and managed to achieve platinum! Thank you Okteemo."</p>
			    		<p class="feedback-author">Touch_Me - EUW</p>
			    	</div>
			    </div>
			    <div class="item">
			    	<div class="col-lg-4 no-marg">
			    		<p class="feedback-comment">"Found a 5v5 within 20 minutes and managed to achieve platinum! Thank you Okteemo."</p>
			    		<p class="feedback-author">CarlTaylor1989 - EUW</p>
			    	</div>
			    	<div class="col-lg-4">
			    		<p class="feedback-comment">"I love it up the chuff"</p>
			    		<p class="feedback-author">IRazorX - US</p>
			    	</div>
			    	<div class="col-lg-4">
			    		<p class="feedback-comment">"Found a 5v5 within 20 minutes and managed to achieve platinum! Thank you Okteemo."</p>
			    		<p class="feedback-author">Touch_Me - EUW</p>
			    	</div>
			    </div>
			    <div class="item">
			    	<div class="col-lg-4 no-marg">
			    		<p class="feedback-comment">"Found a 5v5 within 20 minutes and managed to achieve platinum! Thank you Okteemo."</p>
			    		<p class="feedback-author">CarlTaylor1989 - EUW</p>
			    	</div>
			    	<div class="col-lg-4">
			    		<p class="feedback-comment">"Found a 5v5 within 20 minutes and managed to achieve platinum! Thank you Okteemo."</p>
			    		<p class="feedback-author">IRazorX - US</p>
			    	</div>
			    	<div class="col-lg-4">
			    		<p class="feedback-comment">"Found a 5v5 within 20 minutes and managed to achieve platinum! Thank you Okteemo."</p>
			    		<p class="feedback-author">Touch_Me - EUW</p>
			    	</div>
			    </div>
			  </div>
			  <!-- Carousel nav -->
			  <!-- <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a> -->
			</div>
		</div>
	</div>
</div>