<?php

/** 
* View 
* Отображение 
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
/////////////////////////////////////////////////////////// 

    $POST = htmlChars($POST); 
/** 
* Подключаем шаблон  
* Includes the template  
*/  
    include IRB_ROOT .'skins/tpl/admin/main/show.tpl';

	