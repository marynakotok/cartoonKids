$(document).ready(function(){
$("#yesOrNo").change(function()
{
	if ($(this).is(":checked")) 
		    {
		    	$("#forFile").css("opacity", "1");
		    	$("#forFile").css("cursor", "pointer");
	            $("#file").prop("disabled", false);
	        } 
	        else 
		        {
		        	$("#forFile").css("opacity", "0");
		        	$("#forFile").css("cursor", "default");
		            $("#file").prop("disabled", true);
		        }
});	       
});
