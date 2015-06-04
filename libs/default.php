<?php  

/**
* Library of the general functions
* Библиотека общих функций
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
* Function of formation of GET-parametres  
* Функция формирования GET-параметров  
*/   
  function href()
   {
        global $GET;
        $tmp = $GET;
        $href = '';
        $host = IRB_HOST;

        $arg = func_get_args();

        if(is_array($arg[0]))
           $arg = $arg[0];

        if(defined('IRB_ADMIN'))
           $host .= 'admin/';

        if($arg[0] == 'host')
           return IRB_HOST . $href;

        foreach($arg as $var)
        {
            $param = explode('=', $var);

            if(array_key_exists($param[0], $tmp))
                $tmp[$param[0]] = $param[1];
            else
                die('The variable <b>'. $param[0] .'</b> is not defined');
        }

        $cnt = array_flip(array_keys($tmp));
        $tmp = array_slice($tmp, 0, $cnt[$param[0]] + 1);

        foreach($tmp as $var => $val)
           if(IRB_REWRITE == 'on')
              $href .= '/'. $val;
           elseif(!empty($val))
              $href .= '&'. $var .'='. $val;

        if(IRB_REWRITE == 'on')
           return $host . hrefTrim($href);
        else
           return $host .'?'. trim($href, '&');
   }

    function hrefTrim($href)
    {
        if(substr($href, -2) == '/0')
           return trim($href, '/0');
        else
           return trim($href, '/');
    }
/**
* Function of Redirections
* Функция перенаправления
*/     
   function reDirect()
   {  
        $arguments = func_get_args();
           
        if(count($arguments))
        {                            
            header('location: '. href($arguments));
            exit();
        }
        else
        {
            header('location: '. str_replace("/index.php", "", $_SERVER['HTTP_REFERER']));
            exit();
        }        
   } 


/**
* Information conclusion
* Вывод информации        
*/  
    function getInfo($info)
    {
        if(count($info))
            return implode('<br/><br/>',$info);
        else
            return '&nbsp;';
    }    
   
	    
/**
* Active links
* Активные ссылки        
*/    
    function active($page)
    {
       global $GET;
	    if($GET['page'] == $page)
            return 'class="active"';
    }     
   
/**
* Функция перевода даты из азиатского формата в прописной
* Translation function of date from the Asian format in the string
* @param string $date, boolean $format
* @return string
*/
    function formatDate($date, $format = true) 
    { 
        global $month;

        $day  = substr($date, 8, 2);         
        $mnt  = $month[substr($date, 5, 2)];        
        $year = substr($date, 0, 4); 
        $time = '';
		
        if($format)         
            $time = ' '. substr($date, 11); 

        return $day .' '. $mnt .' '. $year . $time; 
    }
    
/** 
* Return of checkbocses    
* Возврат чекбоксов 
*/ 
    function returnCheck($id, $return) 
    { 
       return ($id == $return)?'checked="checked"':NULL; 
    } 	
	