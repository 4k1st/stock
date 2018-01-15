<?
	require('conf.php');
	function forming_lists($company)
	{
		global mysqli;
		$query="SELECT id, name,0 FROM goods  WHERE actual>0 AND company_id=$company
				union
				SELECT id,name,1 FROM stock WHERE actual>0 AND company_id=$company
				";
		if($result=$mysqli->query($query))
		{
			while($row=$result->fetch_array())
			{
				
			}
		}else{
			echo "mysqli select stock, firm, goods error:  ".$mysqli->error;
			exit;
		}
		
		
		
		$
		return $ret;
	}
	
	function addTransact()
	{
		
	}
	
	/*
		$_SESSION['uid']=$row[0];
		$_SESSION['urole']=$row[1];
		$_SESSION['ustatus']=$row[2];
		$_SESSION['company']=$row[3];
		$_SESSION['auth']=1;
	*/
?>