<script >
	function addStock(fname,numStock)
	{	
		var xmlHttpRequest = null;
		if (window.XMLHttpRequest)
		  xmlHttpRequest = new window.XMLHttpRequest();
		else
		  xmlHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
		
		var fform=document.forms[fname];
		var name=fform.elements["login"].value;
		var fstname=fform.elements["fstname"].value;
		var lname=fform.elements["lname"].value;
		var pswd=fform.elements["pswd"].value;	
		var mail=fform.elements["mail"].value;
		var phone=fform.elements["phone"].value;		
		var role=fform.elements["role"].value;	
		var desc=fform.elements["Description"].value;	
		var usr='&numStock='+numStock;

		for(var i=1; i<=numStock;i++)
		{
			usr+='&valuestock'+i+'='+fform.elements['store'+i].value+'&store'+i+'='+fform.elements['store'+i].checked;
		}
		var body = 	'login=' + encodeURIComponent(name) +
					'&fname=' + encodeURIComponent(fstname) +
					'&lname=' + encodeURIComponent(lname) +
					'&passwd=' + encodeURIComponent(pswd) +
					'&mail=' + encodeURIComponent(mail) +
					'&phone=' + encodeURIComponent(phone) +
					'&role=' + encodeURIComponent(role) +
					'&desc=' + encodeURIComponent(desc) +
					usr+
					'&'+fname+'=1';
		xmlHttpRequest.open("POST", "../engine/POpopup.php", false);//
		xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
		xmlHttpRequest.send(body);//
		document.getElementById('workspace').innerHTML=xmlHttpRequest.responseText;
//alert(body);			
	}

</script>

<div id="workspace">
</div>
addUser:
<form name="faddUser">
	login<br/>
	<input type='text' name='login' id='login' /><br/>
	firstname<br/>
	<input type='text' name='fstname' id='fstname' /><br/>
	lastname<br/>
	<input type='text' name='lname' id='lname' /><br/>
	passwd<br/>
	<input type='password' name='pswd' id='pswd' /><br/>
	email<br/>
	<input type='text' name='mail' id='mail' /><br/>
	phone<br/>
	<input type='text' name='phone' id='phone' /><br/>	
	role<br/>
	<select name='role' id='role'>
		[:ROLE]
			<!--option>manager</option>
			<option>store keeper</option-->
		</select><br/>
	description<br/><textarea name='Description' id='Description'></textarea><br/>
	stock
	<table>
		<tbody>
			[:STOCK]
			<!--tr>
				<td>stock1</td>
				<td><input type='checkbox' id='store1' name='store1' value='11'></td>
			</tr>
			<tr>
				<td>stock2</td>
				<td><input type='checkbox' id='store2' name='store2' value='12'></td>
			</tr>
			<tr>
				<td>stock3</td>
				<td><input type='checkbox' id='store3' name='store3' value='13'></td>
			</tr>
			<tr>
				<td>stock4</td>
				<td><input type='checkbox' id='store4' name='store4' value='14'></td>
			</tr-->
		</tbody>
	</table>
	<input type='button' onclick='addStock("faddUser",[:STOCKNUM])' value='Add'>
</form>