<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Wp_schedule'); ?></h3>
Date: <?php echo date("Y-m-d");?>
<hr>
<!--*************************************************
*********mpdf header footer page no******************
****************************************************-->
<htmlpageheader name="firstpage" class="hide">
</htmlpageheader>

<htmlpageheader name="otherpages" class="hide">
    <span class="float_left"></span>
    <span  class="padding_5"> &nbsp; &nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp;</span>
    <span class="float_right"></span>         
</htmlpageheader>      
<sethtmlpageheader name="firstpage" value="on" show-this-page="1" />
<sethtmlpageheader name="otherpages" value="on" /> 
   
<htmlpagefooter name="myfooter"  class="hide">                          
     <div align="center">
               <br><span class="padding_10">Page {PAGENO} of {nbpg}</span> 
     </div>
</htmlpagefooter>    

<sethtmlpagefooter name="myfooter" value="on" />
<!--*************************************************
*********#////mpdf header footer page no******************
****************************************************-->
<!--Data display of wp_schedule-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
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

    </tr>
	<?php foreach($wp_schedule as $c){ ?>
    <tr>
		<td><?php echo $c['learning_mode_type']; ?></td>
<td><?php echo $c['schedule_date_from']; ?></td>
<td><?php echo $c['schedule_date_to']; ?></td>
<td><?php echo $c['onboarding_date']; ?></td>
<td><?php echo $c['schedule_time_1']; ?></td>
<td><?php echo $c['schedule_time_2']; ?></td>
<td><?php echo $c['schedule_time_3']; ?></td>
<td><?php echo $c['total_no_of_seat']; ?></td>
<td><?php echo $c['fee']; ?></td>
<td><?php echo $c['status']; ?></td>

    </tr>
	<?php } ?>
</table>
<!--End of Data display of wp_schedule//--> 