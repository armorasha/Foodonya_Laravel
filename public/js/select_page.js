//Functions to validate the Select page, when submitted-------------------------


function qtyAddOne() 
 {	
	//----------------------------Add 1 in Quantity
	//document.getElementById("currentQty").value = "R";//works
	
	var currentQty = document.getElementById("currentQty").value;
	
	var intCurrentQty = parseInt(currentQty); //convert inputs to integer
	
	
	if (isNaN(currentQty)) // If non number inputted?
	{
		document.getElementById("currentQty").value = "1"; //Puts default qty
		//return false;
	}
	else if (intCurrentQty >9) //Pizza qty more than 10 not accepted
	{
		document.getElementById("currentQty").value = "10"; //Puts max qty
		window.alert("For larger quantities please call us to place order. Thanks.");
	}
	else
	{
		//var newQty = 0;
		var newQty = intCurrentQty + 1;
		document.getElementById("currentQty").value = newQty;
	}
	
 }	
	
	
function qtySubOne() 
 {	
	//----------------------------Subtract 1 in Quantity
	//document.getElementById("currentQty").value = "R";//works
	
	var currentQty = document.getElementById("currentQty").value;
	
	var intCurrentQty = parseInt(currentQty); //convert inputs to integer
	
	
	if (isNaN(currentQty)) // If non number inputted?
	{
		document.getElementById("currentQty").value = "1"; //Puts default qty
		//return false;
	}
	else if (intCurrentQty <1) //Pizza qty less than 1 not accepted
	{
		document.getElementById("currentQty").value = "0"; //Puts min qty
	}
	else
	{
		var newQty = intCurrentQty - 1;
		document.getElementById("currentQty").value = newQty;
	}
	
 }	
 
 function isQtyValid() 
 {	
	//----------------------------Validating Quantity
	var currentQty = document.getElementById("currentQty").value;
	
	var intCurrentQty = parseInt(currentQty); //convert input to integer
	//alert (intCurrentQty); 
  
  if ((intCurrentQty <= 0) || (!Number.isSafeInteger(intCurrentQty)))//Pizza qty <= 0 or NaN not accepted
	{
		alert ("Please check the quantity"); 
		return false;
	}
  
 }	
	
	
	
// End of this JavaScript file