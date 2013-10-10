function check_val(input) {
	$(input).val() != "" ? $(input).parent().addClass("has_value") : $(input).parent().removeClass("has_value");
}

$(document).ready(function(){
	$("#date").pickadate({
		today: '',
		clear: '',
		formatSubmit: 'yyyy/mm/dd',
		hiddenSuffix: '_submit_me'
	});
	$("#time").pickatime();

	$(".check_val").each(function(){
		check_val(this);
	}).on("keyup click blur focus change paste", function(){
		check_val(this);
	});

	$("input, select, textarea").each(function(){
		label = $(this).attr("placeholder");
		if(label) $(this).parent().append('<div class="label">'+label+'</div>');
	});
});