<?php 
  define('WP_USE_THEMES', false);
  if (file_exists("../../../wp-load.php"))
    {
    	require_once("../../../wp-load.php");
    }
  
    global $wpdb;
	$res = $wpdb->insert("wp_booking", array(
	   "schedule_id" => $_POST['schedule_id'],
	   "learning_mode_type" => $_POST['learning_mode_type'],
	   "join_class_date" => $_POST['join_class_date'],
	   "join_class_condition" => $_POST['join_class_condition'],
	   "start_time" => $_POST['start_time'],
	   "start_time_condition" => $_POST['start_time_condition'],
	   "user_name" => $_POST['user_name'],
	   "email" => $_POST['email'],
	   "created_at" => date("Y-m-d H:i:s"),
	));
   
      ob_start();
      if($res){
		  $arr['status'] = 'success';
		  $arr['msg'] = "Schedule has been created successfully";
		  echo json_encode($arr);  
	  }
	  else{
	     $arr['status'] = 'fail';
		  $arr['msg'] = "Schedule creation fail";
		  echo json_encode($arr);  
	  }
   ?>