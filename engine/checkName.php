<?
/***************************************
****	$data	[login]				****
****			[passwd]			****
****			[firstname]			****
****			[lastname]			****
****			[mail]				****
****			[phone]				****
***************************************/
require('conf.php');
function checkName($login,$passwd)//intrace to service
{
	global $mysqli;
	$query="SELECT id, role_id, status_id,company_id FROM users WHERE actual>0 AND login='".$login."' AND passwd=md5('".$passwd."')";
	if($result=$mysqli->query($query))
	{
		$row=$result->fetch_array();
		$_SESSION['uid']=$row[0];
		$_SESSION['urole']=$row[1];
		$_SESSION['ustatus']=$row[2];
		$_SESSION['company']=$row[3];
		$_SESSION['auth']=1;
		$result->close();
	return true;	
	}else{
		echo "mysql select check name  error: ".$mysqli->error;
		exit;
	}
	
}

function checkLogin($login, $mail)//check the existence of login and mail
{
	global $mysqli;
	$l="login='$login'";
	/*if($login==0)
	{
		$l=1;
	}*/
	$m="mail='$mail'";
	/*if($mail==0)
	{
		$m=1;
	}*/
	
	$query="SELECT id,login, mail FROM users WHERE $l OR $m";
	
	if($result=$mysqli->query($query))
	{
	
		if($result->num_rows>0)
		{	
			$row=$result->fetch_array();
			if($row[1]!='')
				$_SESSION['error'].="118:";
			if($row[2]!='')
				$_SESSION['error'].="124:";	
			return true;
		}
		else
			return false;
	}else{
		echo "mysql select check LOGIN error: $$ $query $$ ".$mysqli->error;
		exit;	
	}
	
}

function registration(&$data)
{
	global $mysqli;
	$date=date('Y-m-d H:i:s');
	$query="INSERT INTO users (
								status_id
								,role_id
								,login
								,passwd
								,create_date
								,change_date
								,create_by
								,actual
								,first_name
								,last_name
								,uuid
								,change_by
								,mail
								,phone)
						VALUES(
								3
								,3
								,'".$data['login']."'
								,md5('".$data['passwd']."')
								,'".$date."'
								,'".$date."'
								,0
								,1
								,'".$data['firstname']."'
								,'".$data['lastname']."'
								,UUID()
								,0
								,'".$data['mail']."'
								,'".$data['phone']."'							
								)";
	if(!$mysqli->query($query))
	{
		echo "mysql insert data users   error: ".$mysqli->error;
		exit;
	}
	
	if(!checkName($data['login'],$data['passwd']))
	{return 0;}
	
	$query="INSERT INTO  company(
								name
								,user_id
								,create_by
								,create_date
								,change_by
								,change_date
								,pay
								,pay_date
								,pay_status
								,actual )
							VALUES(
								'".$data['company']."'
								,".$_SESSION['uid']."
								,".$_SESSION['uid']."
								,'".$date."'
								,".$_SESSION['uid']."
								,'".$date."'
								,0
								,0
								,0
								,1
							)";
	if(!$mysqli->query($query))
	{
		echo $query." <br/>insert data company error".$mysqli->error;
		exit;		
	}
	$_SESSION['company']=$mysqli->insert_id;
	$query="UPDATE `users` SET company_id=".$_SESSION['company']." WHERE id=".$_SESSION['uid'];
	if(!$mysqli->query($query))
	{
		echo $query." <br/>update user data company error".$mysqli->error;
		exit;		
	}	
	
	
	return 1;
}

function checkData(&$data)
{
	$pattern="#^[\s\w\d_\-\.,]{2,36}#si";
	$patternmail="#^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$#si";//"#^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$#si"
	$patternphone="#^\+?\d{1,3}\(?\d{3}\)?\d{3}-?\d{2}-?\d{2}#";//"#^\+\d{1,3}\(\d{3}\)\d{3}-\d{2}-\d{2}$#si";
	$_SESSION['error']='';
	if(preg_match($pattern, $_POST['login'])==0)
	{
		$_SESSION['error'].='102:';
		$err=true;
	}else{
		$data['login']=$_POST['login'];
	}
	if(preg_match($pattern, $_POST['passwd'])==0)
	{
		$_SESSION['error'].='102:';
		$err=true;
	}else{
		$data['passwd']=$_POST['passwd'];
	}
	if(preg_match($pattern, $_POST['firstname'])==0)
	{
		$_SESSION['error'].='106:';
		$err=true;
	}else{
		$data['firstname']=$_POST['firstname'];
	}
	if(preg_match($pattern, $_POST['lastname'])==0)
	{
		$_SESSION['error'].='107:';
		$err=true;
	}else{
		$data['lastname']=$_POST['lastname'];
	}
	if($_POST['organization']!="")
	{
		if(preg_match($pattern, $_POST['organization'])==0)
		{
			$_SESSION['error'].='108:';
			$err=true;
		}else{
			$data['company']=$_POST['organization'];
		}	
	}else{
		$data['company']='';
	}
	if(preg_match($patternmail, $_POST['email'])==0)
	{
		$_SESSION['error'].='109:';
		$err=true;
	}else{
		$data['mail']=$_POST['email'];
	}
	if(preg_match($patternphone, $_POST['phone'])==0)
	{
		$_SESSION['error'].='110:';
		$err=true;
	}else{
		$data['phone']=$_POST['phone'];
	}
	if(checkLogin($data['login'],$data['mail']))
	{
		$_SESSION['error'].='118:';
		$err=true;
	}
	
	if($err)
	{
		return 0;		
	}

	return 1;
}


?>