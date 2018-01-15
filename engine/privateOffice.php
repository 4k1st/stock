<?
//require("conf.php");

function createMenu()//создание меню для пользователля в зависимости от его роли/статуса
{
	global $mysqli;
	
	$local_tpl= new Template;
	$query="SELECT value,servicekey FROM service WHERE servicekey='title' or servicekey='about'";
	if ($result = $mysqli->query($query)) {
		while($row = $result->fetch_array(MYSQLI_NUM))
		{
			$main[$row[1]]=$row[0];			
		}
		$result->close();
	}
	
	if($_SESSION['auth']>0)
	{
		$avatar=$sname=$fname=0;//!!!!!!!!!!!!!!!!!!!

		if(!$enterform=file_get_contents("./pages/entraceTrue.tpl"))
		{
			echo "absent file: pages/entracetrue.tpl";
			exit;
		}
		$user=$_SESSION['uid'];
		$query="SELECT first_name, last_name FROM users WHERE id=$user";
		if($result=$mysqli->query($query))
		{
			$row=$result->fetch_array(MYSQLI_NUM);
			$firstname=$row[0];
			$lastname=$row[1];			
		}
		$local_tpl->setValue("SNAME",$firstname);
		$local_tpl->setValue("FNAME",$lastname);
		$local_tpl->setValue("AVATAR",$avatar);		
		$local_tpl->getTpl($enterform);
		$local_tpl->tplParse();
		$main['intracepo']=$local_tpl->html;	
	}else{
		if(!$enterform=file_get_contents("./pages/noEntrace.tpl"))
		{
			echo "absent file: html/noEntrace.html";
			exit;
		}
			$main['intracepo']=$enterform;	
		
	}

	
}
function output()//формирование страницы личного кабинета
{
		
}

function stats()//формирование статистики и отчетов
{
		
}

function adddata()//добавление данных со склада
{
	
}

function  addNewUser()//добавление нового пользователя
{
	
}

function addNewStock()//добавляем новый склад
{
		
}

function addNewCompany()//создаем компанию
{
	
}

function changeUserData()//изменение пользовательских данных
{
		
}

function changeCompany()//редактирование компаний
{
		
}

function changeStock()//редактирование складов
{
		
}


function createProduct()//создание товара(типаб описане etc ) 
{
	
	
}

function changeProduct()//изменение данных товара(типаб описане etc ) 
{
	
	
}
?>
