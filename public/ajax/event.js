$(document).ready(function(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

  $("#is_relay").change(function(){
    var is_relay = $("#is_relay").val();

    if (is_relay == 1) {
      $("#classification").addClass('hidden');
    }else {
      $("#classification").removeClass('hidden');
    }

    $.ajax({
    	type: "POST",
    	url: "/event/is_relay",
    	data: {
    		is_relay : $("#is_relay").val(),
    		_token: CSRF_TOKEN
    	},
    	dataType: "json",
    	beforeSend: function(e) {
    		if(e && e.overrideMimeType) {
    			e.overrideMimeType("application/json;charset=UTF-8");
    		}
    	},
    	success: function(response){
        // alert(response.race_number_option);
        $("#race_number").html(response.race_number_option);
    	},
    	error: function (xhr, ajaxOptions, thrownError) {
    		alert(thrownError);
    	}
    });
  });

});
