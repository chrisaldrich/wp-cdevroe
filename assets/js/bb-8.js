$(document).ready(function(){
  var status_title = $('[data-barley="status_title"]'),
      status_body = $('[data-barley="status_body"]');

  // Every key up, swap values
  $(status_body).on('keyup',function(e){
    $(status_title).text($(this).text());
  });

});
