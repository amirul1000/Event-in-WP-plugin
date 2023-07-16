<?php
  global $wpdb;
  $cmd='';
  $id = '';
  $cmd = isset($_REQUEST['cmd'])?$_REQUEST['cmd']:'';
  $id = isset($_REQUEST['id'])?$_REQUEST['id']:'';
  
  switch($cmd){
	case "save":
	         $created_at = "";
			 $updated_at = "";

			if($id<=0){
				 $created_at = date("Y-m-d H:i:s");
			 }
			else if($id>0){
				 $updated_at = date("Y-m-d H:i:s");
			 }

			$params = array(
							'learning_mode_type' => $_REQUEST['learning_mode_type'],
							'schedule_date_from' => $_REQUEST['schedule_date_from'],
							'schedule_date_to' => $_REQUEST['schedule_date_to'],
							'onboarding_date' => $_REQUEST['onboarding_date'],
							'schedule_time_1' => $_REQUEST['schedule_time_1'],
							'schedule_time_2' => $_REQUEST['schedule_time_2'],
							'schedule_time_3' => $_REQUEST['schedule_time_3'],
							'total_no_of_seat' => $_REQUEST['total_no_of_seat'],
							'fee' => $_REQUEST['fee'],
							'status' => $_REQUEST['status'],
							'created_at' =>$created_at,
							'updated_at' =>$updated_at,
							
							);
			 
			if($id>0){
			unset($params['created_at']);
			}if($id<=0){
			unset($params['updated_at']);
			} 
			if($id<=0){
			$res = $wpdb->insert('wp_schedule',$params);
			}
			if($id>0){
			
			 $res = $wpdb->update('wp_schedule',$params,array('id'=>$_REQUEST['id']));
			 
			}
			 ob_start();
             ob_end_flush();
			  wp_redirect( 'admin.php?page=schedule' );

		
	      break;
	case "delete":  
	      $wpdb->delete('wp_schedule',array('id'=>$_REQUEST['id']));
		   ob_start();
             ob_end_flush();
		  wp_redirect( 'admin.php?page=schedule' );
	      break;  
    case "edit":
	        /* $schedule = array();
	         $schedule[0]->id = '';
			 $schedule[0]->learning_mode_type = '';
			 $schedule[0]->schedule_date_from = '';
			 $schedule[0]->schedule_date_to = '';
			 $schedule[0]->onboarding_date = '';
			 $schedule[0]->schedule_time_1 = '';
			 $schedule[0]->schedule_time_2 = '';
			 $schedule[0]->schedule_time_3 = '';
			 $schedule[0]->total_no_of_seat = '';
			 $schedule[0]->fee = '';
			 $schedule[0]->status	 = '';*/
			
	         if(!empty($_REQUEST['id'])){
		     	$schedule  = $wpdb->get_results("select * from wp_schedule where id='".$_REQUEST['id']."'"); 
			 }
			 include(dirname(__FILE__) . '/template/admin/schedule/form.php');  
		  break;		  
	default:
	   $schedule  = $wpdb->get_results("select * from wp_schedule"); 
	   include(dirname(__FILE__) . '/template/admin/schedule/index.php');  
  }
?>