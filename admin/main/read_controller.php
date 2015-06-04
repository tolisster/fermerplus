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
* Function of generation of a menu of modules 
* Функция генерации меню  модулей 
*/  
    function getMenu($pages)  
    {  
          // Получаем массив названий модулей
        global $CONFIG_SETTING;
    
        // Форимируем меню ввиде списка
        $menu  = "<ul  class=\"pages_menu\">\n";
         
        // Сначала разбираем предустановленный массив
        foreach($CONFIG_SETTING as $link => $name)       
            $menu .= '<li>   
                      <a href="'. href('rem='. $link) .'" >'. $name ."</a>  
                      </li>\n";        
         
        // затем тот, который в файле
        foreach($pages as $num => $page)        
            $menu .= '<li>   
                      <a href="'. href('rem='. $page[0]) .'" >'. $page[1] ."</a>  
                      </li>\n";   
              
        return $menu . "</ul>\n";  
    } 
                 
        
/**  
* Function of generation of a menu of modules 
* Функция генерации меню  модулей 
*/  
    function getModul($pages)  
    {  
          // Глобальные массивы только для чтения
        global $CONFIG_SETTING, $GET;        
        $menu = $CONFIG_SETTING;

        // Объединяем массивы                
        foreach($pages as $num => $page)        
            $menu[$page[0]] = $page[1];

        // Возвращаем выбранное название    
        return !empty($menu[$GET['rem']]) ? $menu[$GET['rem']] : IRB_LANG_NO_SELECT;  
    } 

/** 
* Formation of an array of menu options 
* Формирование массива ссылок меню. 
*/ 
 
       // Если есть установочный файл, читаем и десериализуем
        if(file_exists(IRB_ROOT .'setup/menu.txt')) 
           $pages = unserialize(file_get_contents(IRB_ROOT .'setup/menu.txt')); 
        else //Если нет - пустой массив
           $pages = array(NULL, array(NULL, NULL));  		         
/** 
* Installation of the data for meta-tags 
* Установка данных для мета-тегов. 
*/     
    if(!file_exists(IRB_ROOT .'/setup/meta.txt')) // Проверяем наличие файла. Если нет - формируем.
    {  
		// Заполняем ассоциативный массив  элементами-массивами с атрибутами мета-тегов по числу модулей
        $arrays = array_fill(1, count($CONFIG_SETTING), array( 
                                                       'title'       => IRB_LANG_NO_TITLE, 
                                                       'keywords'    => IRB_LANG_NO_KEYWORDS, 
                                                       'description' => IRB_LANG_NO_DESCRIPTION  
                                                       )); 
        // Создаем массив, где ключами - названия модулей, элементами - массивы с метаданными
        $meta = array_combine($CONFIG_SETTING, $arrays);                                              
    }   
    else // Если файл есть - читаем и десереализуем массив
        $meta = unserialize(file_get_contents(IRB_ROOT .'/setup/meta.txt'));  
     
    if($ok) // Если нажата кнопка
    { 
       // Заменяем в выбранном массиве элементы данными, полученными из формы 
        $meta[$GET['rem']] = array('title'       => $POST['value1'], 
                                   'keywords'    => $POST['value2'], 
                                   'description' => $POST['value3'] 
                                   ); 
        // Записываем сериализованный массив                                                                                   
        file_put_contents(IRB_ROOT .'setup/meta.txt', serialize($meta));               

    } 
