/**
 * custom_function ()
 * all custom functions
 */
$(function(){		
	var x = 1;
	$(document).on('click', '.def-add-btn', function(e)	{
		var max_fields = 5;
		
		e.preventDefault();
		
		if(x < max_fields){
			x++;
			
			var controlForm = $(this).parents('.controls .append_section:first'),
				currentEntry = $(this).parents('.entry:first'),
				newEntry = $(currentEntry.clone()).appendTo(controlForm);

			newEntry.find('input, select').val('');
			controlForm.find('.entry:first a').remove();
			
			controlForm.find('.entry:not(:last) a').empty().append('<i style="font-size:25px;color:#da1818 ;" class="fa fa-remove def-remove-btn" data-toggle="tooltip" data-placement="top" title="Remove"></i>');
			
			controlForm.find('.entry:last a').empty().append('<i style="font-size:25px;color:#da1818 ;" class="fa fa-remove def-remove-btn" data-toggle="tooltip" data-placement="top" title="Remove"></i>&nbsp;<i style="font-size:25px;color:#26b99a;" class="fa fa-plus def-add-btn" data-toggle="tooltip" data-placement="top" title="Add"></i>');
			
			
		}		
		tooltip();
		datepicker_call();
			
	}).on('click', '.def-remove-btn', function(e){
		var controlForm = $(this).parents('.controls .append_section:first');			
		
		if ( $( this ).is( ".entry:last .def-remove-btn" ) ){
			controlForm.find('.entry:nth-last-child(2) a ').empty().append('<i style="font-size:25px;color:#da1818 ;" class="fa fa-remove def-remove-btn" data-toggle="tooltip" data-placement="top" title="Remove"></i>&nbsp;<i style="font-size:25px;color:#26b99a;" class="fa fa-plus def-add-btn" data-toggle="tooltip" data-placement="top" title="Add"></i>');
			
			$(this).parents('.entry:first').remove();
			
			controlForm.find('.entry:first .def-remove-btn'); 
		}else{
			$(this).parents('.entry:first').remove();
		}
		
		x--;

		e.preventDefault();
		tooltip();
		return false;
	});
});


$(document).ready(function(){
	datepicker_call();
	tooltip();	
});

/********* tooltip function *********/
function tooltip(){
	$('[data-toggle="tooltip"]').tooltip();
}
/********** commn date-picker call on input with class '.date-picker' ************/
function datepicker_call(){
	/************ datepicker ************/
	var date_input=$('.date-picker'); //our date input has the name "date"
	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	date_input.datepicker({
		format: 'mm/dd/yyyy',
		container: container,
		todayHighlight: true,
		autoclose: true,
		orientation: "auto",
	});
}







