<script>
	function addRow(id,values)
	{
		var now= new Date();
		var date=now.getFullYear()+"-"+now.getMonth()+"-"+now.getDate()+" "+now.getHours()+":"+now.getMinutes()+":"+now.getSeconds();
		values["date"]=date;
		var tbody = document.getElementById(id).getElementsByTagName("TBODY")[0];
		var row = document.createElement("TR");
		if(values["type"]==1)
		{
		values["type"]="Прибыло";
		}else{
		values["type"]="Убыло";
		}
	/*for (var i in array)
	alert("Ключ = " + i + "; Значение = " + array[i]);*/
		var td0=document.createElement("TD");
		td0.appendChild(document.createTextNode(""));
		var td1 = document.createElement("TD") ;
		td1.appendChild(document.createTextNode(values["stock"]));
		var td2 = document.createElement("TD");
		td2.appendChild (document.createTextNode(values["goods"]));
		var td3 = document.createElement("TD") ;
		td3.appendChild(document.createTextNode(values["amount"]));
		var td4=document.createElement("TD");
		td4.appendChild(document.createTextNode(values["date"]));
		var td5 = document.createElement("TD");
		td5.appendChild (document.createTextNode(values["desc"]));	
		var td6=document.createElement("TD");
		td6.appendChild(document.createTextNode(values["type"]));
		row.appendChild(td0);
		row.appendChild(td1);
		row.appendChild(td2);
		row.appendChild(td3);
		row.appendChild(td6);
		row.appendChild(td4);
		row.appendChild(td5);
		tbody.appendChild(row);
	}
	
	function shadow()
	{
		var fform=document.forms['faddorder'];
		var stock=fform.elements['stock'].value;
		var goods=fform.elements['goods'].value;
		var amount=fform.elements['amount'].value;
		var type=fform.elements['type'].value;
		var desc=fform.elements['desc'].value;
		var body='stock='+stock+'&goods='+goods+'&amount='+amount+'&faddorder=1'+'&desc='+desc+'&type='+type;
		var values = {'stock': stock, 'goods': goods, 'amount': amount,'desc':desc,type:type}; // Создаём ассоциативный массив

	var xmlHttpRequest = null;
		if (window.XMLHttpRequest)
		  xmlHttpRequest = new window.XMLHttpRequest();
		else
		  xmlHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");

		xmlHttpRequest.open("POST", "../engine/POpopup.php", false);//
		xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlHttpRequest.send(body);

		addRow('tableResults',values);
		//alert(xmlHttpRequest.status+' : '+xmlHttpRequest.statusText+"  "+xmlHttpRequest.responseText);
		//document.getElementById('workspace').innerHTML=xmlHttpRequest.responseText;
		//alert(body);
	}
	
</script>
<div id='workspace'>

</div>

<form name='faddorder'>
	<table border=1 >
		<thead>
			<tr>
				<th>stock</th>
				<th>products</th>
				<th>amount</th>
				<th>type</th>
				<th>description</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<select id="stock_value" name="stock">
					<!--<p><input list="stock"></p>
						<datalist id="stock"-->
							
							<option value='1' >$row[1]</option>
							<option value='3' >$row[3]</option>
							<option value='5' >$row[5]</option>
						[:STOCKDATA]
					</select>
				</td>
				<td>
					<select id="goods_value" name="goods">
						<!--<p><input list="goods"></p>
						<datalist id="goods"></datalist--> 
							[:GOODSDATA]
							<option value='1' label='$row[1]'>$row[1]</option>
							<option value='3' label='$row[7]'>$row[3]</option>
							<option value='5' label='$row[5]'>$row[5]</option>
						
					</select>	
				</td>
				<td><input type ='text'id="amount" name="amount" pattern="\d"/></td>
				<td>
					prihod<input type='radio' id='type' name='type' value='1' label='prihod' checked /><br/>
					uhod<input type='radio' id='type' name='type' value='0' label='uhod'/>
				</td>
				<td><textarea id='desc' name='desc'></textarea></td>
				<td><input type='button' value='подтвердить' onclick='shadow()'/></td>
			</tr>
		</tbody>
	</table>
</form>

<div>
	<table border='1'id="tableResults">
		<thead>
			<tr>
				<th>№№ </th>
				<th>stock</th>
				<th>goods</th>
				<th>num</th>
				<th>type</th>
				<th>date</th>
				<th>description</th>		
			</tr>
		</thead>
		<tbody>
			[:ORDERBODY]			
		</tbody>
	</table>
</div>