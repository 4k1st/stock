<?
	require ('err.php');
	if(isset($_GET['page']))//show  form for registration
	{
		$page=$_GET['page'];
		if(!$regform=file_get_contents("../forms/regform1.tpl"))
			{
				echo "absent file: forms/regform1.html";
				exit;
			}
		echo $regform;
		exit;
	}

	
	if(isset($_POST['regbtn']))//registration user 
	{
		require('checkName.php');//
		$data;
		if(checkData($data))
		{
			registration($data);
			$host=$_SERVER['HTTP_HOST'];
			echo '<meta http-equiv="refresh" content="0;URL=http://'.$host.'/">';	
		}else{
			if($regform=file_get_contents("../forms/regform1.tpl"))
			{
				$form="<form name='regform' method='POST' enctype='multipart/form-data'>
						Зарегистрироваться:
						<br/><input type='edit' id='login' value='".$_POST['login']."'  placeholder='введите ваш логин' pattern='[0-9A-я_\s]{4,32}' name='login'  maxlength='32'size='30'style='float:left;'/>*
						<br/>пароль:
						<br/><input type='password' id='passwd' placeholder='введите ваш пароль' pattern='[0-9A-я]{4,32}' name='passwd'  maxlength='32'size='30'/>*
						<div id='repeate_passwd_error' style='display:none' ></div>
						<br/><input type='password'id='repeatepswd' onchange=checkpswd() placeholder='повторите ваш пароль' pattern='[0-9A-я]{4,32}' name='repeatepswd'   maxlength='32'size='30'/>*
						<br/>Личные данные:	
						<br/><input type='edit'id='firstname'value='".$_POST['firstname']."' placeholder='Фамилия'pattern='[0-9A-я_\s]{4,32}' name='firstname' maxlength='32'size='30'/>*
						<br/><input type='edit'id='lastname'value='".$_POST['lastname']."' placeholder='Имя' pattern='[0-9A-я_\s]{4,32}'name='lastname' maxlength='32'size='30'/>*
						<br/><input type='edit'id='phone'value='".$_POST['phone']."' placeholder='телефон' pattern='[\d]{4,32}'name='phone' maxlength='32'size='30'/>*
						<br/><input type='edit'id='email'value='".$_POST['email']."' placeholder='email' pattern='[0-9A-я_\s\.]+@[0-9A-я_\s\.]+\.[A-я]{2,5}' name='email' maxlength='32'size='30'/>*
						<br/><input type='edit' id='organization'value='".$_POST['organization']."' placeholder='название организации' pattern='[0-9A-я_\s]{4,32}'name='organization' maxlength='32'size='30'/>
						<br/><input type='button'id='regbtn' onclick=\"fregform()\"  name='regbtn'  value='продолжить'/>
						<div id='error' >".error()."</div>
						<br/>
					</form>";
				echo $form;	
				exit;	
			}else{
				echo "absent file: forms/regform1.html";
				exit;				
			}
		}

	}
	
	if(isset($_GET['checklogin']))
	{
		require('checkName.php');//
		$login=$_GET['login'];
		$mail=$_GET['email'];
		if(checkLogin($login,$mail))
		{
			echo"0";
		}else{
			echo"1";			
		}
		exit;
	}
	
	
	if(isset($_POST['entrace']))//entrace user
	{
		require('checkName.php');//
		$login=$_POST['login'];
		$passwd=$_POST['passwd'];
		if(checkName($login,$passwd))
		{
			$host=$_SERVER['HTTP_HOST'];
			
			print_r($_SESSION);
			echo '<meta http-equiv="refresh" content="0;URL=http://'.$host.'/">';	
			exit;
		}
		echo"не правильный логин или пароль";
		exit;
	}

	if(isset($_GET['exit']))
	{
		session_destroy();
		$host=$_SERVER['HTTP_HOST'];
		echo '<meta http-equiv="refresh" content="0;URL=http://'.$host.'/">';	
		exit;
	}
	
?>