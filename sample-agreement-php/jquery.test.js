

$(document).ready(function() { 



$('#PSHide').click(function() {


if ($(this).is(':checked')) {


$('tr.PSRow').hide();


}


else {


$('tr.PSRow').show();


}


});


});
