jQuery('input[type=file]').change(function(){
	console.log('aqui');
 	var filename = jQuery(this).val().split('\\').pop();
 	var idname = jQuery(this).attr('id');
 	console.log(jQuery(this));
 	console.log(filename);
 	console.log(idname);
 	jQuery('div.field-'+idname+' label').html("<span class='text-success'>CARGADA</span>");
 	// jQuery('div.field-'+idname+' label').attr("style", 'padding-left:1rem !important;padding-right: 1rem !important');
});