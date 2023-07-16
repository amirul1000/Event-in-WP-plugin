<h5 class="font-20 mt-15 mb-1">Booking</h5>

<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="admin.php?page=booking&cmd=edit"
			class="btn btn-success">Add</a>
	</div>
	
	
</div>
<!--End of Action//--> 
   
<!--Data display of booking-->     
<div style="overflow-x:auto;width:100%;">      
<table cellspacing="3" cellpadding="3" class="table table-striped table-bordered">
    <tr>
		<th>Wp Schedule</th>
        <th>Learning Mode Type</th>
        <th>Join Class Date</th>
        <th>Join Class Condition</th>
        <th>Start Time</th>
        <th>Start Time Condition</th>
        <th>User Name</th>
        <th>Email</th>
		<th>Actions</th>
    </tr>
	<?php foreach($booking as $c){ ?>
    <tr>
		<td><?php
									 
				$schedule = $wpdb->get_results("select * from wp_schedule where id='". $c->schedule_id."'");					 
				echo $schedule[0]->schedule_date_from.'-'.$schedule[0]->schedule_date_to;				 
		  ?>
		</td>
        <td><?php echo $c->learning_mode_type; ?></td>
        <td><?php echo $c->join_class_date; ?></td>
        <td><?php echo $c->join_class_condition; ?></td>
        <td><?php echo $c->start_time; ?></td>
        <td><?php echo $c->start_time_condition; ?></td>
        <td><?php echo $c->user_name; ?></td>
        <td><?php echo $c->email; ?></td>

		<td>
            <a href="admin.php?page=booking&cmd=edit&id=<?=$c->id?>" class="action-icon"> Edit</a>
            <a href="admin.php?page=booking&cmd=delete&id=<?=$c->id?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> Delete</a>
         </td>
    </tr>
	<?php } ?>
</table>
</div>
<!--End of Data display of booking//--> 

<!--No data-->
<?php
	if(count($booking)==0){
?>
 <div align="center"><h3>Data does not exists</h3></div>
<?php
	}
?>
<!--End of No data//-->

<!--Pagination-->
<!--End of Pagination//-->
