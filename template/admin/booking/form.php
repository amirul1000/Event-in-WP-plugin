<?php
 error_reporting(!E_WARNING);
?>
<a  href="<?php echo 'admin.php?page=booking'; ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Wp_booking'); ?></h5>
<!--Form to save data-->
<form method="post" action="admin.php?page=booking&cmd=save&id=<?=$booking[0]->id?>">
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
                                    <label for="Wp Schedule" class="col-md-4 control-label">Wp Schedule</label> 
         <div class="col-md-8"> 
          <?php 
            $dataArr = $wpdb->get_results("select * from wp_schedule where 1");
          ?> 
          <select name="schedule_id"  id="schedule_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]->id?>" <?php if($booking[0]->schedule_id==$dataArr[$i]->id){ echo "selected";} ?>><?=$dataArr[$i]->schedule_date_from?>-<?=$dataArr[$i]->schedule_date_to?> </option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
          <label for="Learning Mode Type" class="col-md-4 control-label">Learning Mode Type</label> 
          <div class="col-md-8"> 
           <input type="text" name="learning_mode_type" value="<?php echo ($_POST['learning_mode_type'] ? $_POST['learning_mode_type'] : $booking[0]->learning_mode_type); ?>" class="form-control" id="learning_mode_type" /> 
          </div> 
           </div>
<div class="form-group"> 
                                        <label for="Join Class Date" class="col-md-4 control-label">Join Class Date</label> 
          <div class="col-md-8"> 
           <textarea  name="join_class_date"  id="join_class_date"  class="form-control" rows="4"/><?php echo ($_POST['join_class_date'] ? $_POST['join_class_date'] : $booking[0]->join_class_date); ?></textarea> 
          </div> 
           </div>
<div class="form-group"> 
                                        <label for="Join Class Condition" class="col-md-4 control-label">Join Class Condition</label> 
          <div class="col-md-8"> 
           <textarea  name="join_class_condition"  id="join_class_condition"  class="form-control" rows="4"/><?php echo ($_POST['join_class_condition'] ? $_POST['join_class_condition'] : $booking[0]->join_class_condition); ?></textarea> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Start Time" class="col-md-4 control-label">Start Time</label> 
          <div class="col-md-8"> 
           <input type="text" name="start_time" value="<?php echo ($_POST['start_time'] ? $_POST['start_time'] : $booking[0]->start_time); ?>" class="form-control" id="start_time" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Start Time Condition" class="col-md-4 control-label">Start Time Condition</label> 
          <div class="col-md-8"> 
           <input type="text" name="start_time_condition" value="<?php echo ($_POST['start_time_condition'] ? $_POST['start_time_condition'] : $booking[0]->start_time_condition); ?>" class="form-control" id="start_time_condition" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="User Name" class="col-md-4 control-label">User Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="user_name" value="<?php echo ($_POST['user_name'] ? $_POST['user_name'] : $booking[0]->user_name); ?>" class="form-control" id="user_name" /> 
          </div> 
           </div>
<div class="form-group"> 
                                        <label for="Email" class="col-md-4 control-label">Email</label> 
          <div class="col-md-8"> 
           <textarea  name="email"  id="email"  class="form-control" rows="4"/><?php echo ($_POST['email'] ? $_POST['email'] : $booking[0]->email); ?></textarea> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <input type="hidden" name="id" value="<?=$booking[0]->id?>" >
        <button type="submit" class="btn btn-success"><?php if(empty($booking[0]->id)){?>Save<?php }else{?>Update<?php } ?></button>
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