<?
//require('conf.php');

function addLinkStockGoods(&$matrix)
{
	/**/
	global $mysqli;
	$user=$_SESSION['uid'];
	$count=count($matrix);
	for($i=0; $i<$count;$i++)
	{
		$values.="('".$matrix[$i]['stock']."','".$matrix[$i]['goods']."','".$user."','".$user."',NOW(),NOW(),1)";
		if($i!=$count-1)
		{
			$values.=",";
		}
	}
	
	$query="INSERT INTO storegoods(store_id,goods_id,create_by,change_by,create_date,change_date,actual)
				VALUES ".$values;
	if (!$mysqli->query($query)) 
	{
		return  "add link goods-stock Error: ".$mysqli->error;
    }
	return "";
}

function addLinkStockKeepers(&$matrix)
{
	/**/
	global $mysqli;
	$user=$_SESSION['uid'];
	$count=count($matrix);
	for($i=0; $i<$count;$i++)
	{
		$values.="('".$matrix[$i]['stock']."','".$matrix[$i]['user']."','".$user."','".$user."',NOW(),NOW(),1)";
		if($i!=$count-1)
		{
			$values.=",";
		}
	}
	
	$query="INSERT INTO storekeepers(store_id,user_id,create_by,change_by,create_date,change_date,actual)
				VALUES ".$values;
	if (!$mysqli->query($query)) 
	{
		return  "add link user-stock Error: ".$mysqli->error;
    }
	return "";
}

function addGoods(&$goods)
{
	/**/
	global $mysqli;
	$query="INSERT INTO goods (name,description,company_id,create_date,change_date,create_by,change_by,actual)
				VALUES('".$goods['name']."','".$goods['desc']."','".$goods['company']."',NOW(),NOW(),'".$goods['user']."','".$goods['user']."',1)";
	if (!$mysqli->query($query)) 
	{
		return  "add goods Error: ".$mysqli->error;
    }
	return "";
}

function addStock(&$stock)
{
	/**/
	global $mysqli;
	$user=$_SESSION['uid'];
	$company=$_SESSION['company'];
	$query="INSERT INTO `stock`(
								`name`, 
								`description`, 
								`company_id`,  
								`create_date`, 
								`create_by`, 
								`change_date`, 
								`change_by`, 
								`status`, 
								`actual`
								)VALUES (
									'".$stock['name']."',
									'".$stock['desc']."',
									'".$company."',
									NOW(),
									'".$user."',
									NOW(),
									'".$user."',
									1,
									1
								)";
	if (!$mysqli->query($query)) 
	{
		return  "add goods Error: ".$mysqli->error;
    }
	return '';
}

function addUser(&$user)
{
	/**/
	global $mysqli;
	$user['user']=$_SESSION['uid'];
	$company=$_SESSION['company'];
	$query="INSERT INTO `users`(
								`status_id`,
								`role_id`,
								`login`, 
								`passwd`, 
								`create_date`,
								`change_date`, 
								`create_by`,
								`actual`, 
								`first_name`, 
								`last_name`, 
								`company_id`, 
								`uuid`, 
								`change_by`,
								`mail`, 
								`phone`
							) VALUES (
								'3',
								'".$user['role']."',
								'".$user['login']."',
								md5('".$user['passwd']."'),
								NOW(),
								NOW(),
								'".$user['user']."',
								1,
								'".$user['fname']."',
								'".$user['lname']."',
								'".$company."',
								UUID(),
								'".$user['user']."',
								'".$user['mail']."',
								'".$user['phone']."'
							)";
	if (!$mysqli->query($query)) 
	{
		return  "add user  Error: ".$mysqli->error;
    }
	$id=$mysqli->insert_id;
	for($i=0;$i<count($user['stock']);$i++)
	{
		$matrix[$i]['stock']=$user['stock'];
		$matrix[$i]['user']=$id;
	}
	addLinkStockKeepers($matrix);
	return $query;
}

function addorder(&$order)
{
	/**/
	global $mysqli;
	
	//$date=date("Y-m-d H:i:s");
	$query="INSERT INTO registration (user_id,stock_id,create_date,good_id,good_num,type,`desc`,actual)
			VALUES('".$order['user']."','".$order['stock']."','".$order['date']/*NOW()*/."','".$order['goods']."','".$order['amount']."','".$order['type']."','".$order['desc']."',1)";
	 if (!$mysqli->query($query)) {
		return  "add order Error: ".$mysqli->error;
    }
	
	return '';
}

function owneradd($owner)
{
	/**/
	
	
}
?>