<?php
	/*
	Plugin Name: Learning Mode
	Plugin URI: 
	Description: Learning Mode Form Save
	Version: 1.1
	Author: 
	Author URI: 
	License: GPL
	*/
	
	$PLUGIN_URL_LM = plugin_dir_url(__FILE__);
	define('PLUGIN_URL_LM',substr($PLUGIN_URL_LM,0,strlen($PLUGIN_URL_LM)-1));

    //short code Learning Mode Form
	function learning_mode_form_sort_code_func( $atts ) {
		include_once dirname(__FILE__) . '/template/learning_mode_form.php';
	}
	add_shortcode( 'learning-mode-form', 'learning_mode_form_sort_code_func' );
	
	function sc_for_class(){
		include_once dirname(__FILE__) . '/class-schedule.php';
	}
	add_shortcode ('sc-class', 'sc_for_class');
	
	//Admin		
	add_action('admin_menu', 'learning_mode_manage');
	function learning_mode_manage(){
	  add_menu_page('Learning Mode', 'Learning Mode', 'manage_options', 'theme-options', 'wps_theme_func');
	  add_submenu_page( 'theme-options', 'Schedule', 'Schedule', 'manage_options', 'schedule', 'schedule_func');
	  add_submenu_page( 'theme-options', 'Booking', 'Booking', 'manage_options', 'booking', 'booking_func');
	}
	 

	function schedule_func(){
		 include_once dirname(__FILE__) . '/admin_schedule.php';   
	}
	function booking_func(){
		include_once dirname(__FILE__) . '/admin_booking.php';   
	}
		
	