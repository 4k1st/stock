<?
	*/function code(&$str,$num=10)
	{
		if($num==0)
		{
			$str=base64_encode(gzdeflate($str));
			echo$str."<br/>";
		}else{
			$str=base64_encode(gzdeflate($str));
			echo$str."<br/>";
			code($str,$num-1);
		}
	}
	
	$str="hello world!";
	echo $str."<br/><hr/>";
	code($str);
	echo "<hr/>".$str."<br/><hr/>";
	for($i=0;$i<=10;$i++)
	{
		$str=gzinflate(base64_decode($str));
		echo $str."<br/>";
	}
?>