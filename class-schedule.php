<?php
  global $wpdb;
  $sql = "SELECT COUNT(wp_booking.id) as total,wp_schedule.* FROM wp_booking LEFT JOIN wp_schedule ON(wp_booking.schedule_id = wp_schedule.id) 
						     WHERE wp_schedule.status = 'active' 
							 GROUP BY  wp_schedule.id ";
  $result = $wpdb->get_results($sql);

?>
<div class="container">
    <div class="row">
      <div class="col extra-class" >
      
      </div>
      <div class="col-6" style="margin-top: 5%;">
        <!--Start here-->
            <div class="main-area">
                <div class="heading">
                    <h2>Upcoming Windows</h2>
                </div>
                <div class="single-element">
                
                   <?php
				     for($i=0;$i<count($result);$i++){
						 $total_no_of_seat = $result[$i]->total_no_of_seat;
						 
						 $schedule_date_from = date("F j",strtotime($result[$i]->schedule_date_from));
				         $schedule_date_to = date("F j",strtotime($result[$i]->schedule_date_to));
				   ?>
                
                    <div class="border-area">
                        <p><?=$schedule_date_from?> - <?=$schedule_date_to?></p>
                        <p style="color: #1fd1d7; font-weight: bold;"> 
                        <?php
                      
                        
                        
                       
                         $count_result = $result[$i]->total;

                         $more_to_lock = $total_no_of_seat- $count_result;

                         if($more_to_lock<=0){
                            echo $total_no_of_seat;
                         }else{
                        echo $count_result;
                         }
                      

                        
                        ?> Registered
                        </p>
                        <p style="color: #C3C6C8;"><?php 
                        
                           
                        
                             
                             if($more_to_lock<=0){
                                 ?>
                                     <p style="margin-right: 3%;"> Schedule locked</p>
                        <p ><i class="fa-regular fa-square-check"></i></p>
                                 <?php

                             }else{

                                echo $more_to_lock;
                        ?>
                        
                        
                        More to Lock</p>
                        <p style="margin-left: 3%;"><i class="fa-solid fa-x"></i></p>

                        <?php
                             }
                        ?>     
                        
                    </div>
                    <?php
					 }
					 ?> 
                    <!--
                    <div class="border-area">
                        <p>May 29 - August 21</p>
                        <p style="color: #1fd1d7; font-weight: bold;"> 6 Registered</p>
                        <p style="margin-right: 3%;"> Schedule locked</p>
                        <p ><i class="fa-regular fa-square-check"></i></p>
                    </div>
                
                    <div class="border-area">
                        <p></p>
                        <p style="color: #1fd1d7; font-weight: bold; height: 17px;"> </p>
                        <p></p>
       
                </div>

                        <div class="border-area">
                            <p></p>
                            <p style="color: #1fd1d7; font-weight: bold; height: 17px;"> </p>
                            <p></p>
           
                    </div>
                </div>-->
                <div class="heading">
                    <h2>
                        Your Selection
                    </h2>
                </div>

                <div class="single-element">
                    <div class="footer1">
                        <div class="border-area footer-area">
                            <p style="color: #C3C6C8;">May 29 - August 21</p>
                            <p style="color: #C3C6C8;" font-weight: bold;">Flexible</p>
                            <p style="color: black; font-weight: bold;">Change Selection</p>
                        </div>
                    </div>

                </div>



 
                <div></div>
            </div>

        <!--End here-->

      </div>
      <div class="col extra-class">
      </div>
    </div>
    </div>
  </div>

<style>
.bb-grid {
    display:block !important;
}


p {
    margin-top: 6px;
}


i.fa-regular.fa-square-check {
    font-size: 24px;
}

.footer1 .footer-area{
    margin-top: 5%;
}
.single-element
{
    padding-left: 7%;
    padding-right: 7%;
}

.border-area p{
    margin-right: 5%;
    font-size: 16px;
    font-weight: 600;
}

    .border-area{
        margin-top: 2%;
        padding-top: 2%;
        padding-left:13%;
        border-radius: 5px;
        border: 1px solid #78d5d8;
        background: #EFF7FB;
        display: flex;
    }
    .heading h2{
        font-size: 27px;
        text-align: center;
        color: #1fd1d7;
        padding: 2% 0%;
    }
.main-area{
 border-radius: 7px;
    box-shadow: 0px 3px 25px #C3C6C8;

    padding-bottom: 7%;
}

.col-6 {
    width: 61% !important;
}
/*Start here to responsive */

@media only screen and (max-width: 600px) {

    .border-area p {
    margin-right: 4%;
    font-size: 16px;
    font-weight: 600;
}

    i.fa-solid.fa-x {
        font-size: 11px;
    }



    .border-area p{
        font-size: 12px;
    }
 .extra-class{
    display: none;
 }
.col-6 {
    width: 100% !important;
}
  }

  i.fa-solid.fa-x {
    border: 1px solid;
    margin-top: 0px;
    margin-left: -17px;
    padding: 3px;
    font-size: 14px;
    / font-weight: bolder; /
}





/*End  here to responsive */






</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">




