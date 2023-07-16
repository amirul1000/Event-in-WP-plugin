<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<script language="javascript" src="<?=PLUGIN_URL_LM?>/assets/js/progress.js"></script>
<link rel="stylesheet" href="<?=PLUGIN_URL_LM?>/assets/css/style.css">
<script>
var load_time_url = "<?=PLUGIN_URL_LM?>/ajax-load-time.php";
var save_data_url = "<?=PLUGIN_URL_LM?>/ajax-save-data.php";
document.addEventListener("DOMContentLoaded", () => {
   move(0,'next');
   show(1);
});
</script>
<div class="container">
<div  style="width:400px;text-align:center;">
    <div id="myProgress">
   	 <div id="myBar"></div>
    </div>
    <div class="pages">
        <div class="row page_v">
           <div class="col">
              <!--Content Page 1-->
              <img src="https://designyourlife.community/wp-content/uploads/DST-Modes.png" alt="">
              <h3>Introducing Learning Modes</h3>
              <P>
              You can choose between joining our very next classes as they fill up, 
              or starting on your own until a class time works with your schedule. 
              If a class doesn’t fill up you will have the option of joining the 
              very next class or you can go at your own pace with 3 months of Group 
              Coaching
              </P>
              
              <div class="frm_submit">
                <button class="frm_button_submit" type="submit" onClick=" move(2,'next');">Got it</button>
               </div>
             <!--//Content-->                 
           </div>
        </div>
        <div class="row page_v">
           <div class="col">
              <!--Content Page 2-->
              
             <h3>Choose Your Learning Mode</h3>
             <a href="#" class="learn-more-popup">Learn More</a>
             
             
             <div class="frm_radio  frm_image_option frm_image_large" id="frm_radio_372-0">
             <label for="field_chooseyourlearningmode-0">	
             <input type="radio" name="radio_choice" id="field_chooseyourlearningmode-0" value="Join Scheduled Class" data-reqmsg="Please Choose Your Learning Mode." aria-required="true" data-invmsg="Choose Your Learning Mode<div><a href=&quot;#&quot; class=&quot;learn-more-popup&quot;>Learn More</a></div> is invalid" aria-invalid="false">
              <div class="frm_image_option_container frm_label_with_image">
              <div class="frm_selected_checkmark"></div>
              <img src="http://designyourlife.community/wp-content/uploads/DST-Class.png" alt="<span class=&quot;option-title&quot;>Join Scheduled Class</span>"><span class="frm_text_label_for_image"><span class="frm_text_label_for_image_inner"><span class="option-title">Join Scheduled Class</span></span></span>
              </div></label>
              </div>
             
            <div class="frm_radio  frm_image_option frm_image_large" id="frm_radio_372-1">
            <label for="field_chooseyourlearningmode-1">	
            <input type="radio" name="radio_choice" id="field_chooseyourlearningmode-1" value="Start Now Self Paced (with Coaching)" data-reqmsg="Please Choose Your Learning Mode." aria-required="true" data-invmsg="Choose Your Learning Mode<div><a href=&quot;#&quot; class=&quot;learn-more-popup&quot;>Learn More</a></div> is invalid" aria-invalid="false"> 
            <div class="frm_image_option_container frm_label_with_image">
            <div class="frm_selected_checkmark"></div>
            <img src="http://designyourlife.community/wp-content/uploads/DST-Solo.png" alt="<span class=&quot;option-title&quot;>Start Now Self Paced (with Coaching)</span>"><span class="frm_text_label_for_image"><span class="frm_text_label_for_image_inner"><span class="option-title">Start Now Self Paced (with Coaching)</span></span></span>
            </div></label>
            </div>
             
             
             <div class="frm_submit">
                <button class="frm_button_submit" type="submit" onClick="move(3,'next');">Ok ✓</button>
                <button type="submit" name="frm_prev_page"  onClick="move(1,'previous');">Previous</button>
            </div>
             
              <!--//Content-->
           </div>
        </div>
        
        <div class="row page_v">
           <div class="col">
             <!--Content Page 3-->
             
             <h3>Join a Class</h3>
             <a href="#" class="learn-more-popup">Learn More</a>
             <?php
			$args = array( 'status' => 'active' );
			global $wpdb;
			$sql = "SELECT * from wp_schedule WHERE status='active' order by id DESC";
			$res = $wpdb->get_results($sql);
			?>
            <ul class="list-group">
			<?php
			for($i=0;$i<count($res);$i++){
				 $sql = "SELECT COUNT(wp_booking.id) as total FROM wp_booking 
						     WHERE schedule_id ='". $res[$i]->id."'";
                  $result = $wpdb->get_results($sql);
				  $booking_total = $result[0]->total;
				  
				$total_no_of_seat = $res[$i]->total_no_of_seat;
				$schedule_date_from = date("F j",strtotime($res[$i]->schedule_date_from));
				$schedule_date_to = date("F j",strtotime($res[$i]->schedule_date_to));
				$onboarding_date = date("F j",strtotime($res[$i]->onboarding_date));
			 ?>
             <li class="list-group-item">
             <input type="radio" name="join_class_date" meta-id="<?=$res[$i]->id?>" id="join_class_date_<?=$i?>" value="<?=$schedule_date_from?>-<?=$schedule_date_to?>(Onboarding <?=$onboarding_date?>)" <?php if($booking_total == $total_no_of_seat){?>disabled<?php }?>> <?=$schedule_date_from?>-<?=$schedule_date_to?>(Onboarding <?=$onboarding_date?>)
              <?php if($booking_total == $total_no_of_seat){?>Fill up<?php }?>
             </li>
			<?php
			 }
			?> 
             </ul>
             
             <ul class="list-group">
              <li class="list-group-item">
             	<input type="radio" name="join_class_condition" value="I agree that if my class doesn't fill I will be placed in the next available class"> I agree that if my class doesn't fill I will be placed in the next available class
              </li>
              <li class="list-group-item">
             	<input type="radio" name="join_class_condition" value="Opt for Self-Paced if your class selection does not fill.  You'll have 6 months to join a class if you choose Self-Paced.">Opt for Self-Paced if your class selection does not fill.  You'll have 6 months to join a class if you choose Self-Paced.
             </li>
             </ul>
             <div class="frm_submit">
                <button class="frm_button_submit" type="submit"  onClick="move(4,'next');">Ok ✓</button>
                <button type="submit" name="frm_prev_page" formnovalidate="formnovalidate" class="frm_prev_page"   onClick="move(2,'previous');">Previous</button>
             </div>
             
             <!--//Content-->
           </div>
        </div>
        <div class="row page_v">
           <div class="col">
            <!--Content Page 4-->
            <h3>Select Start Time</h3>
            <a href="#" class="learn-more-popup">Learn More</a>

            <div id="div_time"></div>
            
            
             <ul class="list-group">
              <li class="list-group-item">
             	<input type="radio" name="start_time_condition" value="I agree that if my class doesn't fill I will be placed in the next available class"> I agree that if my class doesn't fill I will be placed in the next available class
              </li>
              <li class="list-group-item">
             	<input type="radio" name="start_time_condition" value="Opt for Self-Paced if your class selection does not fill. You'll have 6 months to join a class if you choose Self-Paced.">Opt for Self-Paced if your class selection does not fill. You'll have 6 months to join a class if you choose Self-Paced.
             </li>
             </ul>
            
             <div class="frm_submit">
                <button class="frm_button_submit" type="submit"  onClick="move(5,'next');">Ok ✓</button>
                <button type="submit" name="frm_prev_page" formnovalidate="formnovalidate" class="frm_prev_page"   onClick="move(3,'previous');">Previous</button>
             </div>
             
           <!--//Content-->  
           </div>
        </div>
        
        <div class="row page_v">
           <div class="col">
            <!--Content Page 5 Submit-->
             <div id="frm_field_386_container" class="frm_form_field form-field  frm_required_field frm_top_container">
                <label for="field_vh4rb" id="field_vh4rb_label" class="frm_primary_label">Name
                    <span class="frm_required" aria-hidden="true">*</span>
                </label>
                <input type="text" id="user_name" name="user_name" value="" data-reqmsg="This field cannot be blank." aria-required="true" data-invmsg="Text is invalid" aria-invalid="false">
                
                
            </div>            
            <div id="frm_field_385_container" class="frm_form_field form-field  frm_required_field frm_top_container">
                <label for="field_forgv" id="field_forgv_label" class="frm_primary_label">Email
                    <span class="frm_required" aria-hidden="true">*</span>
                </label>
                <input type="email" id="email" name="email" value="" data-reqmsg="This field cannot be blank." aria-required="true" data-invmsg="Email is invalid" aria-invalid="false">
                
                
            </div>
            
            <div class="frm_submit">
            <button class="frm_button_submit frm_final_submit" type="submit" formnovalidate="formnovalidate" onClick="submitData();">Submit Learning Mode and Complete Order Now</button>
            <button type="submit" name="frm_prev_page" formnovalidate="formnovalidate" class="frm_prev_page"  onClick="move(last_previous,'previous');">Previous</button>
            
            
            </div>
             <!--//Content-->
           </div>
        </div>
        <div class="row page_v">
           <div class="col">
              <h3>Process has been completed successfully</h3>
           </div>
        </div>   
        
        
   </div> 
</div>
</div>