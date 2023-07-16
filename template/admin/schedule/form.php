<?php
 error_reporting(!E_WARNING);
?>
<a  href="<?php echo 'admin.php?page=schedule'; ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Wp_schedule'); ?></h5>
<!--Form to save data-->
<form method="post" action="admin.php?page=schedule&cmd=save&id=<?=$schedule[0]->id?>">
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
          <label for="Learning Mode Type" class="col-md-4 control-label">Learning Mode Type</label> 
          <div class="col-md-8"> 
           <input type="text" name="learning_mode_type" value="<?php echo ($_REQUEST['learning_mode_type']? $_REQUEST['learning_mode_type']: $schedule[0]->learning_mode_type); ?>" class="form-control" id="learning_mode_type" /> 
          </div> 
           </div>
<div class="form-group"> 
                                       <label for="Schedule Date From" class="col-md-4 control-label">Schedule Date From</label> 
            <div class="col-md-8"> 
           <input type="date" name="schedule_date_from"  id="schedule_date_from"  value="<?php echo ($_REQUEST['schedule_date_from']? $_REQUEST['schedule_date_from']: $schedule[0]->schedule_date_from); ?>" class="form-control-static datepicker"/> 
            </div> 
           </div>
<div class="form-group"> 
                                       <label for="Schedule Date To" class="col-md-4 control-label">Schedule Date To</label> 
            <div class="col-md-8"> 
           <input type="date" name="schedule_date_to"  id="schedule_date_to"  value="<?php echo ($_REQUEST['schedule_date_to']? $_REQUEST['schedule_date_to']: $schedule[0]->schedule_date_to); ?>" class="form-control-static datepicker"/> 
            </div> 
           </div>
<div class="form-group"> 
                                       <label for="Onboarding Date" class="col-md-4 control-label">Onboarding Date</label> 
            <div class="col-md-8"> 
           <input type="date" name="onboarding_date"  id="onboarding_date"  value="<?php echo ($_REQUEST['onboarding_date']? $_REQUEST['onboarding_date']: $schedule[0]->onboarding_date); ?>" class="form-control-static datepicker"/> 
            </div> 
           </div>
<div class="form-group"> 
          <label for="Schedule Time 1" class="col-md-4 control-label">Schedule Time 1</label> 
          <div class="col-md-8"> 
           <input type="time" name="schedule_time_1" value="<?php echo ($_REQUEST['schedule_time_1']? $_REQUEST['schedule_time_1']: $schedule[0]->schedule_time_1); ?>" class="form-control" id="schedule_time_1" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Schedule Time 2" class="col-md-4 control-label">Schedule Time 2</label> 
          <div class="col-md-8"> 
           <input type="time" name="schedule_time_2" value="<?php echo ($_REQUEST['schedule_time_2']? $_REQUEST['schedule_time_2']: $schedule[0]->schedule_time_2); ?>" class="form-control" id="schedule_time_2" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Schedule Time 3" class="col-md-4 control-label">Schedule Time 3</label> 
          <div class="col-md-8"> 
           <input type="time" name="schedule_time_3" value="<?php echo ($_REQUEST['schedule_time_3']? $_REQUEST['schedule_time_3']: $schedule[0]->schedule_time_3); ?>" class="form-control" id="schedule_time_3" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Total No Of Seat" class="col-md-4 control-label">Total No Of Seat</label> 
          <div class="col-md-8"> 
           <input type="text" name="total_no_of_seat" value="<?php echo ($_REQUEST['total_no_of_seat']? $_REQUEST['total_no_of_seat']: $schedule[0]->total_no_of_seat); ?>" class="form-control" id="total_no_of_seat" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Fee" class="col-md-4 control-label">Fee</label> 
          <div class="col-md-8"> 
           <input type="text" name="fee" value="<?php echo ($_REQUEST['fee']? $_REQUEST['fee']: $schedule[0]->fee); ?>" class="form-control" id="fee" /> 
          </div> 
           </div>
<div class="form-group"> 
                                        <label for="Status" class="col-md-4 control-label">Status</label> 
          <div class="col-md-8"> 
          
           <select name="status"  id="status"  class="form-control"/> 
             <option value="">--Select--</option> 
             <option value="active" <?php if($schedule[0]->status=='active'){ echo "selected";} ?>>active</option> 
             <option value="inactive" <?php if($schedule[0]->status=='inactive'){ echo "selected";} ?>>inactive</option>
           </select> 
          </div> 
            </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <input type="hidden" name="id" value="<?=$schedule[0]->id?>" >
        <button type="submit" class="btn btn-success"><?php if(empty($schedule[0]->id)){?>Save<?php }else{?>Update<?php } ?></button>
    </div>
</div>
</form>
<!--End of Form to save data//-->	
<!--JQuery-->
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '<?php echo base_url(); ?>public/datepicker/images/calendar.gif',
	});
</script>  			