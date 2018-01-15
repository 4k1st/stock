<?
include("../engine/conf.php");
	$query="SELECT	 u1.first_name
					,u1.last_name
					,u1.login
					,s.name
					,r.create_date
					,g.name
					,r.good_num
					,r.type
					,r.desc
			FROM registration r
			JOIN users u1 ON u1.id=r.user_id
			JOIN goods g ON g.id=r.good_id
			JOIN stock s ON s.id=r.stock_id
			WHERE u1.company_id=".$_SESSION['company']." AND r.actual>0
			ORDER BY r.create_date, s.name
			
			";
	if($res=$mysqli->query($query))
	{
		
		$i=1;
		while($row=$res->fetch_array(MYSQLI_NUM))
		{
			$type=$row[7]==1?"Пришло":"Убыло";
			$body.="<tr>
						<td>$i</td>
						<td>$row[0] $row[1] $row[2]</td>
						<td>$row[3]</td>
						<td>$row[4]</td>
						<td>$row[5]</td>
						<td>$row[6]</td>
						<td>$type</td>
						<td>$row[8]</td>
					</tr>";
					$i++;
		}
		
	}else{
		echo "stat1 query error: ".$mysqli->error;
		exit;
	}
?>


все движения товара по складам за весь период(вся история), но только актуальные транзакции. для  владельца. отсортированны по дате и складу
<table border=1>
	<thead>
		<tr>
			<th>n/n</th>
			<th>пользователь</th>
			<th>склад</th>
			<th>дата</th>
			<th>продукция</th>
			<th>количество</th>
			<th>тип</th>
			<th>примечания</th>
		</tr>
	</thead>
	<tbody>
	<?=$body?>
	</tbody>
</table>



































