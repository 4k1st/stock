<?
phpinfo();
echo"session<pre>";
print_r($_SESSION);
echo"</pre>";

	$p1="raew4w6.34hddgf@reg654.345r.rtg";
	$p2="34hddgf@reg654.gr";
	$p3="example@email.ru";
	$p4="+7254)123-12-12";
	$p5="+7(254123-12-12";
	$p6="+7(254)1231212";

	$patternmail="#^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$#si";
		
	if(preg_match($patternmail, $p1,$r)==0)
	{
		echo "error p1<br/>";
	}else{
		echo"<pre>";
		print_r($r);
		echo"</pre>";
	}
	if(preg_match($patternmail, $p2,$r)==0)
	{
		echo "error p2<br/>";
	
	}else{
		echo"<pre>";
		print_r($r);
		echo"</pre>";
	}
	
	if(preg_match($patternmail, $p3,$r)==0)
	{
		echo "error p3<br/>";
	}else{
		echo"<pre>";
		print_r($r);
		echo"</pre>";
	}
	if(preg_match($patternmail, $p4,$r)==0)
	{
		echo "error p4<br/>";
	}else{
		echo"<pre>";
		print_r($r);
		echo"</pre>";
	}	
	
	
	if(preg_match($patternmail, $p5,$r)==0)
	{
		echo "error p5<br/>";
	}else{
		echo"<pre>";
		print_r($r);
		echo"</pre>";
	}
	if(preg_match($patternmail, $p6,$r)==0)
	{
		echo "error p6<br/>";
	}else{
		echo"<pre>";
		print_r($r);
		echo"</pre>";
	}		
	
	
	
?>