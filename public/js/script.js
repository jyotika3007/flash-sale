
	$(document).ready(function(){

	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0');
	var yyyy = today.getFullYear();

	today = yyyy + '-' + mm + '-' + dd;
	$('#date_picker').attr('min',today);

	})


	$('#form').on('submit',function(e){


		let price = $('#price').val();

		let discount = $('#discount').val();

		let quantity = $('#quantity').val();

		let countError = 0;
		
		// alert("I am here");

		if(price == 0){
			$('.errorPrice').text('Price must be greater than 0');
			countError++;
		alert("Price");
		}
		else{
			$('.errorPrice').empty();        		
		}
		if(discount == 0){
			$('.errorDiscount').text('Discount Price should be greater than 0')
		alert("Discount");
			countError++;
		}
		else{
			$('.errorDiscount').empty();        		
		} 

		if(quantity == 0){
			$('.errorQuantity').text('Quantity must be greater than 0')
			countError++;
		alert("Quantity");
		}
		else{
			$('.errorQuantity').empty();        		
		}     		


		if(discount>price){
			$('.errorDiscount').text("Discount must me less than or equals to Price")
			countError++;
		alert("DP");
		}
		else{
			$('.errorDiscount').empty(); 
		}

		if(countError>0){
			alert(countError);
		e.preventDefault();
			return false;
		}
		else{
			return true;
		}

	});