<?php   

/** 
* Controller
* Контроллер 
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
//////////////////////////////////////////////////////////

 /** 
* Function of generation of a menu of pages
* Функция генерации меню страниц
* @param array
* @return string
*/ 
    


   
 $title = '' . MAIN_TITLE. '' ;