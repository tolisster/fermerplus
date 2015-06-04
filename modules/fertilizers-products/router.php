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

/** 
* Define the name of the current catalogue
* Определяем название текущего каталога 
*/
    $modul = basename(dirname(__FILE__));
	
	
	

/** 
* The switch of controllers
* Переключатель контроллеров
*/
    if($GET['rem'] && file_exists('./modules/'. $modul .'/'. $GET['rem'] .'_controller.php'))
        include './modules/'. $modul .'/'. $GET['rem'] .'_controller.php';
    else
	{
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('./404.html'));	
	}
	
	
		if($GET['page'] && file_exists('./modules/'. $GET['page'] .'/'));
    
    else
	{
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('./404.html'));	
	}
	

	
/** 
* Подготовка к выводу
* Preparation for a conclusion
*/

	include './modules/'. $modul .'/view.php';
	

	
