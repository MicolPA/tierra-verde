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


function calculate(count, field){

	n = $("."+field).val();
	n = parseFloat(n) + parseFloat(count);
    // console.log(n);
	if (n < 0) {
		n = 0;
	}
	$("."+field).val(n);
    // console.log(n);
	calculatePricing(n, field, count);

}

function calculatePricing(count, type, last_c){

	package = $(".package").val();

	$.ajax({
        url: "/tour/frontend/web/admin/calculate-payment",
        type: 'get',
        dataType: 'json',
        data: {
            package: package,
            count: count,
            _csrf: '<?=Yii::$app->request->getCsrfToken()?>'
        },
        success: function (data) {
            console.log(data);

            if (data) {
            	if (type == 'children') {
            		amount = count * data.kids_amount;
                    last_amount = $(".amount_childen_input").val();
            		if (count > 0) {
            			$(".children_amount").html($(".children").val() + "x" + data.kids_amount);
            		}else{
            			$(".children_amount").html(0);
            		}
                    // amount = calculateLastAmount(last_c, last_amount, amount);
                    $(".amount_childen_input").val(amount);
                    amount = amount + parseFloat($(".amount_adults_input").val());

            	}else{
                    last_amount = $(".amount_adults_input").val();
            		amount = count * data.adults_amount;
            		if (count > 0) {
            			$(".adults_amount").html($(".adults").val() + "x" + data.adults_amount);
            		}else{
            			$(".adults_amount").html(0);
            		}
                    // amount = calculateLastAmount(last_c, last_amount, amount);
                    $(".amount_adults_input").val(amount);
                    amount = amount + parseFloat($(".amount_childen_input").val());
            	}

            	// console.log(last_amount);
            	amount = formatNumber(amount);
            	$(".amount").html("$"+amount);

            }
            
            
            //$('#circ_id').append('<option value="">Todos</option>');
        }, error: function (xhr, ajaxOptions, thrownError){
            	console.log(thrownError);
            	console.log(xhr);
            	console.log(ajaxOptions);
            }
    });

}

function calculateLastAmount(last_c, last_amount, amount){

    if (last_c == -1) {
        amount = parseFloat(last_amount) - amount;
    }

    return amount;
}

function formatNumber(number){
	var value = (number).toLocaleString(
	  'en-US', // leave undefined to use the visitor's browser 
	             // locale or a string like 'en-US' to override it.
	  { minimumFractionDigits: 2 }
	);
	return value;
}
