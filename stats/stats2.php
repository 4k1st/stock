<?
include("../engine/conf.php");
$query="SELECT name,description,id FROM goods WHERE company_id=".$_SESSION['company']." AND actual>0";
if($res=$mysqli->query($query))
{
	$i=0;
	while($row=$res->fetch_array(MYSQLI_NUM))
	{
		$products[$i]['name']=$row[0];
		$products[$i]['desc']=$row[1];	
		$products[$i]['id']=$row[2];
		$goods.="<th>$row[0]</th>";
		$i++;
	}
	$res->close();
}else{
	echo"SELECT error ".$mysqli->error;
	exit;
}
$query="SELECT r.create_date
				,s.name 
				,r.good_id
				,r.good_num
				,r.type
		FROM registration r
		JOIN stock s ON s.id=r.stock_id
		WHERE s.company_id=".$_SESSION['company']."
		ORDER BY r.create_date";
if($res=$mysqli->query($query))
{
	$i=0;
	while($row=$res->fetch_array(MYSQLI_NUM))
	{
		$transaction[$row[0]][$i]['date']=$row[0];
		$transaction[$row[0]][$i]['product']=$row[2];
		$transaction[$row[0]][$i]['stock']=$row[1];
		$transaction[$row[0]][$i]['num']=$row[3];
		$transaction[$row[0]][$i]['type']=$row[4];	
		$i++;
	}
	
}else{
	echo"SELECT2 error ".$mysqli->error;
	exit;	
}

$prevDate=$transaction[0]['date'];
$index=0;
foreach($transaction as $key=>$value)
{
	$rowspan=count($value);
	$body.="<tr>
				<td rowspan=".$rowspan.">".$key."</td>";
					
		for($k=0;$k<count($value);$k++)	
		{
			if($k==0)
			{
				$body.="<td>".$value[$index]['stock']."</td>";
				
			}elseif($k==count($value)-1)
			{
				$body.="<td>".$value[$index]['stock']."</td>";
			}else{
				$body.="<tr><td>".$value[$index]['stock']."</td>";
				
			}
			
			for($j=0;$j<count($products);$j++)
			{
				if($transaction[$key][$index]['product']==$products[$j]['id'])
				{
					if($transaction[$key][$index]['type']==1)
						$body.="<td bgcolor='blue' align='center' style='color:yellow'>".$transaction[$key][$index]['num']."</td>";
					else
						$body.="<td bgcolor='pink' align='center' style='color:black'>".$transaction[$key][$index]['num']."</td>";
				}else{
					$body.="<td align='center'>-</td>";
					
				}		
			}
			$body.=	"	<td>balance</td><td>shipped</td>
						<td>the rest of money</td>
						</tr>";
			$index++;
		}	
}




?>
основной второй отчет
<table border=1>
	<thead>
		<tr>
			<th>date</th>
			<th>stock</th>
			<?=$goods?>	
			<th>balance</th>
			<th>Shipped</th>
			<th>the rest of money</th>
		</tr>		
	</thead>
	<tbody>
		<?=$body?>		
	</tbody>
</table>







































