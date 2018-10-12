$(document).ready(function(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

  var seri1 = {
    lintasan1:0,
    lintasan2:0,
    lintasan3:0,
    lintasan4:0,
    lintasan5:0,
    lintasan6:0,
    lintasan7:0,
    lintasan8:0
  };

  $(".seri1").change(function(){
    var track = this.name;
    var tmp = track.split("_");
    var track = tmp[1];
    var id = this.value;

    switch(track) {
      case "1":
        seri1.lintasan1 = id;
        $(".lintasan1").removeClass('seri1');
        break;
      case "2":
        seri1.lintasan2 = id;
        $(".lintasan2").removeClass('seri1');
        break;
      case "3":
        seri1.lintasan3 = id;
        break;
      case "4":
        seri1.lintasan4 = id;
        break;
      case "5":
        seri1.lintasan5 = id;
        break;
      case "6":
        seri1.lintasan6 = id;
        break;
      case "7":
        seri1.lintasan7 = id;
        break;
      case "8":
        seri1.lintasan8 = id;
        break;
    }

    // $.ajax({
    // 	type: "POST",
    // 	url: "/event/filter/selectTrack",
    // 	data: {
    //     classification_id : $('#classification_id').val(),
    //     race_number_id : $('#race_number_id').val(),
    //     gender : $('#gender').val(),
    //     seri1Lintasan1 : seri1.lintasan1,
    // 		_token: CSRF_TOKEN
    // 	},
    // 	dataType: "json",
    // 	beforeSend: function(e) {
    // 		if(e && e.overrideMimeType) {
    // 			e.overrideMimeType("application/json;charset=UTF-8");
    // 		}
    // 	},
    // 	success: function(response){
    //     $(".lintasan1").html(response.track1);
    //     $(".lintasan2").html(response.track2);
    // 	},
    // 	error: function (xhr, ajaxOptions, thrownError) {
    // 		alert(thrownError);
    // 	}
    // });

  });
});
