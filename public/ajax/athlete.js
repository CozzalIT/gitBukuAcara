$(document).ready(function(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

  $("#single1").change(function(){
    $.ajax({
    	type: "POST",
    	url: "/athlete/single1",
    	data: {
    		single1 : $("#single1").val(),
    		_token: CSRF_TOKEN
    	},
    	dataType: "json",
    	beforeSend: function(e) {
    		if(e && e.overrideMimeType) {
    			e.overrideMimeType("application/json;charset=UTF-8");
    		}
    	},
    	success: function(response){
        $("#single2").html(response.single2);
        $("#single3").html(response.single3);
    	},
    	error: function (xhr, ajaxOptions, thrownError) {
    		alert(thrownError);
    	}
    });
  });

  $("#single2").change(function(){
    $.ajax({
    	type: "POST",
    	url: "/athlete/single2",
    	data: {
        single1 : $("#single1").val(),
    		single2 : $("#single2").val(),
    		_token: CSRF_TOKEN
    	},
    	dataType: "json",
    	beforeSend: function(e) {
    		if(e && e.overrideMimeType) {
    			e.overrideMimeType("application/json;charset=UTF-8");
    		}
    	},
    	success: function(response){
        $("#single3").html(response.single3);
    	},
    	error: function (xhr, ajaxOptions, thrownError) {
    		alert(thrownError);
    	}
    });
  });

  $("#relay1").change(function(){
    $.ajax({
    	type: "POST",
    	url: "/athlete/relay1",
    	data: {
        relay1 : $("#relay1").val(),
    		_token: CSRF_TOKEN
    	},
    	dataType: "json",
    	beforeSend: function(e) {
    		if(e && e.overrideMimeType) {
    			e.overrideMimeType("application/json;charset=UTF-8");
    		}
    	},
    	success: function(response){
        $("#relay2").html(response.relay2);
    	},
    	error: function (xhr, ajaxOptions, thrownError) {
    		alert(thrownError);
    	}
    });
  });

});
