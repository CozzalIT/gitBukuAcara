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

  $(document).on('click', '#editRace', function(){
    var athleteId = $(this).data('id');
    var race_number_id1 = $(this).data('race_number_id1');
    var race_number_id2 = $(this).data('race_number_id2');
    var race_number_id3 = $(this).data('race_number_id3');
    var race_number_id4 = $(this).data('race_number_id4');
    var race_number_id5 = $(this).data('race_number_id5');

    $('#athleteId').val(athleteId);
    $.ajax({
    	type: "POST",
    	url: "/athlete/ajaxEditRace",
    	data: {
        race_number_id1 : race_number_id1,
        race_number_id2 : race_number_id2,
        race_number_id3 : race_number_id3,
        race_number_id4 : race_number_id4,
        race_number_id5 : race_number_id5,
    		_token: CSRF_TOKEN
    	},
    	dataType: "json",
    	beforeSend: function(e) {
    		if(e && e.overrideMimeType) {
    			e.overrideMimeType("application/json;charset=UTF-8");
    		}
    	},
    	success: function(response){
        $("#race_number1").html(response.race_number1);
        $("#race_number2").html(response.race_number2);
        $("#race_number3").html(response.race_number3);
        $("#race_number4").html(response.race_number4);
        $("#race_number5").html(response.race_number5);
    	},
    	error: function (xhr, ajaxOptions, thrownError) {
    		alert(thrownError);
    	}
    });

  });

  $(document).on('click', '#editAthlete', function(){
    var id = $(this).data('id');
    var name = $(this).data('name');
    var gender = $(this).data('gender');
    var city_id = $(this).data('city_id');
    var birth_date = $(this).data('birth_date');
    var classification_id = $(this).data('classification_id');

    $('#id').val(id);
    $('#editName').val(name);
    $('#editGender').val(gender);
    $('#editDateBirth').val(birth_date);

    $.ajax({
    	type: "POST",
    	url: "/athlete/ajaxEdit",
    	data: {
        athlete_id : id,
        city_id : city_id,
        classification_id : classification_id,
    		_token: CSRF_TOKEN
    	},
    	dataType: "json",
    	beforeSend: function(e) {
    		if(e && e.overrideMimeType) {
    			e.overrideMimeType("application/json;charset=UTF-8");
    		}
    	},
    	success: function(response){
        $("#editCity").html(response.city);
        $("#editClassification").html(response.classification);
    	},
    	error: function (xhr, ajaxOptions, thrownError) {
    		alert(thrownError);
    	}
    });
  });
});
