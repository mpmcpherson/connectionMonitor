
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
	
	//build table
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
	

	function updateTableData()
	{
		/*
		var list = document.querySelector('#test-list');

		[...list.children]
		  .sort((a,b)=>a.innerText>b.innerText?1:-1)
		  .forEach(node=>list.appendChild(node));
		*/
		//get ids
		//get highest ids
		//send getRequest to pull all IDs greater than the current highest

	}	
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
		//do the appends to the head of the table, either by doing it just after the header, or prepending to the highest ID

	}
	function updateParser(data)
	{//do the actual row generation

		let updateAry = new Array();
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
			updateAry.push(row);
		}
	}


</script>