<?
include('conf.php');
	function getStock(&$stock)
	{
		global $mysqli;
		
		$query="SELECT `id`, `name`, `description` FROM `stock` WHERE `actual`>0";
		$i=0;
		if($res=$mysqli->query($query))
		{
			while($row=$res->fetch_array(MYSQLI_NUM))
			{
				$stock[$i]['id']=$row[0];
				$stock[$i]['name']=$row[1];
				$stock[$i]['desc']=$row[2];
				$i++;
			}
			$res->close();
		}else{
			echo"error getstock select stocks generateForms.php ".$mysqli->error;
			return 0;
		}
		return 1;
	}
	
	function getProducts(&$products)
	{
		global $mysqli;
		$query="SELECT `id`, `name`, `description` FROM `goods` WHERE `actual`>0";
		$i=0;
		if($res=$mysqli->query($query))
		{
			while($row=$res->fetch_array(MYSQLI_NUM))
			{
				$products[$i]['id']=$row[0];
				$products[$i]['name']=$row[1];
				$products[$i]['desc']=$row[2];
				$i++;
			}
			$res->close();
		}else{
			echo"error getproducts select products in generateForms.php ".$mysqli->error;
			return 0;
		}
		return 1;		
	}
	
	function getUsers(&$users)
	{
		global $mysqli;
		$query="SELECT `id`, `status_id`, `role_id`, `login`, `first_name`, `last_name` FROM `users` WHERE `actual`>0";
		$i=0;
		if($res=$mysqli->query($query))
		{
			while($row=$res->fetch_array(MYSQLI_NUM))
			{
				$users[$i]['id']=$row[0];
				$users[$i]['status']=$row[1];
				$users[$i]['role']=$row[2];
				$users[$i]['login']=$row[3];
				$users[$i]['fname']=$row[4];
				$users[$i]['lname']=$row[5];
				$i++;
			}
			$res->close();
		}else{
			echo"error getproducts select users in generateForms.php ".$mysqli->error;
			return 0;
		}
		return 1;	
	}
	
	function addorder($startdate, $enddate)
	{
		global $mysqli;
		$query="SELECT s.name, r.create_date,g.name,r.good_num, r.type, r.desc 
				FROM registration r
				JOIN goods g ON r.good_id=g.id
				JOIN stock s ON s.id=r.stock_id
				WHERE r.actual>0 AND (r.create_date>='$startdate' OR r.create_date<='$enddate')";
		$tableBody="";
		$i=0;
		if($res=$mysqli->query($query))
		{
			while($row=$res->fetch_array(MYSQLI_NUM))
			{
				$tableBody.="<tr>
								<td>$i</td>
								<td>$row[0]</td>
								<td>$row[2]</td>
								<td>$row[3]</td>
								<td>$row[4]</td>
								<td>$row[1]</td>
								<td>$row[5]</td>
							</tr>";
				$i++;
			}
			$res->close();
			
		}else{
			echo"error addorder  select table generate forms ".$mysqli->error;
			return 0;
		}
		return $tableBody;
	}
	
	function stockGoods()
	{
		global $mysqli;
		
		$firm=$_SESSION['company'];
		$query="SELECT id, name,description, '0' FROM stock WHERE company_id=".$firm."
				UNION 
				SELECT id, name,description, '1' FROM goods WHERE company_id=".$firm;
		$k=$i=$j=0;
		if($res=$mysqli->query($query))
		{			
			while($row = $res->fetch_array(MYSQLI_NUM))
			{
				if($row[3]==0)
				{
					$stock[$i]['id']=$row[0];
					$stock[$i]['name']=$row[1];
					$stock[$i]['description']=$row[2];
					$i++;
				}
				if($row[3]==1)
				{
					$product[$j]['id']=$row[0];
					$product[$j]['name']=$row[1];
					$product[$j]['description']=$row[2];
					$j++;
				}
			}
			$res->close();
		}else{
			echo "error: ".$mysqli->error;
			return 0;
		}

		$query="SELECT id, store_id, goods_id FROM storegoods WHERE actual>0 AND company_id=".$firm;
		if($res=$mysqli->query($query))
		{
			while($row = $res->fetch_array(MYSQLI_NUM))
			{
				$link[$row[1]][$row[2]]=1;
			}
			$res->close();
		}else{
			echo "error: ".$mysqli->error;
			return 0;
		}
		$result="<thead>
					<tr>
				<th>goods\stock</th>";
		for($i=0;$i<count($stock);$i++)
		{
			$result.="<th>".$stock[$i]['name']."<br>".$stock[$i]['description']."</th>";
			
		}
		$result.="</tr>
					</thead>
					<tbody>";
		
	
		for($i=0;$i<count($product);$i++)
		{
			$result.="<tr>
							<td>".$product[$i]['name']."<br/>".$product[$i]['description']."</td>";
			for($j=0;$j<count($stock);$j++)
			{
				$k++;
				if(isset($link[$stock[$j]['id']][$product[$i]['id']])){
					$result.="<td><input type='checkbox' checked id='storekeeper$k' name='storekeeper$k' value='01:1'></td>";
				}else{
					$result.="<td><input type='checkbox' id='storekeeper$k' name='storekeeper$k' value='".$product[$i]['id'].":".$stock[$j]['id']."'></td>";	
				} 		
			}
			$result.="</tr>";
		}
		
		return $result.="</tbody>
			</table>
			<input type='button' onclick='addStock(\"fGoodsStock\",$k)' value='Add'>";	
		
	}
	
	function stockUsers()
	{
		global $mysqli;
		
		$firm=$_SESSION['company'];
		$query="SELECT id, name,description, '0' FROM stock WHERE company_id=".$firm." 
				UNION 
				SELECT id, first_name, last_name,'1' FROM users WHERE company_id=".$firm;
		$k=$i=$j=0;
		
		if($res=$mysqli->query($query))
		{			
			while($row = $res->fetch_array(MYSQLI_NUM))
			{
				if($row[3]==0)
				{
					$stock[$i]['id']=$row[0];
					$stock[$i]['name']=$row[1];
					$stock[$i]['description']=$row[2];
					$i++;
				}
				if($row[3]==1)
				{
					$users[$j]['id']=$row[0];
					$users[$j]['fname']=$row[1];
					$users[$j]['lname']=$row[2];
					$j++;
				}
			}
			$res->close();
		}else{
			echo "error: ".$mysqli->error;
			return 0;
		}

		$query="SELECT id,store_id,user_id FROM storekeepers WHERE actual>0 AND company_id=".$firm;
		if($res=$mysqli->query($query))
		{
			while($row = $res->fetch_array(MYSQLI_NUM))
			{
				$link[$row[1]][$row[2]]=1;
			}
			$res->close();
		}else{
			echo "error: ".$mysqli->error;
			return 0;
		}
		$result="<thead>
					<tr>
				<th>user\stock</th>";
		for($i=0;$i<count($stock);$i++)
		{
			$result.="<th>".$stock[$i]['name']."<br>".$stock[$i]['description']."</th>";
			
		}
		$result.="</tr>
					</thead>
					<tbody>";
		
	
		for($i=0;$i<count($users);$i++)
		{
			$result.="<tr>
							<td>".$users[$i]['fname']."<br/>".$users[$i]['lname']."</td>";
			for($j=0;$j<count($stock);$j++)
			{
				$k++;
				if(isset($link[$stock[$j]['id']][$users[$i]['id']])){
					$result.="<td><input type='checkbox' checked id='storekeeper$k' name='storekeeper$k' value='01:1'></td>";
				}else{
					$result.="<td><input type='checkbox' id='storekeeper$k' name='storekeeper$k' value='".$users[$i]['id'].":".$stock[$j]['id']."'></td>";	
				}
			}
			$result.="</tr>";
		}
		
		return $result.="<tbody>
							</table>
							<input type='button' onclick='addStock(\"fUserStock\",$k)' value='Add'>";	
	}	
	

?>