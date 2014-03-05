$(document).ready(function() {
	//VALID EMAIL
	function IsValidEmail(email)
	{
			var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			return filter.test(email);
	}

	$("form").submit(function(){
		var check = true;
		
		if($(this).attr("id") != "search_form")
		{
			$("form input[type='text'].required, form textarea.required").each(function(){
			if($(this).val() == "") {
				$(this).css("border","1px solid #BF3232");
				
				if(check)
					check = false;
			}
			else 
				$(this).css("border","1px solid #CCC");
				
			if($(this).attr('id') == "email" && $(this).val() != "")
				if(!IsValidEmail($(this).val())) {
					$(this).css("border","1px solid #BF3232");
					
					if(check)
						check = false;
				}
				else 
					$(this).css("border","1px solid #CCC");
			
			});
		}
		return check;
	});
});