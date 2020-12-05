
<!DOCTYPE html>

<html>
<head>
<title>Add your title here</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="css\style.css">

</head>

<body>
	<?php require 'resources/logger.php';?>

	<div class="oneTenth pageHead">true header</div>

	<div class="wrapper ninety" id="container">

		<div class="leftBar ninety" id="leftBar">
			left bar
		</div>

		<div class="mainBody ninety" id="body">
			<div class="header">
				<h3>Page Title</h3>
			</div> 
			
		</div>

	</div>
</body>	
</html>

<script type="text/javascript" src="js\helper.js"></script>
<script type="text/javascript">
	var button = document.getElementById('btn');
	var targetDiv = document.getElementById('body');

	docReady(function() {
    	let leftbar = document.getElementById('leftBar');
    	leftbar.setAttribute("class","leftBar full");

    	getRequest('resources/resultsRequest.php',
  			function(response){
  				
  				//console.log(response);
  				//tableOutput(response);
  				tableAlternative(response);
  				
  			},
  			function(response){
  				targetDiv.innerHTML = 'An error occurred during your request: ' +  response.status + ' ' + response.statusText;
  			},
  			null);


	});

 	
	function tableOutput(response)
	{
		let composition = "<table><tr><th>ID</th><th>TIME</th><th>LOCATION</th></tr>";
  				try{
  					let v = JSON.parse(response);
  					console.log(v);
  					
  					for(let i = 0; i < v.length; i++)
  					{  					
						let outDate = new Date(Date.parse(v[i][1]));
						
						composition += "<tr><td>"+v[i][0]+"</td><td>"+outDate.toString()+"</td><td>"+v[i][2]+"</td></tr>";
  					}
  				}catch(error)
  				{
  					console.log(error);
  				}
  				
		composition += "</table>";

		let carrierDiv = document.createElement("div");
		
		carrierDiv.style.width='100%';
		
		carrierDiv.innerHTML = composition;
		
		targetDiv.appendChild(carrierDiv);
	}

	function tableAlternative(response)
	{
		let tableOut = "";

		try{
			let data = JSON.parse(response);
			let header = ["ID", "TIME", "LOCATION"];
			tableOut = autoTabler(data,header);
		}catch(error)
		{
			console.log(error);
		}

		targetDiv.appendChild(tableOut);
	}
	
	function autoTabler(data, headerAry)
	{	
		headerAry = (typeof headerAry === 'undefined' || headerAry.length !== data[0].length) ? 'default' : headerAry;
		//create table parent
		let table = document.createElement("table");

		if(headerAry !== 'default')
		{
			let headerRow = document.createElement("tr");
			for(let i=0; i<headerAry.length; i++)
			{
				let headerTh = document.createElement("th");
				headerTh.innerText = headerAry[i];
				headerRow.appendChild(headerTh);
			}	
			headerRow.id = "headerRow;"		
			table.appendChild(headerRow);
		}


		for(let i=0; i<data.length; i++)
		{
			let row = document.createElement("tr");
			for(let j = 0; j<data[i].length; j++)
			{
				let bodyTd = document.createElement("td");
				bodyTd.innerText = data[i][j];
				row.appendChild(bodyTd);
			}
			row.classList.add("tableBodyRow");
			row.id=data[i][0];
			table.appendChild(row);
		}
		return table;
	}
	
	function updateTableData(){}	
	function updateTable(response)
	{
		let tableOut = "";
		try
		{
			let data = JSON.parse(response);
			tableOut = updateParser(data);

		}
		catch(error)
		{
			console.log(error);
		}
	}
	function updateParser(data)
	{

	}


</script>