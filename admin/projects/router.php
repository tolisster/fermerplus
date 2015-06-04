<?php
/** 
* Router 
* Роутер  
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
///////////////////////////////////////////////////////// 

/**  
* Подключаем контроллер
* The controller includes 
*/ 
    include IRB_ROOT .'admin/projects/modul_controller.php'; 
	
/**  
* Подготовка к выводу 
* Preparation for a conclusion 
*/ 
    include IRB_ROOT .'admin/projects/view.php';



