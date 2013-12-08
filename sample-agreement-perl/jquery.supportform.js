	$(document).ready(
		function (){
			
			// bind the recalc function to the quantity fields
			$("input[name^=qty_item_]").bind("keyup", recalc);
			// run the calculation function now
			recalc();

			// automatically update the "#totalSum" field every time
			// the values are changes via the keyup event
			$("input[name^=sum]").sum("keyup", "#totalSum");
			
			// automatically update the "#totalAvg" field every time
			// the values are changes via the keyup event
			$("input[name^=avg]").avg({
				bind:"keyup"
				, selector: "#totalAvg"
				// if an invalid character is found, change the background color
				, onParseError: function(){
					this.css("backgroundColor", "#cc0000")
				}
				// if the error has been cleared, reset the bgcolor
				, onParseClear: function (){
					this.css("backgroundColor", "");
				}
			});

			// automatically update the "#minNumber" field every time
			// the values are changes via the keyup event
			$("input[name^=min]").min("keyup", "#numberMin");

			// automatically update the "#minNumber" field every time
			// the values are changes via the keyup event
			$("input[name^=max]").max("keyup", {
				selector: "#numberMax"
				, oncalc: function (value, options){
					// you can use this to format the value
					$(options.selector).val(value);
				}
			});

			// this calculates the sum for some text nodes
			$("#idTotalTextSum").click(
				function (){
					// get the sum of the elements
					var sum = $(".textSum").sum();

					// update the total
					$("#totalTextSum").text("$" + sum.toString());
				}
			);

			// this calculates the average for some text nodes
			$("#idTotalTextAvg").click(
				function (){
					// get the average of the elements
					var avg = $(".textAvg").avg();

					// update the total
					$("#totalTextAvg").text(avg.toString());
				}
			);
			
		}
	);
	

	
	function recalc(){
		$("[id^=total_item]").calc(
			// the equation to use for the calculation
			"qty * price",
			// define the variables used in the equation, these can be a jQuery object
			{
				qty: $("input[name^=qty_item_]"),
				price: $("[id^=price_item_]")
			},
			// define the formatting callback, the results of the calculation are passed to this function
			function (s){
				// return the number as a dollar amount
				return "$" + s.toFixed(2);
			},
			// define the finish callback, this runs after the calculation has been complete
			function ($this){
				// sum the total of the $("[id^=total_item]") selector
				var sum = $this.sum();
				var percentage = $("#billAnnually").val();
				
				$("#grandTotal").val(
					// round the results to 2 digits
					"$" + sum.toFixed(2)
				);
				$("#annuallyTotal").val(
					// round the results to 2 digits
					"$" + (sum * percentage * 12).toFixed(2)
				);

			}
		);

		// $("#annuallyTotal").hide();
		$("#billAnnually").click(function(){
			// If checked
			if ($("#billAnnually").is(":checked")) {
				//show the hidden input
				// $("#annuallyTotal").show();
				$("#annuallyTotal, #annually_total_label").addClass("showtheannually");
				
				// recalc();
				
				// alert('SHOW');
			} else {      
				//otherwise, hide it 
				// $("#annuallyTotal").hide();
				$("#annuallyTotal, #annually_total_label").removeClass("showtheannually");
				// recalc();
				
				// alert('HIDE');
		
			};
		});



		$("#returning_customer").click(function() {
			// If checked
			if ($("#returning_customer").is(":checked"))	{
				$('.returner').toggle('slow');
				// $('.returner').fadeOut("slow");
			} else {
				$('.returner').toggle('slow');
				// $('.returner').fadeIn("slow");
			}
		});
		
		
		// Works
		// $('.advanced_ops').addClass("adv_close_section");
		$('#iwantadvanced').toggle(function() {
			$('#iwantadvanced').addClass("adv_open_section");
			$('#advanced_ops_one, #advanced_ops_two').removeClass("adv_close_section");
		}, function() {
			$('#iwantadvanced').removeClass("adv_open_section");
			// $('#qty_item_4, qty_item_5').val("");
			$('#advanced_ops_one, #advanced_ops_two').addClass("adv_close_section");
		});


		// Animates but funky
		// $('.advanced_ops').addClass("adv_close_section");
		// $('#iwantadvanced').toggle(function() {
		// 	$('#iwantadvanced').addClass('adv_open_section');
		// 	$('.advanced_ops').removeClass('adv_close_section', 200);
		// }, function() {
		// 	$('#iwantadvanced').removeClass('adv_open_section');
		// 	$('.advanced_ops').addClass('adv_close_section', 200);
		// });



		// $('#billAnnually').toggle(
		//         	function() {
		//             	$('#annuallyTotal').show('fast');
		// 		// recalc();
		//         	},
		//         	function() {
		//             	$('#annuallyTotal').hide('fast');
		//         	}
		//     	);




	}
