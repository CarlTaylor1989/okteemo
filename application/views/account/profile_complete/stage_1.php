<div class="bg">
	<div class="container">
		<div class="row">
			<div class="span12">
				<h1>Step 1 of 3</h1>
			</div>
		</div>
		<div class="row">
			<div class="span3">
				<h3>Edit your profile</h3>
			</div>
			<div class="span9">
				<div id="progress_tip" class="progress progress-striped progress-success active" data-toggle="tooltip" title="Complete the step process to complete your profile!">
					<div class="bar" style="width: 33%"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span3">
				<?php echo $this->load->view('assets/_profile_navigation'); ?>
			</div>
			<div class="span9">
				<?php echo validation_errors('<div class="error">', '</div>'); ?>
				<form method="post" class="form-horizontal" id="stage_1" action="<?php echo base_url(); ?>account/edit-profile/1">
					<input type="hidden" value="1" name="stage_1">
					<div class="control-group">
						<label class="control-label" for="basic_name">Name</label>
					    <div class="controls">
					     	<input type="text" id="basic_name" name="basic_name" placeholder="Name" value="<?php if(isset($postdata['basic_name'])) { echo $postdata['basic_name']; } ?>">
					    </div>
					</div>
					<div class="control-group">
					    <label class="control-label" for="basic_age">Date of Birth</label>
					    <div class="controls">
					    	<div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
  								<input class="span3" type="text" value="12-02-2012" readonly />
  								<span class="add-on"><i class="icon-th"></i></span>
							</div>
					    </div>
					</div>
					<div class="control-group">
					    <label class="control-label" for="basic_age">Twitter</label>
					    <div class="controls">
					    	<div class="input-prepend twitter-handle">
					    		<span class="add-on">@</span>
  								<input class="span3" type="text" name="twitter_handle" placeholder="Twitter Handle" value="<?php if(isset($postdata['basic_name'])) { echo $postdata['twitter_handle']; } ?>" />
							</div>
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