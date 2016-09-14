
$('.animated').appear();

$(document.body).on('appear', '.fade', function() {
  $(this).each(function(){ $(this).addClass('ae-animation-fade') });
});
$(document.body).on('appear', '.slide', function() {
  $(this).each(function(){ $(this).addClass('ae-animation-slide') });
});
$(document.body).on('appear', '.hatch', function() {
  $(this).each(function(){ $(this).addClass('ae-animation-hatch') });
});
$(document.body).on('appear', '.entrance', function() {
  $(this).each(function(){ $(this).addClass('ae-animation-entrance') });
});
