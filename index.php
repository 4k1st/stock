<?
ini_set("session.auto_start",true);
ini_set("session.use_trans_sid",true);

session_start();

define( "DEBUG", true);
if(DEBUG)
{
	$time=microtime();
}



require("./engine/conf.php");
require("./engine/template.php");
require("./engine/functions.php");


if($_SESSION['auth']==1)
{//если пользователь залогинелся
	require("./engine/privateOffice.php");
	$page_out="./pages/privateOffice.tpl";
	$role=$_SESSION['urole'];
	switch($role)
	{
		case 1:  //storekeeper
			
			break;			
		case 2:  //manager
		
			break;
		case 3: //owner
		
			break;
		case 4: //admin
		
			break;
		case 5: //owner system

			break;
		default:
			session_destroy();
			$host=$_SERVER['HTTP_HOST'];
			echo '<meta http-equiv="refresh" content="0;URL=http://'.$host.'/">';	
	};
	
	
}else{
	//для незалогиневшегося пользователя
	$page_out="./pages/main.tpl";
	/*if(!$enterform=file_get_contents("./forms/enterform.tpl"))
	{
		echo "absent file: forms/entrform.tpl";
		exit;
	}

	if(!$regform=file_get_contents("./forms/regform1.tpl"))
	{
		echo "absent file: forms/regform1.tpl";
		exit;
	}*/
}
	mainPage($main);
	$tpl->setValue("INTRACEPRIVATEOFICE",$main['intracepo']);
	$tpl->setValue("TITLE",$main['title']);
	$tpl->setValue("ABOUTSERVICE",$main['aboutservice']);


$tpl->getTpl($page_out);
$tpl->tplParse();
$out=$tpl->html;
$out=preg_replace("#\[:[\w]{1,32}\]#si","",$out);
echo $out;







//output debuging information

if (DEBUG)
{
	$time2=microtime();
	$t=$time2-$time;
	echo "<hr/> runing time: ".$t."<pre><hr/>cookie var:<br/>";
	print_r($_COOKIE);
	echo "<hr/>sessions var: ";
	print_r($_SESSION);
	echo "post var<br/>";
	print_r($_POST);
	echo "get var<br/>";
	print_r($_GET);
	echo "get file<br/>";
	print_r($_FILES);
	echo "globals<br/>";
	//print_r($GLOBALS);
	echo"</pre><hr/>";
}

?>