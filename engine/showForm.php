<?
	if(isset($_POST['addUser']))
	{
		if(!$enterform=file_get_contents("./forms/addUser.tpl"))
		{
			echo "absent file: forms/entrform.tpl";
			exit;
		}
		
		
	}
	
	if(isset($_POST['addStock']))
	{
		if(!$enterform=file_get_contents("./forms/addStock.tpl"))
		{
			echo "absent file: forms/entrform.tpl";
			exit;
		}		
		
	}
	
	if(isset($_POST['addgoods']))
	{
		if(!$enterform=file_get_contents("./forms/addgoods.tpl"))
		{
			echo "absent file: forms/entrform.tpl";
			exit;
		}		
		
	}
	
	if(isset($_POST['linkStockUsers']))
	{
		if(!$enterform=file_get_contents("./forms/stock-user.tpl"))
		{
			echo "absent file: forms/entrform.tpl";
			exit;
		}	
		
	}
	
	
	
	
?>