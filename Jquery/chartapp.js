$(document).ready(function(){
	$.ajax({
		url: "chartData.php",
		method: "GET",
		dataType: "json",
		success: function(data){
			console.log(data);
			var month = [];
			var totalPrice = [];
			
			
			
			for(var i in data){
				month.push(data[i].month);
				totalPrice.push(data[i].totalPrice);	
			}
			
			console.log(data[1]);
			
			var chartdata = {
				labels: month,
				datasets : [
					{
						label : 'Monthly Statistics',
						backgroundColor: '#344b4b',
						borderColor: 'rgba(200,200,200,1)',
						hoverBackgroundColor: 'rgba(200,200,200,1)',
						hoverBorderColor: 'rgba(200,200,200,1)',
						data: totalPrice
					}
				]
			};
			
			var ctx = $("#mycanvas");
			
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