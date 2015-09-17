<?php 
/**
* Router of the module of the main page
* Роутер модуля главной страницы
* @author IT studio IRBIS-team
* @copyright © 2009 IRBIS-team
*/
/////////////////////////////////////////////////////////

/**
* Generation of page of an error at access out of system
* Генерация страницы ошибки при доступе вне системы
*/
    if(!defined('IRB_KEY'))
    {
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('../../404.html'));
    }    
////////////////////////////////////////////////////////////


	include './modules/rightmenu/view.php';
	

	
