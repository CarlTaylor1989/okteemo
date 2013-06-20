<div class="bg">
	<div class="container">
		<div class="row">
			<div class="span12">
				<h3>Edit your profile</h3>
			</div>
		</div>
		<div class="row">
			<div class="span3">
				<?php echo $this->load->view('assets/_profile_navigation'); ?>
			</div>
			<div class="span9">
				<form class="form-horizontal">
					<div class="control-group">
						<label class="control-label" for="basic_name">Name</label>
					    <div class="controls">
					     	<input type="text" id="basic_name" name="basic_name" placeholder="Name">
					    </div>
					</div>
					<div class="control-group">
					    <label class="control-label" for="basic_age">Age</label>
					    <div class="controls">
					    	<input type="password" id="basic_age" name="basic_age" placeholder="Age">
					    </div>
					</div>
					<div class="control-group">
					    <label class="control-label" for="basic_age">DOB</label>
					    <div class="controls">
					    	<div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
  								<input class="span2" size="16" type="text" value="12-02-2012" />
  								<span class="add-on"><i class="icon-th"></i></span>
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