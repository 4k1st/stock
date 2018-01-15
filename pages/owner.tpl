<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>[:TITLEOWNER]</title>
		<link href="cupertino/jquery.ui.all.css" rel="stylesheet" type="text/css">
		<link href="storekeeper.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function()
		{
		   $('#MegaMenu1 .submenu ul li h2 a').addClass('ui-widget-header');
		   $('#MegaMenu1 .submenu ul li a').hover(function()
		   {
			  $(this).addClass('ui-state-default');
		   }, function()
		   {
			  $(this).removeClass('ui-state-default');
		   });
		   $('.ui-state-default').hover(function()
		   {
			  $(this).addClass('ui-state-hover');
		   }, function()
		   {
			  $(this).removeClass('ui-state-hover');
		   });
		   $('#MegaMenu1 li').hover(function()
		   {
			  var top = $(this).find('.button').outerHeight();
			  $(this).find('.submenu').css( {'top': top });
			  $(this).find('.submenu').show();
			  if ($(this).find('.row').length > 0 )
			  {
				 var maxRowWidth = 0;
				 $(this).find('.row').each(function()
				 {
					var width = 0;
					$(this).find('ul').each(function()
					{
					   width += $(this).width();
					});
					if (width > maxRowWidth)
					{
					   maxRowWidth = width;
					}
				 });
				 $(this).find('.submenu').css({'width' : maxRowWidth});
				 $(this).find('.row:last').css({'margin': '0'});
			  }
			  else
			  {
				 var width = 0;
				 $(this).find('ul').each(function()
				 {
					width += $(this).width();
				 });
				 $(this).find('.submenu').css({'width' : width});
			  }
			  $(this).find('.submenu').slideDown();
		   }, function()
		   {
			  $(this).find('.submenu').hide();
		   })
		   $('#MegaMenu1 li .submenu').hide();
		});
		</script>
	</head>
	<body>
		<form method="POST" >
			[:MENU]
			склад:
				<select name="stock" size="1" id="stock">
					[:STOCK]
				</select>
			Товар:
				<select name="goods" size="1" id="goods">
					[:GOODS]
				</select>
			количество:
				<input type="text" id="num_goods" name="num_goods" value=""/>
			пришло:	<input type="radio" id="arrived_yes" name="arrived" value="on" title="пришло">
			отпущено: 	<input type="radio" id="arrived_no" name="arrived" value="no" title="отпущенно">
			<input type="button" onclick=send() value="отправить">
		</form>
	</body>
</html>
