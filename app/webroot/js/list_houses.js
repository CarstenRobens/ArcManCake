$(document).ready(function(){
  $('#car-name').live('change', function() {
    if($(this).val().length != 0) {
      $.getJSON('/housetypes/get_houses_ajax',
                  {houseTypeId: $(this).val()},
                  function(Houses) {
                    if(carModels !== null) {
                      populateHouseList(Houses);
                    }
        });
      }
    });
});
 
function populateHouseList(Houses) {
  var options = '';
 
  $.each(Houses, function(index, House) {
    options += '<option value="' + index + '">' + House + '</option>';
  });
  $('#car-model-name').html(options);
  $('#car-models').show();
 
}