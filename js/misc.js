function check_val(input) {
	$(input).val() != "" ? $(input).addClass("has_value") : $(input).removeClass("has_value");
}

$(document).ready(function(){
	$("#date").pickadate({
		today: '',
		clear: ''
	});
	$("#time").pickatime();

	$(".check_val").each(function(){
		check_val(this);
	}).on("keyup click blur focus change paste", function(){
		check_val(this);
	});

	$("input, select, textarea").each(function(){
		label = $(this).attr("placeholder");
		$(this).parent().append('<div class="label">'+label+'</div>');
	});
});