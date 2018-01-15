function showpopup(id, page)
{	

	var xmlHttpRequest = null;
	var params="?page="+page;
	if (window.XMLHttpRequest)
	  xmlHttpRequest = new window.XMLHttpRequest();
	else
	  xmlHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
  
	xmlHttpRequest.open("GET","engine/popup.php"+params,false);//  
	xmlHttpRequest.send(null);
	var form=document.getElementById(id)
	document.getElementById('forms').innerHTML=xmlHttpRequest.responseText;
	document.getElementById(id).style.display="block";
//	alert("wrk")
}

function hidepopup(id)
{
	document.getElementById(id).style.display='none';
}

function checkpswd()
{
	var passwd=document.forms['regform'].elements.passwd.value;
	var repeatepswd=document.forms['regform'].elements['repeatepswd'].value;
	if(passwd!=repeatepswd)
	{
		document.getElementById('repeate_passwd_error').style.display="block";
		document.getElementById('repeate_passwd_error').innerHTML="не совпадает";	
	}else{
		document.getElementById('repeate_passwd_error').style.display="none";
		document.getElementById('repeate_passwd_error').innerHTML="";	
	}
 }
 function checklogin()
{	

	var xmlHttpRequest = null;
	var params="?checklogin=1";
	var login=document.forms["regform"].elements["login"].value;
	var mail=document.forms["regform"].elements["email"].value;
		
	params=params+"&login="+encodeURIComponent(login)+"&mail="+encodeURIComponent(mail);
	if (window.XMLHttpRequest)
	  xmlHttpRequest = new window.XMLHttpRequest();
	else
	  xmlHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
 
	xmlHttpRequest.open("GET","engine/popup.php"+params,false);//  
	xmlHttpRequest.send(null);
//	alert(xmlHttpRequest.responseText);
	if(xmlHttpRequest.responseText=0)
	{
		document.getElementById('error').innerHTML="такой логин и почта уже существуют";
		document.getElementById('error').style.display="block";
	}
}

function fregform()
{
	var xmlHttpRequest = null;
	if (window.XMLHttpRequest)
	  xmlHttpRequest = new window.XMLHttpRequest();
	else
	  xmlHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
  	
	var regform=document.forms["regform"];
	var login=regform.elements["login"].value;
	var passwd=regform.elements["passwd"].value;
	var firstname=regform.elements["firstname"].value;
	var lastname=regform.elements["lastname"].value;	
	var phone=regform.elements["phone"].value;
	var email=regform.elements["email"].value;
	var organization=regform.elements["organization"].value;	
	
	var body = 	'login=' + encodeURIComponent(login) +
				'&passwd=' + encodeURIComponent(passwd) +
				'&firstname=' + encodeURIComponent(firstname) +
				'&lastname=' + encodeURIComponent(lastname) +
				'&phone=' + encodeURIComponent(phone) +
				'&email=' + encodeURIComponent(email) +	
				'&organization=' + encodeURIComponent(organization)+
				'&regbtn=1';

	xmlHttpRequest.open("POST", "engine/popup.php", false);//
	xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
	xmlHttpRequest.send(body);//
	document.getElementById('forms').innerHTML=xmlHttpRequest.responseText;
	document.getElementById('parent_popup').style.display="block";		
} 

function entrace()
{
	var xmlHttpRequest = null;
	if (window.XMLHttpRequest)
	  xmlHttpRequest = new window.XMLHttpRequest();
	else
	  xmlHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
  	
	var regform=document.forms["auth"];
	var login=regform.elements["login"].value;
	var passwd=regform.elements["passwd"].value;
	var body = 	'login=' + encodeURIComponent(login) +
				'&passwd=' + encodeURIComponent(passwd) +
				'&entrace=1';
	xmlHttpRequest.open("POST", "engine/popup.php", false);//
	xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
	xmlHttpRequest.send(body);//
	document.getElementById('forms').innerHTML=xmlHttpRequest.responseText;
	document.getElementById('parent_popup').style.display="block";	
}


function exitService()
{
	var xmlHttpRequest = null;
	if (window.XMLHttpRequest)
	  xmlHttpRequest = new window.XMLHttpRequest();
	else
	  xmlHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");

	xmlHttpRequest.open("GET", "engine/popup.php?exit=1", false);//
	xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
	xmlHttpRequest.send(null);
}
 
function load()
{
	var is=document.getElementById("is_value").value;
	var block=document.getElementById("block").value;
	var price=document.getElementById("price").value;
	var cost=document.getElementById("cost").value;		
	var link=document.getElementById("link_value").value;
	var rating=document.getElementById("rating").value;
	var params='?fields=1&is='+encodeURIComponent(is)
								+'&block='+encodeURIComponent(block)
								+'&price='+encodeURIComponent(price)
								+'&cost='+encodeURIComponent(cost)
								+'&link='+encodeURIComponent(link)
								+'&rating='+encodeURIComponent(rating);
	var values = {'is': is, 'block': block, 'price': price,'cost':cost,'link':link,'rating':rating}; // Создаём ассоциативный массив

	var selectColor = document.getElementById("selectColor");
	addRow('tableResults',values);
		
	//alert(xmlHttpRequest.status+' : '+xmlHttpRequest.statusText+"  "+xmlHttpRequest.responseText);
}
