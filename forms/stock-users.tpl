<script >
	function addStock(fname,numUser)
	{	
		var xmlHttpRequest = null;
		if (window.XMLHttpRequest)
		  xmlHttpRequest = new window.XMLHttpRequest();
		else
		  xmlHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
		
	var fform=document.forms[fname];
	var usr='numuser='+numUser;
	for(var i=1; i<=numUser;i++)
	{
		usr+='&valuekeeper'+i+'='+fform.elements['storekeeper'+i].value+'&storekeeper'+
				i+'='+fform.elements['storekeeper'+i].checked;
	}

	var body = 	usr+'&'+fname+'=1';
	xmlHttpRequest.open("POST", "../engine/POpopup.php", false);//
	xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlHttpRequest.send(body);//
	document.getElementById('workspace').innerHTML=xmlHttpRequest.responseText;
	//alert(body);
	}

</script>
<div id="workspace">
</div>
users<->stock

<form name="fUserStock">
<table>
	<thead>
		<tr>
			<th>user\stock</th>
			<th>stock1</th>
			<th>stock2</th>
			<th>stock3</th>
			<th>stock4</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>user1</td>
			<td><input type="checkbox" id='storekeeper1' name='storekeeper1' value='01:1'></td>
			<td><input type="checkbox" id='storekeeper2' name='storekeeper2' value='01:2'></td>
			<td><input type="checkbox" id='storekeeper3' name='storekeeper3' value='01:3'></td>
			<td><input type="checkbox" id='storekeeper4' name='storekeeper4' value='01:4'></td>
		</tr>
		<tr>
			<td>user2</td>
			<td><input type="checkbox" id='storekeeper5' name='storekeeper5' value='02:1'></td>
			<td><input type="checkbox" id='storekeeper6' name='storekeeper6' value='02:2'></td>
			<td><input type="checkbox" id='storekeeper7' name='storekeeper7' value='02:3'></td>
			<td><input type="checkbox" id='storekeeper8' name='storekeeper8' value='02:4'></td>		
		</tr>
		<tr>
			<td>user3</td>
			<td><input type="checkbox" id='storekeeper9' name='storekeeper9' value='03:1'></td>
			<td><input type="checkbox" id='storekeeper10' name='storekeeper10' value='03:2'></td>
			<td><input type="checkbox" id='storekeeper11' name='storekeeper11' value='03:3'></td>
			<td><input type="checkbox" id='storekeeper12' name='storekeeper12' value='03:4'></td>		
		</tr>
		<tr>
			<td>user4</td>
			<td><input type="checkbox" id='storekeeper13' name='storekeeper13' value='04:1'></td>
			<td><input type="checkbox" id='storekeeper14' name='storekeeper14' value='04:2'></td>
			<td><input type="checkbox" id='storekeeper15' name='storekeeper15' value='04:3'></td>
			<td><input type="checkbox" id='storekeeper16' name='storekeeper16' value='04:4'></td>		
		</tr>
		<tr>
			<td>user5</td>
			<td><input type="checkbox" id='storekeeper17' name='storekeeper17' value='05:1'></td>
			<td><input type="checkbox" id='storekeeper18' name='storekeeper18' value='05:2'></td>
			<td><input type="checkbox" id='storekeeper19' name='storekeeper19' value='05:3'></td>
			<td><input type="checkbox" id='storekeeper20' name='storekeeper20' value='05:4'></td>		
		</tr>
	<tbody>
</table>
<input type='button' onclick='addStock("fUserStock",20)' value='Add'>
</form>