<div class="head-login__form">
	<form name='auth' method='POST' class="form form-login">
		<div class="form__title">Вход в личный кабинет</div>
		<div class="form__row">
			<input type="text" name='login' placeholder='введите ваш логин' class="form__input-text"/>
		</div>
		<div class="form__row">
			<input type='password' name='passwd' placeholder='введите ваш пароль'type="text" class="form__input-text"/>
		</div>
		<div class="form__row form__row--button">
			<input type="button" class="form__button" onclick="entrace()""name='check' value="Войти"/>
		</div>
		<div class="form__note">Нет личного кабинета? <a href="#" onclick="showpopup('parent_popup','regform1')" id='registration' class="form__link-reg">Пройдите регистрацию.</a></div>
	</form>
</div>