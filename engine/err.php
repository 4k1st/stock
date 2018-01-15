<?
require("errors.php");

function error()
{
	global $errors;
	$error=$_SESSION['error'];
	$list=explode(":", $error);
	for($i=0; $i<count($list);$i++)
	{
		$error.=$errors["$list[$i]"]."<br/>";
	}
	$_SESSION['error']="";
	return $error;
}



?>