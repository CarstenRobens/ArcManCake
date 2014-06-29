$(document).ready(function(){
  	$('#housetypes_name').live('change', function() {
    if($(this).val().length != 0) {
      $.getJSON('/cakearchitect/housetypes/get_houses_ajax',
                  {houseTypeId: $(this).val()},
                  function(Houses) {
                    if(Houses !== null) {
                      populateHouseList(Houses);
                    }
					
        });
      }else{
		$('#houses').hide();
	  }
    });
});
 
function populateHouseList(Houses) {
  var options = '';
 
  $.each(Houses, function(index, House) {
    options += '<option value="' + index + '">' + House + '</option>';
  });
  $('#houses_name').html(options);
  $('#houses').show();
 
}