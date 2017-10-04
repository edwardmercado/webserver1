$(document).ready(function(){
	$.ajax({
		url: "chartDataYear.php",
		method: "GET",
		dataType: "json",
		success: function(data){
			console.log(data);
			var year = [];
			var totalPrice = [];
			
			
			
			for(var i in data){
				year.push(data[i].year);
				totalPrice.push(data[i].totalPrice);	
			}
			
			console.log(data[1]);
			
			var chartdata = {
				labels: year,
				datasets : [
					{
						label : 'Yearly Statistics',
						backgroundColor: '#344b4b',
						borderColor: 'rgba(200,200,200,1)',
						hoverBackgroundColor: 'rgba(200,200,200,1)',
						hoverBorderColor: 'rgba(200,200,200,1)',
						data: totalPrice
					}
				]
			};
			
			var ctx = $("#mycanvas2");
			
			var barGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
			
		},
		error: function(data){
			console.log(data);
			console.log("ayaw gumana");
		}
	});
});