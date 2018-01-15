<script >
	function addStock(fname)
	{	
		var xmlHttpRequest = null;
		if (window.XMLHttpRequest)
		  xmlHttpRequest = new window.XMLHttpRequest();
		else
		  xmlHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
		
		var fform=document.forms[fname];
		var name=fform.elements["name"].value;
		var desc=fform.elements["Description"].value;
		var body = 	'name=' + encodeURIComponent(name) +
					'&desc="' + encodeURIComponent(desc) +
					'"&'+fname+'=1';
		xmlHttpRequest.open("POST", "../engine/POpopup.php", false);//
		xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlHttpRequest.send(body);
		document.getElementById('workspace').innerHTML=xmlHttpRequest.responseText;
		alert(body);
	}

</script>

<div id="workspace">
</div>

addproducts:
<form name="faddgoods">
	name<br/>
	<input type='text' name='name' id='name' /><br/>
	description<br/><textarea name='Description' id='Description'></textarea><br/>
	<input type='button' onclick='addStock("faddgoods")' value='Add'>
</form>