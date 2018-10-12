$(document).ready(function(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

  $(".seri1").change(function(){
    var track = this.name;
    var tmp = track.split("_");
    var track = tmp[1];
    var id = this.value;
  });

});

//Alert close button
$(document).on('click', '.close-btn', function(){
  $(".alert").addClass('hidden');
});
