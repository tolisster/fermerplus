<?php
/**  
* @author Grigorii Simion
* @copyright © 2011 Grigorii Simion
*/ 

    if(!defined('IRB_KEY'))
       header('http://'. $_SERVER['HTTP_HOST']);      
       
    function stripslashesDeep($data)     
    {     
        if(is_array($data))      
            $data = array_map("stripslashesDeep", $data);      
        else    
            $data = stripslashes($data);      
        return $data; 
    } 

    if(get_magic_quotes_gpc())  
    {  
        $_GET = stripslashesDeep($_GET);   
        $_POST = stripslashesDeep($_POST);   
        $_COOKIE = stripslashesDeep($_COOKIE);  
    } 
	
 

 
    $GET = array(  
                  'lang'  => 'ru',
                  'page' => 'main',  
                  'rem'  => 'read',  
                  'sel'  => 'all', 
                  'id'   => 0, 
                  'news' => 'all',	
                  'num'  => 0,  




                );  
 
    if(IRB_REWRITE == 'on' && !empty($_GET['route']))  
    {  
        $get = explode('/', trim($_GET['route'], '/'));  
        $i = 0;  

        foreach($GET as $var => $val)  
        {  
            if(!empty($get[$i]))  
               $GET[$var] = $get[$i];  

            ++$i;  
        }  
    }  
    elseif(count($_GET))  
    {  
        foreach($GET as $var => $val)  
            if(!empty($_GET[$var]))  
                $GET[$var] = $_GET[$var];      
    }
	  
   
    $ok       = !empty($_POST['ok'])?true:false;  
    $delete   = !empty($_POST['delete'])?true:false;
	       
  
    $POST = array(  

                            'value1'           =>  '',  
                            'value2'           =>  '',      
                            'value3'           =>  '',
                            'value4'           =>  '',
                            'value5'           =>  '',		
							'value6'           =>  '',  
                            'value7'           =>  '',      
                            'value8'           =>  '',
                            'value9'           =>  '',
                            'value10'           =>  '',													

							'array1'           =>  array(),
							'array1'           =>  array(),							
							'array1'           =>  array(),							  
                  );  
                    
    if(!empty($_POST['form']))
        $POST = array_merge($POST, $_POST['form']); 

    

   $error       = array(); 
   $info        = array();
   
   
   
   


   
