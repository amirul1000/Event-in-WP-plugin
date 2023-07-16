// JavaScript Document
var jq = jQuery.noConflict();
var last_previous = 4;
var  learning_mode_type =''; 
var join_class_date ='';
var join_class_condition ='';
var start_time='';
var start_time_condition='';
var schedule_id=-1;
function move(i,move_type) {
	 total= 5;
     //Your Learning Mode
	 jq('input[name=radio_choice]').each(function() {
	   if (jq(this).is(":checked")) {
		    learning_mode_type = jq(this).attr('value');
			if(learning_mode_type =="Join Scheduled Class"){
				total= 5;
				last_previous = 4;
			}
			else if(learning_mode_type =="Start Now Self Paced (with Coaching)"){
				total= 3;
				last_previous = 2;
			} 
	   }
	});
	if(learning_mode_type ==''&&i==3)
	{
	  alert("You need to choice Choose Your Learning Mode to move next");
	  return false;
	}
	//
	//Join a Class
	if(i==4){
		 jq('input[name=join_class_date]').each(function() {
		  if (jq(this).is(":checked")) {
					join_class_date = jq(this).attr('value');
					schedule_id = jq(this).attr('meta-id');
			   }
			});
			
		 jq('input[name=join_class_condition]').each(function() {
		  if (jq(this).is(":checked")) {
					join_class_condition = jq(this).attr('value');
			   }
			});	
			
		if(join_class_date==''){
		  alert("Schedule is a required field");
		  return false;	
		}	
			
		if(join_class_condition==''){
		  alert("Condition is a required field");
		  return false;	
		}
		load_time();
		
	}
	
	
	if(i==5){
		 jq('input[name=start_time]').each(function() {
		  if (jq(this).is(":checked")) {
					start_time = jq(this).attr('value');
			   }
			});
			
		 jq('input[name=start_time_condition]').each(function() {
		  if (jq(this).is(":checked")) {
					start_time_condition = jq(this).attr('value');
			   }
			});	
			
		if(start_time==''){
		  alert("Time is a required field");
		  return false;	
		}	
			
		if(start_time_condition==''){
		  alert("Condition is a required field");
		  return false;	
		}
		
	}
	//
	
	if(i==1&&move_type=='previous'){
	   i=0;
	   show(1);
	}
	else{
		show(i);
	}
	
	var elem = document.getElementById("myBar");
	var width = i*100/total;
	elem.style.width = width + "%";
	
	
}

function show(page)
{
	page = page-1;
	
	
	var elements = document.getElementsByClassName('page_v');
	
	if(total==3 && page==2){
		page = 4;
	}
	
	 for(i=0;i<elements.length;i++){
		 if(page==i){
			  elements[i].style.display="block";
		 }
		 else{
			 elements[i].style.display="none";
		 }
	 }
	
   	
}

function load_time(){
   id = jq("#id").val();
	
	 var data = {  
					id : schedule_id
				};
		
	jq.post(load_time_url,
		   data, 
		   function(response) {
						arr = JSON.parse(response);
						html = '<ul class="list-group">';
						for(i=0;i<arr.length;i++){
							
							html += ' <li class="list-group-item">'+
										 '<input type="radio" name="start_time"  id="start_time" value="'+arr[i]+'">'+arr[i]+
									 '</li>';
							
						}
						html += '<ul>';
						
						jq("#div_time").html(html);
				 });
}

function submitData(){
	 var data = {  
					schedule_id : schedule_id,
					learning_mode_type:learning_mode_type,
					join_class_date:join_class_date,
					join_class_condition:join_class_condition,
					start_time:start_time,
					start_time_condition:start_time_condition,
					user_name:jq("#user_name").val(),
					email:jq("#email").val()
				};
		
	jq.post(save_data_url,
		   data, 
		   function(response) {
						obj = JSON.parse(response);
						if(obj.status=='success'){
						  
						  var elements = document.getElementsByClassName('page_v');
						  for(i=0;i<elements.length;i++){
							 if(i==5){
								  elements[i].style.display="block";
							 }
							 else{
								 elements[i].style.display="none";
							 }
						  }
						  
						  alert(obj.msg);
						  
						  
						  
						  
						}
				 });
}