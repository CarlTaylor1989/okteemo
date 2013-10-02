<div class="bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Step 2 of 3</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				<h3>Edit your profile</h3>
			</div>
			<div class="col-lg-9">
				<div id="progress_tip" class="progress progress-striped progress-success active" data-toggle="tooltip" title="Complete the step process to complete your profile!">
					<div class="bar" style="width: 66%"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				<?php echo $this->load->view('assets/_profile_navigation'); ?>
			</div>
			<div class="col-lg-9">
				<?php echo validation_errors('<div class="error">', '</div>'); ?>
				<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>account/edit-profile/2">
					<div class="form-group">
					    <label class="col-lg-2 control-label" for="looking_to_do">What are you looking to do?</label>
					    <div class="col-lg-10">
					    	<textarea id="looking_to_do" name="looking_to_do" placeholder="What are you looking to do?"></textarea>
					    </div>
					</div>
					<div class="form-group">
						<label class="control-label" for="roles">Roles</label>
					    <div class="controls">
					     	<div class="btn-group" data-toggle="buttons-checkbox" id="roles_group">
								<button type="button" class="btn btn-primary" data-role="top" data-value="1">Top</button>
								<input type="hidden" name="role_top" class="top" value="0" />
							  	<button type="button" class="btn btn-primary" data-role="mid" data-value="1">Mid</button>
							  	<input type="hidden" name="role_mid" class="mid" value="0" />
							  	<button type="button" class="btn btn-primary" data-role="adc" data-value="1">AD Carry</button>
							  	<input type="hidden" name="role_adc" class="adc" value="0" />
							  	<button type="button" class="btn btn-primary" data-role="sup" data-value="1">Support</button>
							  	<input type="hidden" name="role_sup" class="sup" value="0" />
							  	<button type="button" class="btn btn-primary" data-role="jun" data-value="1">Jungler</button>
							  	<input type="hidden" name="role_jun" class="jun" value="0" />
							</div>
					    </div>
					</div>
					<div class="form-group">
					    <div class="controls">
					   		<button type="submit" class="btn btn-primary">Next <i class="icon-arrow-right icon-white"></i></button>
					  	</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>