<script>
	function manager(type,act)
	{
		var xmlHttpRequest = null;
		if (window.XMLHttpRequest)
		  xmlHttpRequest = new window.XMLHttpRequest();
		else
		  xmlHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
		
		var body="act="+act+"&type"+type+"&fmanageradd=1";
		xmlHttpRequest.open("POST", "../engine/POpopup.php", false);//
		xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlHttpRequest.send(body);
		document.getElementById('workspace').innerHTML=xmlHttpRequest.responseText;
	}
	
</script>
<div id="workspace"></div>
<form name="owner_add" method="POST">
	<table>	
		<thead>
			<tr>
				<th colspan=4>
					[:FIRMNAME]
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>склад: 
					<select>
						<!--option>	</option-->
						[:STOCK]
					</select>
				</td>
				<td>
					<input type='button' onclick='manager("stock","add")' name='createStock' id='createStock' value='создать'/>
				</td>
				<td>
					<input type='button' onclick='manager("stock","del")' name='deleteStock' id='deleteStock' value='удалить'/>
				</td>
				<td>
					<input type='button' onclick='manager("stock","edit")' name='editStock' id='editStock' value='редактировать'/>
				</td>	
			</tr>
			<tr>
				<td>Пользователь: 
					<select>
						<!--option>	</option-->
						[:USER]
					</select>
				</td>
				<td>
					<input type='button' onclick='manager("user","add")' name='createUser' id='createUser' value='создать'/>
				</td>
				<td>
					<input type='button' onclick='manager("user","del")' name='deleteUser' id='deleteUser' value='удалить'/>
				</td>
				<td>
					<input type='button' onclick='manager("user","edit")' name='editUser' id='editUser' value='редактировать'/>
				</td>	
			</tr>
			<tr>
				<td>Продукция: 
					<select>
						<!--option>	</option-->
						[:GOODS]
					</select>
				</td>
				<td>
					<input type='button' onclick='manager("goods","add")' name='createGoods' id='createGoods' value='создать'/>
				</td>
				<td>
					<input type='button' onclick='manager("goods","del")' name='deleteGoods' id='deleteGoods' value='удалить'/>
				</td>
				<td>
					<input type='button' onclick='manager("goods","edit")' name='editGoods' id='editGoods' value='редактировать'/>
				</td>	
			</tr>
		</tbody>
	</table>	
</form>