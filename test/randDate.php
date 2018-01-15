<?
include("../engine/conf.php");
include("../engine/popupFunction.php");
include("../engine/checkName.php");
/*******************************************
****	$data	[login]					****	_SESSION[uid]
****			[passwd]				****
****			[firstname]				****
****			[lastname]				****
****			[mail]					****
****			[phone]					****
****			[company]				****
****									****
****	$matrix[$i]	[stock]				****
****				([goods])|([user])	****
****									****
****	$goods	[name]					****	
****			[desc]					****
****			[company]				****
****			[user]					****
****									****
****	$stock 	[name]					****	
****			[desc]					****
****									****
****	$user	[user]					****
****			[role]					****
****			[login]					****
****			[passwd]				****	
****			[fname]					****
****			[lname]					****
****			[mail]					****
****			[phone]					****
****									****
****	$order	[user]					****
****			[stock]					****
****			[goods]					****
****			[amount]				****
****			[type]					****
****			[desc]					****
****									****
****									****
*******************************************/
function genRandData()
{
	global $mysqli;
	for($i=0;$i<5;$i++)
	{
echo "add owner$i:<br/>";
		$data['login']="owner".$i;
		$data['passwd']="owner".$i;
		$data['firstname']="owner".$i;				
		$data['lastname']="owner".$i;			
		$data['mail']="owner".$i."@owner.ow";					
		$data['phone']=$i."123456789";					
		$data['company']="owner".$i;
		registration($data);
		$owner_id=$mysqli->insert_id;
		$usr=rand(3,10);
		for($j=0;$j<$usr;$j++)
		{
echo"____add user$j<br/>";
			$user['user']=$owner_id;
			$user['role']=	rand(1,2);				
			$user['login']=	"storekeeper$i_$j";			
			$user['passwd']="storekeeper$i_$j";
			$user['fname']=	"storekeeper$i_$j";
			$user['lname']=	"storekeeper$i_$j";
			$user['mail']="storekeeper$i_$j@owner.ow";
			$user['phone']=$i."123456789";	
			addUser($user);
		}
		$pr=rand(10,30);
		for($k=0;$k<$pr;$k++)
		{
echo "____add poduct $k </br>";		
			$goods['name']="product$i_$k";						
			$goods['desc']="product$i_$k";
			$goods['company']=$_SESSION['company'];
			$goods['user']=$owner_id;
			addGoods($goods);
		}
		$st=rand(5,10);
		for($s=0;$s<$st;$s++)
		{
echo"____add stock $s<br/>";
			$stock['name']=	"stock$i_$s";			
			$stock['desc']="stock$i_$s";
			addStock($stock);
		}
	}
}

function genRandLink()
{
	global $mysqli;
	for($i=1;$i<6;$i++)
	{
		$query="SELECT u.id,'0'
				FROM users u 
				WHERE company_id=$i
				UNION
				SELECT g.id,'1'
				FROM goods g
				WHERE company_id=$i
				UNION 
				SELECT s.id,'2'
				FROM  stock s
				WHERE company_id=$i";
		$g=$k=$j=0;
		if($res=$mysqli->query($query))
		{
			while($row=$res->fetch_array(MYSQLI_NUM))
			{
				
				if($row[1]==0)
				{
					$usr[$j]=$row[0];
					$j++;
				}else if($row[1]==1)
				{
					$gds[$g]=$row[0];
					$g++;
				}else if($row[1]==2)
				{
					$stk[$k]=$row[0];
					$k++;
				}				
			}
			$res->close();
		}

		$m0=$m1=0;
		for($k=0;$k<count($stk);$k++)
		{
			for($g=0;$g<count($gds);$g++)
			{
				if(rand(0,1))
				{
					$matrix[$m0]['goods']=$gds[$g];
					$matrix[$m0]['stock']=$stk[$k];	
					$m0++;					
				}
			}
			
			for($j=0;$j<count($usr);$j++)
			{
				if(rand(0,1))
				{
					$matrix[$m1]['user']=$usr[$j];
					$matrix[$m1]['stock']=$stk[$k];
					$m1++;
				}
			}
		}
		$ri=rand(100,300);
		for($index=0;$index<$ri;$index++)
		{
			$ru=rand(0,count($usr));
			$rg=rand(0,count($gds));
			$rs=rand(0,count($stk));
			$order['user']=$ru;		
			$order['stock']=$rs;			
			$order['goods']=$rg;
			$order['amount']=rand(10,100);
			$order['type']=rand(0,1);
			$order['desc']="descriptoin dfbnlgkldbm  dfbnm";
			$order['date']="2017-0".rand(1,7)."-".rand(1,30);
			addorder($order);
		}
		addLinkStockGoods($matrix);
		addLinkStockKeepers($matrix);
	}
}

function genRandBalance()
{
	global $mysqli;
	for($i=1;$i<6;$i++)
	{
		$query="SELECT u.id,'0'
				FROM users u 
				WHERE company_id=$i
				UNION
				SELECT g.id,'1'
				FROM goods g
				WHERE company_id=$i
				UNION 
				SELECT s.id,'2'
				FROM  stock s
				WHERE company_id=$i";
		$g=$k=$j=0;
		if($res=$mysqli->query($query))
		{
			while($row=$res->fetch_array(MYSQLI_NUM))
			{
				
				if($row[1]==0)
				{
					$usr[$j]=$row[0];
					$j++;
				}else if($row[1]==1)
				{
					$gds[$g]=$row[0];
					$g++;
				}else if($row[1]==2)
				{
					$stk[$k]=$row[0];
					$k++;
				}				
			}
			$res->close();
		}
		$rand=rand(150,300);
		for($i1=0;$i1<$rand;$i1++)
		{
			$stock_id=$stk[rand(0,count($stk)-1)];
			$goods_id=$gds[rand(0,count($gds)-1)];
			$num=rand(0,500);
			$create_date="2017-0".rand(1,7)."-".rand(1,30);
			$create_by=$usr[rand(0,count($usr)-1)];
			$value.="($stock_id,$goods_id,$num,$i,'$create_date',$create_by,'$create_date',$create_by, 1)\n,";
			
		}
	}
	$value=substr($value,0,-2);

	$query="INSERT INTO remnants(
									stock_id
									,goods_id
									,num
									,company_id
									,create_date
									,create_by
									,change_date
									,change_by
									,actual
								)VALUES ".$value;
	if(!$mysqli->query($query))
	{
		echo"mysql insert error".$mysqli->error;
		exit;
	}
echo "it's good";
}
genRandBalance();



/*
		$linkGoods=rand(($st*$pr)/2,$st*$pr);
		for($l=0;$l<$linkGoods;$l++)
		{
			
		}
		
function genLinkUser()
{
	global $mysqli;
	
}

function genOrder()
{
	global $mysqli;
	
	
}*/
























?>