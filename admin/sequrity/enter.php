<?php

/** 
* Protection file 
* Файл защиты 
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
       exit(file_get_contents('./404.html'));     
    }     
///////////////////////////////////////////////////////////////     
     
	// print_R($admins);
	// die;
	 
	// $_SESSION['admin'] = true; 
    foreach($admins as $admin => $pass)    
        if($POST['value1'] === $admin && md5($POST['value2']) === $pass)    
            $_SESSION['admin'] = true;   

                 
    if(isset($_SESSION['admin']))   
        reDirect();   
       
    $POST = htmlChars($POST);       
 /**   
* We connect the template of enter form   
* Подключаем шаблон формы входа   
*/        
    include IRB_ROOT .'/skins/tpl/admin/form_enter.tpl';