<script >
	function addStock(fname,numUser)
	{	
		var xmlHttpRequest = null;
		if (window.XMLHttpRequest)
		  xmlHttpRequest = new window.XMLHttpRequest();
		else
		  xmlHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
		
		var fform=document.forms[fname];
		var name=fform.elements["Name"].value;
		var desc=fform.elements["Description"].value;
		//var user=new Array();
	/*	var usr='&numuser='+numUser;
		for(var i=1; i<=numUser;i++)
		{
			usr+='&valuekeeper'+i+'='+fform.elements['storekeeper'+i].value+'&storekeeper'+i+'='+fform.elements['storekeeper'+i].checked;
		}*/
		var body = 	'name=' + encodeURIComponent(name) +
					'&desc="' + encodeURIComponent(desc) +'"'+'&'+fname+'=1';
		xmlHttpRequest.open("POST", "../engine/POpopup.php", false);//
		xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
		xmlHttpRequest.send(body);//
		document.getElementById('workspace').innerHTML=xmlHttpRequest.responseText;
		//alert(body);
	}
</script>

<div id="workspace">
</div>
Addstock
<form name="faddStock">
	stock name<br/>
	<input type='text' name='Name' id='Name' /><br/>
	description<br/>
	<textarea name='Description' id='Description'></textarea><br/>
	storekeeper
	<!--table>
		<tbody>
			[:USERS]
			<tr>
				<td>user1</td>
				<td><input type='checkbox' id='storekeeper1' name='storekeeper1' value='11'></td>
			</tr>
			<tr>
				<td>user2</td>
				<td><input type='checkbox' id='storekeeper2' name='storekeeper2' value='12'></td>
			</tr>
			<tr>
				<td>user3</td>
				<td><input type='checkbox' id='storekeeper3' name='storekeeper3' value='13'></td>
			</tr>
			<tr>
				<td>user4</td>
				<td><input type='checkbox' id='storekeeper4' name='storekeeper4' value='14'></td>
			</tr>
		</tbody>
	</table--->
	<input type='button' onclick='addStock("faddStock",[:NUMUSER])' value='Add'>
</form>