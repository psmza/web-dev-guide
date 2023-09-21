$(document).ready(function()
{
    submitForm();
});

// JavaScript for handling AJAX form submission and dynamic content loading

// Example AJAX function for form submission
function submitForm() {
    
	$(document).on('click','#btn_login',function(e)
    {
		console.log("Button clicked");
		// Gather form data
		//var formData = new FormData(document.getElementById('form_login'));
		var formData = {
		  username1: $("#username").val(),
		  password1: $("#password").val(),
		}; 
		console.log(formData);
		// Make an AJAX request to process_form.php
		$.ajax({
			type: 'POST',
			url: 'process_login.php',
			data: formData,
			//processData: false,
			//contentType: false,
			success: function(response) {
				// Handle the response from the server
				console.log(response);
                var data = JSON.parse(response);
				
                if (data.status === 'success') {
                    $('#message').html(data.html); // Set the message in the div
                } else {
                    $('#message').html(data.html); // Set the error message in the div
                }
			},
			error: function(error) {
				// Handle errors
				$('#message').html("Error");
			}
		});
	});
}
