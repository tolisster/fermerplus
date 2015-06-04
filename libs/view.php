<?php
/**
* Display functions
* Функции отображения
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
       exit(file_get_contents('../404.html')); 
    }  
/////////////////////////////////////////////////////////  
/** 
* Function of processing of variables for a conclusion in a stream 
* Функция обработки переменных для вывода в поток  
*/                                                     
    function htmlChars($data)    
    {    
        if(is_array($data))             
            $data = array_map("htmlChars", $data);  
        else               
            $data = htmlspecialchars($data);    
                                 
        return $data; 
    }

/** 
* Function of reading of templates 
* Функция чтения шаблонов 
*/   
    function getTpl($tpl) 
    { 
        if(file_exists(IRB_ROOT .'/skins/tpl/'. $tpl .'.tpl')) 
            return file_get_contents(IRB_ROOT .'/skins/tpl/'. $tpl .'.tpl'); 
        else 
            die('The template <b>'. $tpl .'.tpl</b> is absent in the specification'); 
    }
		
/** 
* Function of analysis of a template 
* Функция разбора шаблона 
*/      
    function parseTpl($cont, $data = '') 
    { 
         
        if(is_array($data)) 
        {                 
                     
            extract($data, EXTR_PREFIX_ALL, 'tpl'); 

            ob_start(); 
                eval('?>'. $cont .'<?php '); 
                $cont = ob_get_contents();   
            ob_end_clean();   
     
        } 
       return $cont; 
    }
	

     
