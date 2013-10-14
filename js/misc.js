function check_val(input) {
	$(input).val() != "" ? $(input).parent().addClass("has_value") : $(input).parent().removeClass("has_value");
}

var dropZoneTimer;
$(document).ready(function(){
	$("#date").pickadate({
		today: '',
		clear: '',
		formatSubmit: 'yyyy/mm/dd',
		hiddenSuffix: '_submit_me'
	});
	
	$("#time").pickatime({
		clear: '',
		formatSubmit: 'HH:i',
		hiddenSuffix: '_submit_me'
	});

	$("form").parsley({
		successClass: "is_valid",
		errorClass: "has_error",
	});

	$(".validate").parsley("validate");

	$(".check_val").each(function(){
		check_val(this);
	}).on("keyup click blur focus change paste", function(){
		check_val(this);
	});

	$("input, select, textarea").each(function(){
		label = $(this).attr("placeholder");
		if(label) $(this).parent().append('<div class="label">'+label+'</div>');
	});

	$("[data-toggle]").on("click", function(e) {
		e.stopPropagation();
		which = $(this).attr("data-toggle");

		$("#"+which).slideToggle();
	});
}).on('drop dragleave dragend', function (event) {  
	dropZoneVisible = false;

	clearTimeout(dropZoneTimer);
		dropZoneTimer = setTimeout( function(){
		if(!dropZoneVisible) {
			$('#email_upload').show(); 
		} else {
			dropZoneVisible = false;
			$('#email_upload').hide(); 
		}
	}, 50);
});