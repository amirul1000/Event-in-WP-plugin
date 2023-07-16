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
							'schedule_id' => $_REQUEST['schedule_id'],
							'learning_mode_type' => $_REQUEST['learning_mode_type'],
							'join_class_date' => $_REQUEST['join_class_date'],
							'join_class_condition' => $_REQUEST['join_class_condition'],
							'start_time' => $_REQUEST['start_time'],
							'start_time_condition' => $_REQUEST['start_time_condition'],
							'user_name' => $_REQUEST['user_name'],
							'email' => $_REQUEST['email'],
							'created_at' =>$created_at,
							'updated_at' =>$updated_at,
							
							);
			 
			if($id>0){
			unset($params['created_at']);
			}if($id<=0){
			unset($params['updated_at']);
			} 
			if($id<=0){
			$res = $wpdb->insert('wp_booking',$params);
			}
			if($id>0){
			
			 $res = $wpdb->update('wp_booking',$params,array('id'=>$_REQUEST['id']));
			 
			}
			 ob_start();
             ob_end_flush();
			wp_redirect( 'admin.php?page=booking' );
	      break;
	case "delete":  
	      $wpdb->delete('wp_booking',array('id'=>$_REQUEST['id']));
		   ob_start();
           ob_end_flush();
		  wp_redirect( 'admin.php?page=booking' );
	      break;  
    case "edit":
	         if(!empty($_REQUEST['id'])){
		     	$booking  = $wpdb->get_results("select * from wp_booking where id='".$_REQUEST['id']."'"); 
			 }
			 include(dirname(__FILE__) . '/template/admin/booking/form.php');  
		  break;		  
	default:
	   $booking  = $wpdb->get_results("select * from wp_booking"); 
	   include(dirname(__FILE__) . '/template/admin/booking/index.php');  
  }
?>