<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Wp_booking'); ?></h3>
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
<!--Data display of wp_booking-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
    <tr>
		<th>Wp Schedule</th>
<th>Learning Mode Type</th>
<th>Join Class Date</th>
<th>Join Class Condition</th>
<th>Start Time</th>
<th>Start Time Condition</th>
<th>User Name</th>
<th>Email</th>

    </tr>
	<?php foreach($wp_booking as $c){ ?>
    <tr>
		<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Wp_schedule_model');
									   $dataArr = $this->CI->Wp_schedule_model->get_wp_schedule($c['wp_schedule_id']);
									   echo $dataArr['learning_mode_type'];?>
									</td>
<td><?php echo $c['learning_mode_type']; ?></td>
<td><?php echo $c['join_class_date']; ?></td>
<td><?php echo $c['join_class_condition']; ?></td>
<td><?php echo $c['start_time']; ?></td>
<td><?php echo $c['start_time_condition']; ?></td>
<td><?php echo $c['user_name']; ?></td>
<td><?php echo $c['email']; ?></td>

    </tr>
	<?php } ?>
</table>
<!--End of Data display of wp_booking//--> 