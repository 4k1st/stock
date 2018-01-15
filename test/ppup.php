<?
	require ('../engine/err.php');
	if(isset($_GET['page']))
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

	
	if(isset($_POST['regbtn']))
	{
		require('../engine/checkName.php');
		$data;
		checkData($data);
		$server=$_SERVER['HTTP_HOST'];
		if(registration($data))
		{
			header("Location: http://$server");
		}else{
			if($regform=file_get_contents("../forms/regform1.tpl"))
			{
				$form="<form name='regform' method='POST' enctype='multipart/form-data'>
						Зарегистрироваться:
						<br/><input type='edit' id='login' value='".$_POST['login']."'  placeholder='введите ваш логин' pattern='[0-9A-я_\s]{4,32}' name='login'  maxlength='32'size='30'style='float:left;'/>*
						<br/>пароль:
						<br/><input type='password' id='passwd' placeholder='введите ваш пароль' pattern='[0-9A-я]{4,32}' name='passwd'  maxlength='32'size='30'/>*
						<div id='repeate_passwd_error' ></div>
						<br/><input type='password'id='repeatepswd' onchange=checkpswd() placeholder='повторите ваш пароль' pattern='[0-9A-я]{4,32}' name='repeatepswd'   maxlength='32'size='30'/>*
						<br/>Личные данные:	
						<br/><input type='edit'id='firstname'value='".$_POST['firstname']."' placeholder='Фамилия'pattern='[0-9A-я_\s]{4,32}' name='firstname' maxlength='32'size='30'/>*
						<br/><input type='edit'id='lastname'value='".$_POST['lastname']."' placeholder='Имя' pattern='[0-9A-я_\s]{4,32}'name='lastname' maxlength='32'size='30'/>*
						<br/><input type='edit'id='phone'value='".$_POST['phone']."' placeholder='телефон' pattern='[\d]{4,32}'name='phone' maxlength='32'size='30'/>*
						<br/><input type='edit'id='email'value='".$_POST['email']."' placeholder='email' pattern='[0-9A-я_\s\.]+@[0-9A-я_\s\.]+\.[A-я]{2,5}' name='email' maxlength='32'size='30'/>*
						<br/><input type='edit' id='organization'value='".$_POST['organization']."' placeholder='название организации' pattern='[0-9A-я_\s]{4,32}'name='organization' maxlength='32'size='30'/>
						<br/><input type='button'id='regbtn' onclick=\"fregform()\"  name='regbtn'  value='продолжить'/>
						<div id='error' >".$error."</div>
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
?>