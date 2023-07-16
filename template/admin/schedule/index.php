<h5 class="font-20 mt-15 mb-1">Schedule</h5>

<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="admin.php?page=schedule&cmd=edit"
			class="btn btn-success">Add</a>
	</div>
	
	
</div>
<!--End of Action//--> 
   
<!--Data display of wp_schedule-->     
<div style="overflow-x:auto;width:100%;">      
<table cellspacing="3" cellpadding="3" class="table table-striped table-bordered">
    <tr>
		<th>Learning Mode Type</th>
        <th>Schedule Date From</th>
        <th>Schedule Date To</th>
        <th>Onboarding Date</th>
        <th>Schedule Time 1</th>
        <th>Schedule Time 2</th>
        <th>Schedule Time 3</th>
        <th>Total No Of Seat</th>
        <th>Fee</th>
        <th>Status</th>

		<th>Actions</th>
    </tr>
	<?php foreach($schedule as $c){ ?>
    <tr>
		<td><?php echo $c->learning_mode_type; ?></td>
        <td><?php echo $c->schedule_date_from; ?></td>
        <td><?php echo $c->schedule_date_to; ?></td>
        <td><?php echo $c->onboarding_date; ?></td>
        <td><?php echo $c->schedule_time_1; ?></td>
        <td><?php echo $c->schedule_time_2; ?></td>
        <td><?php echo $c->schedule_time_3; ?></td>
        <td><?php echo $c->total_no_of_seat; ?></td>
        <td><?php echo $c->fee; ?></td>
        <td><?php echo $c->status; ?></td>

		<td>
            <a href="admin.php?page=schedule&cmd=edit&id=<?=$c->id?>" class="action-icon"> Edit</a>
            <a href="admin.php?page=schedule&cmd=delete&id=<?=$c->id?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
</div>
<!--End of Data display of wp_schedule//--> 

<!--No data-->
<?php
	if(count($schedule)==0){
?>
 <div align="center"><h3>Data does not exists</h3></div>
<?php
	}
?>
<!--End of No data//-->

<!--Pagination-->

<!--End of Pagination//-->
