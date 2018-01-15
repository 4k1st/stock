

<form name='regform' method='POST' enctype='multipart/form-data'>
	Зарегистрироваться:
	<br/><input type='edit' id='login'  placeholder='введите ваш логин' pattern='[0-9A-я_\s]{4,32}' name='login'  maxlength='32'size='30'style="float:left;"/>*
	<br/>пароль:
	<br/><input type='password' id='passwd' placeholder='введите ваш пароль' pattern='[0-9A-я]{4,32}' name='passwd'  maxlength='32'size='30'/>*
	<br/><input type='password'id='repeatepswd' onchange="checkpswd()" placeholder='повторите ваш пароль' pattern='[0-9A-я]{4,32}' name='repeatepswd'   maxlength='32'size='30'/>*
	<div id="repeate_passwd_error" style='display:none' ></div>
	<br/>Личные данные:	
	<br/><input type='edit'id='firstname' placeholder='Фамилия'pattern='[0-9A-я_\s]{4,32}' name='firstname' maxlength='32'size='30'/>*
	<br/><input type='edit'id='lastname' placeholder='Имя' pattern='[0-9A-я_\s]{4,32}'name='lastname' maxlength='32'size='30'/>*
	<br/><input type='text'id='phone'placeholder='телефон: +7(XXX)XXX-XX-XX'pattern='+7\([\d{3}]\)\d{3}-\d{2}-\d{2}' name='phone' maxlength='32'size='30'/>*
	<br/><input type='edit'id='email' placeholder='email: example@email.ru' pattern='[0-9A-я_\s\.]+@[0-9A-я_\s\.]+\.[A-я]{2,5}' name='email' maxlength='32'size='30'/>*
	<br/><input type='edit' id='organization' placeholder='название организации' pattern='[0-9A-я_\s]{4,32}'name='organization' maxlength='32'size='30'/>
	<br/><input type='button'id='regbtn' onclick="fregform()" name='regbtn'  value='продолжить'/>
	<div id='error' ></div>
	<br/>
</form> 
 <!--script type="text/javascript">/*
jQuery(function($) {

$.mask.definitions['~']='[+-]';

$('#phone').mask("99/99/9999");

$('#email').mask('example@email.ru');

});*/


jQuery(function($){
   $("#phone").mask('9(999)999-99-99',{completed : function(){
       alert("Вы ввели: "+this.val());}
   });
    $("#email").mask('9(999)999-99-99',{completed : function(){
       alert("Вы ввели: "+this.val());}
   });  
});
</script--> 