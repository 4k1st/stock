<?
include("popupFunction.php");

if(isset($_POST['fGoodsStock']))
{
	/*
		обработчик формы сопоставления пользователь-склад
	*/
	$numUser=$_POST['numuser'];
	$j=0;
	for($i=1;$i<=$numUser;$i++)
	{
		if($_POST["storekeeper$i"]=='true')
		{
			$user_stock=explode(":",$_POST["valuekeeper$i"]);
			$matrix[$j]['goods']=$user_stock[0];
			$matrix[$j]['stock']=$user_stock[1];
			$j++;
		}
	}
	
	/*echo"<pre>";
	print_r($matrix);
	echo"</pre>";*/
	echo addLinkStockGoods($matrix);
}

if(isset($_POST['fUserStock']))
{
	/*
		обработчик формы сопоставления пользователь-склад
	*/
	$numUser=$_POST['numuser'];
	$j=0;
	for($i=1;$i<=$numUser;$i++)
	{
		if($_POST["storekeeper$i"]=='true')
		{
			$user_stock=explode(":",$_POST["valuekeeper$i"]);
			$matrix[$j]['user']=$user_stock[0];
			$matrix[$j]['stock']=$user_stock[1];
			$j++;
		}
	}
	/*echo"<pre>";
	print_r($matrix);
	echo"</pre>";*/	
	echo addLinkStockKeepers($matrix);
}

if(isset($_POST['faddgoods']))
{
	$goods['name']=$_POST['name'];
	$goods['desc']=$_POST['desc'];
	$goods['user']=$_SESSION['uid'];
	$goods['company']=$_SESSION['company'];
	/*echo "<pre>";
	print_r($goods);
	echo"</pre>";*/
	echo addGoods($goods);
}

if(isset($_POST['faddStock']))
{
	$stock['name']=$_POST['name'];
	$stock['desc']=$_POST['desc'];
	/*$numUser=$_POST['numuser'];
	$j=0;
	for($i=1;$i<=$numUser;$i++)
	{
		if($_POST["storekeeper$i"]=='true')
		{
			$stock['users'][$j]=$_POST["valuekeeper$i"];
			$j++;		
		}
	}*/
	
	/*echo "<pre>";
	print_r($stock);
	echo"</pre>";*/
	echo addStock($stock);
}


if(isset($_POST['faddUser']))
{
	$user['login']=$_POST['login'];
	$user['fname']=$_POST['fname'];
	$user['lname']=$_POST['lname'];
	$user['passwd']=$_POST['passwd'];
	$user['mail']=$_POST['mail'];
	$user['phone']=$_POST['phone'];
	$user['role']=$_POST['role'];
	$user['desc']=$_POST['desc'];
	$numStock=$_POST['numStock'];
	$j=0;
	for($i=1;$i<=$numStock;$i++)
	{
		if($_POST["store$i"]=='true')
		{
			$user['stock'][$j]=$_POST["valuestock$i"];
			$j++;
		}
	}
	/*echo "<pre>";
	print_r($user);
	echo"</pre>";*/
	echo addUser($user);
}

if(isset($_POST['faddorder']))
{
	$order['stock']=$_POST['stock'];
	$order['goods']=$_POST['goods'];
	$order['amount']=$_POST['amount'];
	$order['desc']=$_POST['desc'];
	$order['type']=$_POST['type'];
	$order['user']=$_SESSION['uid'];
	echo addorder($order);
}

if(isset($_POST['fowneradd']))
{
	$owner['act']=$_POST['act'];
	$owner['type']=$_POST['type'];
	owneradd($owner);
	
}

if(isset($_POST['fmanageradd']))
{
	$manager['act']=$_POST['act'];
	$manager['type']=$_POST['type'];
	owneradd($manager);
}
?>

















































































