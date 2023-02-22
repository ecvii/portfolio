


// custome functions
$(document).ready(function () {
	'use strict';

   	var base_url = $('#txt_base_url').val();		
	
	   // contact form
	 $('#frm_contact').validate({
		
	      errorPlacement: function(error, element) {
			 error.insertAfter(element.parent());
		  }, 
		
		  rules: {
			txt_name: {
			minlength: 2,
			required: true
		   },
		   txt_email: {
			required: true,
			email: true,
		   },
		   txt_message: {
			minlength: 2,
			required: true
		   },
		  
		  },
		  
		   messages: {
			txt_name: "",
			txt_email: "",
			txt_message: ""
			},
			
		  
		  submitHandler: function( form ) {
			   
				$.ajax({
					url :  base_url + 'front/contact_message',
					data : $('#frm_contact').serialize(),
					type: "POST",
					success : function(data){
						if(data=='ok') {
							$('#show_msg').html("<div class='alert alert-success'>Message is Sent.</div>");
						} else {
						
							
						}
						
					}
				})
				return false;
			 }
		  
		 });  
		 
		 // blog comments
		 $('#frm_comments').validate({
		
			errorPlacement: function(error, element) {
			   error.insertAfter(element.parent());
			}, 
		  
			rules: {
			  txt_name: {
			  minlength: 2,
			  required: true
			 },
			 txt_email: {
			  required: true,
			  email: true,
			 },
			 txt_message: {
			  minlength: 2,
			  required: true
			 },
			
			},
			
			 messages: {
			  txt_name: "",
			  txt_email: "",
			  txt_message: ""
			  },
			  
			
			submitHandler: function( form ) {
				 
				  $.ajax({
					  url :  base_url + 'front/blog_comments',
					  data : $('#frm_comments').serialize(),
					  type: "POST",
					  success : function(data){
						  if(data=='ok') {
							  $('#show_msg').html("<div class='alert alert-success'>Comments are successfully Sent.</div>");
						  } else {
						  
							  
						  }
						  
					  }
				  })
				  return false;
			   }
			
		   });  

});