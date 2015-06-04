<?php   
    if(!defined('IRB_KEY'))
    {
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('../../404.html'));
    } 
//////////////////////////////////////////////////////////
 
include './libs/mysql.php'; 
include './bbcode/irb_bbdecoder.php';
   
  
   if(!empty($_SERVER['HTTP_REFERER']) 
	    && trim($_SERVER['HTTP_REFERER'], '/') !== trim(IRB_HOST, '/') 
	    && strpos($_SERVER['HTTP_REFERER'], 'main') === true)
	{
        $GET['news'] = 'all';
    }	


	$tpl = getTpl('seeds-disease/row');
	$tpl2  = getTpl('seeds-disease/fullrow');
    $seeds_disease = '';
	$blablabla = '';
    

	if(is_numeric($GET['news']))
	{
       $res = mysqlQuery("SELECT 
	           `id`, 
	           `public`,
	           `" . $GET['lang']  . "title`,
	           `" . $GET['lang']  . "content`
  	           
			   FROM `seeds_disease`  WHERE `public` = 1  AND `id` = " . (int)$GET['news']);
   
               if (mysql_num_rows($res) > 0)
                       {
                             $row = mysql_fetch_assoc($res);
           
		                              $row['title'] = htmlspecialchars($row[''. $GET['lang']  . 'title']);
		                              $row['content'] = ($row[''. $GET['lang']  . 'content']);
									
						  
			                 $page_menu = ''; 
                             $seeds_disease = parseTpl($tpl2, $row);
							 
							 
							 
							 
							 

                       }
               else
                       {
                             header("HTTP/1.1 404 Not Found");
                             exit(file_get_contents(IRB_ROOT . '/404.html'));
                       } 

    }
	else
	{	 
	    
	   include './libs/irb_paginator.php';   
       $paginator = new IRB_Paginator($GET['num'], 50);  
	
            $res = $paginator -> countQuery("SELECT 
	                               `id`, 
	                               `public`,
	                               `rutitle`,
								   `entitle`,
	                                SUBSTRING_INDEX(`" . $GET['lang']  . "content`,' ','40') AS `" . $GET['lang']  . "content`
	
	                                 FROM `seeds_disease` WHERE  `public` = 1   ORDER BY `id` DESC ");   
	 
                $page_menu = $paginator -> createMenu();                    
                       if(mysql_num_rows($res) > 0)
                          {
                               while ($row = mysql_fetch_assoc($res))
                                  {
		                              $row['title'] = htmlspecialchars($row[''. $GET['lang']  . 'title']);
		                              $row['content'] = ($row[''. $GET['lang']  . 'content']. '....');
                                      $row['url'] = href('news=' . $row['id']);
                                      $seeds_disease .= parseTpl($tpl, $row);
									  
									  
                          
									  
									  
									  
									  
                                  }
			  
                          }
		 
                        else
                          {
                                $seeds_disease = DEXIST_A;
                          }
						  
						  
						  
						  

      }
	  

	  
	  
	  
	  
	             $res = mysqlQuery ("SELECT  `id` , `public` , `". $GET['lang']  ."title`
                                    FROM `fertilizers_cats` WHERE `id` = '". $GET['sel']  ."'");   
	 
                 if(mysql_num_rows($res) > 0)
                          {
                               while ($row = mysql_fetch_assoc($res))
                                  {
		                              $category_title = ( RQAT .' '.  $row[''. $GET['lang']  . 'title']);
                                  }
                         }
		         else
                         {
                               $category_title = '';
                         }
						 
				
				

						 


    
	 

	
      
  if ( $GET['news']  == 'all')  {  $page_title = FERTILIZERS .' '. $category_title; }    else  {  $page_title = FERTILIZERS .' '. $category_title; } ;
//   $title = '' . MAIN_TITLE . ' - ' . TITLE_ABOUT . '' ;  