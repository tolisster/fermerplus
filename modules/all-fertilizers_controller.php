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


	$tpl = getTpl('all-fertilizers/row');
	$tpl2  = getTpl('all-fertilizers/fullrow');
    $allfertilizer = '';
	$blablabla = '';
    

	if(is_numeric($GET['news']))
	{
       $res = mysqlQuery("SELECT 
	           `id`, 
	           `public`,
	           `category`,
	           `" . $GET['lang']  . "title`,
	           `" . $GET['lang']  . "content`
  	           
			   FROM `fertilizers_content`  WHERE `public` = 1  AND `id` = " . (int)$GET['news']);
   
               if (mysql_num_rows($res) > 0)
                       {
                             $row = mysql_fetch_assoc($res);
           
		                              $row['title'] = htmlspecialchars($row[''. $GET['lang']  . 'title']);
		                              $row['content'] = ($row[''. $GET['lang']  . 'content']);
									  $blablabla = htmlspecialchars($row['category']);
						  
			                 $page_menu = ''; 
                             $allfertilizer = parseTpl($tpl2, $row);
							 
							 
							 
							 
							 

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
       $paginator = new IRB_Paginator($GET['num'], IRB_NUM_POSTS);  
	
            $res = $paginator -> countQuery("SELECT 
	                               `id`, 
	                               `public`,
	                               `category`,
	                               `rutitle`,
								   `entitle`,
	                                SUBSTRING_INDEX(`" . $GET['lang']  . "content`,' ','40') AS `" . $GET['lang']  . "content`
	
	                                 FROM `fertilizers_content` WHERE  `public` = 1 AND `category` = '". $GET['sel']  ."'  ORDER BY `id` DESC ");   
	 
                $page_menu = $paginator -> createMenu();                    
                       if(mysql_num_rows($res) > 0)
                          {
                               while ($row = mysql_fetch_assoc($res))
                                  {
		                              $row['title'] = htmlspecialchars($row[''. $GET['lang']  . 'title']);
		                              $row['content'] = ($row[''. $GET['lang']  . 'content']. '....');
                                      $row['url'] = href('news=' . $row['id']);
                                      $allfertilizer .= parseTpl($tpl, $row);
									  
									  
                                      $blablabla = htmlspecialchars($row['category']);
									  
									  
									  
									  
                                  }
			  
                          }
		 
                        else
                          {
                                $allfertilizer = DEXIST_A;
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
						 
				
				
				$res = mysqlQuery ("SELECT  `id` , `". $GET['lang']  ."title`
                                    FROM `seeds_subcats` WHERE `id` = '". $blablabla  ."'");   
	 
                 if(mysql_num_rows($res) > 0)
                          {
                               while ($row = mysql_fetch_assoc($res))
                                  {
		                              $subcat_title = ( RQAT .' '.  $row[''. $GET['lang']  . 'title']);
                                  }
                         }
		         else
                         {
                               $subcat_title = '';
                         }
						 
						 


    
	 

	
      
  if ( $GET['news']  == 'all')  {  $page_title = FERTILIZERS .' '. $category_title; }    else  {  $page_title = FERTILIZERS .' '. $category_title; } ;
//   $title = '' . MAIN_TITLE . ' - ' . TITLE_ABOUT . '' ;  