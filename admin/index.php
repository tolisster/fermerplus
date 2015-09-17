<?php   
/**  
* The administration panel (router) 
* Панель администрации (роутер) 
* @author IT studio IRBIS-team  
* @copyright © 2009 IRBIS-team 
*/ 
///////////////////////////////////////////////////////// 

/** 
* We establish the charset and level of errors 
* Устанавливаем кодировку и уровень ошибок 
*/ 
    header("Content-Type: text/html; charset=utf-8"); 
    error_reporting(E_ALL); 
/** 
* We include buffering 
* Включаем буфферизацию 
*/  
    ob_start();     
    session_start();
/**  
* Debug  
* Дебаггер 
* @TODO To clean in release 
*/ 
   define('IRB_TRACE', true);    
   include '../debug.php'; 
   
 /** 
* Installation of a key of access to files 
* Установка ключа доступа к файлам 
*/ 
   define('IRB_KEY', true);
    
/**
* The administrator-panel identifier
* Идентификатор админ-панели
*/   
   define('IRB_ADMIN', true);
   
/**
* We connect a configuration file
* Подключаем конфигурационный файл
*/       
   include '../config.php';
   
/**
* We connect a file of the language
* Подключаем языковой файл
*/  
   include IRB_ROOT .'language/ro.php'; 
       
/**
* We connect a file of initialization of variables
* Подключаем файл инициализации переменных
*/            
   include IRB_ROOT .'variables.php';
        
/**
* We connect a file of the general functions
* Подключаем файл общих функций
*/  
   include IRB_ROOT .'libs/default.php'; 
    
/** 
* We connect a file of the views functions 
* Подключаем файл функций отображения
*/   
    include IRB_ROOT .'libs/view.php';
    

    if(!empty($_SESSION['admin']))   
    { 
     /** 
     * The switch of modules 
     * Переключатель страниц 
     */       
        switch($GET['page'])  
        {  
           
            case 'exit':     
                include IRB_ROOT .'admin/sequrity/exit.php';  
            break;
			
            case 'articles':     
                include IRB_ROOT .'admin/articles/router.php';  
            break;
			
			case 'pages':     
                include IRB_ROOT .'admin/pages/router.php';  
            break;
			
			case 'news':     
                include IRB_ROOT .'admin/news/router.php';  
            break;
			
			case 'events':     
                include IRB_ROOT .'admin/events/router.php';  
            break;

            case 'seeds_cats':     
                include IRB_ROOT .'admin/seeds_cats/router.php';  
            break;

            case 'seeds_subcats':     
                include IRB_ROOT .'admin/seeds_subcats/router.php';  
            break;

            case 'seeds':     
                include IRB_ROOT .'admin/seeds_orig/router.php';  
            break;

		
	       case 'editcateg':     
                include IRB_ROOT .'admin/editcateg/router.php';  
            break;

            case 'editsubcat':     
                include IRB_ROOT .'admin/editsubcat/router.php';  
            break;
		
			case 'prices':     
                include IRB_ROOT .'admin/prices/router.php';  
            break;
			
			case 'programs':     
                include IRB_ROOT .'admin/programs/router.php';  
            break;
			

	
			
			case 'filemanager':     
                include IRB_ROOT .'admin/filemanager/router.php';  
            break;
							

						            
            default: 
                include IRB_ROOT .'admin/main_controller.php';  
            break;     
        } 
		    
    $tpl = getTpl('admin');
    $admin_menu = parseTpl($tpl, array());    
             
    }
    else
    {
        $admin_menu = '';
        include IRB_ROOT .'admin/sequrity/enter.php'; 
    }  
                         
    $content = ob_get_contents();    
    ob_end_clean();  
       

 
/**  
* Includes the main template of a site  
* Подключаем главный шаблон сайта  
*/  
    include IRB_ROOT .'skins/tpl/admin.tpl';
       

    
    