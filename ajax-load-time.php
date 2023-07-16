 <?php 
  define('WP_USE_THEMES', false);
  if (file_exists("../../../wp-load.php"))
    {
    	require_once("../../../wp-load.php");
    }
  
   $sql = "SELECT * from wp_schedule WHERE id='".$_POST['id']."'";
   $res = $wpdb->get_results($sql);
   
    $arr = array();
    if(strlen((string)$res[0]->schedule_time_1)>0){
	  $arr[] = date("H:i:s A",strtotime($res[0]->schedule_time_1));
	}
	if(strlen((string)$res[0]->schedule_time_2)>0){
	  $arr[] =  date("H:i:s A",strtotime($res[0]->schedule_time_2));
	}
	if(strlen((string)$res[0]->schedule_time_3)>0){
	  $arr[] = date("H:i:s A",strtotime($res[0]->schedule_time_3));
	}
	
	echo json_encode($arr);
   ?>