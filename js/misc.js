function check_val(input) {
    $(input).val() != "" ? $(input).parent().addClass("has_value") : $(input).parent().removeClass("has_value");
}

var dropZoneTimer;
$(document).ready(function(){
    
    $('#my_account').click(function(e){
        e.preventDefault();
        $.ajax({
            url:'/auth/is_logged_in',
            dataType:'json',
            type:'POST',
            success:function(response){
                if(response.is_logged_in == true){
                    window.location.href = '/my/account/';
                } else {
                    var faux_login = confirm(' a neat login / register modal will pop up here\nClick OK to pretend to login.');
                    if(faux_login){
                    window.location.href = '/my/account/';    
                    }
                }
            }
        })
    });
    
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
        errorClass: "has_error"
    });

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

        $("#"+which).toggleClass("not_visible").slideToggle();
		
        if($("#"+which).hasClass("not_visible")) {
            $("#"+which).find("[required='required']").addClass("was_required");

            $("#"+which+" .was_required").each(function(){
                id = $(this).attr("id");
                $("form").parsley('removeItem','#'+id);
            });

            $("#"+which).next().find(".check_val:first").focus();
        } else {
            $("#"+which).find(".check_val:first").focus();

            $("#"+which+" .was_required").each(function(){
                id = $(this).attr("id");
                $("form").parsley('addItem','#'+id);
            });

            $("#"+which).find("[required='required']").removeClass("was_required");
        }
    });
});