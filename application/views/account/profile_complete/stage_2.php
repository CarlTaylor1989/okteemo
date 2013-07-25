<div class="bg">
	<div class="container">
		<div class="row">
			<div class="span12">
				<h1>Step 2 of 3</h1>
			</div>
		</div>
		<div class="row">
			<div class="span3">
				<h3>Edit your profile</h3>
			</div>
			<div class="span9">
				<div id="progress_tip" class="progress progress-striped progress-success active" data-toggle="tooltip" title="Complete the step process to complete your profile!">
					<div class="bar" style="width: 66%"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span3">
				<?php echo $this->load->view('assets/_profile_navigation'); ?>
			</div>
			<div class="span9">
				<form class="form-horizontal">
					<div class="control-group">
					    <label class="control-label" for="looking_to_do">What are you looking to do?</label>
					    <div class="controls">
					    	<textarea id="looking_to_do" name="looking_to_do" placeholder="What are you looking to do?"></textarea>
					    </div>
					</div>
					<div class="control-group">
						<label class="control-label" for="roles">Roles</label>
					    <div class="controls">
					     	<div class="btn-group" data-toggle="buttons-checkbox">
								<button type="button" class="btn btn-primary">Top</button>
							  	<button type="button" class="btn btn-primary">Mid</button>
							  	<button type="button" class="btn btn-primary">Bot</button>
							  	<button type="button" class="btn btn-primary">Support</button>
							  	<button type="button" class="btn btn-primary">Jungler</button>
							</div>
					    </div>
					</div>
					<div class="control-group">
					    <label class="control-label" for="basic_age">Age</label>
					    <div class="controls">
					    	<input type="password" id="basic_age" name="basic_age" placeholder="Age">
					    </div>
					</div>
					<div class="control-group">
					    <div class="controls">
					   		<button type="submit" class="btn btn-primary">Next <i class="icon-arrow-right icon-white"></i></button>
					  	</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>