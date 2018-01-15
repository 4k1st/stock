<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>[:TITLE]</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- Template Basic Images Start -->
  <meta property="og:image" content="path/to/image.jpg">
  <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">
  <!-- Template Basic Images End -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/slick.css">
	<script language='javascript' src="js/showHide.js">
	</script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700&amp;subset=cyrillic-ext" rel="stylesheet">
</head>
<body>
  	<!--popup window for forms etc-->
		
	<div class='parent_popup' id='parent_popup' >	
		<div class="popup" id='popup'>
			<div class="close_popup"><a onclick="hidepopup('parent_popup')">closeX</a></div>
			<div class="forms" id='forms'></div>
		</div>
		<!--div style="popup_close"> </div-->
	</div>	
		
	<!--popup-->
  
  <!-- BEGIN header class='header'-->
  <header>
    <!-- BEGIN header__top -->
    <div class="header__top">
	  <!-- BEGIN container -->
      <div class="container">
        <!-- BEGIN header__login -->
        <div class="header__contacts">
          <div class="head-contacts">
            <span class="head-contacts__phone">Горячая линия: 8 (800) 788-47-94 (звонок по России бесплатный)</span>
          </div>
        </div>
        <!-- END header__contacts -->
        <!-- BEGIN header__login -->
        <div class="header__login">
          <!-- BEGIN head-login -->
			<div class="head-login">
				<div class="head-login__btn-login">Личный кабинет</div>
				[:INTRACEPRIVATEOFICE]
			</div>
          <!-- END head-login -->
        </div>
        <!-- END header__login -->
        <!-- BEGIN header__support -->
        <div class="header__support">
          <div class="head-support">
            <div class="head-support__btn">Техническая поддержка</div>
          </div>
        </div>
        <!-- END header__support -->
      </div>
      <!-- END container -->
    </div>
    <!-- END header__top -->
    <!-- BEGIN header__main -->
    <div class="header__main">
      <!-- BEGIN container -->
      <div class="container">
        <!-- BEGIN header__logo -->
        <div class="header__logo">
          <div class="logo">
            <a href="" class="logo__link">
              <img src="img/logo.png" alt="Займ для действующего бизнеса" class="logo__img">
            </a>
          </div>
        </div>
        <!-- END header__logo -->
        <!-- BEGIN header__menu -->
        <div class="header__menu">
          <!-- BEGIN menu -->
          <nav class="nav">
            <ul class="menu">
              [:MENU]
            </ul>
            <a href="#" class="nav__close"></a>
          </nav>
          <!-- END menu -->
          <a href="#" class="menu-opener ssm-toggle-nav">
            <span class="menu-opener__line"></span>
          </a>
        </div>
        <!-- END header__menu -->
      </div>
      <!-- END container -->
    </div>
    <!-- END header__main -->
  </header>
  <!-- END header -->  

  <!-- BEGIN content -->
  <div class="content">
    <!-- BEGIN text-block -->
    <div class="text-block">
      <!-- BEGIN container -->
		<div class="container">
			[:ABOUTSERVICE]
		</div>
      <!-- END container -->
    </div>
    <!-- END text-block -->
    <!-- BEGIN reviews -->
    <div class="reviews">
      <!-- BEGIN container -->
      <div class="container">
        <h2 class="headline reviews__headline accent--blue">Отзывы клиентов</h2>
        <!-- BEGIN reviews__list -->
		    <div class="reviews__list">
				<!-- BEGIN reviews__item -->
				[:REVIEWS]
			     <!-- END reviews__item -->
			</div>
        <!-- END reviews__list -->
      </div>
      <!-- END container -->
    </div>
    <!-- END reviews -->
  </div>
  <!-- END content -->
  
  
  
  <!-- BEGIN footer class='footer' -->
  <footer>
    <!-- BEGIN container -->
    <div class="container">
      <!-- BEGIN footer__info -->
      <div class="footer__info">
        <!-- BEGIN f-info -->
        <div class="f-info">
          <!-- BEGIN f-contacts -->
          <div class="f-contacts">
            <div class="f-contacts__item"><span class="f-contacts__title">Телефон горячей линии:</span> 8 (800) 788-47-94</div>
            <div class="f-contacts__item"><span class="f-contacts__title">Для предложений:</span> <a href="mailto:offers@pointinvest.ru">offers@pointinvest.ru</a></div>
          </div>
          <!-- END f-contacts -->
          <!-- BEGIN f-copyright -->
          <div class="f-copyright">
            <div class="f-copyright__item">© 2012-2016 ООО «Стартфинанс» (Россия, г. Москва, 121087, ул. Розы Люксембург, 6, стр. 3)</div>
            <div class="f-copyright__item">ОГРН 1157733009973, рег.номер в реестре МФО 651404044054362</div>
            <div class="f-copyright__item">Все права защищены. Информация, размещенная на сайте, принадлежит только владельцам сайта.</div>
          </div>
          <!-- END f-copyright -->
        </div>
        <!-- END f-info -->
      </div>
      <!-- END footer__info -->
      <!-- BEGIN footer__social -->
      <div class="footer__social">
        <!-- BEGIN social -->
        <div class="social">
          <div class="social__title">Мы в социальных сетях</div>
          <div class="social__list">
            <a href="#" class="social__item social__item--vk" title="ВКонтакте">ВКонтакте</a>
            <a href="#" class="social__item social__item--fb" title="Facebook">Facebook</a>
            <a href="#" class="social__item social__item--tw" title="Twitter">Twitter</a>
          </div>
        </div>
        <!-- END social -->
      </div>
      <!-- END footer__social -->
    </div>
    <!-- END container -->
  </footer>
  <!-- END footer -->
  <div class="ssm-overlay"></div>
  <script src="js/jquery.min.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/enquire.min.js"></script>
  <script src="js/jquery.touchSwipe.min.js"></script>
  <script src="js/jquery.slideandswipe.min.js"></script>
  <script src="js/common.js"></script>
</body>
</html>

