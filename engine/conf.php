<? 
/**************************************************************************
 *							КОНФИГУРАЦИОННЫЕ ДАННЫЕ						  *
 *(!) ВНИМАНИЕ! Изменение данных ниже может привести к отказу системы! (!)*
 **************************************************************************/
/************ ПАРАМЕТРЫ БАЗЫ ДАННЫХ mySQL ***********/
define('HOST',"localhost");//
define('LOGIN',"root" );//
define('PASSWD',"");//
define('DB_NAME',"stock");//
/****************************************************/

/* Подключаемся к базе данных */

$mysqli = new mysqli(HOST, LOGIN, PASSWD, DB_NAME);

/* check connection */ 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$mysqli->set_charset ( "utf8");
?>